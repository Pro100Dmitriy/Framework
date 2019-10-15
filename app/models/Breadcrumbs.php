<?php
namespace app\models;

use fw\core\App;

class Breadcrumbs extends AppModel
{

  public static function getBreadcrubs($category_id, $name = '')
  {
    $cats = App::$app->getProperty('cats');
    $breadcrumbs_array = self::getParts($cats, $category_id);
    $breadcrumbs = "<li><a href='". PATH ."'>Main</a></li>";
    foreach($breadcrumbs_array as $alias => $title){
      $breadcrumbs .= "<li><a href='". PATH ."/category/{$alias}'>{$title}</a></li>";
    }
    if($name){
      $breadcrumbs .= "<li class='active'>{$name}</li>";
    }
    return $breadcrumbs;
    debug($breadcrumbs_array);
  }

  public static function getParts($cats, $category_id)
  {
    if( !$category_id ) return false;
    $breadcrumbs = [];
    foreach( $cats as $k => $v ){
      if( isset($cats[ $category_id ] )){
        $breadcrumbs[ $cats[$category_id]['alias'] ] = $cats[$category_id]['title'];
        $category_id = $cats[$category_id]['parent_id'];
      }else break; 
    }
    return array_reverse($breadcrumbs);
  }

}