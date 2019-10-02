<?php 
namespace fw\core\base;

use fw\core\Db;

abstract class Model
{

    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct() // подключение к базе данных
    {
        Db::instance(); //затрагивание классы Db
    }

}