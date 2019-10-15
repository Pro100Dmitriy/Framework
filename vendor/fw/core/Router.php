<?php

namespace fw\core;

class Router
{ 
  
  protected static $routes = []; //тут зранятся все элементы с допустимым значениями
  protected static $route = []; // сюда записывается текущий передаваемый элемент

  public static function add($regexp, $route = [])  //добаляет в массив $routes элементы с ключом в виде регулярного выражения, а значение выбраные эелементы по регулярному выражению
  {
    self::$routes[$regexp] = $route;
  }

  public static function getRoutes()
  {
    return self::$routes;
  }
  public static function getRoute()
  {
    return self::$route;
  }

  public static function matchRoutes($url) // получает адресс и разбивает его на controller / action и записывает в массив $route
  { // метод выдает либо true либо false
    foreach(self::$routes as $pattern => $route){
      if( preg_match("|$pattern|i", $url, $matches) ){
        
        foreach($matches as $key => $value){
          if( is_string($key) ) $route[$key] =  self::urlUpperCase( $value );
        }
        if( !isset( $route['action'] ) ) // если action не задан подставляется стандартное значение
          $route['action'] = 'index';
        self::$route = $route;
        //debug(self::$route);
        return true;
      }
    }
    return false;
  }

  public static function despatch($url)
  {
    $url = self::removeQueryString($url); // отбрасывает GET переменные
    if( self::matchRoutes($url) ){ // проверяет на правильность url
      // start if
      $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller'; // составляет путь к файлу контролера
      if( class_exists($controller) ){ //Если файл с классом найден то ...
        // start if
        $cOBJ = new $controller( self::$route ); // создаёт объект класса
        $action = self::urlLowerCase( self::$route['action'] ) . "Action"; //составляет имя метода

        if( method_exists($cOBJ, $action) ){ //если данный метод $action существует в классе $cOBJ то...
          $cOBJ->$action(); // вызываетсся метод классы $controller
          $cOBJ->getView(); //вызыввет мето getView() который доступен всем контроллерам и прописан в файле Controller.php
        }else{
          throw new \Exception("$action не найден", 404);
        }

        // end if
      }else{ // иначе генерируется исключение
        throw new \Exception("Класс $controller не найден", 404);
      }
      // end if
    }else{
      http_response_code(404);
      include_once "errors/404.php";
    }
  }
  
  private static function urlUpperCase($controller){ // переводит controller в вверзний регистр
    return str_replace(' ', '', ucwords( str_replace('-', ' ', $controller) ) );
  }
  private static function urlLowerCase($controller){ // переводит controller в нижний регистр
    return lcfirst( self::urlUpperCase($controller) );
  }

  private static function removeQueryString($url) // отбрасывает GET переменные
  {
    if($url){
      $params = explode("&", $url, 2);
      if( false === strpos($params[0], '=') ){
        return trim($params[0], '/');
      }else{
        return '';
      }
      
    }
  }

}