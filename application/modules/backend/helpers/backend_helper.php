<?php defined('BASEPATH') OR exit('No direct script access allowed');

function config_system($kode = null , $field = "value")
{
  //$file = "value" or $file = "status" 0,1
  $ci=& get_instance();
  $kd = strtolower($kode);
  $qry = $ci->db->get_where("config_system",["slug"=>"$kd"]);
  if ($qry->num_rows() > 0) {
      return $qry->row()->$field;
  }else {
      return "System not available";;
  }
}
