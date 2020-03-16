<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_generator extends CI_Controller{

  private $tilte;

  public function __construct()
  {
    parent::__construct();
    $this->title = "CMS M-CRUDIGNITER V 0.1";
    $this->load->library(array("template","core"));
    $this->load->helper(array("backend/backend"));
  }

  function index()
  {
    $menu = array('ci_sessions','ci_user_login','config_system','level','main_menu','rule_level','user','user_level');
    $table = $this->db->list_tables();
    $table_list = array_diff($table,$menu);
    $this->template->set_title($this->title);
    $data['list_table'] = $table_list;
    $data['list_controller'] = $this->core->controllerList();
    $this->template->view("content/home",$data);
  }

}
