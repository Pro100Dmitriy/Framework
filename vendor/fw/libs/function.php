<?php

function debug($elem, $type = 'pr'){
  echo "<pre>";
  switch($type){
    case 'pr':
      print_r($elem);
      break;
    case 'vr':
      var_dump($elem);
      break;
    case 'ex':
      var_export($elem);
      break;
  }
  echo "</pre>";
}

function redirect($http = false) // разобрать
{
  if($http){
    $redirect = $http;
  }else{
    $redirect = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : WWW;
  }
  header("Location: $redirect");
  exit;
}
function h($elem)
{
  htmlspecialchars($elem);
}