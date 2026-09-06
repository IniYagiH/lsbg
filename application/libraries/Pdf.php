<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/setasign/fpdf/fpdf.php");
require_once("./vendor/setasign/fpdi/src/Fpdi.php");
require_once("./vendor/pdfwatermarker/pdfwatermarker.php");
require_once("./vendor/pdfwatermarker/pdfwatermark.php");


class Pdf {

  public function generate($alamat,$filename)
  {


$watermark = new PDFWatermark($_SERVER["DOCUMENT_ROOT"].'/sertifikasi/assets/images/Watermark.png');

$watermark->setPosition('topright');

$watermark->setAsOverlay();

$watermarker = new PDFWatermarker($alamat.$filename, $alamat.$filename,$watermark);

//Set page range. Use 1-based index.
$watermarker->setPageRange(1,5);

//Save the new PDF to its specified location
$watermarker->savePdf();

  }
}
