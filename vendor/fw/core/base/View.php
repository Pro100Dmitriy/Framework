<?php

namespace fw\core\base;

class View
{

  public $route = [];
  public $layout; 
  public $view;
  public $meta;

  public function __construct($route, $layout = '', $view = '', $meta = '') // принимаются все переданные значения и записываются в переменные
  {
    $this->route = $route;
    $this->layout = $layout ?: LAYOUT; // если layout не указан устанавливается стандартная разметка
    $this->view = $view;
    $this->meta = $meta;
  }

  public function render($vars) //сначала создаёт контент потом разметку
  {
    if( is_array($vars) ) extract($vars);
    $file_view = APP . "/views/{$this->route['controller']}/{$this->route['action']}.php"; // сохраняет путь к контенту
    ob_start();
    if( is_file($file_view) ){ // если это файл
      // start if
      require_once $file_view; // подключается файл с контентом
      // end if
    }else{
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
    //debug($this->meta);
    if( !empty($this->meta) ){
      $meta = "<title>{$this->meta[0]}</title>\n\t<meta charset=\"utf-8\" />\n\t<meta name='description' content='{$this->meta[1]}'>\n\t<meta name='keywords' content='{$this->meta[2]}'>\n\t";
      return $meta;
    }
    return META;
  }

}