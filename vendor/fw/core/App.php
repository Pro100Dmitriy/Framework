<?php
namespace fw\core;

class App
{

    public static $app;

    public function __construct()
    {
        self::$app = Registry::instance();

        $this->getParams();
        self::$app->createObjects();
    }

    public function getParams()
    {
        $params = require_once CONFIG . '/autoload.php';
        if( !empty($params) ){
            foreach( $params['property'] as $param => $elem ){
                self::$app->setProperty($param, $elem);
            }
            foreach( $params['components'] as $param => $elem ){
                self::$app->setObject($param, $elem);
            }
        }
    }

}