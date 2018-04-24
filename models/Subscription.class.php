<?php

  class Subscription{
    private $_date;
    private $_amount;
    private $_user_id;
    private $_paid;
    private $_subscription_id;

    function __construct($date,$amount,$user_id,$paid,$subscription_id){
      $this->_date = $date;
      $this->_amount = $amount;
      $this->_user_id = $user_id;
      $this->_paid = $paid;
      $this->_subscription_id = $subscription_id;

    }

    public function getDate(){
      return htmlspecialchars($this->_date);
    }
    public function getAmount(){
      return htmlspecialchars($this->_amount);
    }
    public function getUserID(){
      return htmlspecialchars($this->_user_id);
    }
    public function getPaid(){
      return htmlspecialchars($this->_paid);
    }
    public function getSubscriptionID(){
      return htmlspecialchars($this->_subscription_id);
    }
  }
?>
