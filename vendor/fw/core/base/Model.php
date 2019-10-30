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

    public function load($data)
    {
        foreach($this->attributes as $kay => $value){
            if(isset($data['name'])){
                $this->attributes['name'] = $data['name'];
            }
        }
    }

}