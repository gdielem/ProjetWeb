<?php
  /**
   *
   */
  class MemberController
  {
    private $_db;

    function __construct($db)
    {
      $this->_db = $db;
    }
    function run(){
      $notification='';
      $typeNotification='';

      $users = $this->_db->select_users_id();
      var_dump($_POST);
      foreach ($users as $key => $value) {
        if (!empty($_POST)) {
          if ($value->getMail() == $_POST['change']) {
            $this->_db->update_user($value->getName(),$value->getSurname(),$value->getMail(),$value->getPhone(),$value->getAddress(),$value->getBank(),$value->getPhoto(),$_POST['statut'],$value->getPassword());
          }
        }
      }
      $users = $this->_db->select_users_id();

      require_once(WAY_VIEWS . 'memberManagement.php');
    }
  }

 ?>
