<?php
  /**
   *
   */
  class User{
    private $_id;
    private $_mail;
    private $_name;
    private $_surname;
    private $_phone;
    private $_adress;
    private $_bank;
    private $_photo;
    private $_type;
    private $_password;


    function __construct($id,$name,$surname,$mail,$phone,$adress,$bank,$photo,$type,$password)
    {
      $this->_id = $id;
      $this->_name = $name;
      $this->_surname = $surname;
      $this->_mail = $mail;
      $this->_phone = $phone;
      $this->_adress = $adress;
      $this->_bank = $bank;
      $this->_photo =$photo;
      $this->_type = $type;
      $this->_password = $password;

    }
    #Les getters :
    public function getId(){
      return htmlspecialchars($this->_id);
    }
    public function getName(){
      return htmlspecialchars($this->_name);
    }
    public function getSurname(){
      return htmlspecialchars($this->_surname);
    }
    public function getMail(){
      return htmlspecialchars($this->_mail);
    }
    public function getPhone(){
      return htmlspecialchars($this->_phone);
    }
    public function getAddress(){
      return htmlspecialchars($this->_adress);
    }
    public function getBank(){
      return htmlspecialchars($this->_bank);
    }
    public function getPhoto(){
      return htmlspecialchars($this->_photo);
    }
    public function getType(){
      return htmlspecialchars($this->_type);
    }
    public function getPassword(){
      return htmlspecialchars($this->_password);
    }

    #Les setters :
    public function setName($name){
      $this->_name =$name;
    }
    public function setSurname($surname){
      $this->_surname = $surname;
    }
    public function setMail($mail){
      $this->_mail =$mail;
    }
    public function setPhone($phone){
      $this->_phone =$phone;
    }
    public function setAdress($adress){
      $this->_adress =$adress;
    }
    public function setBank($bank){
      $this->_bank = $bank;
    }
    public function setPhoto($photo){
      $this->_photo = $photo;
    }
    public function setType($type){
      $this->_type = $type;
    }
    public function setPassword($password){
      $this->_password =$password;
    }

  }

?>
