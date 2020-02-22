<?php defined('BASEPATH') OR exit('No direct script access allowed');

function get_data_menu()
{
  $ref   = [];
  $items = [];
  foreach ($query->result() as $data) {
    # code...
  $thisRef = &$ref[$data->id];
  $thisRef['parent'] = $data->is_parent;
  $thisRef['label'] = $data->name;
  $thisRef['icon'] = $data->icon;
                    $thisRef['link'] = $data->url;
  $thisRef['id'] = $data->id;
  $thisRef['active'] = $data->is_active;

  if($data->is_parent == 0) {
    $items[$data->id] = &$thisRef;
  } else {
    $ref[$data->is_parent]['child'][$data->id] = &$thisRef;
  }
}
