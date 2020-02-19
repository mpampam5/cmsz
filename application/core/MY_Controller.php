<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata("login_status")) {
        redirect(site_url("backend/login"),"refresh");
    }else {
      $this->load->library(array("backend/Template","form_validation","security","user_agent"));
      $this->load->helper(array("backend/backend","sct"));
    }
  }


  //CEK PASSWORD FORM VALIDATION
function _cek_password($str)
{
  if (pass_decrypt(sess("token"),$str,sess("password"))==true) {
    return true;
  }else {
    $this->form_validation->set_message('_cek_password', '* Password Salah');
    return false;
  }
}


}
