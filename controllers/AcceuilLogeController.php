<?php
  /**
   *
   */
  class HomePageLogedController
  {
    private $_db;

    function __construct($db)
    {
      $this->_db = $db;
    }
    function run(){
      $user = $this->_db->select_users_mail($_SESSION['email']);

      require_once(WAY_VIEWS .)
    }
  }

?>
