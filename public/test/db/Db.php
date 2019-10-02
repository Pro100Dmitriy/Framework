<?php
namespace vendor\core;

class Db
{

  private $pdo;
  private static $instance;
  public static $countSql = 0;
  public static $queries = [];

  private function __construct()
  {
    $db = require_once ROOT . '/config/config_db.php';
    $option = [
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ];
    $this->pdo = new \PDO( $db['dsn'], $db['user'], $db['password'], $option );
  }

  public static function instance() //возвращает подключение к базе данных
  {
    if( self::$instance === null ){
      self::$instance = new self;
    }
    return self::$instance;
  }

  public function execute( $sql )
  {
    self::$countSql++;
    self::$queries = $sql;
    $stmt = $this->pdo->prepare( $sql );
    return $stmt->execute();
  }

  public function query( $sql )
  {
    self::$countSql++;
    self::$queries = $sql;
    $stmt = $this->pdo->prepare( $sql );
    $res = $stmt->execute();
    if( $res !== false ){
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    return [];
  }

}