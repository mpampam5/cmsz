<?php defined('BASEPATH') OR exit('No direct script access allowed');
function get_main_menu()
{
    $str = "";
    $ci=& get_instance();
    $get_menu = $ci->db->select("*")
                       ->from("main_menu")
                       ->where("is_parent",0)
                       ->order_by("sort","ASC")
                       ->get()->result();
    foreach ($get_menu as $menu) {
      $get_sub_menu = $ci->db->select("*")
                               ->from("main_menu")
                               ->where("is_parent",$menu->id_menu)
                               ->order_by("sort","ASC")
                               ->get();
      if ($get_sub_menu->num_rows() > 0) {
        $str.= '<li class="has-submenu">
                  <a href="#"><i class="'.$menu->icon.'"></i>'.$menu->menu.' <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                  <ul class="submenu">';
        foreach ($get_sub_menu->result() as $sub_menu) {
          $str .='<li><a href="'.site_url("backend/".$sub_menu->controller).'">'.$sub_menu->menu.'</a></li>';
        }
        $str.='   </ul>
                </li>';
      }else {
        $str.= '<li class="has-submenu">
                    <a href="'.site_url("backend/".$menu->controller).'"><i class="'.$menu->icon.'"></i>'.$menu->menu.'</a>
                </li>';
      }
    }
return $str;

}
