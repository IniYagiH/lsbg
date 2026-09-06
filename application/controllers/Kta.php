<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kta extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('bu/Bu_model');
    $this->load->model('tk/Tenaga_kerja_model');
    $this->load->helper(array('url','html','file','form','security'));
    $this->load->library(array('form_validation','Template'));
    $this->load->helper('Ssl');
  }

  function cetak_kta(){

    //$this->create_qr();
    $this->data=array(
      'propinsi'=>$this->Bu_model->provinsi()
    );
    $this->load->library('pdfgenerator');
     $html = $this->load->view('kta/cetak_kta', $this->data, true);
     $filename = 'report_'.time();
     //$this->load->view('report/surat_perjanjian', $this->data);
     $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

  }

  function create_qr(){
    $this->load->library('ciqrcode');
    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/sertifikat/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/sertifikat/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/sertifikat/qrcodex/1/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
    $image_name=encrypt_url('1').'.jpg';
    $params['data'] = base_url('Digital_signature/validasi/1/'); //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params);

    $qr1=$image_name;
    //2
    $this->load->library('ciqrcode');
    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/sertifikat/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/sertifikat/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/sertifikat/qrcodex/2/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
    $image_name2=encrypt_url('2').'.jpg';
    $params['data'] = base_url('Digital_signature/validasi/2/'); //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name2; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params);

    $qr2=$image_name2;
    //3

    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/sertifikat/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/sertifikat/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/sertifikat/qrcodex/3/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
    $image_name3=encrypt_url('3').'.jpg';
    $params['data'] = base_url('Digital_signature/validasi/3/'); //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name3; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params);

    $qr3=$image_name3;
    //4

    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/sertifikat/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/sertifikat/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/sertifikat/qrcodex/4/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
    $image_name4=encrypt_url('4').'.jpg';
    $params['data'] = base_url('Digital_signature/validasi/4/'); //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name4; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params);

    $qr4=$image_name4;
    //

    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/sertifikat/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/sertifikat/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/sertifikat/qrcodex/5/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
    $image_name5=encrypt_url('5').'.jpg';
    $params['data'] = base_url('Digital_signature/validasi/5/'); //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name5; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params);

    $qr5=$image_name5;
    //6

    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/sertifikat/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/sertifikat/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/sertifikat/qrcodex/6/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
    $image_name6=encrypt_url('6').'.jpg';
    $params['data'] = base_url('Digital_signature/validasi/1/'); //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name6; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params);

    $qr6=$image_name6;




    $data=array(
      'id'=>'1',
      'qr_1'=>$qr1,
      'qr_2'=>$qr2,
      'qr_3'=>$qr3,
      'qr_4'=>$qr4,
      'qr_5'=>$qr5,
      'qr_6'=>$qr6
    );
    $tabel="qr_kta";
    $this->Bu_model->insert_sad($tabel,$data);

  }

}
