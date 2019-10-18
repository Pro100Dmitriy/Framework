<?php
 
namespace fw\core\base;

abstract class Controller
{

  protected $route = []; // сюда записывается массив из controller и action
  protected $layout;
  protected $view; // сюда записывается action
  protected $vars; // сюда записывается контент
  protected $meta;

  public function __construct($route) // сюда из класса Router передаются все вызываемые в данный момент элементы и записываются в свойства объекта
  {
    $this->route = $route;
    $this->view = $route['action'];
    //include_once APP . "/views/{$this->view['controller']}/{$this->view['action']}.php";
  }

  public function getView()
  {
    $vOBJ = new View($this->route, $this->layout, $this->view, $this->meta); // вызывается метод view и передаются route(экшин и контроллер) layout(разметка) view(метод)
    $vOBJ->render($this->vars); // вызывает составление страницы
  }
  
  public function set($vars)
  {
    $this->vars = $vars; // получает контент и записывает в переменную
  }

  public function setMeta($meta = [])
  {
    $this->meta = $meta;
  }

  public function isAjax() // проверяет запрос пришел через ajax или нет, возвращает лиюо true либо false
  {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
  }

  public function laodView($view, $vars = [])
  {
    extract($vars);
    require APP . "/views/{$this->route['controller']}/{$view}.php";
    die;
  }

}