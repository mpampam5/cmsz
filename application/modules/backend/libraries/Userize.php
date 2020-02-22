<?php defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * mpampam.com
 */
class Userize {


  public function init()
  {
    $CI =& get_instance();
    // $registered = array_intersect($this->_role(), $this->_controllerList());
    $access_all = array('dashboard','main_menu');
    $registered = array_merge($access_all,$this->_role());
    $uri_segment = strtolower($CI->router->class);
    if (in_array($uri_segment,$registered)) {
      return true;
    }else {
      return false;
    }
  }


  private function controllerList() {
		$CI =& get_instance();
		$CI->load->helper('directory');
		$rootpath = 'application/modules/backend/controllers/';
		$fileinfos = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootpath));
		foreach($fileinfos as $pathname => $fileinfo) {
    		if (!$fileinfo->isFile()) continue;
    		if ($this->_secureReturnedFileName($pathname) == '') continue;
    		$result[] = $this->_secureReturnedFileName($pathname);
		}
		return $result;
	}



  private function _secureReturnedFileName($file) {

		$permitted_file_extension = '.php';

		if (strpos($file, $permitted_file_extension) == TRUE) {

			$secure = str_replace(array('.php','application/modules/backend/controllers/'),'',strtolower($file));
      $secure2 = str_replace(array('application/modules/backend/controllers\\',''),'',$secure);
			return $secure2;
		}
	}


  private function _role(){
    $CI =& get_instance();
    $id_level = $CI->session->userdata("id_level");
    $qry = $CI->db->get_where("rule_level",["id_level" => $id_level]);
    if ($qry->num_rows() > 0) {
      foreach ($qry->result() as $row) {
        $result[] = $row->main_menu;
      }

      return $result;
    }else {
      return array();
    }

  }


}