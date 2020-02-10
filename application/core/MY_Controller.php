<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library(array("backend/Template","form_validation","encrypt"));
    $this->load->helper(array("backend/backend"));
  }


}
