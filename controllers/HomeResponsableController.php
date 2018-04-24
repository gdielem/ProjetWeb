<?php
  /**
   *
   */
  class HomeResponsableController
  {

    function __construct($db)
    {
      $this->_db =$db;
    }
    function run(){
      $notification='';
      $typeNotification='';
      var_dump($_SESSION);;
      require_once(WAY_VIEWS .'homeResponsable.php');

  }
}

?>
