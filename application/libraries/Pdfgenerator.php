<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once("./vendor/dompdf/dompdf/src/Autoloader.php");
use Dompdf\Dompdf;
class Pdfgenerator {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
  public function save($html, $filename='', $paper = 'A4', $orientation = "portrait")
    {

    // $dompdf = new DOMPDF();
    // $dompdf->load_html($html);
    // $dompdf->setPaper($paper, $orientation);
    // $dompdf->render();
    // $output = $dompdf->output();
    // file_put_contents($_SERVER['DOCUMENT_ROOT'].'/assets/bukti/surat_tugas/ss.pdf', $output);


    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    $output = $dompdf->output();
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/assets/bukti/surat_tugas/'.$filename.'.pdf', $output);
    }


}
