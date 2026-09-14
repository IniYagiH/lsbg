<?php
// Run: php tests/survailen_insidental_notification_test.php
// No application bootstrap, project database, SMTP, or HTTP requests.
error_reporting(E_ALL);
define('BASEPATH', __DIR__ . '/../system/');
define('FCPATH', dirname(__DIR__) . '/');
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});
$GLOBALS['checks'] = 0;
function check($condition, $message) {
    if (!$condition) { throw new RuntimeException($message); }
    $GLOBALS['checks']++;
}
function html_escape($value) { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
function base_url($path = '') { return 'https://example.test/' . $path; }
function decrypt_url($token) {
    return $token === 'token-nib-a' ? '1234567890' : ($token === 'token-nib-b' ? '9876543210' : false);
}
function show_404() { throw new RuntimeException('404'); }
function show_error($text, $status) { throw new RuntimeException((string) $status); }
function redirect($url, $method) { $GLOBALS['redirect'] = $url; }
function log_message($level, $message) { $GLOBALS['logs'][] = $message; }
#[AllowDynamicProperties]
class CI_Controller {}
class CI_Model {}
require FCPATH . 'application/controllers/Survailen_insidental.php';
require FCPATH . 'application/models/Survailen_insidental_model.php';

class FakeInput {
    public $verb = 'post';
    public $query = array();
    public $data = array('id1' => 'token-nib-a', 'assessment_version' => 'current',
        'tgl_pelaksanaan' => '2026-09-14', 'tempat_pelaksanaan' => 'Jakarta',
        'ketidaksesuaian' => 'Periksa alat', 'jenis_temuan' => '0', 'hasil_akhir' => '0');
    function method() { return $this->verb; }
    function post($key) { return isset($this->data[$key]) ? $this->data[$key] : ''; }
    function get($key) { return isset($this->query[$key]) ? $this->query[$key] : null; }
}
class FakeAuth {
    public $logged = true;
    public $admin = true;
    function ceklogin() { return $this->logged; }
    function admin_pusat() { return $this->admin; }
    function pelaksana() { return false; }
}
class FakeSession {
    public $data = array('id_user' => 'assessor-test', 'level' => '3');
    public $flash = array();
    function userdata($key) { return $this->data[$key]; }
    function set_flashdata($key, $value) { $this->flash[$key] = $value; }
}
class FakeSecurity { function xss_clean($value) { return $value; } }
class FakeConfig {
    public $key = 'isolated-test-key';
    function item($name) { return $name === 'encryption_key' ? $this->key : null; }
}
class FakeBu {
    public $rows = array(array('nama' => 'Badan Usaha <uji>', 'email' => 'applicant@example.test'));
    function biodata_opr($nib) { return $this->rows; }
}
class FakeModel {
    public $result = 'saved';
    public $assigned = true;
    public $saved = false;
    public $calls = 0;
    public $reads = 0;
    public $assignedUser;
    public $assessment = array(array('updated_at' => '2026-09-14 10:20:30',
        'ketidaksesuaian' => '<script>alert(1)</script>' . "\n" . 'Baris kedua',
        'jenis_temuan' => 0, 'hasil_akhir' => 0, 'hasil_tindak_lanjut' => 0));
    public $records;
    function __construct() {
        $this->records = array(
            (object) array('id' => 2, 'id_izin' => 'IZIN-2', 'nama_bu' => 'Nama fallback'),
            (object) array('id' => 1, 'id_izin' => 'IZIN-1', 'nama_bu' => 'Nama fallback'),
            (object) array('id' => 1, 'id_izin' => 'IZIN-2', 'nama_bu' => 'Nama fallback'));
    }
    function has_active_assignment($nib, $user) { return $this->assigned; }
    function get_by_nib($nib) { $this->reads++; return $this->records; }
    function get_assessment_by_nib($nib) { $this->reads++; return $this->assessment; }
    function get_active_appointments($nib) {
        return array(array('urutan_asesor' => 1, 'Nama' => 'Asesor <satu>', 'id_asesor' => 'assessor-test'));
    }
    function save_assessment($nib, $data, $version, $assignedUser) {
        $this->calls++;
        $this->assignedUser = $assignedUser;
        $this->saved = $this->result === 'saved';
        return $this->result;
    }
}
class FakeEmail {
    public $calls = 0;
    public $result = true;
    public $throws = false;
    public $values = array();
    public $model;
    function __construct($model) { $this->model = $model; }
    function __call($name, $args) { $this->values[$name] = $args; }
    function send() {
        check($this->model->saved, 'Email must follow a successful save');
        $this->calls++;
        if ($this->throws) { throw new RuntimeException('Simulated SMTP failure'); }
        return $this->result;
    }
}
class FakePdf {
    public $calls = 0;
    public $args;
    function generate(...$args) { $this->calls++; $this->args = $args; }
}
class FakeLoader {
    public $views = array();
    function config($name) { check($name === 'email', 'Use existing email configuration'); }
    function library($name) {}
    function view($name, $data, $return) {
        $this->views[$name] = $data;
        extract($data);
        ob_start();
        include FCPATH . 'application/views/' . $name . '.php';
        return ob_get_clean();
    }
}
function fixture() {
    $reflection = new ReflectionClass('Survailen_insidental');
    $controller = $reflection->newInstanceWithoutConstructor();
    $controller->input = new FakeInput();
    $controller->ion_auth = new FakeAuth();
    $controller->session = new FakeSession();
    $controller->security = new FakeSecurity();
    $controller->config = new FakeConfig();
    $controller->Bu_model = new FakeBu();
    $controller->survailen_insidental = new FakeModel();
    $controller->email = new FakeEmail($controller->survailen_insidental);
    $controller->pdfgenerator = new FakePdf();
    $controller->load = new FakeLoader();
    return $controller;
}
function expect_status($callback, $status) {
    try { $callback(); } catch (RuntimeException $e) {
        check($e->getMessage() === (string) $status, 'Expected status ' . $status);
        return;
    }
    throw new RuntimeException('Expected request rejection');
}
function signed_document($c, $token = 'token-nib-a') {
    $c->input->query['signature'] = hash_hmac('sha256',
        'survailen-insidental/dokumen-survailen/' . $token, $c->config->key);
}
foreach (array('simpan_penilaian', 'simpan_penilaian_verifikator') as $action) {
    $c = fixture();
    $c->$action();
    $c->$action();
    check($c->email->calls === 2, $action . ' must send on every unchanged submit');
    check($c->session->flash['class'] === 'success', 'Successful notification');
    check($c->survailen_insidental->assignedUser ===
        ($action === 'simpan_penilaian_verifikator' ? 'assessor-test' : null), 'Preserve assignment enforcement');
    check($c->email->values['to'][0] === 'applicant@example.test', 'Recipient from biodata');
    check($c->email->values['from'] === array('info@lsbugapeknas.com', 'LSBU GAPEKNAS'), 'Regular sender');
    check($c->email->values['cc'][0] === 'mail.lsbugapeknas@gmail.com, ccgapeknas@gmail.com', 'Regular CC');
    check($c->email->values['set_mailtype'][0] === 'html', 'HTML mail');
    $html = $c->email->values['message'][0];
    check(strpos($html, 'Penilaian Survailen Insidental Badan Usaha') !== false, 'Insidental email heading');
    check(strpos($html, 'survailen/dokumen_survailen/') === false, 'No regular document link');
    preg_match('~href="(https://example\.test/survailen-insidental/dokumen-survailen/[^"]+)"~', $html, $matches);
    check(isset($matches[1]), 'Email has insidental document link');
    $url = parse_url(html_entity_decode($matches[1]));
    parse_str($url['query'], $query);
    $c->input->query = $query;
    $c->ion_auth->logged = false;
    $c->dokumen_survailen(basename($url['path']));
    check($c->pdfgenerator->calls === 1, 'Emailed link works without login');
    check(array_slice($c->pdfgenerator->args, 2) === array(true, 'A4', 'landscape'), 'PDF inline A4 landscape');
}
foreach (array('conflict', 'error', 'forbidden') as $result) {
    $c = fixture();
    $c->survailen_insidental->result = $result;
    $c->simpan_penilaian_verifikator();
    check($c->email->calls === 0, 'No email for ' . $result);
}
foreach (array('failure', 'exception', 'invalid-email', 'missing-biodata', 'missing-key') as $failure) {
    $c = fixture();
    if ($failure === 'failure') { $c->email->result = false; }
    if ($failure === 'exception') { $c->email->throws = true; }
    if ($failure === 'invalid-email') { $c->Bu_model->rows[0]['email'] = "a@example.test\r\nBcc: x@example.test"; }
    if ($failure === 'missing-biodata') { $c->Bu_model->rows = array(); }
    if ($failure === 'missing-key') { $c->config->key = ''; }
    $c->simpan_penilaian();
    check($c->survailen_insidental->saved, 'Assessment retained on ' . $failure);
    check($c->session->flash['class'] === 'warning', 'Visible mail warning on ' . $failure);
}
$c = fixture();
$c->input->verb = 'get';
expect_status(function () use ($c) { $c->simpan_penilaian(); }, 405);
check($c->survailen_insidental->calls === 0 && $c->email->calls === 0, 'GET cannot save/send');
$c = fixture();
$c->survailen_insidental->assigned = false;
$c->simpan_penilaian_verifikator();
check($c->survailen_insidental->calls === 0 && $c->email->calls === 0, 'Unassigned user cannot save/send');
$c = fixture();
$c->ion_auth->logged = false;
$c->simpan_penilaian_verifikator();
check($c->email->calls === 0, 'Unauthenticated submit cannot send');
foreach (array(null, '', 'tampered', array('invalid')) as $signature) {
    $c = fixture();
    $c->input->query['signature'] = $signature;
    expect_status(function () use ($c) { $c->dokumen_survailen('token-nib-a'); }, 404);
    check($c->survailen_insidental->reads === 0, 'Reject invalid signature before DB reads');
}
$c = fixture();
signed_document($c);
expect_status(function () use ($c) { $c->dokumen_survailen('token-nib-b'); }, 404);
$c = fixture();
signed_document($c, 'invalid-token');
expect_status(function () use ($c) { $c->dokumen_survailen('invalid-token'); }, 404);
foreach (array('records', 'assessment') as $missing) {
    $c = fixture();
    signed_document($c);
    $c->survailen_insidental->$missing = array();
    expect_status(function () use ($c) { $c->dokumen_survailen('token-nib-a'); }, 404);
}
$c = fixture();
signed_document($c);
$c->dokumen_survailen('token-nib-a');
$html = $c->pdfgenerator->args[0];
foreach (array('Tidak Sesuai', 'Perlu Perbaikan', 'Tidak Memenuhi', '14 September 2026',
    'IZIN-2, IZIN-1', 'Asesor &lt;satu&gt;', 'Badan Usaha &lt;uji&gt;',
    '&lt;script&gt;alert(1)&lt;/script&gt;', 'data:image/png;base64,') as $expected) {
    check(strpos($html, $expected) !== false, 'PDF contains ' . $expected);
}
check(strpos($html, '<script>') === false, 'PDF escapes assessment content');
$c->survailen_insidental->assessment[0]['ketidaksesuaian'] = 'Penilaian terbaru';
$c->Bu_model->rows = array();
$c->dokumen_survailen('token-nib-a');
check(strpos($c->pdfgenerator->args[0], 'Penilaian terbaru') !== false, 'Old email displays latest assessment');
check(strpos($c->pdfgenerator->args[0], 'Nama fallback') !== false, 'Missing biodata falls back to accidental name');

// Exercise the actual model commit outcome with an in-memory DB double.
class FakeDb {
    public $commit = true;
    public $rollbacks = 0;
    function trans_begin() {}
    function query($sql, $bindings) { return $this; }
    function num_rows() { return 1; }
    function where($field, $value) { return $this; }
    function limit($limit) { return $this; }
    function get($table) {
        check($table === 'lsbu_survailen_penilaian_insidental', 'Read insidental assessment table');
        return $this;
    }
    function result_array() { return array(); }
    function insert($table, $data) {
        check($table === 'lsbu_survailen_penilaian_insidental', 'Write insidental assessment table');
        return true;
    }
    function trans_status() { return true; }
    function trans_commit() { return $this->commit; }
    function trans_rollback() { $this->rollbacks++; }
}
class TestAssessmentModel extends Survailen_insidental_model { public $db; }
$model = new TestAssessmentModel();
$model->db = new FakeDb();
$version = $model->assessment_version(array());
check($model->save_assessment('123', array(), $version) === 'saved', 'Successful commit reports saved');
$model->db->commit = false;
check($model->save_assessment('123', array(), $version) === 'error', 'Failed commit must not trigger email');
require FCPATH . 'application/config/routes.php';
check($route['survailen-insidental/dokumen-survailen/(:any)'] ===
    'survailen_insidental/dokumen_survailen/$1', 'Dedicated document route');
echo 'PASS: ' . $GLOBALS['checks'] . " checks; no SMTP, HTTP, or project database.\n";

// Optional integration check using the installed renderer and local images only.
if (in_array('--render-pdf', $argv, true)) {
    require_once FCPATH . 'vendor/autoload.php';
    require FCPATH . 'application/libraries/Pdfgenerator.php';
    $generator = new Pdfgenerator();
    $bytes = $generator->generate($html, 'insidental-test', false, 'A4', 'landscape');
    check(substr($bytes, 0, 5) === '%PDF-', 'Real renderer produces PDF');
    echo 'PASS: offline PDF rendered (' . strlen($bytes) . " bytes).\n";
}
