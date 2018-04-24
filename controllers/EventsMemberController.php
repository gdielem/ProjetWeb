<?php

/**
 *
 */
class EventsMemberController{
  private $_db;
  function __construct($db){
    $this->_db = $db;
  }

  function run(){
    if(!empty($_POST)){
      $events=Db::getInstance()->get_all_events();
      if(!empty($_POST['interested'])){
        $interested=$_POST['interested'];
        for($i = 0; $i < count($interested); $i ++){
          $nu = $interested[$i];
          $user = $_SESSION['id'];
          $date_event = $events[$nu-1]->getDate();
          $name = $events[$nu-1]->getName();
          $price = $events[$nu-1]->getPrice();
          $location = $events[$nu-1]->getLocation();
          $description = $events[$nu-1]->getDescription();
          $num_event = (int)$events[$nu-1]->getNum();
          $interested = 1;
          $take_part = 0;
          $paid = 0;
          if(Db::getInstance()->check_event($num_event) == null){
            Db::getInstance()->add_participation($user,$name,$price,$date_event,$location,$description,$num_event,$interested,$interested,$take_part,$paid);
            $notification='Vous êtes interessé par un évènement !';
            $typeNotification='green';
          }
          else{
            $notification='Vous êtes déjà interéssé par cet évènement!';
            $typeNotification='red';
          }
        }
        require_once(WAY_VIEWS.'eventsMember.php');
      }
      if(!empty($_POST['takePart'])){
        $events=Db::getInstance()->get_all_events();
        $takePart = $_POST['takePart'];
        for($i = 0; $i < count($takePart); $i ++){
          $nu = $takePart[$i];
          $user = $_SESSION['id'];
          $date_event = $events[$nu-1]->getDate();
          $name = $events[$nu-1]->getName();
          $price = $events[$nu-1]->getPrice();
          $location = $events[$nu-1]->getLocation();
          $description = $events[$nu-1]->getDescription();
          $num_event = $events[$nu-1]->getNum();
          $interested = 0;
          $take_part = 1;
          $paid = 0;
          if(Db::getInstance()->check_event($num_event) == null){
            Db::getInstance()->add_participation($user,$name,$price,$date_event,$location,$description,$num_event,$interested,$interested,$take_part,$paid);
            $notification='Vous participez à un évènement !';
            $typeNotification='green';
          }
          else{
            $notification='Vous vous êtes déjà inscrit à cet évènement !';
            $typeNotification='red';
          }
        }
        require_once(WAY_VIEWS.'eventsMember.php');
      }
    }
    $notification='';
    $typeNotification='';
    $events=Db::getInstance()->get_all_events();
    require_once(WAY_VIEWS.'eventsMember.php');
  }


}

 ?>
