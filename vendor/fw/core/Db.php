<?php
namespace fw\core;

use \RedBeanPHP\R as R;

class Db
{

    protected static $instance;

    public static function instance()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function __construct()
    {
        $db = require_once CONFIG . '/config_db.php';
        class_alias('\RedBeanPHP\R','R');
        R::setup($db['dsn'], $db['user'], $db['password']); //подключение к базе данных
        if( !R::testConnection() ){ // проверка соединения
            throw new Exception('error bd', 500);
        }
        R::freeze(true);
        if(DEBUG){
            R::debug(true,1);
        }
    }
}