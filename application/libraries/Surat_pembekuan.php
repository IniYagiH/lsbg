<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_pembekuan
{
    public function defaults($id, DateTimeImmutable $now = null)
    {
        $zone = new DateTimeZone('Asia/Jakarta');
        $now = $now ? $now->setTimezone($zone) : new DateTimeImmutable('now', $zone);
        $roman = array(1 => 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        // Identifies the snapshot row; this is not a persisted outgoing-letter sequence.
        $number = str_pad((string) $id, 3, '0', STR_PAD_LEFT);
        $suffix = '/LSBU-GI/' . $roman[(int) $now->format('n')] . '/' . $now->format('Y');
        return array(
            'nomor_surat' => $number . '/REK-PB' . $suffix,
            'tanggal_surat' => $now->format('Y-m-d'),
            'kota_surat' => 'Jakarta', 'lampiran' => '-', 'tujuan' => 'Jakarta',
            'nomor_sp2' => $number . '/SP-II' . $suffix,
            'tanggal_sp2' => $now->format('Y-m-d'),
            'nomor_prosedur' => '', 'penandatangan' => '', 'alamat_pengirim' => '',
        );
    }

    public function formatted(array $values)
    {
        $months = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        foreach (array('tanggal_surat', 'tanggal_sp2') as $key) {
            $date = DateTime::createFromFormat('!Y-m-d', $values[$key]);
            $values[$key] = $date->format('j') . ' ' . $months[(int) $date->format('n')] . ' ' . $date->format('Y');
        }
        return $values;
    }
}
