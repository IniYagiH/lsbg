<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

// The installed mPDF includes its closing object delimiter in unserialize(),
// which raises an "Extra data" warning on PHP 8.3. Strip only that delimiter.
class Survailen_insidental_mpdf extends \Mpdf\Mpdf
{
    public function _getObjAttr($text)
    {
        $parts = explode("\xbb\xa4\xac", $text);
        return parent::_getObjAttr("\xbb\xa4\xac" . $parts[1]);
    }
}

class Survailen_insidental_pdf
{
    public function generate($html, $filename = '', $stream = true, $paper = 'A4', $orientation = 'landscape')
    {
        $pdf = new Survailen_insidental_mpdf(array(
            'format' => $paper,
            'orientation' => $orientation === 'landscape' ? 'L' : 'P',
            'tempDir' => FCPATH . 'application/cache/mpdf-insidental',
        ));
        $pdf->WriteHTML($html);

        if ($stream) {
            $pdf->Output($filename . '.pdf', 'I');
            return;
        }

        return $pdf->Output('', 'S');
    }
}
