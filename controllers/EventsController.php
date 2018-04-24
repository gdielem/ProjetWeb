<?php
  /**
   *
   */
  class EventsController{
    private $_db;
    function __construct($db)
    {
      $this->_db = $db;
    }
    function run(){
      $notification='';
      $typeNotification='';
      $events = $this->_db->select_events_id();

      if(!empty($_POST)){
        if(!empty($_POST['name_of_event'])&&!empty($_POST['date'])&&!empty($_POST['description'])&&!empty($_POST['price']))){
          if (!empty($_POST['description'])) {
            $this->_db->insert_event($_POST['name_of_event'],$_POST['price'],'organisateur',$_POST['date'],$_POST['description'],);
          }
          else {
          $this->_db->insert_event($_POST['name_of_event'],$_POST['date'],'',$_POST['price']);
        }
          $typeNotification = 'green';
          $notification = 'Votre demande d\'inscription à bien été enregistrer';
        }
        else {
          $notification='Veuillez remplir tous les champs obligatoires (*)';
          $typeNotification = 'red';
        }
      }
      require_once(WAY_VIEWS . 'events.php');

    }
  }

?>
