<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends Backend{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Level_model","model");
  }

  function index()
  {
    $this->template->set_title("Level");
    $this->template->view("content/level/index");
  }

  function json(){
    //$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    $limit = $_POST['length']; // Ambil data limit per page
    $start = $_POST['start']; // Ambil data start
    $order_index = $_POST['order'][0]['column'];
    $order_field = $_POST['columns'][$order_index]['data'];
    $order_ascdesc = $_POST['order'][0]['dir'];
    $sql_total = $this->model->count_all();
    $sql_data = $this->model->filter($limit, $start, $order_field, $order_ascdesc);
    $sql_filter = $this->model->count_filter();

    $data = array();
    $no = $start;
    foreach ($sql_data as $rows) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $rows->level;
      $row[] = '
                <a href="#" class="bnt btn-sm btn-primary" id="edit"><i class="fa fa-pencil"></i> Edit</a>
                <a href="#" class="bnt btn-sm btn-danger" id="hapus"><i class="fa fa-trash"></i> Hapus</a>
                ';

      $data[] = $row;
    }


    $callback = array(
        'draw'=>$_POST['draw'], // Ini dari datatablenya
        'recordsTotal'=>$sql_total,
        'recordsFiltered'=>$sql_filter,
        'data'=>$data
    );
    header('Content-Type: application/json');
    echo json_encode($callback); // Convert array $callback ke json
  }

}
