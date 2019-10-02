<?php

class ErrorHandler
{

  public function __construct()
  {

    if( DEBUG ){
      error_reporting(-1);
    }else{
      error_reporting(0);
    }
    set_error_handler([$this, "errorHandler"]);
    set_exception_handler([$this, 'exceptionHandler']);
    ob_start();
    register_shutdown_function([$this, 'fatalErrorHandler']);
  }

  public function errorHandler( $errNumber, $errMessage, $errFile, $errLine )
  {
    $this->displayErrors( 'Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode() );
    $this->displayErrors( $errNumber, $errMessage, $errFile, $errLine );
    return true;
  }

  public function exceptionHandler($e) 
  {
    $this->errorLog( 'Исключение', $e->getMessage(), $e->getFile(), $e->getLine() );
    $this->displayErrors( 'Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode() );
  }

  public function fatalErrorHandler()
  {
    $error = error_get_last();
    if( !empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR ) ){
      ob_end_clean();
      $this->displayErrors( 'Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode() );
      $this->displayErrors( $error['type'], $error['message'], $error['file'], $error['line'] ); 
    }else{
      ob_end_flush();
    }
  }

  public function errorLog( $errNumber, $errMessage, $errFile, $errLine )
  {
    $string = date('d F Y H:i:s') . ' | Номер: ' . $errNumber . ' | Текс: ' . $errMessage . ' | Файл: ' . $errFile . ' | Линия: ' . $errLine . "\n#################\n";
    error_log( $string, 3, __DIR__ . '/Error.log' );
  }

  public function displayErrors( $errNumber, $errMessage, $errFile, $errLine, $responce = 500 )
  {
    http_response_code( $responce );
    if( DEBUG ){
      require_once 'dev.php';
    }else{
      require_once 'prod.php';
    }
    die;
  }

}

new ErrorHandler();

test();
//try{
//  echo 'hello';
//throw new Exception("Контроллер \$controller не найден", 404);
//}catch(Exception $c){
  //var_dump($c);
//}