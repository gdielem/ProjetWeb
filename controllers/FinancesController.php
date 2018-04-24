<?php

/**
 *
 */
class FinancesController
{
  private $_db;
  function __construct($db)
  {
    $this->_db = $db;
  }
  public function run()
  {
    $typeNotification='';
    $notification='';
    $subscriptions = $this->_db->select_subscription_id();
    require_once(WAY_VIEWS . 'finances.php');
  }
}
 ?>
