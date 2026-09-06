<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_asesor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('bu/Bu_model');
		$this->load->helper(array('url','html','file','form','security'));
		$this->load->library(array('ion_auth','form_validation','Template','pagination'));
		$this->load->model('User_model');
		$this->load->helper('Ssl');
	}

 function index()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->asesor()) {

      $data = $this->Bu_model->list_asesor();
      $record = array();
      foreach ($data as $row) {
        $penilaian = '';
        $asesor = '';
        $asesor1 = '';
        $asesor2 = '';
        $check_penilaian = $this->Bu_model->get_penilaian($row['NIB'], $row['tgl_permohonan']);
        for ($i = 0; $i < count($check_penilaian); $i++) {
          if ($i == 0) {
            $counter = $check_penilaian[$i]['id_asesor'];
            $asesor = $check_penilaian[$i]['Nama'];
            $asesor1 = $check_penilaian[$i]['id_asesor'];
            if ($check_penilaian[$i]['hasil_akhir'] == '1') {
              $x = "Sesuai";
            } else {
              $x = "Tidak Sesuai";
            }
            $penilaian = $x;
          } else {
            if ($counter != $check_penilaian[$i]['id_asesor']) {
              $asesor2 = $check_penilaian[$i]['id_asesor'];
              $counter = $check_penilaian[$i]['id_asesor'];
              $asesor = $asesor . ', ' . $check_penilaian[$i]['Nama'];
              if ($check_penilaian[$i]['hasil_akhir'] == '0' and $penilaian == 'Sesuai') {

                $x = "Tidak Sesuai";
              }
              $penilaian = $x;
            } else {

              if ($check_penilaian[$i]['hasil_akhir'] == '0' and $penilaian == 'Sesuai') {
                $x = "Tidak Sesuai";
              }
              $penilaian = $x;
            }
          }
        }
        $date = date("Y-m-d");
        $x = new DateTime(substr($row['tgl_biaya'], 0, 10));
        $y = new DateTime($date);
        $perbedaan = $x->diff($y);

        $datax = array(
          'asesor' => $asesor,
          'perbedaan' => $perbedaan->d,
          'tgl_biaya' => $row['tgl_biaya'],
          'biaya_lsbu' => $row['biaya_lsbu'],
          'status_0' => $row['status_0'],
          'concat_sub' => $row['concat_sub'],
          'concat_klasifikasi' => $row['concat_klasifikasi'],
          'concat_kualifikasi' => $row['concat_kualifikasi'],
          'nama' => $row['nama'],
          'NIB' => $row['NIB'],
          'tgl_permohonan' => $row['tgl_permohonan'],
          'propinsi' => $row['concat_sub'],
          'tahun' => $row['tahun'],
          'status_1' => $row['status_1'],
          'status_2' => $row['status_2'],
          'status_3' => $row['status_3'],
          'stat' => $status,
          'file_pembayaran' => $row['file_pembayaran'],
          'file_perjanjian' => $row['file_perjanjian'],
          
        );
        array_push($record, $datax);
      }
      $this->data = array(
        'record' => $record,
'pemutus'=>$this->Bu_model->get_user_pemutus()
      );

      $this->template->load('menu/menu', 'sertifikasi/list_asesor', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function index2a(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->asesor()){

		$limit_per_page = 10;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = 100;
		if ($total_records > 0)
		{
				// get current page records
				$config['display_pages'] = FALSE;
				$config['base_url'] = base_url() . 'dashboard_asesor/index';
				$config['total_rows'] = $total_records;
				$config['per_page'] = $limit_per_page;
				$config["uri_segment"] = 3;
				$config['full_tag_open'] = '<div class="pagination">';
				$config['full_tag_close'] = '</div>';

				$config['first_link'] = '';
				$config['first_tag_open'] = '';
				$config['first_tag_close'] = '';

				$config['last_link'] = '';
				$config['last_tag_open'] = '';
				$config['last_tag_close'] = '';

				$config['next_link'] = '<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Next page"><i class="ki ki-bold-arrow-next icon-sm"></i>';
				$config['next_tag_open'] = '';
				$config['next_tag_close'] = '</span>';

				$config['prev_link'] = '<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Previose page"><i class="ki ki-bold-arrow-back icon-sm"></i>';
				$config['prev_tag_open'] = '';
				$config['prev_tag_close'] = '</span>';

				$config['cur_tag_open'] = '<span class="curlink">';
				$config['cur_tag_close'] = '</span>';

				$config['num_tag_open'] = '<span class="numlink">';
				$config['num_tag_close'] = '</span>';
				$this->pagination->initialize($config);

				// build paging links


		}
		$history=$this->Bu_model->get_current_page_records_asesor($limit_per_page, $start_index);
    $this->data = array(
			'links'=>$this->pagination->create_links(),
			'history'=>$history
    );
    $this->template->load('menu/menu','dashboard_asesor', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}

	function survailen(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->asesor()){

		$limit_per_page = 10;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = 100;
		if ($total_records > 0)
		{
				// get current page records
				$config['display_pages'] = FALSE;
				$config['base_url'] = base_url() . 'dashboard_asesor/survailen';
				$config['total_rows'] = $total_records;
				$config['per_page'] = $limit_per_page;
				$config["uri_segment"] = 3;
				$config['full_tag_open'] = '<div class="pagination">';
				$config['full_tag_close'] = '</div>';

				$config['first_link'] = '';
				$config['first_tag_open'] = '';
				$config['first_tag_close'] = '';

				$config['last_link'] = '';
				$config['last_tag_open'] = '';
				$config['last_tag_close'] = '';

				$config['next_link'] = '<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Next page"><i class="ki ki-bold-arrow-next icon-sm"></i>';
				$config['next_tag_open'] = '';
				$config['next_tag_close'] = '</span>';

				$config['prev_link'] = '<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Previose page"><i class="ki ki-bold-arrow-back icon-sm"></i>';
				$config['prev_tag_open'] = '';
				$config['prev_tag_close'] = '</span>';

				$config['cur_tag_open'] = '<span class="curlink">';
				$config['cur_tag_close'] = '</span>';

				$config['num_tag_open'] = '<span class="numlink">';
				$config['num_tag_close'] = '</span>';
				$this->pagination->initialize($config);

				// build paging links


		}
		$history=$this->Bu_model->get_current_page_records_asesor_survailen($limit_per_page, $start_index);
    $this->data = array(
			'links'=>$this->pagination->create_links(),
			'history'=>$history
    );
    $this->template->load('menu/menu','dashboard_asesor_survailen', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}


}
?>
