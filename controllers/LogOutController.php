<?php
  /**
   *
   */
  class LogOutController
  {

    function __construct()
    {
      // code...
    }
    function run(){
      $_SESSION=array();
      header("Location: index.php");
      die();
    }
  }

?>
