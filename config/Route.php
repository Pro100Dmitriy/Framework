<?php
use fw\core\Router;

// user route

Router::add('^product/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);



// default route
Router::add('^post/?(?<alias>[a-z-]+)?$', ['controller' => 'post', 'action' => 'view'] );
Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$');