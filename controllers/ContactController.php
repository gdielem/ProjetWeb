<?php
  /**
   *
   */
  class ContactController
  {

    function __construct()
    {
      # code...
    }
    function run(){
      $notification='';
      $typeNotification='';

   if (!empty($_POST)) {
      if (empty($_POST['email']) && empty($_POST['message'])) {
         $notification='Entrez un email et un message non vides!';
      } elseif (empty($_POST['email'])) {
         $notification='Entrez un email non vide!';
      } elseif (empty($_POST['message'])) {
         $notification='Entrez un message non vide!';
      } else {
         $mail = new PHPMailer\PHPMailer\PHPMailer(true);// Utilisation du ‘namespace’ en PHP. Passing `true` enables exceptions
	$mail->SMTPOptions = array(
	   'ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true)
	);
	try {
	  //Email Server settings
	  $mail->SMTPDebug = 2; // Enable verbose debug output
	  $mail->isSMTP();             // Set mailer to use SMTP
  	  $mail->Host ='smtp.gmail.com';  // Specify main SMTP servers
	  $mail->SMTPAuth = true;             // Enable SMTP authentication
	  $mail->Username = 'guillaume.dieleman@gmail.com'; // SMTP username
	  $mail->Password = 'Richard01';                           // SMTP password
	  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	  $mail->Port = 587;                                    // TCP port to connect to
	  //Recipients
	  $mail->setFrom('guillaume.dieleman@gmail.com', 'Mailer'); // From
	  $mail->addAddress('guillaume.dieleman@gmail.com', 'Dieleman Guillaume');     // To recipient
	  $mail->addReplyTo(htmlspecialchars($_POST['email']), 'Sender'); // Adresse du client
	  //Content
	  $mail->isHTML(true);                                  // Set email format to HTML
	  $mail->Subject = 'Contact depuis le site des courreurs';
	  $mail->Body    = htmlspecialchars($_POST['message']);
	  $mail->AltBody = htmlspecialchars($_POST['message']);
	  $mail->send();
	  $notification='Vos informations ont été transmises avec succès.';
	} catch (Exception $e) {
	  $notification='Vos informations n\'ont pas été transmises. '.'Mailer Error: '.$mail->ErrorInfo;	}
      }
}
  $_POST['notification'] = $notification;
      require_once(WAY_VIEWS . 'contact.php');
    }
  }

?>
