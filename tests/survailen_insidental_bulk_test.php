<?php
// CLI only: isolated doubles; no project database, HTTP, or SMTP.
require __DIR__ . '/survailen_insidental_notification_test.php';
$before = $GLOBALS['checks'];
class BulkControllerModel {
    public $calls = 0;
    public $result = 'saved';
    public $nibs;
    function is_valid_assessor($name, $levels) {
        return ($name === 'lead' && in_array('3', $levels)) || ($name === 'support' && in_array('2', $levels));
    }
    function replace_appointments_bulk($nibs, $date, $user, $appointments) {
        $this->calls++;
        $this->nibs = $nibs;
        return $this->result;
    }
}
function bulk_fixture() {
    $c = fixture();
    $c->survailen_insidental = new BulkControllerModel();
    $c->input->data = array('tokens' => '["token-nib-a","token-nib-b"]',
        'asesor_1' => 'lead', 'asesor_2' => 'support', 'asesor_3' => '',
        'tgl_pelaksanaan' => '2026-09-16');
    return $c;
}
$c = bulk_fixture(); $c->simpan_penunjukan_banyak();
check($c->survailen_insidental->nibs === array('1234567890', '9876543210'), 'Decode all NIBs');
check(strpos($c->session->flash['text'], '2 NIB') !== false, 'Success count');
foreach (array('', 'null', '{}', '["invalid"]', '["token-nib-a","token-nib-a"]', '[[]]') as $payload) {
    $c = bulk_fixture(); $c->input->data['tokens'] = $payload;
    expect_status(function () use ($c) { $c->simpan_penunjukan_banyak(); }, 400);
    check($c->survailen_insidental->calls === 0, 'Invalid payload never writes');
}
$c = bulk_fixture(); $c->input->verb = 'get';
expect_status(function () use ($c) { $c->simpan_penunjukan_banyak(); }, 405);
$c = bulk_fixture(); $c->ion_auth->admin = false; $c->simpan_penunjukan_banyak();
check($c->survailen_insidental->calls === 0, 'Non-admin denied');
foreach (array(array('asesor_1',''), array('asesor_1','support'), array('asesor_2','lead'),
    array('asesor_2','invalid'), array('tgl_pelaksanaan','2026-02-30')) as $invalid) {
    $c = bulk_fixture(); $c->input->data[$invalid[0]] = $invalid[1]; $c->simpan_penunjukan_banyak();
    check($c->survailen_insidental->calls === 0, 'Reject invalid assessor/date');
}
$c = bulk_fixture(); $c->survailen_insidental->result = 'conflict'; $c->simpan_penunjukan_banyak();
check($c->session->flash['class'] === 'warning', 'Conflict message');

class BulkDb {
    public $rows = array();
    public $snapshot;
    public $locks = array();
    public $missing = '';
    public $failNib = '';
    public $healthy = true;
    public $where = array();
    public $committed = false;
    function trans_begin() { $this->snapshot = $this->rows; }
    function trans_rollback() { $this->rows = $this->snapshot; }
    function trans_commit() { $this->committed = true; return true; }
    function trans_status() { return $this->healthy; }
    function query($sql, $params) {
        check(strpos($sql, 'FOR UPDATE') !== false, 'Request lock used');
        $this->locks[] = $params[0];
        $exists = $params[0] !== $this->missing;
        return new class($exists) {
            private $exists;
            function __construct($exists) { $this->exists = $exists; }
            function num_rows() { return $this->exists ? 1 : 0; }
        };
    }
    function where($key, $value) { $this->where[$key] = $value; return $this; }
    function update($table, $data) {
        foreach ($this->rows as &$row) {
            if ($row['NIB'] === $this->where['NIB'] && $row['status'] === 'AKTIF') {
                $row = array_merge($row, $data);
            }
        }
        $this->where = array();
        return true;
    }
    function insert_batch($table, $rows) {
        if ($rows[0]['NIB'] === $this->failNib) { $this->healthy = false; return false; }
        $this->rows = array_merge($this->rows, $rows);
        return count($rows);
    }
}
class BulkModel extends Survailen_insidental_model {
    public $db;
    function get_active_appointments($nib) {
        check(count($this->db->locks) === 2, 'Acquire all locks before reading');
        return array_values(array_filter($this->db->rows, function ($row) use ($nib) {
            return $row['NIB'] === $nib && $row['status'] === 'AKTIF';
        }));
    }
    function get_by_nib($nib) { return array((object) array('id' => $nib === '001' ? 10 : 20)); }
}
function model_fixture() { $m = new BulkModel(); $m->db = new BulkDb(); return $m; }
function save_bulk($m) { return $m->replace_appointments_bulk(array('002','001'), '2026-09-16', 'admin', array(1=>'lead',2=>'support',3=>'')); }
$m = model_fixture();
$m->db->rows[] = array('NIB'=>'001','status'=>'DIBATALKAN','id_asesor'=>'old');
check(save_bulk($m) === 'saved', 'Mass appointment saved');
check($m->db->locks === array('001','002'), 'Stable lock order and leading zero retained');
check(count($m->db->rows) === 5, 'Two slots per NIB and history preserved');
check($m->db->rows[0]['status'] === 'DIBATALKAN', 'History unchanged');
check($m->db->rows[1]['id_survailen_accidental'] === 10 && $m->db->rows[3]['id_survailen_accidental'] === 20, 'Correct request references');
$m = model_fixture(); $m->db->rows[] = array('NIB'=>'002','status'=>'AKTIF','id_asesor'=>'existing');
check(save_bulk($m) === 'conflict', 'Reject active assignment even if crafted or stale selection');
check(count($m->db->rows) === 1 && !$m->db->committed, 'Conflict preserves all data');
$m = model_fixture(); $m->db->failNib = '002';
check(save_bulk($m) === 'error' && empty($m->db->rows), 'Later insert failure rolls back earlier NIB');
$m = model_fixture(); $m->db->missing = '002';
check(save_bulk($m) === 'error' && empty($m->db->rows), 'Missing NIB aborts transaction');
echo 'PASS: ' . ($GLOBALS['checks'] - $before) . " bulk checks; isolated transaction doubles.\n";
