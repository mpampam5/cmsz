<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    echo $this->uri->segment(3);
  }

}
