<?php
namespace app\widgets\currency;

use \RedBeanPHP\R as R;
use fw\core\App;

class Currency
{

    protected $tpl; // шаблон виджета
    protected $currencies; // все доступные валюты
    protected $currency; // текущая валюта

    public function __construct()
    {
        $this->tpl = __DIR__ . '/currency_tpl/currency.php';
        $this->run();
    }

    protected function run() // получает текущую валюту и список всех валют и запускает метод прорисовки валют
    {
        $this->currencies = App::$app->getProperty('currencies');
        $this->currency = App::$app->getProperty('currency');
        echo $this->getHtml(); // выводит построеный html код
    }

    public static function getCurrencies() //  достает из базы данных массив валют
    {
        return R::getAssoc('SELECT code, title, symbol_left, symbol_right, value, base FROM currency ORDER BY base DESC');
    }

    public static function getCurrency($currencies) //достают из всех валют текущую валюту или ставит по умолчанию
    {
        if( isset( $_COOKIE['currency'] ) && array_key_exists( $_COOKIE['currency'] , $currencies) ){
            $key = $_COOKIE['currency'];
        }else{
            $key = key($currencies); // записывает название текущего ключа массива           
        }
        $currency = $currencies[$key];
        $currency['code'] = $key;
        return $currency;
    }

    protected function getHtml() // возвращает html код
    {   
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}
 