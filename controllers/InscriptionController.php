<?php
  class InscriptionController{
    private $_db;

    public function __construct($db){
      	$this->_db = $db;
    }
    public function run(){
      $notification='';
      $typeNotification='';

      if(!empty($_POST)){
        if(!empty($_POST['name'])&&!empty($_POST['surname'])&&!empty($_POST['mail'])&&!empty($_POST['password'])&&!empty($_POST['adress'])&&!empty($_POST['MAX_FILE_SIZE'])&&!empty($_POST['bank'])){
          $adress = $_POST['adress'] . $_POST['city'] . $_POST['cp'] . $_POST['no'];
          $horodating=str_replace('.', '_',microtime(true));
          $destination = WAY_VIEWS . 'pictures/memberpictures/' . $horodating. basename($_FILES['userfile']['name']);
          $this->_db->insert_user($_POST['name'],$_POST['surname'],$_POST['mail'],$_POST['phone'],$adress,$_POST['bank'],$destination,'waiting',password_hash($_POST['password'], PASSWORD_BCRYPT));
          $typeNotification = 'green';
          $notification = 'Votre demande d\'inscription à bien été enregistrer';
          $origine = $_FILES['userfile']['tmp_name'];

						move_uploaded_file($origine,$destination);
        }
        else {
          $notification='Veuillez remplir tous les champs obligatoires (*)';
          $typeNotification = 'red';
        }
      }
      var_dump($_FILES);
        require_once(WAY_VIEWS . 'inscription.php');
    }
  }
?>
