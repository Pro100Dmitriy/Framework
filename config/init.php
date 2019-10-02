<?php

define( 'DEBUG' , 1  );
define( 'CORE' , dirname(__DIR__) . "/vendor/fw/core");
define( 'LIBS' , dirname(__DIR__) . "/vendor/fw/libs");
define( 'ROOT' , dirname(__DIR__) );
define( 'WWW' , ROOT . '/public' );
define( 'CONFIG' , dirname(__DIR__) . "/config" );
define( 'APP' , dirname(__DIR__) . "/app" );
define( 'WIDGETS' , dirname(__DIR__) . "/app/widgets" );
define( 'LAYOUT' , "luxery_watchs" );
define( 'CACHE', ROOT . '/tmp/cache' );
define( 'META', "<title>Luxury Watches</title>\n\t<meta charset=\"utf-8\" />" );


$RouterAdd = [
    "'^post/?(?<alias>[a-z-]+)?$', ['controller' => 'post', 'action' => 'view']",
    "'^$', ['controller' => 'main', 'action' => 'index']",
    "'^(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$'"
];

//Router::add('^post/?(?<alias>[a-z-]+)?$', ['controller' => 'post', 'action' => 'view'] );

//Router::add('^$', ['controller' => 'main', 'action' => 'index']);
//Router::add('^(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$');
