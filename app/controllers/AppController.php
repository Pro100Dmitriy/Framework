<?php

namespace app\controllers;
 
use fw\core\base\Controller;
use app\models\AppModel;
use app\widgets\currency\Currency;
use fw\core\App;
use fw\core\Cache;
use \RedBeanPHP\R as R;

class AppController extends Controller
{

    public function __construct($route) // так как задействуется controller то тут доступен $router
    {   
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty( 'currencies', Currency::getCurrencies() );
        App::$app->setProperty( 'currency', Currency::getCurrency( App::$app->getProperty('currencies') ) );
        //debug(App::$app->getProperties());
        //debug( App::$app->getProperty('currency')['value'] );
        App::$app->setProperty( 'cats', self::cacheCategory() );
        //debug(App::$app->getProperties());
    }    

    public static function cacheCategory()
    {
        $cats = Cache::get('cats');
        if( !$cats ){
            $cats = R::getAssoc("SELECT * FROM category");
            Cache::set('cats', $cats);
        }
        return $cats;
    }

}