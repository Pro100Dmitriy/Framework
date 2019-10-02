<?php
namespace fw\core; 

class ErrorHandler
{

  public function __construct()
  {

    if( DEBUG ){ 
      error_reporting(-1); // устанавливает какие ошибки будут показыватся
    }else{
      error_reporting(0);
    }
    set_error_handler([$this, "errorHandler"]); // устанавливает пользовательский обработчик ошибок
    set_exception_handler([$this, 'exceptionHandler']); // устанавливает пользовательский обработчик иссключений
    ob_start();
    register_shutdown_function([$this, 'fatalErrorHandler']); // устанавливает функцию которая выполняется при щавершении работы скрипта
  }

  public function errorHandler( $errNumber, $errMessage, $errFile, $errLine )
  {
    $this->errorLog( $errNumber, $errMessage, $errFile, $errLine );
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
    $error = error_get_last(); // возварщает информация о последней ошибке в виде массива
    if( !empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR ) ){
      ob_end_clean();
      $this->errorLog( $error['type'], $error['message'], $error['file'], $error['line'] );
      $this->displayErrors( $error['type'], $error['message'], $error['file'], $error['line'] ); 
    }else{
      ob_end_flush();
    }
  }

  public function errorLog( $errNumber, $errMessage, $errFile, $errLine )
  {
    $string = date('d F Y H:i:s') . ' | Номер: ' . $errNumber . ' | Текс: ' . $errMessage . ' | Файл: ' . $errFile . ' | Линия: ' . $errLine . "\n#################\n";
    error_log( $string, 3, ROOT . '/tmp/Error.log' ); // записывыает информацию об ошибке в файл
  }

  public function displayErrors( $errNumber, $errMessage, $errFile, $errLine, $responce = 500 ) // перенаправляет на нужную страницу при ошибке
  {
    http_response_code( $responce );
    if( DEBUG ){
      require_once  ROOT . '/public/errors/dev.php';
    }else{
      require_once  ROOT . '/public/errors/404.php';
    }
    die;
  }

}
