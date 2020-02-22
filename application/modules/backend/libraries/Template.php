<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * mpampam.com
 */
class Template
{
  private $CI;

  private $temp_title = null ;


  function __construct()
  {
    $this->CI =& get_instance();
  }


  public function set_title($title)
  {
    $this->temp_title = $title;
  }

  public function  view($view_name, $params = array(),$default=true)
  {
    if ($this->CI->userize->init()) {
      if ($default) {
        $header_params['title'] = $this->temp_title;
        $this->CI->load->view('header',$header_params);
        // $this->CI->load->view(config_item("cpanel").'sidebar',$header_params);
        $this->CI->load->view($view_name,$params);
        $this->CI->load->view('footer');
      }else {
        $this->CI->load->view($view_name,$params);
      }
    }else {
      echo "<h1>HTTP Error 403 - Forbidden</h1><hr>Access Denied You don't have permission to access<br>author : ".$this->CI->config->item("author");
    }


  }



} //end class Template
