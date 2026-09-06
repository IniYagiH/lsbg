<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Server_side extends CI_Controller{
public function __construct(){
  parent::__construct();
  $this->load->model('bu/Bu_model');
  $this->load->library('Template');
  $this->load->library('DataTableApi');

}
function get_data(){

  $api = new DataTableApi;
  $api->init();
}

}
;?>
