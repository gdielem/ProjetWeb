<?php

  class PayController{

    function __construct(){

    }

    function run(){
      $valueGift=0;
      if(!empty($_POST['giftButton'])){
        if($_POST['gift']==0){
          $typeNotification='red';
          $notification='Vous ne pouvez pas faire un don nul !';
          require_once(WAY_VIEWS.'pay.php');
        }
        else{
        $notification='Valeur enregistrée, vous pouvez désormais appuyez sur l\'image de paypal';
        $typeNotification='green';
        $valueGift=$_POST['gift'];
        require_once(WAY_VIEWS.'pay.php');
      }
      }
      $notification='Pour faire un don, sélectionnez d\'abord le montant que vous voulez envoyer.';
      $typeNotification='red';
      require_once(WAY_VIEWS.'pay.php');
    }


  }



 ?>
