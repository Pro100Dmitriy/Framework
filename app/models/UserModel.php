<?php
namespace app\models;

class UserModel extends AppModel
{

  public $attributes = [
    'login' => '',
    'password' => '',
    'name' => '',
    'email' => '',
    'address' => '',
  ];

}