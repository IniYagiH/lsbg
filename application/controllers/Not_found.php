<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Not_found extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('bu/Bu_model');
    $this->load->model('tk/Tenaga_kerja_model');
    $this->load->helper(array('url','html','file','form','security'));
    $this->load->library(array('form_validation','Template'));
    $this->load->helper('Ssl');
  }
  function index(){
    $this->load->view('error_2');
  }
}
