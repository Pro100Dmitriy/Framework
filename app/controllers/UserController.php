<?php
namespace app\controllers;

use app\models\UserModel;

class UserController extends AppController
{

  public function loginAction()
  {

  
  }

  public function signupAction()
  {
    if(!empty($_POST)){
      $user = new UserModel;
      $data = $_POST;
      $user->load($data);
      if($user){
        debug($user);
      }
      die;
    }
  }

  public function profileAction()
  {

  }

  public function logoutAction()
  {

  }

}