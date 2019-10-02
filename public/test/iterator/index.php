<?php

class Test
{
    public $x = 5;
    public $y = 6;
    private $z = 10;
    protected $pr = -5;
}

class MyArray implements Iterator
{

    private $arr = [
        'Name' => 'Dima',
        'age' => '18',
        'bd' => '16/02/2001'
    ];

    public function rewind()
    {
        #сбрасывает итератор, возвращение в нулевую поззицию.
        reset($this->arr);
    }

    public function current()
    {
        #подучение текущего значения.
        return current($this->arr);
    }

    public function key()
    {
        #текущий ключ.
        return key($this->arr);
    }

    public function next()
    {
        #получение следующего элемента участия.
        return next($this->arr);
    }

    public function valid()
    {
        #возвращает true/false в зависимости от того достигли мы конца итератора или нет.
        $key = key($this->arr);
        return ( $key !== null && $key !== false );
    }

}

$obj = new Test();

$obj2 = new MyArray();

foreach($obj as $key => $value){
    echo $key . " => " . $value . "<br>";
}

foreach($obj2 as $key => $value){
    echo $key . " => " . $value . "<br>";
}

$dir = new DirectoryIterator(dirname(__DIR__) . '/error');
foreach( $dir as $file ){
    echo $file->getFilename() . '<br>'; 
    if( $file->isFile() ) echo  '-' . $file->getSize() . ' - ';
}


class ExtensionFilter extends FilterIterator
{

    private $ext;
    private  $it;

    public function __construct(DirectoryIterator $it, $ext)
    {
        parent::__construct($it);
        $this->it = $it;
        $this->ext = $ext;
    }
    public function accept()
    {
        if( !$this->it->isDir() ){
            echo pathinfo($this->current(), PATHINFO_EXTENSION); //выделяет из пути нужный отрывок взависимости от 2 параметра
            $ext = pathinfo($this->current(), PATHINFO_EXTENSION);
            return $ext != $this->ext;
        }
        return true;
    }

}

$filter = new ExtensionFilter( new DirectoryIterator('.'), 'php' );
foreach($filter as $file){
    echo $file . "<br>";
}