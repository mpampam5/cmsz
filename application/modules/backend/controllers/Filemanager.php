<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanager extends Backend{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Filemanager_model","model");
  }

  function index()
  {
    $this->template->set_title("File Manager");
    $this->template->view("content/filemanager/index");
  }


  function json()
  {
    if ($this->input->is_ajax_request()) {
      $list = $this->model->get_datatables();
      $data = array();
      foreach ($list as $rows) {
          $row = array();
          $row[] = '<div class="filemanager-image"></div>';
          $row[] = $rows->title.
                   '<p class="text-muted font-14"><a href="">'.$rows->file.'</a>
                    <br>'.date("d//m/Y H:i",strtotime($rows->created)).'</p>';

          $row[] = '<a href="'.site_url("backend/kategori/delete/".enc_url($rows->id)).'" class="bnt btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>';

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


  function add()
  {
    $this->template->set_title("Add");
    $data = array('action' => site_url("backend/filemanager/add_action"),
                  'button' => "add",
                  'title' => set_value("title"),
                  );
    $this->template->view("content/filemanager/form",$data,false);
  }


  function add_action()
  {
    if ($this->input->is_ajax_request()) {
          $json = array('success'=>false, 'alert'=>array());
          $this->load->helper('file');
          $this->form_validation->set_rules("title","*&nbsp;","trim|xss_clean|htmlspecialchars|required");
          $this->form_validation->set_rules("files","*&nbsp;","callback__file_check");
          $this->form_validation->set_error_delimiters('<span class="error text-danger" style="font-size:11px">','</span>');
          if ($this->form_validation->run()) {
            // $insert = array('kategori' => strtolower($this->input->post('title',true)),
            //                 'kategori_slug' => url_title($this->input->post('kategori',true),"-",true),
            //                 'created' => date('Y-m-d H:i:s'),
            //               );

            // $this->model->get_insert("filemanager",$insert);
            $json['alert'] = "upload successfully";
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


  function _file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['files']['tmp_name']);
        if(isset($_FILES['files']['name']) && $_FILES['files']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('_file_check', '* Please select only jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('_file_check', '* Please choose a file to upload.');
            return false;
        }
    }

}
