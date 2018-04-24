<?php
  /**
   *
   */
  class HomePageUnloggedController
  {
    private $_db;

    function __construct($db)
    {
      	$this->_db = $db;
    }
    function run(){
      $notification='';
      $typeNotification='';
  #QUAND LA DB SERA OK UTILISER CE QUI SUIT
      # L'utilisateur s'est-il bien authentifié ?
      if (empty($_POST)) {
        # L'utilisateur doit remplir le formulaire

      } elseif (!$this->_db->validate_user($_POST['email'],$_POST['password'])) {
        # L'authentification n'est pas correcte
        $notification='La combinaison de ce mot de passe avec cet email n\'est pas valide';
        $typeNotification='red';
      } else {
        # L'utilisateur est bien authentifié
        # Une variable de session $_SESSION['authentifie'] est créée
        $user= $this->_db->select_users_mail($_POST['email']);
        $_SESSION['id'] = $user[0]->getId();
        $_SESSION['name'] = $user[0]->getName();
        $_SESSION['surname'] = $user[0]->getSurname();
        $_SESSION['email'] = $user[0]->getMail();
        $_SESSION['type'] = $user[0]->getType();

        $notification='La connexion s\'est effectuée avec succes';
        $typeNotification='green';
        # Redirection HTTP pour demander la page admin
        header("Location: index.php?action=special");
        die();
      }
    #Pour tester en attendant la db :
  /*  if(!empty($_POST)){
      if(!empty($_POST['email'])&&!empty($_POST['mdp'])){
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        if($email = 'guillaume.dieleman@hotmail.com' && $mdp = "mdp"){
          header("Location: index.php?action=homeResponsable");
          die();
        }
      }
    }
    */

  require_once(WAY_VIEWS .'homePageUnlogged.php');
}
}

?>
