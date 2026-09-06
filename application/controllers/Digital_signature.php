<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Digital_signature extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('bu/Bu_model');
		$this->load->helper(array('url','html','file','form','security'));
		$this->load->library(array('ion_auth','form_validation','Template'));
		$this->load->model('User_model');
		$this->load->helper('Ssl');
	}
  function validasi($id1,$id2){
	$nib=decrypt_url($id1);
	$tgl_permohonan=decrypt_url($id2);
	$record=$this->Bu_model->klasifikasi_kualifikasi_biaya_sertifikasi_2($nib,$tgl_permohonan);
	$tanggal = $record[0]['status_1'];
    $hari   = date('l', microtime($tanggal));
    $this->load->library('pdfgenerator');
    $hari_indonesia = array('Monday'  => 'Senin',
     'Tuesday'  => 'Selasa',
     'Wednesday' => 'Rabu',
     'Thursday' => 'Kamis',
     'Friday' => 'Jumat',
     'Saturday' => 'Sabtu',
     'Sunday' => 'Minggu');
     $tanggal_angka= date("d",strtotime($tanggal));
     $bulan= date("m",strtotime($tanggal));
     $tahun= date("Y",strtotime($tanggal));
     $bulan_romawi=$this->getBulanrw($bulan);
     $panjang=strlen($record[0]['no_urut']);
     $jumlah=5-$panjang;
     $nol='';
     for($i=0;$i<$jumlah;$i++){
       $nol=$nol.'0';
     }
	 $rec=$this->Bu_model->biodata_opr($nib);
     $nomor_urut=$nol.$record[0]['no_urut'].'/Perjanjian/'.$bulan_romawi.'/'.$tahun;
    $this->data = array(
		'tgl_angka'=>$tanggal_angka,
		'tahun'=>$tahun,
      'bulan'=>$this->getBulan($bulan),
      'hari'=>$hari_indonesia[$hari],
      'biodata'=>$rec,
      'klasifikasi'=>$record,
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'no_urut'=>$nomor_urut,
      'tanggal_angka'=>$tanggal_angka
    );
    $this->load->view('digital_signature',$this->data);
  }
  function validasi_esign(){
	$this->data = array(
		'tgl_angka'=>'',
	
    );
    $this->load->view('digital_signature_2',$this->data);
  }

  function getBulan($bln){
	switch ($bln){
	  case 1:
		return "Januari";
		break;
	  case 2:
		return "Februari";
		break;
	  case 3:
		return "Maret";
		break;
	  case 4:
		return "April";
		break;
	  case 5:
		return "Mei";
		break;
	  case 6:
		return "Juni";
		break;
	  case 7:
		return "Juli";
		break;
	  case 8:
		return "Agustus";
		break;
	  case 9:
		return "September";
		break;
	  case 10:
		return "Oktober";
		break;
	  case 11:
		return "November";
		break;
	  case 12:
		return "Desember";
		break;
	}
  }
function getBulanrw($blnrw){
	  switch ($blnrw){
		case 1:
		  return "I";
		  break;

		case 2:
		  return "II";
		  break;

		case 3:
		  return "III";
		  break;

		case 4:
		  return "IV";
		  break;
		case 5:
		  return "V";
		  break;

		case 6:
		  return "VI";
		  break;

		case 7:
		  return "VII";
		  break;

		case 8:
		  return "VIII";
		  break;

		case 9:
		  return "IX";
		  break;

		case 10:
		  return "X";
		  break;

		case 11:
		  return "XI";
		  break;

		case 12:
		  return "XII";
		  break;

	  }

	}

}
