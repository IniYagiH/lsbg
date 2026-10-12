<?php
// Offline only: fake API and transactional database double; no HTTP/SQL project writes.
require __DIR__ . '/survailen_insidental_notification_test.php';
require FCPATH . 'application/libraries/Siki_sanksi_client.php';
require FCPATH . 'application/libraries/Sanksi_administratif_xlsx.php';
require FCPATH . 'application/models/Sanksi_administratif_model.php';
$before = $GLOBALS['checks'];
function rejected($fn) {
    try { $fn(); } catch (RuntimeException $e) { check(true, 'Rejected invalid input'); return; }
    throw new RuntimeException('Expected rejection');
}
$row = array('id' => 1, 'id_izin' => 'I-202509161200084997036', 'nib' => '00123456789012345678',
    'nama_bu' => 'BU <uji>', 'kode_subklasifikasi' => 'BG003', 'id_kualifikasi' => 'B',
    'keterangan' => 'Komitmen SMAP Belum terpenuhi');
$second = $row; $second['keterangan'] = '=SUM(1,2)';
class TestSiki extends Siki_sanksi_client {
    public $pages = array(); public $calls = 0;
    protected function request($token, $page, $timeout) {
        $this->calls++;
        if (!isset($this->pages[$page])) throw new RuntimeException('API unavailable');
        return $this->pages[$page];
    }
}
$client = new TestSiki();
$client->pages = array(1 => json_encode(array('data' => array($row, $second, $row))));
check(count($client->fetch_all('test-token')) === 3, 'Keep multiple sanctions and exact duplicate entries');
foreach (array('[]', '{"data":[]}') as $body) {
    $client->pages = array(1 => $body);
    check($client->fetch_all('test-token') === array(), 'Explicit empty list accepted');
}
foreach (array('{}', '{"data":{}}', '{"data":null}', '<html>error</html>',
    '{"success":false,"data":[]}', '{"status":500,"data":[]}',
    '{"data":[],"meta":{"current_page":1,"per_page":10}}',
    '{"data":[],"meta":{"total":2}}',
    json_encode(array('data' => array(array('id_izin' => 'bad'))))) as $body) {
    $client->pages = array(1 => $body);
    rejected(function () use ($client) { $client->fetch_all('test-token'); });
}
$client->pages = array(
    1 => json_encode(array('data' => array($row), 'meta' => array('current_page' => 1, 'last_page' => 2, 'total' => 2))),
    2 => json_encode(array('data' => array($second), 'meta' => array('current_page' => 2, 'last_page' => 2, 'total' => 2))),
);
check(count($client->fetch_all('test-token')) === 2, 'Collect all pages');
unset($client->pages[2]);
rejected(function () use ($client) { $client->fetch_all('test-token'); });
$client->pages[2] = $client->pages[1];
rejected(function () use ($client) { $client->fetch_all('test-token'); });
foreach (array('', "bad\r\nheader", null) as $token) {
    rejected(function () use ($client, $token) { $client->fetch_all($token); });
}
$client->pages = array(
    1 => json_encode(array('data' => array('data' => array($row), 'current_page' => 1, 'last_page' => 1, 'total' => 1)))
);
check(count($client->fetch_all('token')) === 1, 'Nested Laravel envelope');
$client->pages = array(
    1 => json_encode(array('data' => array($row), 'next_page_url' => Siki_sanksi_client::ENDPOINT . '?page=2')),
    2 => json_encode(array('data' => array($second), 'next_page_url' => null)),
);
check(count($client->fetch_all('token')) === 2, 'Follow page number from next link');
$client->pages[1] = json_encode(array('data' => array($row), 'next_page_url' => 'https://other.test/?page=2'));
rejected(function () use ($client) { $client->fetch_all('token'); });

