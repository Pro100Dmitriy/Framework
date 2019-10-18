<?php
namespace app\models;

class ProductModel extends AppModel // просмотренные товары
{

  public function setRecentlyViewed($id) // установка товара в куки
  {
    $recentlyViewed = $this->getAllRecentlyViewed();
    if( !$recentlyViewed ){
      setcookie('recentlyViewed', $id, time()+3600 * 24, '/');
    }else{
      $recentlyViewed = explode('.', $recentlyViewed);
      if( !in_array($id, $recentlyViewed) ){
        $recentlyViewed[] = $id;
        $recentlyViewed = implode('.', $recentlyViewed);
        setcookie('recentlyViewed', $recentlyViewed, time()+3600 * 24, '/');
      }
    }
  }

  public function getRecentlyViewed() // получение послднего товара
  {
    if( !empty( $_COOKIE['recentlyViewed'] ) ){
      $recentlyViewed = $_COOKIE['recentlyViewed'];
      $recentlyViewed = explode('.', $recentlyViewed);
      return array_slice($recentlyViewed, -3);
    }
    return false;
  }

  public function getAllRecentlyViewed() // получение всех последних товаров
  {
    if( !empty( $_COOKIE['recentlyViewed'] ) ){
      return $_COOKIE['recentlyViewed'];
    }
    return false;
  }

}