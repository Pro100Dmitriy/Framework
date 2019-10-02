<?php


require_once '../vendor/fw/libs/function.php';
require_once '../config/init.php';
require_once ROOT . '/vendor/autoload.php';

use fw\core\Router;
use fw\core\App;

$url = $_SERVER['QUERY_STRING'];

new App();

Router::add('^post/?(?<alias>[a-z-]+)?$', ['controller' => 'post', 'action' => 'view'] );
Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$');

Router::despatch($url);