class SnapshotDb {
    public $db_debug = true; public $rows = array('old'); public $meta = 'old';
    public $snapshot; public $fail = false; public $failMeta = false; public $rolled = false;
    function trans_begin() { $this->snapshot = array($this->rows, $this->meta); return true; }
    function query($sql, $params = array()) {
        if (strpos($sql, 'DELETE FROM') === 0) { $this->rows = array(); return true; }
        if (strpos($sql, 'INSERT INTO') === 0) {
            if ($this->failMeta) return false;
            $this->meta = $params; return true;
        }
        throw new RuntimeException('Unexpected query');
    }
    function insert_batch($table, $rows) {
        if ($this->fail) return false;
        $this->rows = array_merge($this->rows, $rows); return count($rows);
    }
    function trans_status() { return true; }
    function trans_commit() { return true; }
    function trans_rollback() {
        list($this->rows, $this->meta) = $this->snapshot; $this->rolled = true;
    }
}
class SnapshotModel extends Sanksi_administratif_model { public $db; }
$m = new SnapshotModel(); $m->db = new SnapshotDb();
$m->replace_snapshot(array($row, $second));
check(count($m->db->rows) === 2 && $m->db->rows[0]['id_izin'] === $m->db->rows[1]['id_izin'], 'Snapshot preserves repeated permits');
check($m->db->meta[1] === 2 && $m->db->db_debug === true, 'Metadata and debug restored');
foreach (array('fail', 'failMeta') as $failure) {
    $m = new SnapshotModel(); $m->db = new SnapshotDb(); $m->db->$failure = true;
    rejected(function () use ($m, $row) { $m->replace_snapshot(array($row)); });
    check($m->db->rows === array('old') && $m->db->meta === 'old' && $m->db->rolled, 'Rollback preserves previous rows and metadata');
    check($m->db->db_debug === true, 'Restore database debug on failure');
}
$m = new SnapshotModel(); $m->db = new SnapshotDb();
$m->replace_snapshot(array());
check($m->db->rows === array() && $m->db->meta[1] === 0, 'Valid empty snapshot retains sync timestamp');

