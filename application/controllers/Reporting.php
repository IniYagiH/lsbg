<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('bu/Bu_model');
    $this->load->helper(array('url','html','file','form','security'));
    $this->load->library(array('ion_auth','form_validation','Template','pagination'));
    $this->load->model('User_model');
    $this->load->library(array('Excel'));
    $this->load->helper('Ssl');
  }
    function coba(){
      $record=$this->Bu_model->get_permohonan_excel('2021-12-01','2022-07-19','0','0','0');
      $data=array();
      foreach ($record as $row) {

        if($row['id_izin']=='I-202201311505003194402'){
          $x3=array(
            'DATA'=>"PERTAMA",
            'id_izin'=>$row['id_izin'],
            'nama_bujk'=>$row['nama_bujk'],
            'nama_propinsi'=>$row['nama_propinsi'],
            'email'=>$row['email'],
            'telepon'=>$row['telepon'],
            'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
            'kualifikasi'=>$row['kualifikasi'],
            'tgl_permohonan'=>$row['tgl_permohonan'],
            'file_perjanjian'=>$row['file_perjanjian'],
            'status_1'=>$row['status_1'],
            'tgl_biaya'=>$row['tgl_biaya'],
            'tgl_evaluator_tinjauan'=>$row['tgl_evaluator_tinjauan'],
            'tgl_surat_tugas'=>$row['tgl_surat_tugas'],
            'tgl_penilaian'=>$row['tgl_penilaian'],
            'tgl_evaluator_asesor'=>$row['tgl_evaluator_asesor'],
            'status_2'=>$row['status_2'],
            'verifikator'=>$row['verifikator'],
            'nama_asesor'=>$row['nama_asesor'],
          );
          array_push($data,$x3);
        }

      }

      echo count($data);



      $record2=$this->Bu_model->get_permohonan_excel_tolak('2021-12-01','2022-07-19','0','0','0');
      $data2=array();
      foreach ($record2 as $row2) {

        if($row2['id_izin']=='I-202201311505003194402'){

          $x3=array(
            'DATA'=>"KEDUA",
            'id_izin'=>$row2['id_izin'],
            'nama_bujk'=>$row2['nama_bujk'],
            'nama_propinsi'=>$row2['nama_propinsi'],
            'email'=>$row2['email'],
            'telepon'=>$row2['telepon'],
            'id_sub_klasifikasi'=>$row2['id_sub_klasifikasi'],
            'kualifikasi'=>$row2['kualifikasi'],
            'tgl_permohonan'=>$row2['tgl_permohonan'],
            'file_perjanjian'=>$row2['file_perjanjian'],
            'status_1'=>$row2['status_1'],
            'tgl_biaya'=>$row2['tgl_biaya'],
            'tgl_evaluator_tinjauan'=>$row2['tgl_evaluator_tinjauan'],
            'tgl_surat_tugas'=>$row2['tgl_surat_tugas'],
            'tgl_penilaian'=>$row2['tgl_penilaian'],
            'tgl_evaluator_asesor'=>$row2['tgl_evaluator_asesor'],
            'status_2'=>$row2['status_2'],
            'verifikator'=>$row2['verifikator'],
            'nama_asesor'=>$row2['nama_asesor'],
          );
          array_push($data2,$x3);
        }

      }

      echo '---'.count($data2);


      $record3=$this->Bu_model->get_permohonan_excel_tolak_hapus('2021-12-01','2022-07-19','0','0','0');
      $data3=array();
      foreach ($record3 as $row3) {

        if($row3['id_izin']=='I-202201311505003194402'){
          $x3=array(
            'DATA'=>"KETIGA",
            'id_izin'=>$row3['id_izin'],
            'nama_bujk'=>$row3['nama_bujk'],
            'nama_propinsi'=>$row3['nama_propinsi'],
            'email'=>$row3['email'],
            'telepon'=>$row3['telepon'],
            'id_sub_klasifikasi'=>$row3['id_sub_klasifikasi'],
            'kualifikasi'=>$row3['kualifikasi'],
            'tgl_permohonan'=>$row3['tgl_permohonan'],
            'file_perjanjian'=>$row3['file_perjanjian'],
            'status_1'=>$row3['status_1'],
            'tgl_biaya'=>$row3['tgl_biaya'],
            'tgl_evaluator_tinjauan'=>$row3['tgl_evaluator_tinjauan'],
            'tgl_surat_tugas'=>$row3['tgl_surat_tugas'],
            'tgl_penilaian'=>$row3['tgl_penilaian'],
            'tgl_evaluator_asesor'=>$row3['tgl_evaluator_asesor'],
            'status_2'=>$row3['status_2'],
            'verifikator'=>$row3['verifikator'],
            'nama_asesor'=>$row3['nama_asesor'],
          );
          array_push($data3,$x3);
        }
      }

      echo '---'.count($data3);

    }
  function excel_permohonan(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }else if($this->ion_auth->admin_pusat() OR $this->ion_auth->ko_administrasi() OR $this->ion_auth->ko_sertifikasi() OR $this->ion_auth->koordinator_keuangan())
    {
      $post = $this->input->post();
      $tgl_awal=$this->security->xss_clean(trim($post['tgl_awal']));
      $tgl_akhir=$this->security->xss_clean(trim($post['tgl_akhir']));
      $propinsi=$this->security->xss_clean(trim($post['propinsi']));
      $sub_klasifikasi=$this->security->xss_clean(trim($post['sub_klasifikasi']));
      $kualifikasi=$this->security->xss_clean(trim($post['kualifikasi']));
      $asosiasi=$this->security->xss_clean(trim($post['asosiasi']));
      //echo $propinsi.'-'.$sub_klasifikasi.'-'.$kualifikasi;
      $data=array();
      $record=$this->Bu_model->get_permohonan_excel($tgl_awal,$tgl_akhir,$propinsi,$sub_klasifikasi,$kualifikasi,$asosiasi);
      foreach($record as $row){

        $x=array(
          'id_izin'=>$row['id_izin'],
          'nama_bujk'=>$row['nama_bujk'],
          'nama_propinsi'=>$row['nama_propinsi'],
          'email'=>$row['email'],
          'telepon'=>$row['telepon'],
          'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
          'kualifikasi'=>$row['kualifikasi'],
          'tgl_permohonan'=>$row['tgl_permohonan'],
          'file_perjanjian'=>$row['file_perjanjian'],
          'status_1'=>$row['status_1'],
          'tgl_biaya'=>$row['tgl_biaya'],
          'tgl_evaluator_tinjauan'=>'',
          'tgl_surat_tugas'=>$row['tgl_surat_tugas'],
          'tgl_penilaian'=>$row['tgl_penilaian'],
          'tgl_evaluator_asesor'=>'',
          'status_2'=>$row['status_2'],
          'pemutus'=>$row['pemutus'],
          'verifikator'=>$row['verifikator'],
          'nama_asesor'=>$row['nama_asesor'],
          'evaluator_tinjauan'=>'',
        );
        array_push($data,$x);


      }
      // $record2=$this->Bu_model->get_permohonan_excel_tolak($tgl_awal,$tgl_akhir,$propinsi,$sub_klasifikasi,$kualifikasi);
      // foreach($record2 as $row2){
      //   if($row2['pemutus']=='1'){
      //     $pemutus2='0';
      //   }else{
      //     $pemutus2=$row2['pemutus'];
      //   }
      //   $x2=array(
      //     'id_izin'=>$row2['id_izin'],
      //     'nama_bujk'=>$row2['nama_bujk'],
      //     'nama_propinsi'=>$row2['nama_propinsi'],
      //     'email'=>$row2['email'],
      //     'telepon'=>$row2['telepon'],
      //     'id_sub_klasifikasi'=>$row2['id_sub_klasifikasi'],
      //     'kualifikasi'=>$row2['kualifikasi'],
      //     'tgl_permohonan'=>$row2['tgl_permohonan'],
      //     'file_perjanjian'=>$row2['file_perjanjian'],
      //     'status_1'=>$row2['status_1'],
      //     'tgl_biaya'=>$row2['tgl_biaya'],
      //     'tgl_evaluator_tinjauan'=>$row2['tgl_evaluator_tinjauan'],
      //     'tgl_surat_tugas'=>$row2['tgl_surat_tugas'],
      //     'tgl_penilaian'=>$row2['tgl_penilaian'],
      //     'tgl_evaluator_asesor'=>$row2['tgl_evaluator_asesor'],
      //     'status_2'=>$row2['status_2'],
      //     'pemutus'=>$pemutus2,
      //     'verifikator'=>$row2['verifikator'],
      //     'nama_asesor'=>$row2['nama_asesor'],
      //   );
      //   array_push($data,$x2);
      //
      //
      // }
      // $record3=$this->Bu_model->get_permohonan_excel_tolak_hapus($tgl_awal,$tgl_akhir,$propinsi,$sub_klasifikasi,$kualifikasi);
      // foreach($record3 as $row3){
      //   if($row3['pemutus']=='1'){
      //     $pemutus3='0';
      //   }else{
      //     $pemutus3=$row3['pemutus'];
      //   }
      //   $x3=array(
      //     'id_izin'=>$row3['id_izin'],
      //     'nama_bujk'=>$row3['nama_bujk'],
      //     'nama_propinsi'=>$row3['nama_propinsi'],
      //     'email'=>$row3['email'],
      //     'telepon'=>$row3['telepon'],
      //     'id_sub_klasifikasi'=>$row3['id_sub_klasifikasi'],
      //     'kualifikasi'=>$row3['kualifikasi'],
      //     'tgl_permohonan'=>$row3['tgl_permohonan'],
      //     'file_perjanjian'=>$row3['file_perjanjian'],
      //     'status_1'=>$row3['status_1'],
      //     'tgl_biaya'=>$row3['tgl_biaya'],
      //     'tgl_evaluator_tinjauan'=>$row3['tgl_evaluator_tinjauan'],
      //     'tgl_surat_tugas'=>$row3['tgl_surat_tugas'],
      //     'tgl_penilaian'=>$row3['tgl_penilaian'],
      //     'tgl_evaluator_asesor'=>$row3['tgl_evaluator_asesor'],
      //     'status_2'=>$row3['status_2'],
      //     'pemutus'=>$pemutus3,
      //     'verifikator'=>$row3['verifikator'],
      //     'nama_asesor'=>$row3['nama_asesor'],
      //     'evaluator_tinjauan'=>$row3['user_evaluator_tinjauan'],
      //   );
      //   array_push($data,$x3);
      //
      //
      // }
      $object = new PHPExcel();

       $object->setActiveSheetIndex(0);

       $table_columns = array(
         "Nama BU",
         "ID IZIN",
         "PROPINSI",
         "EMAIL",
         "TELEPON",
         "SUB KASLIFIKASI",
         "KUALIFIKASI",
         "TGL PERMOHONAN",
         "TGL MASUK TINJAUAN",
         "VERIFIKATOR",
         "TGL SELESAI TINJAUAN",

         "SPS & Invoice",
         "Verifikasi Pembayaran",
         "Konfirmasi Pembayaran",
         "Asesor",
         "Nama Asesor",
         "Tgl Selesai",

         "Tgl Selesai Pemutus",
         "Tgl Terbit",
         "DISETUJUI",
         "DITOLAK",
         );

       $column = 0;

       foreach($table_columns as $field){

         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

         $column++;

       }

       $excel_row = 2;

       foreach($data as $row){
         $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['nama_bujk']);

         $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['id_izin']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['nama_propinsi']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['email']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['telepon']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['id_sub_klasifikasi']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['kualifikasi']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['tgl_permohonan']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['tgl_permohonan']);
         $recv=$this->Bu_model->get_user($row['verifikator']);
         $nama_verifikator=$recv[0]['Nama'];
        $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $nama_verifikator);
         if($row['status_1']=='0000-00-00'){
           $data_selesai="";
         }else{
           $data_selesai=$row['status_1'];
         }
         $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $data_selesai);

         $tgl_pembayaran=$row['file_perjanjian'];
         $data_tgl=substr($tgl_pembayaran,0,10);
         $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $data_tgl);
         $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $data_tgl);
         $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row['tgl_biaya']);
         $tgl_surat=$row['tgl_surat_tugas'];
         $data_tgl_surat=substr($tgl_surat,0,10);
         $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $data_tgl_surat);
         $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row['nama_asesor']);
         $tgl_penilaian=$row['tgl_penilaian'];
         $data_tgl_penilaian=substr($tgl_penilaian,0,10);
         $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $data_tgl_penilaian);
         if($row['status_2']=='0000-00-00'){
           $data_selesai2="";
         }else{
           $data_selesai2=$row['status_2'];
         }
         $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $data_selesai2);
         $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $data_selesai2);
         if($row['pemutus']!='' AND $row['status_2']!='0000-00-00'){
           if($row['pemutus']=='1'){
             $data_tolak="";
             $data_terima="V";
           }else{
             $data_tolak="V";
             $data_terima="";
           }
         }else{
           $data_tolak="";
           $data_terima="";
         }

         $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $data_terima);
         $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $data_tolak);
         $excel_row++;

       }


       $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
       $filename = "Rekap_permohonan_".$tgl_awal."_".$tgl_akhir.".xls";
       ob_end_clean();
       header( "Content-type: application/vnd.ms-excel" );
       header('Content-Disposition: attachment;filename='.$filename .' ');
       header("Pragma: no-cache");
       header("Expires: 0");
       $object_writer->save('php://output');
       ob_end_clean();


    }
  }
  function excel_permohonan_bagian(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }else if($this->ion_auth->admin_pusat() OR $this->ion_auth->ko_administrasi() OR $this->ion_auth->ko_sertifikasi() OR $this->ion_auth->koordinator_keuangan())
    {
      $post = $this->input->post();
      $tgl_awal=$this->security->xss_clean(trim($post['tgl_awal']));
      $tgl_akhir=$this->security->xss_clean(trim($post['tgl_akhir']));
      $propinsi=$this->security->xss_clean(trim($post['propinsi']));
      $sub_klasifikasi=$this->security->xss_clean(trim($post['sub_klasifikasi']));
      $kualifikasi=$this->security->xss_clean(trim($post['kualifikasi']));
      $bagian=$this->security->xss_clean(trim($post['bagian']));

      $data=array();
      if($bagian=='6'){
        $record=$this->Bu_model->get_permohonan_pemantauan_adminitrator_bagian($tgl_awal,$tgl_akhir,$propinsi,$sub_klasifikasi,$kualifikasi);

      }else if($bagian=='1'){
        $record=$this->Bu_model->get_permohonan_pemantauan_adminitrator_bagian_dikembalikan($tgl_awal,$tgl_akhir,$propinsi,$sub_klasifikasi,$kualifikasi);

      }else if($bagian=='2'){
        $record=$this->Bu_model->get_permohonan_pemantauan_evaluator_bagian($tgl_awal,$tgl_akhir,$propinsi,$sub_klasifikasi,$kualifikasi);

      }else if($bagian=='3'){
        $record=$this->Bu_model->get_permohonan_pemantauan_keuangan_bagian($tgl_awal,$tgl_akhir,$propinsi,$sub_klasifikasi,$kualifikasi);

      }
      // $record=$this->Bu_model->get_permohonan_excel($tgl_awal,$tgl_akhir,$propinsi,$sub_klasifikasi,$kualifikasi);
      foreach($record as $row){

        $x=array(
          'NIB'=>$row['NIB'],
          'id_izin'=>$row['id_izin'],
          'nama'=>$row['nama'],
          'email'=>$row['email'],
          'telepon'=>$row['telepon'],
          'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
          'kualifikasi'=>$row['kualifikasi'],
          'nama_propinsi'=>$row['nama_propinsi'],
          'tgl_selesai'=>$row['tgl_selesai'],
          'bentuk_usaha'=>$row['bentuk_usaha'],
          'jenis_usaha'=>$row['jenis_usaha'],
          'concat_sub'=>$row['concat_sub'],
          'pemproses'=>$row['nama_pemproses'],
        );
        array_push($data,$x);


      }


      $object = new PHPExcel();

       $object->setActiveSheetIndex(0);

       $table_columns = array(
         "Nama BU",
         "ID IZIN",
         "PROPINSI",
         "EMAIL",
         "TELEPON",
         "SUB KASLIFIKASI",
         "KUALIFIKASI",
         "PEMPROSES",
         "TGL PROSES",

         );

       $column = 0;

       foreach($table_columns as $field){

         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

         $column++;

       }

       $excel_row = 2;

       foreach($data as $row){
         $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['nama']);

         $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['id_izin']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['nama_propinsi']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['email']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['telepon']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['id_sub_klasifikasi']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['kualifikasi']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['pemproses']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['tgl_selesai']);

         $excel_row++;

       }


       $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
       $filename = "Rekap_permohonan_perbagian_".$tgl_awal."_".$tgl_akhir.".xls";
       ob_end_clean();
       header( "Content-type: application/vnd.ms-excel" );
       header('Content-Disposition: attachment;filename='.$filename .' ');
       header("Pragma: no-cache");
       header("Expires: 0");
       $object_writer->save('php://output');
       ob_end_clean();
       //print_r($data);

    }
  }
  function excel_asesor($id){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }else if($this->ion_auth->admin_pusat())
    {
      $id_asesor=decrypt_url($id);
      $data=array();
      $record=$this->Bu_model->get_asesor_report($id_asesor);
      foreach($record as $row){

        $x=array(
          'Username'=>$row['id_asesor'],
          'Nama'=>$row['nama_bu'],
          'NIB'=>"'".$row['NIB']."'",
          'Tgl_Permohonan'=>$row['tgl_permohonan'],
          'Alamat_BU'=>$row['alamat_bu'],
          'Sub_Klasifikasi'=>$row['id_sub_klasifikasi'].'-'.$row['deskripsi_subklasifikasi'],
          'KBLI'=>$row['nomor_kbli'],
          'Kualifikasi'=>$row['kualifikasi']


        );
        array_push($data,$x);


      }

      $object = new PHPExcel();

       $object->setActiveSheetIndex(0);

       $table_columns = array(
         "Username",
         "Nama",
         "NIB",
         "Tgl Permohonan",
         "Alamat",
         "Sub Klasifikasi",
         "KBLI",
         "Kualifikasi",
         );

       $column = 0;

       foreach($table_columns as $field){

         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

         $column++;

       }



       $excel_row = 2;

       foreach($data as $row){
         $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['Username']);

         $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['Nama']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['NIB']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['Tgl_Permohonan']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['Alamat_BU']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['Sub_Klasifikasi']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['KBLI']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['Kualifikasi']);



         $excel_row++;

       }


       $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
       $filename = "Rekap_permohonan.xls";
       ob_end_clean();
       header( "Content-type: application/vnd.ms-excel" );
       header('Content-Disposition: attachment;filename='.$filename .' ');
       header("Pragma: no-cache");
       header("Expires: 0");
       $object_writer->save('php://output');
       ob_end_clean();


    }
  }
  function excel_pelaksana($id){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }else if($this->ion_auth->admin_pusat())
    {
      $id_asesor=decrypt_url($id);

      $record=$this->Bu_model->get_user($id_asesor);


      $object = new PHPExcel();

       $object->setActiveSheetIndex(0);

       $table_columns = array(
         "ID User",
         "Nama",
         "Tinjauan Permohonan",
         "Pengembalian Berkas",
         "Verifikasi Pembayaran",
         "Create Surat Tugas",
         "Create QR",
         "Rekomendasi Ke LPJK",
         "Get Permohonan",
         "Permintaan Revisi Berkas",
         );

       $column = 0;

       foreach($table_columns as $field){

         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

         $column++;

       }


       $excel_row = 2;


         $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $record[0]['Username']);

         $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $record[0]['Nama']);
         $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, count($this->Bu_model->tinjauan_permohonan($id_asesor)));
         $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, count($this->Bu_model->pengembalian_berkas($id_asesor)));
         $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, count($this->Bu_model->verifikasi_pembayaran($id_asesor)));
         $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, count($this->Bu_model->surat_tugas_create($id_asesor)));
         $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, '0');
         $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, count($this->Bu_model->rekomendasi_create($id_asesor)));
         $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, count($this->Bu_model->get_permohonan_create($id_asesor)));
         $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, count($this->Bu_model->get_revisi_create($id_asesor)));





       $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
       $filename = "Rekap_user.xls";
       ob_end_clean();
       header( "Content-type: application/vnd.ms-excel" );
       header('Content-Disposition: attachment;filename='.$filename .' ');
       header("Pragma: no-cache");
       header("Expires: 0");
       $object_writer->save('php://output');
       ob_end_clean();


    }
  }

  function permohonan(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }else if($this->ion_auth->admin_pusat() OR $this->ion_auth->ko_administrasi() OR $this->ion_auth->ko_sertifikasi() OR $this->ion_auth->koordinator_keuangan()){
      $this->data=array(
        'propinsi'=>$this->Bu_model->provinsi(),
        'asosiasi'=>$this->Bu_model->get_asosiasi(),

        'sub_klasifikasi'=>$this->Bu_model->sub_klasifikasi_bu_2020()
      );
      $this->template->load('menu/menu','excel_pemantauan', $this->data);
    }
  }
  function permohonan_bagian(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }else if($this->ion_auth->admin_pusat() OR $this->ion_auth->ko_administrasi() OR $this->ion_auth->ko_sertifikasi() OR $this->ion_auth->koordinator_keuangan()){
      $this->data=array(
        'propinsi'=>$this->Bu_model->provinsi(),
        'sub_klasifikasi'=>$this->Bu_model->sub_klasifikasi_bu_2020()
      );
      $this->template->load('menu/menu','excel_pemantauan_bagian', $this->data);
    }
  }
  function permohonan2(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
      $this->data=array(
        'propinsi'=>$this->Bu_model->provinsi(),
        'sub_klasifikasi'=>$this->Bu_model->sub_klasifikasi_bu_2020()
      );
      $this->template->load('menu/menu','excel_pemantauan2', $this->data);

  }
  function permohonan_coba(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }else if($this->ion_auth->report()){
      $this->data=array(
        'propinsi'=>$this->Bu_model->provinsi(),
        'sub_klasifikasi'=>$this->Bu_model->sub_klasifikasi_bu_2020()
      );
      $this->template->load('menu/menu','excel_pemantauan_coba', $this->data);
    }
  }
  function cobax(){
    $record=$this->Bu_model->list_pemantauan2();
    print_r($record);
  }
  function pemantauan_sertifikasi(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->admin_pusat()){


      $data=$this->Bu_model->list_pemantauan_sertifikasi();

    $record=array();
    foreach ($data as $row) {
      $penilaian='';
      $asesor='';
      $asesor1='';
      $asesor2='';
      $check_penilaian=$this->Bu_model->get_penilaian($row['NIB'],$row['tgl_permohonan']);
      for ($i=0; $i < count($check_penilaian) ; $i++) {
        if($i==0){
          $counter=$check_penilaian[$i]['id_asesor'];
          $asesor=$check_penilaian[$i]['Nama'];
          $asesor1=$check_penilaian[$i]['id_asesor'];
          if($check_penilaian[$i]['hasil_akhir']=='1'){
            $x="Sesuai";
          }else if($check_penilaian[$i]['hasil_akhir']=='0'){
            $x="Tidak Sesuai";
          }

          else{
            $x="";
          }
          $penilaian=$x;
        }else{
          if($counter!=$check_penilaian[$i]['id_asesor']){
            $asesor2=$check_penilaian[$i]['id_asesor'];
            $counter=$check_penilaian[$i]['id_asesor'];
            $asesor=$asesor.', '.$check_penilaian[$i]['Nama'];
            if($check_penilaian[$i]['hasil_akhir']=='0' AND $penilaian=='Sesuai'){

              $x="Tidak Sesuai";
            }
            $penilaian=$x;
          }else{

            if($check_penilaian[$i]['hasil_akhir']=='0' AND $penilaian=='Sesuai'){
              $x="Tidak Sesuai";
            }
            $penilaian=$x;
          }
        }

      }
      $date=date("Y-m-d");
      $x=new DateTime(substr($row['tgl_biaya'],0,10));
      $y=new DateTime($date);
      $perbedaan = $x->diff($y);
      $perbe=$perbedaan->d;
      if($perbe==0){
        $perbe=1;
      }
      $datax=array(
                    'penilaian'=>$penilaian,
        'asesor'=>$asesor,
        'perbedaan'=>$perbe,
        'tgl_biaya'=>$row['tgl_biaya'],
        'biaya_lsbu'=>$row['biaya_lsbu'],
        'status_0'=>$row['status_0'],
        'concat_sub'=>$row['concat_sub'],
        'concat_klasifikasi'=>$row['concat_klasifikasi'],
        'concat_kualifikasi'=>$row['concat_kualifikasi'],
        'nama'=>$row['nama'],
        'NIB'=>$row['NIB'],
        'tgl_permohonan'=>$row['tgl_permohonan'],
        'propinsi'=>$row['concat_sub'],
        'tahun'=>$row['tahun'],
        'status_1'=>$row['status_1'],
        'status_2'=>$row['status_2'],
        'status_3'=>$row['status_3'],
        'stat'=>$status,
        'file_pembayaran'=>$row['file_pembayaran'],
        'file_perjanjian'=>$row['file_perjanjian'],
      );
      array_push($record,$datax);
    }
    $this->data = array(
      'record'=>$record,

    );
    $this->template->load('menu/menu','sertifikasi/list_pemantauan_sertifikasi', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
  }
 function pencabutan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    if ($this->ion_auth->admin_cabut() or $this->ion_auth->admin_pusat()) {
      $data = array();

     $this->data = array(
        'record' => $data,
        'propinsi'=>$this->Bu_model->provinsi(),


      );
      $this->template->load('menu/menu', 'sertifikasi/list_pencabutan', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Failed');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function pemantauan(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->admin_pusat()){


      $data=$this->Bu_model->list_pemantauan2();

    $record=array();
    foreach ($data as $row) {
      if($row['status']=='20'){
        $deskripsi_status="Tinjauan";
      }elseif($row['status']=='10'){
        $deskripsi_status="Pembayaran";
      }elseif($row['status']=='30'){
        $deskripsi_status="Pembayaran";
      }elseif($row['status']=='31'){
        $deskripsi_status="Penilaian";
      }elseif($row['status']=='50'){
        $deskripsi_status="Terbit";
      }elseif($row['status']=='11'){
        $deskripsi_status="Dikembalikan";
      }elseif($row['status']=='90'){
        $deskripsi_status="Ditolak";
      }else{
        $deskripsi_status="-";
      }
      $datax=array(
        'nama_bujk'=>$row['nama_bujk'],
        'nama_jenis'=>$row['nama_jenis'],
        'bentuk_nama'=>$row['bentuk_nama'],
        'status'=>$row['status'],
        'NIB'=>$row['NIB'],
        'id_izin'=>$row['id_izin'],
        'nama_propinsi'=>$row['nama_propinsi'],
        'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
        'kualifikasi'=>$row['kualifikasi'],
        'stat'=>$deskripsi_status,
      );
      array_push($record,$datax);
    }
    $this->data = array(
      'record'=>$record,

    );
    $this->template->load('menu/menu','sertifikasi/list_pemantauan', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
  }
  function pengembalian_berkas(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->admin_pusat()){


              $data=$this->Bu_model->list_pengembalian_berkas();
              $record=array();

              foreach ($data as $row) {
                $penilaian='';
                $asesor='';
                $asesor1='';
                $asesor2='';
                $get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
                if(empty($get)){
                  $status="0";
                }else{
                  foreach($get as $row_revisi){
                    if($row_revisi['status']=='0'){
                      $status="1";
                      break;
                    }else{
                      $status="2";
                    }
                  }
                }
                $check_penilaian=$this->Bu_model->get_penilaian($row['NIB'],$row['tgl_permohonan']);
                for ($i=0; $i < count($check_penilaian) ; $i++) {
                  if($i==0){
                    $counter=$check_penilaian[$i]['id_asesor'];
                    $asesor=$check_penilaian[$i]['Nama'];
                    $asesor1=$check_penilaian[$i]['id_asesor'];
                    if($check_penilaian[$i]['hasil_akhir']=='1'){
                      $x="Sesuai";
                    }else{
                      $x="Tidak Sesuai";
                    }
                    $penilaian=$x;
                  }else{
                    if($counter!=$check_penilaian[$i]['id_asesor']){
                      $asesor2=$check_penilaian[$i]['id_asesor'];
                      $counter=$check_penilaian[$i]['id_asesor'];
                      $asesor=$asesor.', '.$check_penilaian[$i]['Nama'];
                      if($check_penilaian[$i]['hasil_akhir']=='0' AND $penilaian=='Sesuai'){

                        $x="Tidak Sesuai";
                      }
                      $penilaian=$x;
                    }else{

                      if($check_penilaian[$i]['hasil_akhir']=='0' AND $penilaian=='Sesuai'){
                        $x="Tidak Sesuai";
                      }
                      $penilaian=$x;
                    }
                  }

                }

                $datax=array(
                  'asesor'=>$asesor,
                  'asesor1'=>$asesor1,
                  'asesor2'=>$asesor2,
                  'penilaian'=>$penilaian,
                  'tgl_biaya'=>$row['tgl_biaya'],
                  'tgl_penghapusan'=>$row['tgl_penghapusan'],
                  'email'=>$row['email'],
                  'hp'=>$row['hp'],
                  'telepon'=>$row['telepon'],
                  'reason'=>$row['reason'],
                  'user_hapus'=>$row['user_hapus'],
                  'file_pembayaran'=>$row['file_pembayaran'],
                  'file_perjanjian'=>$row['file_perjanjian'],
                  'biaya_lsbu'=>$row['biaya_lsbu'],
                  'status_0'=>$row['status_0'],
                  'concat_sub'=>$row['concat_sub'],
                  'concat_klasifikasi'=>$row['concat_klasifikasi'],
                  'concat_kualifikasi'=>$row['concat_kualifikasi'],
                  'nama'=>$row['nama'],
                  'NIB'=>$row['NIB'],
                  'tgl_permohonan'=>$row['tgl_permohonan'],
                  'propinsi'=>$row['concat_sub'],
                  'tahun'=>$row['tahun'],
                  'status_1'=>$row['status_1'],
                  'status_2'=>$row['status_2'],
                  'status_3'=>$row['status_3'],
                  'stat'=>$status,
                );
                array_push($record,$datax);
              }
              $this->data = array(
                'record'=>$record,

              );
      $this->template->load('menu/menu','report_pengembalian_berkas', $this->data);
    }
  }
  function asesor(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->admin_pusat()){

      $this->data=array(
        'record'=>$this->Bu_model->get_asesor()
      );
      $this->template->load('menu/menu','report_asesor', $this->data);
    }
  }
  function pelaksana(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->admin_pusat()){

      $this->data=array(
        'record'=>$this->Bu_model->get_pelaksana()
      );
      $this->template->load('menu/menu','report_pelaksana', $this->data);
    }
  }
}
?>
