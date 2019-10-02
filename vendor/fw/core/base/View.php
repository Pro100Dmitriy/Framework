<?php

namespace fw\core\base;

class View
{

  public $route = [];
  public $layout; 
  public $view;
  public $meta;

  public function __construct($route, $layout = '', $view = '') // принимаются все переданные значения и записываются в переменные
  {
    $this->route = $route;
    $this->layout = $layout ?: LAYOUT; // если layout не указан устанавливается стандартная разметка
    $this->view = $view;
  }

  public function render($vars) //сначала создаёт контент потом разметку
  {
    if( is_array($vars) ) extract($vars);
    $file_view = APP . "/views/{$this->route['controller']}/{$this->route['action']}.php"; // сохраняет путь к контенту
    ob_start();
    if( is_file($file_view) ){ // если это файл
      debug($file_view);
      // start if
      require_once $file_view; // подключается файл с контентом
      // end if
    }else{
      debug($file_view);
      throw new \Exception('Такой вид не найден', 404);
    }
    $content = ob_get_clean(); // сюда записывается контент
    //layout Conect
    $file_layout = APP . "/views/layout/{$this->layout}.php"; // сооставляет путь к разметке страницы
    if( is_file($file_layout) ){
      //start if
      require_once $file_layout; // подключение разметки
      //end if
    }else{
      throw new \Exception('Такой шаблон не найден', 404);
    }
  }

  public function getMeta()
  {
    return META;
  }

}