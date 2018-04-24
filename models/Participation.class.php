<?php

  class Participation{
    private $_user;
    private $_num_event;
    private $_date;
    private $_name;
    private $_description;
    private $_location;
    private $_price;
    private $_interested;
    private $_take_part;
    private $_paid;


    function __construct($user,$num_event,$date,$name,$description,$location,$price,$interested,$take_part,$paid){
      $this->_user=$user;
      $this->_num_event=$num_event;
      $this->_date=$date;
      $this->_name=$name;
      $this->_description=$description;
      $this->_location=$location;
      $this->_price=$price;
      $this->_interested=$interested;
      $this->_take_part=$take_part;
      $this->_paid=$paid;
    }

    public function getUser(){
      return $this->_user;
    }
    public function getNumEvent(){
      return htmlspecialchars($this->_num_event);
    }
    public function getName(){
      return ($this->_name);
    }
    public function getDate(){
      return htmlspecialchars($this->_date);
    }
    public function getDescription(){
      return htmlspecialchars($this->_description);
    }
    public function getPrice(){
      return ($this->_price);
    }
    public function getLocation(){
      return htmlspecialchars($this->_location);
    }
    public function getInterested(){
      return $this->_interested;
    }
    public function getTakePart(){
      return $this->_take_part;
    }
    public function getPaid(){
      return $this->_paid;
    }

    public function setUser($user){
      $this->_user=$user;
    }
    public function setEvent($event){
      $this->_event=$event;
    }
    public function setInterested($interested){
      $this->_interested=$interested;
    }
    public function setTakePart($take_part){
      $this->_take_part=$take_part;
    }
    public function setPaid($paid){
      $this->_paid=$paid;
    }
  }
  ?>
