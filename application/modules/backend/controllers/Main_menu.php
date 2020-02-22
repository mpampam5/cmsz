<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_menu extends Backend{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->template->set_title("main menu");
    $this->template->view("content/main_menu/index");
  }

  function add()
  {
    
  }


function save()
{
   if ($this->input->is_ajax_request()) {
     $data = json_decode($_POST['data']);
     $readbleArray = $this->parseJsonArray($data);

       $i=0;
       foreach($readbleArray as $row){
         $i++;
         $this->db->query("update main_menu set is_parent = '".$row['parentID']."', sort = '".$i."' where id_menu = '".$row['id']."' ");
       }
   }
 }



 private function parseJsonArray($jsonArray, $parentID = 0)
 {
   $return = array();
   foreach ($jsonArray as $subArray) {
       $returnSubSubArray = array();
       if (isset($subArray->children)) {
       $returnSubSubArray = $this->parseJsonArray($subArray->children, $subArray->id);
     }

     $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
     $return = array_merge($return, $returnSubSubArray);
   }
     return $return;
}

}
