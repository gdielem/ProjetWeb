<?php

   session_start();

   $time_start = microtime(true);

   define('WAY_VIEWS','views/');
   define('CONTROLLERS','controllers/');

   date_default_timezone_set('Europe/Brussels');
   $date = date("j/m/Y");
   $hour = date("H:i:s");

   //function loadClass($class){

   function loadClass($class) {
 		require_once 'models/' . $class . '.class.php';
 	}
  spl_autoload_register('loadClass');
  $db=Db::getInstance();

   $action = (isset($_GET['action'])) ? htmlentities($_GET['action']) : 'default';
   #PHPMailer
   require 'lib/PHPMailer/src/Exception.php';
   require 'lib/PHPMailer/src/PHPMailer.php';
   require 'lib/PHPMailer/src/SMTP.php';
   # Connexion à la db;



   switch($action){
     case 'inscription':
     if (!empty($_SESSION)&&$_SESSION['type']=='special') {
      require_once(WAY_VIEWS .'headerResponsable.php');
     }
     elseif (!empty($_SESSION)&&$_SESSION['type']=='membre'){
       require_once(WAY_VIEWS.'headerMember.php');
     }
     else {
       require_once(WAY_VIEWS.'headerUnlogged.php');
     }
      require_once(CONTROLLERS.'InscriptionController.php');
      $controller = new InscriptionController($db);
      break;

     case 'contact':
     if (!empty($_SESSION)&&$_SESSION['type']=='special') {
      require_once(WAY_VIEWS .'headerResponsable.php');
     }
     elseif (!empty($_SESSION)&&$_SESSION['type']=='membre'){
       require_once(WAY_VIEWS.'headerMember.php');
     }
     else {
       require_once(WAY_VIEWS.'headerUnlogged.php');
     }
      require_once(CONTROLLERS.'ContactController.php');
      $controller = new ContactController();
      break;

    case 'special':
    if (!empty($_SESSION)&&$_SESSION['type']=='special') {
     require_once(WAY_VIEWS .'headerResponsable.php');
    }
    elseif (!empty($_SESSION)&&$_SESSION['type']=='membre'){
      require_once(WAY_VIEWS.'headerMember.php');
    }
    else {
      require_once(WAY_VIEWS.'headerUnlogged.php');
    }
    require_once(CONTROLLERS.'HomeResponsableController.php');
    $controller = new HomeResponsableController($db);
    break;

    case 'events':
    if (!empty($_SESSION)&&$_SESSION['type']=='special') {
     require_once(WAY_VIEWS .'headerResponsable.php');
    }
    elseif (!empty($_SESSION)&&$_SESSION['type']=='membre'){
      require_once(WAY_VIEWS.'headerMember.php');
    }
    else {
      require_once(WAY_VIEWS.'headerUnlogged.php');
    }
    require_once(CONTROLLERS.'EventsController.php');
    $controller = new EventsController($db);
      break;

    case 'memberManagement':
    if (!empty($_SESSION)&&$_SESSION['type']=='special') {
     require_once(WAY_VIEWS .'headerResponsable.php');
    }
    elseif (!empty($_SESSION)&&$_SESSION['type']=='membre'){
      require_once(WAY_VIEWS.'headerMember.php');
    }
    else {
      require_once(WAY_VIEWS.'headerUnlogged.php');
    }
    require_once(CONTROLLERS .'MemberManagementController.php');
    $controller = new MemberController($db);
      break;

    case 'member':
    if (!empty($_SESSION)&&$_SESSION['type']=='special') {
     require_once(WAY_VIEWS .'headerResponsable.php');
    }
    elseif (!empty($_SESSION)&&$_SESSION['type']=='membre'){
      require_once(WAY_VIEWS.'headerMember.php');
    }
    else {
      require_once(WAY_VIEWS.'headerUnlogged.php');
    }
    require_once(CONTROLLERS.'MemberController.php');
    $controller=new MemberController($db);
      break;

    case 'account':
    if (!empty($_SESSION)&&$_SESSION['type']=='special') {
     require_once(WAY_VIEWS .'headerResponsable.php');
    }
    elseif (!empty($_SESSION)&&$_SESSION['type']=='membre'){
      require_once(WAY_VIEWS.'headerMember.php');
    }
    else {
      require_once(WAY_VIEWS.'headerUnlogged.php');
    }
    require_once(CONTROLLERS.'AccountController.php');
    $controller=new AccountController();
      break;

    case 'eventsMember':
    if (!empty($_SESSION)&&$_SESSION['type']=='special') {
     require_once(WAY_VIEWS .'headerResponsable.php');
    }
    elseif (!empty($_SESSION)&&$_SESSION['type']=='membre'){
      require_once(WAY_VIEWS.'headerMember.php');
    }
    else {
      require_once(WAY_VIEWS.'headerUnlogged.php');
    }
    require_once(CONTROLLERS.'EventsMemberController.php');
    $controller=new EventsMemberController($db);
      break;

    case 'pay':
    if (!empty($_SESSION)&&$_SESSION['type']=='special') {
     require_once(WAY_VIEWS .'headerResponsable.php');
    }
    elseif (!empty($_SESSION)&&$_SESSION['type']=='membre'){
      require_once(WAY_VIEWS.'headerMember.php');
    }
    else {

    }
    require_once(CONTROLLERS.'PayController.php');
    $controller=new PayController();
      break;

    case 'logout':
    require_once(CONTROLLERS .'LogOutController.php');
    $controller=new LogOutController();
    break;

    case 'finance':
    if (!empty($_SESSION)&&$_SESSION['type']=='special') {
     require_once(WAY_VIEWS .'headerResponsable.php');
     require_once(CONTROLLERS .'FinancesController.php');
     $controller = new FinancesController($db);
    }
    else{
      require_once(WAY_VIEWS.'headerUnlogged.php');
      $typeNotification = 'red';
      $notification = 'Vous avez etez deconnecter car vous tentez d\' acceder à du contenu non autorisé';
      require_once(CONTROLLERS.'HomePageUnloggedController.php');
      $controller = new HomePageUnloggedController($db);
    }
      break;

    default:
      $_SESSION=array();
      require_once(WAY_VIEWS.'headerUnlogged.php');
      require_once(CONTROLLERS.'HomePageUnloggedController.php');
      $controller = new HomePageUnloggedController($db);
      break;
   }

   $controller->run();

  $time_end = microtime(true);
  $time = round(($time_end - $time_start)*1000,3);

 	require_once(WAY_VIEWS.'footer.php');


 ?>
