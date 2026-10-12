<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_pembekuan_token
{
    const TTL = 604800;

    public function fingerprint(array $row)
    {
        ksort($row);
        return hash('sha256', json_encode(array_map('strval', $row)));
    }

    private function key($secret)
    {
        if (!is_string($secret) || $secret === '') {
            throw new RuntimeException('Kunci tautan surat belum tersedia.');
        }
        return hash_hmac('sha256', 'surat-pembekuan-email-archive-v2', $secret, true);
    }

    public function issue(array $row, $secret, $now = null)
    {
        $now = $now === null ? time() : $now;
        $iv = random_bytes(12);
        $payload = json_encode(array('id' => (string) $row['id'],
            'version' => $this->fingerprint($row), 'expires' => $now + self::TTL));
        $tag = '';
        $ciphertext = openssl_encrypt($payload, 'aes-256-gcm', $this->key($secret),
            OPENSSL_RAW_DATA, $iv, $tag, 'surat-pembekuan-archive-v2', 16);
        if ($ciphertext === false) {
            throw new RuntimeException('Tidak dapat membuat tautan surat.');
        }
        return rtrim(strtr(base64_encode($iv . $tag . $ciphertext), '+/', '-_'), '=');
    }

    public function verify($token, $secret, $now = null)
    {
        $now = $now === null ? time() : $now;
        if (!is_string($token) || strlen($token) > 1024 || !preg_match('/^[A-Za-z0-9_-]+$/D', $token)) {
            return false;
        }
        $raw = base64_decode(strtr($token, '-_', '+/'), true);
        if ($raw === false || strlen($raw) <= 28) return false;
        $plain = openssl_decrypt(substr($raw, 28), 'aes-256-gcm', $this->key($secret),
            OPENSSL_RAW_DATA, substr($raw, 0, 12), substr($raw, 12, 16), 'surat-pembekuan-archive-v2');
        if ($plain === false) return false;
        $data = json_decode($plain, true);
        if (!is_array($data) || !isset($data['id'], $data['version'], $data['expires'])
            || !is_string($data['id']) || !ctype_digit($data['id']) || (int) $data['id'] < 1
            || !is_string($data['version']) || !preg_match('/^[a-f0-9]{64}$/D', $data['version'])
            || !is_int($data['expires']) || $data['expires'] <= $now
            || $data['expires'] > $now + self::TTL) return false;
        return $data;
    }
}
