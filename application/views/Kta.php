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

 function signup(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   if($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $propinsi=$this->Bu_model->provinsi();

   }else{
    $id_propinsi = $this->session->userdata('id_propinsi');
    $propinsi=$this->Bu_model->provinsi_search($id_propinsi);
   }
   $this->data=array(
     'propinsi'=>$propinsi
   );
   $this->load->view('kta/signup',$this->data);
 }
 function signup_naik($id){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $npwp=decrypt_url($id);
  if($this->ion_auth->admin_pusat()){
   $propinsi=$this->Bu_model->provinsi();
   $kabupaten=$this->Bu_model->kabupaten();

  }else{
   $id_propinsi = $this->session->userdata('id_propinsi');
   $propinsi=$this->Bu_model->provinsi_search($id_propinsi);
   $kabupaten=$this->Bu_model->kabupaten();
  }
  $this->data=array(
    'propinsi'=>$propinsi,
    'kabupaten'=>$kabupaten,
    'biodata'=>$this->Bu_model->get_biodata_naik($npwp)
  );
  $this->load->view('kta/signup_naik',$this->data);
}
 function list_cetak(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $propinsi=$this->Bu_model->provinsi();
   $kabupaten=$this->Bu_model->kabupaten();
   $this->data = array(
     'record'=>$this->Bu_model->get_kta_cetak()
   );
   $this->template->load('menu/menu','kta/list_cetak', $this->data);

 }
 function list_terbit(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $propinsi=$this->Bu_model->provinsi();
   $kabupaten=$this->Bu_model->kabupaten();
   $this->data = array(
     'record'=>$this->Bu_model->get_kta_terbit()
   );
   $this->template->load('menu/menu','kta/list_terbit', $this->data);

 }
 function list_vv(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $propinsi=$this->Bu_model->provinsi();
   $kabupaten=$this->Bu_model->kabupaten();
   $this->data = array(
     'record'=>$this->Bu_model->get_vv_akun()
   );
   $this->template->load('menu/menu','kta/list_proses', $this->data);

 }
 function list_kabupaten(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $propinsi=$this->Bu_model->provinsi();
   $kabupaten=$this->Bu_model->kabupaten();
   $this->data = array(
     'record'=>$this->Bu_model->get_kta_kabupaten()
   );
   $this->template->load('menu/menu','kta/list_kabupaten', $this->data);

 }
 function list_propinsi(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $propinsi=$this->Bu_model->provinsi();
   $kabupaten=$this->Bu_model->kabupaten();
   $this->data = array(
     'record'=>$this->Bu_model->get_kta_propinsi()
   );
   $this->template->load('menu/menu','kta/list_propinsi', $this->data);

 }
 function list_pengajuan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $propinsi=$this->Bu_model->provinsi();
  $kabupaten=$this->Bu_model->kabupaten();
  $this->data = array(
    'record'=>$this->Bu_model->get_kta_pengajuan()
  );
  $this->template->load('menu/menu','kta/list_pengajuan', $this->data);

}
function list_tolak(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $propinsi=$this->Bu_model->provinsi();
  $kabupaten=$this->Bu_model->kabupaten();
  $this->data = array(
    'record'=>$this->Bu_model->get_kta_tolak()
  );
  $this->template->load('menu/menu','kta/list_tolak', $this->data);

}
 function list_pusat(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $propinsi=$this->Bu_model->provinsi();
   $kabupaten=$this->Bu_model->kabupaten();
   $this->data = array(
     'record'=>$this->Bu_model->get_kta_pusat()
   );
   $this->template->load('menu/menu','kta/list_pusat', $this->data);

 }
 function list_pembayaran(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $propinsi=$this->Bu_model->provinsi();
   $kabupaten=$this->Bu_model->kabupaten();
   $this->data = array(
     'record'=>$this->Bu_model->get_kta_pembayaran()
   );
   $this->template->load('menu/menu','kta/list_pembayaran', $this->data);

 }
 function coba_print($id){
  $record=$this->Bu_model->get_biodata_kta($id);
  print_r($record);
 }
 function tolak_permohonan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id=$this->security->xss_clean(trim($post['id']));
  $comment=$this->security->xss_clean(trim($post['comment']));
  $record=$this->Bu_model->get_biodata_kta($id);
  $data=array(
    'nama'=>$record[0]['nama'],
    'kualifikasi'=>$record[0]['kualifikasi'],
    'user_penginput'=>$record[0]['user_vv'],
    'user_penolak'=>$this->session->userdata('id_user'),
    'reason'=>$comment,
  );
  $table='tolak';
  $insert=$this->Bu_model->insert_sad($table,$data);
  $this->Bu_model->delete_kta_1($record[0]['npwp'],$record[0]['kualifikasi'],$record[0]['tahun']);
  $this->Bu_model->delete_kta_2($id);
  $this->output
  ->set_content_type('application/json')
  ->set_output(json_encode(array('result' => 1)));
 }
 
 function insert_pembayaran(){
   $post = $this->input->post();
   $id1=$this->security->xss_clean(trim($post['id']));
   $id=decrypt_url($id1);
   $check=$this->Bu_model->get_invoice($id);
   if(!empty($check)){


   $table_upload='bu_persyaratan';
   $upload=NULL;
   $uploadx=NULL;
   if($_FILES['file_pembayaran']['name'])
   {
     $this->load->library('upload');
     $id_user=$this->session->userdata('id_user');
     $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
     $config['upload_path'] = './assets/bukti/kta/bukti_pembayaran';
     $config['allowed_types'] = 'pdf|jpg|jpeg|png';
     $config['overwrite'] = TRUE;
     $config['file_name'] = $nmfile;
     $this->upload->initialize($config);
     if($this->upload->do_upload('file_pembayaran')){
       $gbr = $this->upload->data();
       $filename=$gbr['file_name'];
       $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
       $alamat="./assets/bukti/badan_usaha/file_pembayaran/";

       $upload=$gbr['file_name'];
     }
   }

   if(!empty($upload)){

     $data=array(
       'file_pembayaran'=>$upload,
     );
     $where=array(
       'id'=> $id
     );
     $table="registrasi";
     $insert=$this->Bu_model->update_edit($where,$table,$data);
     $this->session->set_flashdata('title','Success');
     $this->session->set_flashdata('text','Pembayaran Berhasil Di Input');
     $this->session->set_flashdata('class', "success");
     $this->output
     ->set_content_type('application/json')
     ->set_output(json_encode(array('result' => 1)));
     redirect('kta/invoice/'.$id1,'refresh');
   }else{
     $this->session->set_flashdata('title','Failed');
     $this->session->set_flashdata('text','Pembayaran Gagal Di Upload');
     $this->session->set_flashdata('class', "error");
     $this->output
     ->set_content_type('application/json')
     ->set_output(json_encode(array('result' => 1)));
     redirect('kta/invoice/'.$id1,'refresh');
   }
 }
 }
 function invoice($id1){

   $id=decrypt_url($id1);
   $propinsi=$this->Bu_model->provinsi();
   $kabupaten=$this->Bu_model->kabupaten();
   $this->data = array(
     'record'=>$this->Bu_model->get_invoice($id),
     'id'=>$id1
   );
   $this->load->view('kta/invoice', $this->data);

 }
 function search_kta(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $post = $this->input->post();
   $npwp = $this->security->xss_clean(trim($post['npwp']));
   $id = $this->security->xss_clean(trim($post['id']));
   $kta=$this->Bu_model->get_biodata_kta($id);


   $response = array(
                  'record'=>$kta,

                );
    echo json_encode($response);
 }
 function verifikasi_user(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $post = $this->input->post();
   $npwp = $this->security->xss_clean(trim($post['npwp']));
   $kualifikasi = $this->security->xss_clean(trim($post['kualifikasi']));
   $kta=$this->Bu_model->get_kta_akun();

   $jumlah=count($kta)+1;
   $username="kta_".$jumlah;
   $password=$this->randomPassword();
   $data_awal=array(
     'Username'=>$username,
     'Password'=>$password
   );
   $where_awal=array(
     'npwp'=>$npwp
   );
   $table_awal="user";
   $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
   $tgl_permohonan=date("Y-m-d");
   $data=array(
     'Username'=>$username,
     'tgl_permohonan'=>$tgl_permohonan,
     'kualifikasi'=>$kualifikasi,
     'tgl_vv'=>$tgl_permohonan,

   );
   $table='registrasi';
   $insert=$this->Bu_model->insert_sad($table,$data);

   $response = array(
                  'result'=>1,

                );
    echo json_encode($response);
 }
 function verifikasi_pembayaran(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $post = $this->input->post();
   $id = $this->security->xss_clean(trim($post['id']));

   $data_awal=array(
     'status_bayar'=>'1',
     'tgl_bayar'=>date("Y-m-d")
   );
   $where_awal=array(
     'id'=>$id
   );
   $table_awal="registrasi";
   $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);


   $response = array(
                  'result'=>1,

                );
    echo json_encode($response);
 }
 function verifikasi_kota(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $post = $this->input->post();
   $username = $this->security->xss_clean(trim($post['username']));;
   $tgl_permohonan=date("Y-m-d");
   $data_awal=array(
     'tgl_kota'=>$tgl_permohonan
   );
   $where_awal=array(
     'username'=>$username
   );
   $table_awal="registrasi";
   $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);


   $response = array(
                  'result'=>1,

                );
    echo json_encode($response);
 }
 function verifikasi_propinsi(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $post = $this->input->post();
   $id = $this->security->xss_clean(trim($post['id']));;
   $tgl_permohonan=date("Y-m-d");
   $data_awal=array(
     'tgl_propinsi'=>$tgl_permohonan,
     'user_propinsi'=>$this->session->userdata('id_user')
   );
   $where_awal=array(
     'id'=>$id
   );
   $table_awal="registrasi";
   $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);


   $response = array(
                  'result'=>1,

                );
    echo json_encode($response);
 }
 function verifikasi_pusat(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $post = $this->input->post();
   $id = $this->security->xss_clean(trim($post['id']));
   $record=$this->Bu_model->get_invoice($id);
     $tgl_permohonan=date("Y-m-d");
     $data_awal=array(
       'tgl_pusat'=>$tgl_permohonan,
       'user_pusat'=>$this->session->userdata('id_user')
     );
     $where_awal=array(
       'id'=>$id
     );
     $table_awal="registrasi";
     $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
     $result='1';
  



   $response = array(
                  'result'=>$result,

                );
    echo json_encode($response);
 }
 function randomPassword() {
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
function insert(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $upload=NULL;
  $upload_npwp=NULL;
  $upload_npwp_pjbu=NULL;
  $upload_ktp=NULL;
  $upload_nib=NULL;
  $uploadx=NULL;
  $npwp1=$this->security->xss_clean(trim($post['npwp']));
  $kualifikasi=$this->security->xss_clean(trim($post['kualifikasi']));
  $tahun=date("Y");
  $npwp2=str_replace("-","",$npwp1);
  $npwp=str_replace(".","",$npwp2);
  $search=$this->Bu_model->cek_kta($npwp,$kualifikasi,$tahun);
  if(empty($search)){

       if($_FILES['profile_avatar']['name'])
       {
         $this->load->library('upload');
         $id_user=$this->session->userdata('id_user');
         $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
         $config['upload_path'] = './assets/bukti/kta/foto';
         $config['allowed_types'] = 'pdf|jpg|jpeg|png';
         $config['overwrite'] = TRUE;
         $config['file_name'] = $nmfile;
         $this->upload->initialize($config);
         if($this->upload->do_upload('profile_avatar')){
           $gbr = $this->upload->data();
           $filename=$gbr['file_name'];
           $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
           $alamat="./assets/bukti/kta/foto";

           $upload=$gbr['file_name'];
         }
       }
       if($_FILES['npwp_file']['name'])
       {
         $this->load->library('upload');
         $id_user=$this->session->userdata('id_user');
         $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
         $config['upload_path'] = './assets/bukti/kta/npwp';
         $config['allowed_types'] = 'pdf|jpg|jpeg|png';
         $config['overwrite'] = TRUE;
         $config['file_name'] = $nmfile;
         $this->upload->initialize($config);
         if($this->upload->do_upload('npwp_file')){
           $gbr = $this->upload->data();
           $filename=$gbr['file_name'];
           $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
           $alamat="./assets/bukti/kta/npwp";

           $upload_npwp=$gbr['file_name'];
         }
       }
       if($_FILES['ktp_file']['name'])
       {
         $this->load->library('upload');
         $id_user=$this->session->userdata('id_user');
         $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
         $config['upload_path'] = './assets/bukti/kta/ktp';
         $config['allowed_types'] = 'pdf|jpg|jpeg|png';
         $config['overwrite'] = TRUE;
         $config['file_name'] = $nmfile;
         $this->upload->initialize($config);
         if($this->upload->do_upload('ktp_file')){
           $gbr = $this->upload->data();
           $filename=$gbr['file_name'];
           $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
           $alamat="./assets/bukti/kta/npwp";

           $upload_ktp=$gbr['file_name'];
         }
       }
       if($_FILES['file_nib']['name'])
       {
         $this->load->library('upload');
         $id_user=$this->session->userdata('id_user');
         $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
         $config['upload_path'] = './assets/bukti/kta/nib';
         $config['allowed_types'] = 'pdf|jpg|jpeg|png';
         $config['overwrite'] = TRUE;
         $config['file_name'] = $nmfile;
         $this->upload->initialize($config);
         if($this->upload->do_upload('file_nib')){
           $gbr = $this->upload->data();
           $filename=$gbr['file_name'];
           $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
           $alamat="./assets/bukti/kta/nib";

           $upload_nib=$gbr['file_name'];
         }
       }
       if($_FILES['file_npwp_pjbu']['name'])
       {
         $this->load->library('upload');
         $id_user=$this->session->userdata('id_user');
         $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
         $config['upload_path'] = './assets/bukti/kta/npwp_pjbu';
         $config['allowed_types'] = 'pdf|jpg|jpeg|png';
         $config['overwrite'] = TRUE;
         $config['file_name'] = $nmfile;
         $this->upload->initialize($config);
         if($this->upload->do_upload('file_npwp_pjbu')){
           $gbr = $this->upload->data();
           $filename=$gbr['file_name'];
           $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
           $alamat="./assets/bukti/kta/nib";

           $upload_npwp_pjbu=$gbr['file_name'];
         }
       }
       $data=array(
         'npwp'=>$npwp,
         'kualifikasi'=>$this->security->xss_clean(trim($post['kualifikasi'])),
         'tahun'=>date("Y"),
         'jenis_bu'=>$this->security->xss_clean(trim($post['bentuk'])),
         'jenis_bu2'=>$this->security->xss_clean(trim($post['jenis'])),
         'nama'=>strtoupper($this->security->xss_clean(trim($post['nama_bu']))),
         'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
         'propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
         'kabupaten'=>$this->security->xss_clean(trim($post['kabupaten'])),
         'nama_pjbu'=>$this->security->xss_clean(trim($post['pjbu'])),
         'no_telp'=>$this->security->xss_clean(trim($post['phone'])),
         'email'=>$this->security->xss_clean(trim($post['email'])),
         'kodepos'=>$this->security->xss_clean(trim($post['kodepos'])),
         'foto'=>$this->security->xss_clean(trim($upload)),
         'npwp_file'=>$this->security->xss_clean(trim($upload_npwp)),
         'ktp_file'=>$this->security->xss_clean(trim($upload_ktp)),
         'nib_file'=>$this->security->xss_clean(trim($upload_nib)),
         'npwp_pjbu_file'=>$this->security->xss_clean(trim($upload_npwp_pjbu)),
       );
       $table='biodata';
       $insert=$this->Bu_model->insert_sad($table,$data);

       $data=array(
         'npwp'=>$npwp,
         'kualifikasi'=>$this->security->xss_clean(trim($post['kualifikasi'])),
         'tahun'=>date("Y"),
         'tgl_vv'=>date("Y-m-d"),
         'user_vv'=>$this->session->userdata('id_user'),
       );
       $table='registrasi';
       $insert=$this->Bu_model->insert_sad($table,$data);



       $this->session->set_flashdata('title','Success');
       $this->session->set_flashdata('text','Data berhasil diinput');
       $this->session->set_flashdata('class', "success");
       redirect('kta/signup', 'refresh');
  }else{
    $this->session->set_flashdata('title','Failed');
    $this->session->set_flashdata('text','Anda tidak bisa mengajukan kualifikasi dan tahun yang sama');
    $this->session->set_flashdata('class', "error");
    redirect('kta/signup', 'refresh');
  }


} 
function insert_naik(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $post = $this->input->post();
   $upload=NULL;
   $upload_npwp=NULL;
   $upload_npwp_pjbu=NULL;
   $upload_ktp=NULL;
   $upload_nib=NULL;
   $uploadx=NULL;
   $npwp1=$this->security->xss_clean(trim($post['npwp']));
   $kualifikasi=$this->security->xss_clean(trim($post['kualifikasi']));
   $tahun=date("Y");
   $npwp2=str_replace("-","",$npwp1);
   $npwp=str_replace(".","",$npwp2);
   $search=$this->Bu_model->cek_kta($npwp,$kualifikasi,$tahun);
   if(empty($search)){

        if($_FILES['profile_avatar']['name'])
        {
          $this->load->library('upload');
          $id_user=$this->session->userdata('id_user');
          $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
          $config['upload_path'] = './assets/bukti/kta/foto';
          $config['allowed_types'] = 'pdf|jpg|jpeg|png';
          $config['overwrite'] = TRUE;
          $config['file_name'] = $nmfile;
          $this->upload->initialize($config);
          if($this->upload->do_upload('profile_avatar')){
            $gbr = $this->upload->data();
            $filename=$gbr['file_name'];
            $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
            $alamat="./assets/bukti/kta/foto";

            $upload=$gbr['file_name'];
          }
        }else{
          $upload=$this->security->xss_clean(trim($post['file_foto_2']));

        }
        if($_FILES['npwp_file']['name'])
        {
          $this->load->library('upload');
          $id_user=$this->session->userdata('id_user');
          $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
          $config['upload_path'] = './assets/bukti/kta/npwp';
          $config['allowed_types'] = 'pdf|jpg|jpeg|png';
          $config['overwrite'] = TRUE;
          $config['file_name'] = $nmfile;
          $this->upload->initialize($config);
          if($this->upload->do_upload('npwp_file')){
            $gbr = $this->upload->data();
            $filename=$gbr['file_name'];
            $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
            $alamat="./assets/bukti/kta/npwp";

            $upload_npwp=$gbr['file_name'];
          }
        }else{
          $upload_npwp=$this->security->xss_clean(trim($post['file_npwp_2']));

        }
        if($_FILES['ktp_file']['name'])
        {
          $this->load->library('upload');
          $id_user=$this->session->userdata('id_user');
          $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
          $config['upload_path'] = './assets/bukti/kta/ktp';
          $config['allowed_types'] = 'pdf|jpg|jpeg|png';
          $config['overwrite'] = TRUE;
          $config['file_name'] = $nmfile;
          $this->upload->initialize($config);
          if($this->upload->do_upload('ktp_file')){
            $gbr = $this->upload->data();
            $filename=$gbr['file_name'];
            $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
            $alamat="./assets/bukti/kta/npwp";

            $upload_ktp=$gbr['file_name'];
          }
        }else{
          $upload_ktp=$this->security->xss_clean(trim($post['file_ktp_2']));

        }
        if($_FILES['file_nib']['name'])
        {
          $this->load->library('upload');
          $id_user=$this->session->userdata('id_user');
          $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
          $config['upload_path'] = './assets/bukti/kta/nib';
          $config['allowed_types'] = 'pdf|jpg|jpeg|png';
          $config['overwrite'] = TRUE;
          $config['file_name'] = $nmfile;
          $this->upload->initialize($config);
          if($this->upload->do_upload('file_nib')){
            $gbr = $this->upload->data();
            $filename=$gbr['file_name'];
            $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
            $alamat="./assets/bukti/kta/nib";

            $upload_nib=$gbr['file_name'];
          }
        }else{
          $upload_nib=$this->security->xss_clean(trim($post['file_nib_2']));

        }
        if($_FILES['file_npwp_pjbu']['name'])
        {
          $this->load->library('upload');
          $id_user=$this->session->userdata('id_user');
          $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
          $config['upload_path'] = './assets/bukti/kta/npwp_pjbu';
          $config['allowed_types'] = 'pdf|jpg|jpeg|png';
          $config['overwrite'] = TRUE;
          $config['file_name'] = $nmfile;
          $this->upload->initialize($config);
          if($this->upload->do_upload('file_npwp_pjbu')){
            $gbr = $this->upload->data();
            $filename=$gbr['file_name'];
            $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
            $alamat="./assets/bukti/kta/nib";

            $upload_npwp_pjbu=$gbr['file_name'];
          }
        }else{
          $upload_npwp_pjbu=$this->security->xss_clean(trim($post['file_npwp_pjbu_2']));

        }
        $data=array(
          'npwp'=>$npwp,
          'kualifikasi'=>$this->security->xss_clean(trim($post['kualifikasi'])),
          'tahun'=>date("Y"),
          'jenis_bu'=>$this->security->xss_clean(trim($post['bentuk'])),
          'jenis_bu2'=>$this->security->xss_clean(trim($post['jenis'])),
          'nama'=>strtoupper($this->security->xss_clean(trim($post['nama_bu']))),
          'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
          'propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
          'kabupaten'=>$this->security->xss_clean(trim($post['kabupaten'])),
          'nama_pjbu'=>$this->security->xss_clean(trim($post['pjbu'])),
          'no_telp'=>$this->security->xss_clean(trim($post['phone'])),
          'email'=>$this->security->xss_clean(trim($post['email'])),
          'kodepos'=>$this->security->xss_clean(trim($post['kodepos'])),
          'foto'=>$this->security->xss_clean(trim($upload)),
          'npwp_file'=>$this->security->xss_clean(trim($upload_npwp)),
          'ktp_file'=>$this->security->xss_clean(trim($upload_ktp)),
          'nib_file'=>$this->security->xss_clean(trim($upload_nib)),
          'npwp_pjbu_file'=>$this->security->xss_clean(trim($upload_npwp_pjbu)),
        );
        $table='biodata';
        $insert=$this->Bu_model->insert_sad($table,$data);

        $data=array(
          'npwp'=>$npwp,
          'kualifikasi'=>$this->security->xss_clean(trim($post['kualifikasi'])),
          'tahun'=>date("Y"),
          'tgl_vv'=>date("Y-m-d"),
          'user_vv'=>$this->session->userdata('id_user'),
        );
        $table='registrasi';
        $insert=$this->Bu_model->insert_sad($table,$data);



        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Data berhasil diinput');
        $this->session->set_flashdata('class', "success");
        redirect('kta/signup', 'refresh');
   }else{
     $this->session->set_flashdata('title','Failed');
     $this->session->set_flashdata('text','Anda tidak bisa mengajukan kualifikasi dan tahun yang sama');
     $this->session->set_flashdata('class', "error");
     redirect('kta/signup', 'refresh');
   }


 }
 function update(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $post = $this->input->post();
   $npwp1=$this->security->xss_clean(trim($post['npwp_edit']));
   $tahun=date("Y");
   $npwp2=str_replace("-","",$npwp1);
   $npwp=str_replace(".","",$npwp2);

   if($_FILES['profile_avatar']['name'])
   {
     $this->load->library('upload');
     $id_user=$this->session->userdata('id_user');
     $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
     $config['upload_path'] = './assets/bukti/kta/foto';
     $config['allowed_types'] = 'pdf|jpg|jpeg|png';
     $config['overwrite'] = TRUE;
     $config['file_name'] = $nmfile;
     $this->upload->initialize($config);
     if($this->upload->do_upload('profile_avatar')){
       $gbr = $this->upload->data();
       $filename=$gbr['file_name'];
       $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
       $alamat="./assets/bukti/kta/foto";

       $upload=$gbr['file_name'];
       $data_foto=array(
         'foto'=>$upload,

       );
       $where_foto=array(
         'npwp'=>$npwp
       );
       $table='biodata';
       $insert=$this->Bu_model->update_edit($where_foto,$table,$data_foto);

     }
   }


        $data=array(
          'nama'=>$this->security->xss_clean(trim($post['nama'])),
          'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
          'nama_pjbu'=>$this->security->xss_clean(trim($post['pjbu'])),
          'no_telp'=>$this->security->xss_clean(trim($post['phone'])),
          'email'=>$this->security->xss_clean(trim($post['email'])),
        );
        $where=array(
          'npwp'=>$npwp
        );
        $table='biodata';
        $insert=$this->Bu_model->update_edit($where,$table,$data);


        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Data berhasil diinput');
        $this->session->set_flashdata('class', "success");




 }
 function kabupaten(){
   if (!$this->ion_auth->ceklogin())
   {
     $this->session->set_flashdata('title','Login Gagal');
     $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
     $this->session->set_flashdata('class', "warning");
     redirect('login', 'refresh');
   }
   $post = $this->input->post();
   $id_propinsi=$post['id_propinsi'];
   $select="SELECT ID_Kabupaten,Nama FROM kabupaten";
   $where="WHERE ID_Propinsi='$id_propinsi'";
   $record=$this->Bu_model->searching($select,$where);
   $response = array(
                   'record' =>$record
                 );

       echo json_encode($response);
  }

  function cetak_kta(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $this->create_qr();
    $this->data=array(
      'propinsi'=>$this->Bu_model->provinsi()
    );
    $this->load->library('pdfgenerator');
     $html = $this->load->view('kta/cetak_kta', $this->data, true);
     $filename = 'report_'.time();
     //$this->load->view('report/surat_perjanjian', $this->data);
     $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

  }
  function cetak_kta2($id){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $select2="SELECT noreg FROM qr_kta ORDER BY LENGTH(noreg) DESC, noreg DESC LIMIT 1";
    $where2="";
    $record2=$this->Bu_model->searching($select2,$where2);
    $noreg2=$record2[0]['noreg']+1;
    $panjang=strlen($noreg2);
    $jumlah=5-$panjang;
    $nol='';
    for($i=0;$i<$jumlah;$i++){
      $nol=$nol.'0';
    }
    $noreg=$nol.$noreg2;

    $id_kta=decrypt_url($id);
    $record=$this->Bu_model->get_kta_sertifikat($id_kta);
    $noreg_full=$record[0]['jenis_bu'].'/'.$record[0]['propinsi'].'/'.$record[0]['kabupaten'].'/GAPEKNAS/'.$noreg;
    $cek=$this->Bu_model->get_qr_kta($id_kta);
    if(empty($cek)){
      $this->create_qr($id,$noreg_full,$noreg);
      $data_awal=array(
        'tgl_cetak'=>date('Y-m-d')
      );
      $where_awal=array(
        'id'=>$id_kta
      );
      $table_awal="registrasi";
      $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);

    }

    $record=$this->Bu_model->get_kta_sertifikat($id_kta);
    $bulan_mulai=$month = date("m",strtotime($record[0]['tgl_cetak']));
    $futureDate2=date('Y-m-d', strtotime('+1 year', strtotime($record[0]['tgl_cetak'])));
    $futureDate=date('Y-m-d', strtotime('-1 day', strtotime($futureDate2)));
    $tahun_habis=substr($futureDate,0,4);
    $bulan_habis=substr($futureDate,5,2);
    $tgl_habis=substr($futureDate,8,2);
    $this->data=array(
      'propinsi'=>$this->Bu_model->provinsi(),
      'record'=>$record,
      'bulan'=>$this->getBulan($bulan_mulai),
      'bulan_habis'=>$this->getBulan($bulan_habis),
      'tahun_habis'=>$tahun_habis,
      'tgl_habis'=>$tgl_habis,
    );
    //$this->load->library('pdfgenerator');
     //$html = $this->load->view('kta/cetak_kta2', $this->data, true);
     //$filename = 'report_'.time();
     //$this->load->view('report/surat_perjanjian', $this->data);
     //$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    // $this->load->view('kta/cetak_kta2',$this->data);


     $mpdf = new \Mpdf\Mpdf([
       'mode' => 'utf-8',

     ]);
     $html3 = $this->load->view('kta/cetak_kta2',$this->data,true);
       $mpdf->showImageErrors = true;
       $mpdf->SetWatermarkText('DRAFT');
       $mpdf->WriteHTML($html3);
       $mpdf->Output();
  }

  function create_qr($id,$noreg_full,$noreg){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $date=date('Y-m-d');
    $date2=str_replace("-","",$date);
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
    $image_name=$id.'.jpg';
    $params['data'] = base_url('Digital_signature/validasi_ketua/'.$id.'/'.encrypt_url($noreg).'/'.encrypt_url($date2.'1')); //data yang akan di jadikan QR CODE
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
    $image_name2=$id.'.jpg';
    $params['data'] = base_url('Digital_signature/validasi_sekjen/'.$id.'/'.encrypt_url($noreg).'/'.encrypt_url($date2.'2')); //data yang akan di jadikan QR CODE
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
    $image_name3=$id.'.jpg';
    $params['data'] = base_url('Digital_signature/validasi/'.$id.'/'.encrypt_url($noreg).'/'.encrypt_url($date2.'3')); //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name3; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params);

    $qr3=$image_name3;





    $data=array(
      'id'=>decrypt_url($id),
      'noreg'=>$noreg,
      'noreg_full'=>$noreg_full,
      'qr_1'=>$qr1,
      'qr_2'=>$qr2,
      'qr_3'=>$qr3,

    );
    $tabel="qr_kta";
    $this->Bu_model->insert_sad($tabel,$data);

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
}
