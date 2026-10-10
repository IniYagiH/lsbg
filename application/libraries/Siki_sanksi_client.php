<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siki_sanksi_client
{
    const ENDPOINT = 'https://siki.pu.go.id/siki-api/v1/sanksi-list-sbu';

    public function fetch_all($token)
    {
        if (!is_string($token) || trim($token) === '' || preg_match('/[\r\n]/', $token)) {
            throw new RuntimeException('Token API SIKI belum tersedia atau tidak valid.');
        }
        $rows = array();
        $page = 1;
        $expectedTotal = null;
        $deadline = microtime(true) + 90;
        do {
            if ($page > 100 || microtime(true) >= $deadline) {
                throw new RuntimeException('Batas waktu atau jumlah halaman API tercapai. Snapshot lama dipertahankan.');
            }
            $body = $this->request($token, $page, max(1, min(20, (int) ($deadline - microtime(true)))));
            $result = $this->parse_page($body, $page);
            if ($result['total'] !== null) {
                if ($expectedTotal !== null && $expectedTotal !== $result['total']) {
                    throw new RuntimeException('Jumlah data API berubah selama pengambilan. Silakan refresh ulang.');
                }
                $expectedTotal = $result['total'];
            }
            $rows = array_merge($rows, $result['rows']);
            if (count($rows) > 50000) {
                throw new RuntimeException('Jumlah data API melebihi batas sinkronisasi.');
            }
            $page = $result['next'];
        } while ($page !== null);
        if ($expectedTotal !== null && count($rows) !== $expectedTotal) {
            throw new RuntimeException('Data API belum lengkap. Snapshot lama dipertahankan.');
        }
        return $rows;
    }

    protected function request($token, $page, $timeout)
    {
        $curl = curl_init(self::ENDPOINT . ($page === 1 ? '' : '?page=' . $page));
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array('Content-type: application/json', 'Accept: application/json', 'token: ' . $token),
            CURLOPT_CONNECTTIMEOUT => min(10, $timeout),
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
        ));
        // Bound response memory without logging the token or remote response.
        $body = '';
        curl_setopt($curl, CURLOPT_WRITEFUNCTION, function ($handle, $chunk) use (&$body) {
            if (strlen($body) + strlen($chunk) > 20 * 1024 * 1024) {
                return 0;
            }
            $body .= $chunk;
            return strlen($chunk);
        });
        $ok = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($ok === false || $status !== 200) {
            throw new RuntimeException('Pengambilan API SIKI gagal (HTTP ' . (int) $status . '). Coba kembali.');
        }
        return $body;
    }

    public function parse_page($body, $page)
    {
        $payload = json_decode($body, true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($payload)) {
            throw new RuntimeException('Respons API bukan JSON yang valid.');
        }
        if (isset($payload['error']) || (isset($payload['success']) && $payload['success'] !== true)
            || (isset($payload['status']) && !in_array(strtolower((string) $payload['status']), array('200', 'success', 'ok', 'true', '1'), true))) {
            throw new RuntimeException('API melaporkan kegagalan. Snapshot lama dipertahankan.');
        }
        // Accept a top-level JSON list, {data: [...]}, or Laravel {data: {data: [...], ...}}.
        $container = $payload;
        if (isset($payload['data']) && is_array($payload['data']) && isset($payload['data']['data'])) {
            $container = $payload['data'];
        }
        $data = array_key_exists('data', $container) ? $container['data'] : $container;
        // JSON objects (including {}) must never be mistaken for an empty list.
        $raw = json_decode($body);
        $rawData = is_object($raw) && property_exists($raw, 'data') ? $raw->data : $raw;
        if (is_object($rawData) && property_exists($rawData, 'data')) {
            $rawData = $rawData->data;
        }
        if (!is_array($rawData) || !is_array($data) || array_values($data) !== $data) {
            throw new RuntimeException('Format daftar API tidak dikenali.');
        }
        $rows = array();
        $limits = array('id_izin' => 100, 'nib' => 30, 'nama_bu' => 255,
            'kode_subklasifikasi' => 30, 'id_kualifikasi' => 30, 'keterangan' => 16000);
        foreach ($data as $item) {
            $row = array();
            foreach ($limits as $field => $limit) {
                if (!is_array($item) || !isset($item[$field]) || !is_string($item[$field])
                    || trim($item[$field]) === '' || mb_strlen($item[$field], 'UTF-8') > $limit) {
                    throw new RuntimeException('Data API tidak valid pada kolom ' . $field . '. Snapshot lama dipertahankan.');
                }
                $row[$field] = $item[$field];
            }
            $rows[] = $row; // Deliberately preserve repeated permits and repeated entries.
        }
        $meta = isset($container['meta']) && is_array($container['meta']) ? $container['meta'] : $container;
        if (isset($container['pagination'])) {
            if (!is_array($container['pagination'])) {
                throw new RuntimeException('Format pagination tidak dikenali.');
            }
            $meta = $container['pagination'];
        }
        $next = null;
        $total = isset($meta['total']) ? $this->integer($meta['total'], 0) : null;
        if (isset($meta['current_page']) && $this->integer($meta['current_page'], 1) !== $page) {
            throw new RuntimeException('Urutan halaman API tidak sesuai.');
        }
        if (isset($meta['last_page'])) {
            $last = $this->integer($meta['last_page'], 1);
            if ($page > $last) {
                throw new RuntimeException('Pagination API tidak valid.');
            }
            $next = $page < $last ? $page + 1 : null;
        } else {
            $link = isset($container['next_page_url']) ? $container['next_page_url']
                : (isset($container['links']['next']) ? $container['links']['next'] : null);
            if ($link !== null && $link !== '') {
                $url = is_string($link) ? parse_url($link) : false;
                $query = array();
                if ($url && isset($url['query'])) {
                    parse_str($url['query'], $query);
                }
                if (!$url || !isset($query['page']) || $this->integer($query['page'], 1) !== $page + 1
                    || (isset($url['host']) && $url['host'] !== 'siki.pu.go.id')
                    || (isset($url['path']) && $url['path'] !== '/siki-api/v1/sanksi-list-sbu')) {
                    throw new RuntimeException('Tautan pagination API tidak dikenali.');
                }
                $next = $page + 1;
            } elseif (isset($container['pagination']) && !isset($meta['last_page'])) {
                throw new RuntimeException('Format pagination API belum didukung.');
            }
        }
        if ((isset($meta['current_page']) || isset($meta['per_page'])) && !isset($meta['last_page'])
            && $total === null && !array_key_exists('next_page_url', $container)
            && !(isset($container['links']) && array_key_exists('next', $container['links']))) {
            throw new RuntimeException('Kelengkapan pagination API tidak dapat dipastikan.');
        }
        if ($next !== null && count($rows) === 0) {
            throw new RuntimeException('Halaman API kosong sebelum pengambilan selesai.');
        }
        return array('rows' => $rows, 'next' => $next, 'total' => $total);
    }

    private function integer($value, $min)
    {
        if ((!is_int($value) && !is_string($value)) || !ctype_digit((string) $value) || (int) $value < $min) {
            throw new RuntimeException('Metadata pagination API tidak valid.');
        }
        return (int) $value;
    }
}
