<?php
namespace app\widgets\menu;

use fw\core\App;
use fw\core\Cache;
use R;

class Menu
{

    protected $data; // для данных
    protected $three; //массив дерева который будет строиться из данных
    protected $menuHTML;
    protected $tpl; //шаблон необходимый использовать для менюшки
    protected $container = 'ul'; // контейнер который будет использоваться для нашего меню
    protected $class = 'ishopClass';
    protected $class_child = 'first_child';
    protected $table = 'category'; // таблица базы данных из которой надо будет выбирать данные
    protected $cache = 3600;
    protected $cache_key = 'ishopMenu'; // имя под которыс будут сохраняться данные кэша
    protected $attrs = []; // массив дополгительных атрибутов для меню
    protected $prepend = ''; // понадопиться для админки

    public function __construct( $options = [] )
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOption($options);
        $this->run();
        //debug($this->three);
    }

    private function getOption( $options )
    {
        foreach($options as $option => $value){
            if( property_exists($this, $option) ){
                $this->$option = $value;
            }
        }
    }

    private function run( )
    {
        $this->menuHTML = Cache::get($this->cache_key);
        if(!$this->menuHTML){
            $this->data = App::$app->getProperty('cats');
            if( !$this->data ){
                $this->data = R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->three = $this->getThree();
            $this->menuHTML = $this->getMenuHTML($this->three);
            if($this->cache){
                Cache::get($this->cache_key, $this->menuHTML, $this->cache);
            }
        }
        $this->output();
    }

    protected function output()
    {
        echo "<{$this->container} class = \"{$this->class}\">";
            echo $this->menuHTML;
        echo "</{$this->container}>";
    }

    protected function getThree()
    {
        $three = [];
        $data = $this->data;
        foreach( $data as $id => &$node ){
            if(!$node['parent_id']){
                $three[$id] = &$node;
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $three;
    }

    protected function getMenuHTML($three, $tab = '')
    {
        $str = '';
        foreach($three as $id => $categpry){
            $str .= $this->catToTemplate($categpry, $tab, $id);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
    
}