<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_menu extends Backend{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("main_menu_model","model");
  }

  function index()
  {
    $this->template->set_title("main menu");
    $this->template->view("content/main_menu/index");
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

function _rules()
 {
   $this->form_validation->set_rules("menu","*&nbsp;","trim|xss_clean|htmlspecialchars|required");
   $this->form_validation->set_rules("is_parent","*&nbsp;","trim|xss_clean|numeric|required");
   $this->form_validation->set_rules('controller', '*&nbsp;', 'trim|xss_clean|htmlspecialchars');
   $this->form_validation->set_rules('icon', '*&nbsp;', 'trim|xss_clean|htmlspecialchars');
   $this->form_validation->set_error_delimiters('<span class="error text-danger" style="font-size:11px">','</span>');
 }

function add()
{
  $this->template->set_title("add main menu");
  $data = array('action' => site_url("backend/main_menu/add_action"),
                'button' => "add",
                'menu' => set_value("menu"),
                'icon' => set_value("icon"),
                'controller' => set_value("controller"),
                'is_parent' => set_value("is_parent")
                );
  $this->template->view("content/main_menu/form",$data);
}


function add_action()
{
  if ($this->input->is_ajax_request()) {
        $json = array('success'=>false, 'alert'=>array());
        $this->_rules();
        if ($this->form_validation->run()) {
          $insert = array('menu' => strtolower($this->input->post('menu',true)),
                          'slug' => url_title($this->input->post('menu',true),"-",true),
                          'is_parent' => $this->input->post('is_parent',true),
                          'controller' => strtolower($this->input->post('controller',true)),
                          'icon' => $this->input->post('icon',true),
                          'sort' => 0,
                          'created' => date('Y-m-d H:i:s'),
                        );

          $this->model->get_insert("main_menu",$insert);
          $json['alert'] = "add data successfully";
          $json['success'] =  true;
        }else {
          foreach ($_POST as $key => $value)
            {
              $json['alert'][$key] = form_error($key);
            }
        }

        echo json_encode($json);
    }
}



}
