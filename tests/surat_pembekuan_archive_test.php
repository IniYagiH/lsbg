<?php
require __DIR__ . '/surat_pembekuan_email_test.php';
require FCPATH . 'application/models/Surat_pembekuan_model.php';
$before = $GLOBALS['checks'];

class ArchiveResult {
    private $rows;
    function __construct($rows) { $this->rows = $rows; }
    function row_array() { return $this->rows ? $this->rows[0] : array(); }
    function result_array() { return $this->rows; }
}
class ArchiveDb {
    public $db_debug = true;
    public $pdo;
    public $lock = true;
    public $released = false;
    public $failInsert = false;
    private $whereId;
    function __construct() {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec('CREATE TABLE lsbu_surat_pembekuan (
            id INTEGER PRIMARY KEY AUTOINCREMENT, nib TEXT, id_izin TEXT, revisi INTEGER,
            tahun INTEGER, urutan INTEGER, nomor_surat TEXT UNIQUE, tanggal_surat TEXT,
            snapshot_json TEXT, surat_json TEXT, created_by TEXT, created_at TEXT,
            UNIQUE(tahun, urutan), UNIQUE(nib, id_izin, revisi))');
        $this->pdo->exec('CREATE TABLE lsbu_surat_pembekuan_email (
            id INTEGER PRIMARY KEY AUTOINCREMENT, surat_id INTEGER, penerima TEXT,
            is_test INTEGER, status TEXT, created_by TEXT, created_at TEXT, finished_at TEXT)');
    }
    function table_exists($name) { return true; }
    function query($sql, $params = array()) {
        if (strpos($sql, 'SELECT GET_LOCK') === 0) return new ArchiveResult(array(array('acquired' => $this->lock ? 1 : 0)));
        if (strpos($sql, 'SELECT RELEASE_LOCK') === 0) { $this->released = true; return true; }
        $s = $this->pdo->prepare($sql); $s->execute($params);
        return new ArchiveResult($s->fetchAll(PDO::FETCH_ASSOC));
    }
    function insert($table, $row) {
        if ($this->failInsert) return false;
        $this->query('INSERT INTO ' . $table . ' (' . implode(',', array_keys($row)) . ') VALUES (' .
            implode(',', array_fill(0, count($row), '?')) . ')', array_values($row));
        return true;
    }
    function insert_id() { return $this->pdo->lastInsertId(); }
    function trans_begin() { return $this->pdo->beginTransaction(); }
    function trans_commit() { return $this->pdo->commit(); }
    function trans_rollback() { if ($this->pdo->inTransaction()) $this->pdo->rollBack(); }
    function trans_status() { return true; }
    function where($key, $id) { $this->whereId = $id; return $this; }
    function update($table, $values) {
        $parts = array();
        foreach ($values as $key => $value) $parts[] = $key . ' = ?';
        $params = array_values($values); $params[] = $this->whereId;
        $this->query('UPDATE ' . $table . ' SET ' . implode(',', $parts) . ' WHERE id = ?', $params);
        return true;
    }
}
class RealArchiveTest extends Surat_pembekuan_model {
    public $db, $load, $surat_pembekuan;
}
$m = new RealArchiveTest(); $m->db = new ArchiveDb(); $m->load = new FakeLoader();
$m->surat_pembekuan = new Surat_pembekuan();
$c = email_letter_fixture(); $row = $c->sanksi->record;
$sp2 = array('nomor_sp2' => 'REAL/SP2/2026', 'tanggal_sp2' => '2026-01-01');
$a = $m->issue($row, $sp2, '0', 'admin-test');
check((int) $a['urutan'] === 1 && (int) $a['revisi'] === 1, 'First annual number');
check(json_decode($a['surat_json'], true)['nomor_sp2'] === '', 'SP II number stays blank even when supplied');
check(json_decode($a['surat_json'], true)['tanggal_sp2'] === '', 'SP II date stays blank');
check(!isset(json_decode($a['snapshot_json'], true)['id']), 'Snapshot ID excluded');
$row['id'] = 9999; $row['nama_bu'] = 'New API name';
$again = $m->latest($row['nib'], $row['id_izin']);
check($again['nomor_surat'] === $a['nomor_surat'] && $again['snapshot_json'] === $a['snapshot_json'], 'Refresh keeps number and contents');
rejected(function () use ($m, $row, $sp2) { $m->issue($row, $sp2, '0', 'admin-test'); });
check(count($m->db->query('SELECT * FROM lsbu_surat_pembekuan')->result_array()) === 1, 'Stale/double submit creates no duplicate');
$b = $m->issue($row, $sp2, $a['id'], 'admin-test');
check((int) $b['urutan'] === 2 && (int) $b['revisi'] === 2, 'Explicit new letter increments revision and sequence');
check($m->find($a['id'])['snapshot_json'] === $a['snapshot_json'], 'Old letter remains immutable');
$other = $row; $other['nib'] = 'OTHER-NIB';
$d = $m->issue($other, $sp2, '0', 'admin-test');
check((int) $d['urutan'] === 3 && (int) $d['revisi'] === 1, 'Same permit other BU is separate');
$m->db->failInsert = true;
rejected(function () use ($m, $row, $sp2, $b) { $m->issue($row, $sp2, $b['id'], 'admin-test'); });
check($m->db->released && $m->db->db_debug && !$m->db->pdo->inTransaction(), 'Failure rolls back and releases lock');
$m->db->failInsert = false; $m->db->lock = false;
rejected(function () use ($m, $row, $sp2, $b) { $m->issue($row, $sp2, $b['id'], 'admin-test'); });
$m->db->lock = true;
$id = $m->begin_email($a['id'], 'yagihagiyansyah99@gmail.com', 'admin');
check($m->status_map()[Surat_pembekuan_model::identity($row['nib'], $row['id_izin'])]['last']['status'] === 'PENDING', 'Pending attempt recorded before SMTP');
$m->finish_email($id, true);
$id2 = $m->begin_email($b['id'], 'yagihagiyansyah99@gmail.com', 'admin'); $m->finish_email($id2, false);
$key = Surat_pembekuan_model::identity($row['nib'], $row['id_izin']);
$state = $m->status_map()[$key];
check($state['success']['surat_id'] == $a['id'] && $state['last']['status'] === 'FAILED', 'Failure keeps prior success');
check($state['letter']['id'] == $b['id'], 'Latest number shown independently of prior success');
check($m->status_map()[Surat_pembekuan_model::identity($other['nib'], $other['id_izin'])]['success'] === null, 'No status cross-over to other BU');
$c = email_letter_fixture(); $c->surat_arsip = $m;
$c->kirim_email_pembekuan('48');
check($c->output->status === 200, 'Controller persists real model attempt');
check($m->status_map()[$key]['success']['surat_id'] == $b['id'], 'Resend marks latest letter successful');
preg_match('~surat-email/([A-Za-z0-9_-]+)~', $c->email->values['message'][0], $match);
$c->input->verb = 'get'; $c->ion_auth->logged = false; $c->sanksi->record = array();
$c->surat_pembekuan_email($match[1]);
check(strpos($c->pdfgenerator->html, $b['nomor_surat']) !== false, 'Public archive works after snapshot removed');
$token = (new Surat_pembekuan_token())->issue($a, $c->config->key);
$c->surat_pembekuan_email($token);
check(strpos($c->pdfgenerator->html, $a['nomor_surat']) !== false, 'Old issued link still opens old revision');
foreach (array('no_letter', 'schema', 'begin', 'finish') as $case) {
    $c = email_letter_fixture();
    if ($case === 'no_letter') $c->surat_arsip->letter = null;
    if ($case === 'schema') $c->surat_arsip->available = false;
    if ($case === 'begin') $c->surat_arsip->failBegin = true;
    if ($case === 'finish') $c->surat_arsip->failFinish = true;
    $c->kirim_email_pembekuan('48');
    check($c->output->status >= 400, 'Archive failure handled: ' . $case);
    check($c->email->calls === ($case === 'finish' ? 1 : 0), 'No SMTP before recording attempt: ' . $case);
}
$c = email_letter_fixture(); $c->input->verb = 'get'; $c->surat_arsip->letter = null;
$c->surat_pembekuan_token = new Surat_pembekuan_token();
$c->surat_pembekuan('48');
check($c->template->data === null && $c->pdfgenerator->html === null, 'GET without letter returns to one-click list');
$c = email_letter_fixture(); $c->input->verb = 'get'; $c->input->query['baru'] = '1';
$c->surat_pembekuan('48');
check($c->output->body === '%PDF-test', 'GET cannot issue a new revision');
$c = email_letter_fixture(); $c->surat_arsip = $m;
$c->input->data = array('_sanksi_nonce' => 'nonce',
    'expected_letter' => (string) $b['id'], 'snapshot_version' => $c->surat_pembekuan_token->fingerprint($c->sanksi->record));
$c->terbitkan_surat_pembekuan('48');
check((int) $m->latest($row['nib'], $row['id_izin'])['revisi'] === 3, 'POST publishes new permanent revision');
foreach (array('expected_letter' => '-1', '_sanksi_nonce' => 'bad', 'snapshot_version' => 'stale') as $field => $value) {
    $old = $c->input->data[$field]; $c->input->data[$field] = $value;
    expect_status(function () use ($c) { $c->terbitkan_surat_pembekuan('48'); },
        $field === '_sanksi_nonce' ? 403 : ($field === 'snapshot_version' ? 409 : 400));
    $c->input->data[$field] = $old;
}
$c = email_letter_fixture(); $c->sanksi->rows = array($c->sanksi->record); $c->surat_arsip = $m;
$c->sanksi_administratif(); extract($c->template->data);
ob_start(); include FCPATH . 'application/views/survailen_insidental/sanksi_administratif.php'; $html = ob_get_clean();
check(strpos($html, 'Terkirim ke email uji') !== false && strpos($html, 'surat sebelumnya') !== false, 'List distinguishes test delivery and prior revision');
echo ($GLOBALS['checks'] - $before) . " archive checks passed (SQLite memory; MySQL locking not simulated).\n";
