<?php
// Offline: no SMTP, HTTP, or project database.
require __DIR__ . '/surat_pembekuan_test.php';
require FCPATH . 'application/libraries/Surat_pembekuan_token.php';
$before = $GLOBALS['checks'];
class PembekuanEmail extends FakeEmail {
    function clear($attachments = false) { $this->values = array(); }
    function send() {
        $this->calls++;
        if ($this->throws) throw new RuntimeException('SMTP secret must not leak');
        return $this->result;
    }
}
function email_letter_fixture() {
    $c = letter_fixture();
    $c->input->verb = 'post';
    $c->surat_pembekuan_token = new Surat_pembekuan_token();
    $c->email = new PembekuanEmail($c->survailen_insidental);
    return $c;
}
$lib = new Surat_pembekuan_token();
$c = email_letter_fixture(); $row = $c->sanksi->record;
$token = $lib->issue($row, 'test-secret', 1000);
check((bool) preg_match('/^[A-Za-z0-9_-]+$/D', $token), 'URL-safe token');
check($lib->verify($token, 'test-secret', 1000)['id'] === '48', 'Roundtrip');
check($lib->issue($row, 'test-secret', 1000) !== $token, 'Randomized encryption');
check($lib->verify($token, 'wrong-secret', 1000) === false, 'Wrong key rejected');
check($lib->verify($token, 'test-secret', 605799) !== false, 'Valid just before expiry');
check($lib->verify($token, 'test-secret', 605800) === false, 'Expired at seven days');
$modified = $token; $modified[40] = $modified[40] === 'A' ? 'B' : 'A';
check($lib->verify($modified, 'test-secret', 1000) === false, 'Modified ciphertext rejected');
foreach (array(null, array(), '', '118', '../48', str_repeat('A', 1025)) as $bad) {
    check($lib->verify($bad, 'test-secret') === false, 'Malformed token rejected');
}
rejected(function () use ($lib, $row) { $lib->issue($row, ''); });
$reordered = array_reverse($row, true); $reordered['id'] = '48';
check($lib->fingerprint($row) === $lib->fingerprint($reordered), 'Stable across SQL scalar types and ordering');
$c->input->data['to'] = 'other@example.test';
$c->email->values['cc'] = array('old@example.test');
$c->email->values['bcc'] = array('old@example.test');
$c->kirim_email_pembekuan('48');
check($c->output->status === 200 && $c->email->calls === 1, 'Successful send');
check($c->email->values['to'] === array('yagihagiyansyah99@gmail.com'), 'Fixed test recipient');
check(!isset($c->email->values['cc']) && !isset($c->email->values['bcc']), 'No inherited CC or BCC');
$html = $c->email->values['message'][0];
check(strpos($html, 'PT CONTOH KONSTRUKSI') !== false && strpos($html, 'Cetak Surat') !== false, 'BU notification and print button');
preg_match('~surat-email/([A-Za-z0-9_-]+)~', $html, $match);
check(isset($match[1]) && $lib->verify($match[1], $c->config->key) !== false, 'Email contains valid encrypted link');
$c->input->verb = 'get'; $c->ion_auth->logged = false; $c->ion_auth->admin = false;
$c->surat_pembekuan_email($match[1]);
check($c->output->body === '%PDF-test', 'Email link renders PDF without login');
foreach (array('nama_bu', 'nib', 'id_izin', 'kode_subklasifikasi', 'synced_at') as $field) {
    $c = email_letter_fixture(); $c->input->verb = 'get';
    $token = $lib->issue($c->surat_arsip->letter, $c->config->key);
    $c->sanksi->record[$field] = 'changed';
    $c->sanksi->available = false;
    $c->surat_pembekuan_email($token);
    check($c->output->body === '%PDF-test', 'Refresh does not invalidate archived letter');
}
foreach (array('auth' => 403, 'login' => 403, 'method' => 405, 'csrf' => 403,
    'id' => 400, 'schema' => 503, 'missing' => 404, 'key' => 502) as $case => $status) {
    $c = email_letter_fixture();
    if ($case === 'auth') $c->ion_auth->admin = false;
    if ($case === 'login') $c->ion_auth->logged = false;
    if ($case === 'method') $c->input->verb = 'get';
    if ($case === 'csrf') $c->input->data['_sanksi_nonce'] = 'bad';
    if ($case === 'schema') $c->sanksi->available = false;
    if ($case === 'missing') $c->sanksi->record = array();
    if ($case === 'key') $c->config->key = '';
    $c->kirim_email_pembekuan($case === 'id' ? '../48' : '48');
    check($c->output->status === $status && $c->email->calls === 0, 'Reject before SMTP: ' . $case);
}
foreach (array(false, true) as $throws) {
    $c = email_letter_fixture(); $c->email->result = false; $c->email->throws = $throws;
    $c->kirim_email_pembekuan('48');
    check($c->output->status === 502 && strpos($c->output->body, 'SMTP secret') === false, 'SMTP failure handled safely');
}
$c = email_letter_fixture(); $c->sanksi->record['nama_bu'] = '<script>alert(1)</script>';
$c->kirim_email_pembekuan('48');
check(strpos($c->email->values['message'][0], '<script>') === false, 'Escape API values in email');
$c = email_letter_fixture(); $c->input->verb = 'get';
expect_status(function () use ($c) { $c->surat_pembekuan_email('48'); }, 403);
check($c->pdfgenerator->html === null, 'Raw ID cannot grant public access');
echo ($GLOBALS['checks'] - $before) . " email/token checks passed; no real email sent.\n";
