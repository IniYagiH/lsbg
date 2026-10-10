<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Small, text-only XLSX report. Inline strings preserve identifiers and ensure
 * database values (including strings beginning with "=") never become formulas.
 */
class Sanksi_administratif_xlsx
{
    public function build(array $rows, $search, $syncedAt)
    {
        $sheetRows = array(
            array('Sanksi Administratif'),
            array('Waktu ekspor', date('Y-m-d H:i:s T')),
            array('Refresh terakhir', $syncedAt),
            array('Pencarian', $search),
            array('Sumber', 'API SIKI sanksi-list-sbu; satu baris per sanksi.'),
            array('No.', 'Nama Badan Usaha', 'NIB', 'ID Izin', 'Subklasifikasi', 'Kualifikasi', 'Keterangan'),
        );
        foreach ($rows as $index => $row) {
            $sheetRows[] = array($index + 1, $row['nama_bu'], $row['nib'], $row['id_izin'],
                $row['kode_subklasifikasi'], $row['id_kualifikasi'], $row['keterangan']);
        }
        $ns = 'http://schemas.openxmlformats.org/spreadsheetml/2006/main';
        $sheet = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<worksheet xmlns="' . $ns . '"><sheetViews><sheetView workbookViewId="0">'
            . '<pane ySplit="6" topLeftCell="A7" activePane="bottomLeft" state="frozen"/>'
            . '</sheetView></sheetViews><cols><col min="1" max="1" width="8" customWidth="1"/>'
            . '<col min="2" max="2" width="40" customWidth="1"/>'
            . '<col min="3" max="7" width="28" customWidth="1"/></cols><sheetData>';
        foreach ($sheetRows as $index => $values) {
            $number = $index + 1;
            $sheet .= '<row r="' . $number . '">';
            foreach ($values as $column => $value) {
                $sheet .= '<c r="' . chr(65 + $column) . $number . '" t="inlineStr"><is><t xml:space="preserve">'
                    . $this->xml($value) . '</t></is></c>';
            }
            $sheet .= '</row>';
        }
        $sheet .= '</sheetData><autoFilter ref="A6:G' . count($sheetRows) . '"/></worksheet>';
        $parts = array(
            '[Content_Types].xml' => '<?xml version="1.0" encoding="UTF-8"?>'
                . '<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">'
                . '<Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>'
                . '<Default Extension="xml" ContentType="application/xml"/>'
                . '<Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>'
                . '<Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>'
                . '</Types>',
            '_rels/.rels' => '<?xml version="1.0" encoding="UTF-8"?>'
                . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
                . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>'
                . '</Relationships>',
            'xl/workbook.xml' => '<?xml version="1.0" encoding="UTF-8"?>'
                . '<workbook xmlns="' . $ns . '" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">'
                . '<sheets><sheet name="Sanksi Administratif" sheetId="1" r:id="rId1"/></sheets></workbook>',
            'xl/_rels/workbook.xml.rels' => '<?xml version="1.0" encoding="UTF-8"?>'
                . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
                . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/>'
                . '</Relationships>',
            'xl/worksheets/sheet1.xml' => $sheet,
        );
        $path = tempnam(sys_get_temp_dir(), 'insidental_xlsx_');
        if ($path === false) {
            throw new RuntimeException('Tidak dapat membuat file Excel sementara.');
        }
        $zip = new ZipArchive();
        $opened = false;
        try {
            if ($zip->open($path, ZipArchive::OVERWRITE) !== true) {
                throw new RuntimeException('Tidak dapat membuka file Excel.');
            }
            $opened = true;
            foreach ($parts as $name => $xml) {
                if (!$zip->addFromString($name, $xml)) {
                    throw new RuntimeException('Tidak dapat menulis file Excel.');
                }
            }
            $closed = $zip->close();
            $opened = false;
            if (!$closed) {
                throw new RuntimeException('Tidak dapat menyelesaikan file Excel.');
            }
            $content = file_get_contents($path);
            if ($content === false) {
                throw new RuntimeException('Tidak dapat membaca file Excel.');
            }
            return $content;
        } finally {
            if ($opened) {
                $zip->close();
            }
            unlink($path);
        }
    }

    private function xml($value)
    {
        $value = preg_replace('/[^\x{9}\x{A}\x{D}\x{20}-\x{D7FF}\x{E000}-\x{FFFD}\x{10000}-\x{10FFFF}]/u', '', (string) $value);
        return htmlspecialchars($value, ENT_XML1 | ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}
