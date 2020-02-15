<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_model extends CI_Model{

  var $column_order = array();
  var $order = array('user_level.id_user_level'=>"DESC");
  var $select = "user_level.id_user_level,
                 user_level.id_user,
                 user_level.id_level,
                 user.nama,
                 user.email,
                 user.is_active,
                 user.is_delete,
                 level.level";

  private function _get_datatables_query()
    {

      $this->db->select($this->select);
      $this->db->from("user_level");
      $this->db->join("user","user.id_user = user_level.id_user");
      $this->db->join("level","level.id_level = user_level.id_level","left");
      $this->db->where("user.is_active","1");
      $this->db->where("user.is_delete","0");
      $this->db->where("user_level.id_user_level !=","1");



    }


    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->select($this->select);
        $this->db->from("user_level");
        $this->db->join("user","user.id_user = user_level.id_user");
        $this->db->join("level","level.id_level = user_level.id_level","left");
        $this->db->where("user.is_active","1");
        $this->db->where("user.is_delete","0");
        $this->db->where("user_level.id_user_level !=","1");
        return $this->db->count_all_results();
    }

}
