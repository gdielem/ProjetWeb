<?php

  class MemberController{

    public function __construct($db){
      $this->_db =$db;
    }

    public function run(){
      $user = $this->_db->select_users_mail($_SESSION['email']);
      $_SESSION['id']=(int)$user[0]->getId();
      $currentUserId=$_SESSION['id'];
      var_dump($currentUserId);
      $participations = Db::getInstance()->get_all_participations($currentUserId);
      if(!empty($_POST['unsubscribe'])){
        $unsubscribe=$_POST['unsubscribe'];
        var_dump($unsubscribe);
        for($i = 0; $i < count($unsubscribe); $i ++){
          $num_event_unsubscribe = (int)$unsubscribe[$i];
          var_dump($num_event_unsubscribe);
          Db::getInstance()->delete_interested_event($num_event_unsubscribe);
        }
        $plan = $this->getPlan("models/Plan.csv");
        $notification='Vous êtes désinteressé d\'un évènement !';
        $typeNotification='green';
        require_once(WAY_VIEWS.'member.php');
      }
      $plan = $this->getPlan("models/Plan.csv");
      $notification='';
      $typeNotification='';
      require_once(WAY_VIEWS.'member.php');
    }

    function getPlan($csvfile){
      $plan = array();
      $content = file($csvfile);
      $maxSize = count($content);
      $i = 0;
      while($i <> $maxSize){
        $contentI = $content[$i];
        preg_match('/^(.*);(.*);(.*);(.*);(.*).*$/',$contentI,$result);
        $plan[$i]['date'] = $result[1];
        $plan[$i]['price'] = $result[2];
        $plan[$i]['name'] = $result[3];
        $plan[$i]['location']=$result[4];
        $plan[$i]['description']=$result[5];
        $i ++;
      }
      return $plan;
    }

  }



 ?>
