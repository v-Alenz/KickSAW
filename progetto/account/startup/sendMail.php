
<?php

//LETTERALMENTE COPIA E INCOLLA DA INTERNET
//composer require phpmailer/phpmailer -----> PER INSTALLARE

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require_once "vendor/autoload.php";

if(/*isset($sender) && isset($destinatario) &&*/ !empty($_POST['testoMail'])){
  //PHPMailer Object
  $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

  //From email address and name
  $mail->From = $sender[email];
  $mail->FromName = $sender[nome]." ".$sender[cognome];
  echo "1";
  //To address and name
  //$mail->addAddress("recepient1@example.com", "Recepient Name");
  $mail->addAddress($destinatario); //Recipient name is optional

  //Address to which recipient will reply
  //$mail->addReplyTo("reply@yourdomain.com", "Reply");

  //CC and BCC
  //$mail->addCC("cc@example.com");
  //$mail->addBCC("bcc@example.com");

  //Send HTML or Plain Text email
  $mail->isHTML(false);
  echo "2";
  $mail->Subject = "Newsletter StarterPunch! sul progetto ".$_POST['nomeProgetto'];
  //$mail->Body = "<i>Mail body in HTML</i>";
  $mail->AltBody = $_POST['testoMail'];
  echo "3";
  try {
      $mail->send();
      echo "Message has been sent successfully to ".$destinatario."<br>";
  } catch (Exception $e) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  }
}
else{

  echo "Non ricevo le coseh";

}
