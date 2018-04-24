<?php

  class AccountController{

    public function __construct(){

    }

    public function run(){

      $user=Db::getInstance()->get_user($_SESSION['email']);
      if(!empty($_POST['buttonUpdate'])){
        $idUser=$user->getId();
        Db::getInstance()->update_member($_POST['name'],$_POST['surname'],$_POST['mail'],$_POST['phone'],$_POST['address'],$_POST['bank'],$_POST['photo'],$_POST['password']);
        $_SESSION['email']=$_POST['mail'];
      }
      $user=Db::getInstance()->get_user($_SESSION['email']);
      require_once(WAY_VIEWS.'account.php');


    }
  }



 ?>
