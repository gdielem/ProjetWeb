<?php
  /**
   *
   */
  class Event{
    private $_num;
    private $_date;
    private $_name;
    private $_description;
    private $_location;
    private $_price;

    function __construct($num,$date,$name,$description,$location,$price)
    {
      $this->_num=$num;
      $this->_date=$date;
      $this->_name = $name;
      $this->_description=$description;
      $this->_location=$location;
      $this->_price = $price;
    }
    #Les getters :
    public function getNum(){
      return htmlspecialchars($this->_num);
    }
    public function getName(){
      return htmlspecialchars($this->_name);
    }
    public function getDate(){
      return htmlspecialchars($this->_date);
    }
    public function getDescription(){
      return htmlspecialchars($this->_description);
    }
    public function getPrice(){
      return htmlspecialchars($this->_price);
    }
    public function getLocation(){
      return htmlspecialchars($this->_location);
    }


    #Les setters :
    public function setNum($num){
      $this->_num=$num;
    }
    public function setName($name){
      $this->_name =$name;
    }
    public function setPrice($price){
      $this->_price =$price;
    }
    public function setLocation($location){
      $this->_location =$location;
    }
    public function setDate($dater){
      $this->_date=$date;
    }
    public function setDescritption($description){
      $this->_description=$description;
    }

  }

?>