class SanksiFakeModel {
    public $available = true; public $lock = true; public $released = false; public $saved = null;
    public $rows = array(); public $search;
    function ready() { return $this->available; }
    function acquire_lock() { return $this->lock; }
    function release_lock() { $this->released = true; }
    function replace_snapshot($rows) { $this->saved = $rows; }
    function listing($search) { $this->search = $search; return $this->rows; }
    function last_sync() { return array('synced_at' => '2026-10-10 12:00:00', 'row_count' => count($this->rows)); }
}
class SanksiSession extends FakeSession { function set_userdata($key, $value) { $this->data[$key] = $value; } }
class SanksiSecurity {
    function get_csrf_token_name() { return 'csrf'; }
    function get_csrf_hash() { return 'csrf-value'; }
}
class SanksiOutput {
    public $status = 200; public $body; public $type;
    function set_status_header($status) { $this->status = $status; return $this; }
    function set_content_type($type) { $this->type = $type; return $this; }
    function set_header($header) { return $this; }
    function set_output($body) { $this->body = $body; return $this; }
}
class SanksiLoader extends FakeLoader { function model($name, $alias) {} }
class SanksiBu { function token_api_siki() { return array(array('token' => 'test-token')); } }
class SanksiTemplate {
    public $data;
    function load($layout, $view, $data) { $this->data = $data; }
}
class ArchiveFake {
    public $available = true;
    public $letter = null;
    public $attempts = array();
    public $failBegin = false;
    public $failFinish = false;
    function ready() { return $this->available; }
    function status_map() { return array(); }
    function latest($nib, $izin) { return $this->letter; }
    function find($id) { return $this->letter && (string) $this->letter['id'] === (string) $id ? $this->letter : null; }
    function begin_email($id, $recipient, $user) {
        if ($this->failBegin) throw new RuntimeException('DB failure');
        $this->attempts[] = array('surat_id' => $id, 'penerima' => $recipient, 'status' => 'PENDING');
        return count($this->attempts);
    }
    function finish_email($id, $sent) {
        if ($this->failFinish) return false;
        $this->attempts[$id - 1]['status'] = $sent ? 'SENT' : 'FAILED';
        return true;
    }
}
function sanksi_fixture($row) {
    $c = fixture(); $c->surat_arsip = new ArchiveFake(); $c->load = new SanksiLoader(); $c->session = new SanksiSession();
    $c->session->data['sanksi_refresh_nonce'] = 'nonce';
    $c->input->data['_sanksi_nonce'] = 'nonce';
    $c->security = new SanksiSecurity(); $c->output = new SanksiOutput();
    $c->sanksi = new SanksiFakeModel(); $c->Bu_model = new SanksiBu();
    $c->siki_sanksi_client = new TestSiki();
    $c->siki_sanksi_client->pages = array(1 => json_encode(array('data' => array($row, $row))));
    $c->sanksi_administratif_xlsx = new Sanksi_administratif_xlsx();
    $c->template = new SanksiTemplate();
    return $c;
}
$c = sanksi_fixture($row); $c->refresh_sanksi_administratif();
check($c->output->status === 200 && count($c->sanksi->saved) === 2 && $c->sanksi->released, 'Refresh saves complete result and releases lock');
foreach (array('auth', 'method', 'csrf', 'schema', 'lock', 'api') as $case) {
    $c = sanksi_fixture($row);
    if ($case === 'auth') $c->ion_auth->admin = false;
    if ($case === 'method') $c->input->verb = 'get';
    if ($case === 'csrf') $c->input->data['_sanksi_nonce'] = 'wrong';
    if ($case === 'schema') $c->sanksi->available = false;
    if ($case === 'lock') $c->sanksi->lock = false;
    if ($case === 'api') $c->siki_sanksi_client->pages = array();
    $c->refresh_sanksi_administratif();
    check($c->output->status >= 400 && $c->sanksi->saved === null, 'Failed refresh never replaces data: ' . $case);
    check($case === 'api' ? $c->sanksi->released : $c->siki_sanksi_client->calls === 0, 'Lock release or reject before API');
}
foreach (array('sanksi_administratif', 'export_sanksi_administratif') as $action) {
    $c = sanksi_fixture($row); $c->ion_auth->admin = false; $c->$action();
    check($c->sanksi->search === null, 'List and export enforce access');
    $c = sanksi_fixture($row); $c->input->query['q'] = array('bad');
    expect_status(function () use ($c, $action) { $c->$action(); }, 400);
}
$c = sanksi_fixture($row); $c->sanksi->rows = array($row, $second);
$c->input->query['q'] = 'SMAP'; $c->sanksi_administratif();
check($c->template->data['search'] === 'SMAP', 'Applied search passed to page');
$c->export_sanksi_administratif();
check($c->sanksi->search === 'SMAP', 'Same search for export');
$path = tempnam(sys_get_temp_dir(), 'sanksi_test_');
file_put_contents($path, $c->output->body);
$zip = new ZipArchive();
try {
    check($zip->open($path) === true, 'Real XLSX ZIP');
    for ($i = 0; $i < $zip->numFiles; $i++) {
        $doc = new DOMDocument(); check($doc->loadXML($zip->getFromIndex($i)), 'Valid workbook XML');
    }
    $doc->loadXML($zip->getFromName('xl/worksheets/sheet1.xml'));
    $xp = new DOMXPath($doc); $xp->registerNamespace('s', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
    check($xp->query('//s:row')->length === 8, 'All sanctions exported');
    check($xp->evaluate('string(//s:c[@r="C7"]/s:is/s:t)') === $row['nib'], 'Long NIB preserved as text');
    check($xp->query('//s:f')->length === 0 && $xp->evaluate('string(//s:c[@r="G8"]/s:is/s:t)') === '=SUM(1,2)', 'Formula-like sanction stays text');
} finally { $zip->close(); unlink($path); }
function form_open($action, $attrs = array()) { return '<form>'; }
function form_close() { return '</form>'; }
extract($c->template->data);
ob_start(); include FCPATH . 'application/views/survailen_insidental/sanksi_administratif.php'; $html = ob_get_clean();
check(strpos($html, '&lt;uji&gt;') !== false && strpos($html, '<uji>') === false, 'Escape API values in list');
$c = sanksi_fixture($row); $c->sanksi->available = false; $c->sanksi_administratif();
check($c->template->data['schema_ready'] === false, 'Missing migration has usable page');
expect_status(function () use ($c) { $c->export_sanksi_administratif(); }, 503);
echo ($GLOBALS['checks'] - $before) . " sanctions checks passed; no API calls or project database access.\n";
