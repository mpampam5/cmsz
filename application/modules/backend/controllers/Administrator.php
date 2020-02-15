<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends Backend{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Administrator_model","model");
  }

  function index()
  {
    $this->template->set_title("administrator");
    $this->template->view("content/administrator/index");
  }


  function json()
  {
    if ($this->input->is_ajax_request()) {
      $list = $this->model->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $rows) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $rows->nama;
          $row[] = $rows->email;
          $row[] = $rows->level;
          $row[] = $rows->is_active == 1 ? '<i class="mdi mdi-checkbox-blank-circle text-success"></i> Yes' : '<i class="mdi mdi-checkbox-blank-circle text-danger"></i> No';


          $row[] = '
                    <a href="#" class="bnt btn-sm btn-primary" id="edit"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="#" class="bnt btn-sm btn-danger" id="hapus"><i class="fa fa-trash"></i> Hapus</a>
                   ';

          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->model->count_all(),
                      "recordsFiltered" => $this->model->count_filtered(),
                      "data" => $data,
              );
      //output to json format
      echo json_encode($output);
    }
  }

}
