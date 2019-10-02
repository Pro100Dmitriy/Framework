<?php

namespace fw\core;

class Registry
{

    use TSingleTone;

    public static $object = [];
    public static $propterties = [];
    

    protected function __construct()
    {

    }

    public function __get($name)
    {

    }

    public function __set($name, $value)
    {

    }

    public function setObject($name, $value)
    {
        self::$object[$name] = $value;
    }

    public function setProperty($name, $value)
    {
        self::$propterties[$name] = $value;
    }

    public function getProperty($name)
    {
        if( isset(self::$propterties[$name]) ){
            return self::$propterties[$name];
        }
        return null;
    }

    public function getObject($name)
    {
        return self::$object[$name];
    }

    public function getProperties()
    {
        return self::$propterties;
    }

    public function getObjects()
    {
        return self::$object;
    }

    public function createObjects()
    {
        foreach(self::$object as $k => $v){
            new $v;
        }
    }

    

}