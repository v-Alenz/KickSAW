<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  if (file_exists('/path/al/mailer/PHPMailer-master/src/Exception.php') &&
      file_exists('/path/al/mailer/PHPMailer-master/src/PHPMailer.php') &&
      file_exists('/path/al/mailer/PHPMailer-master/src/SMTP.php')    ) {
    require_once '/path/al/mailer/PHPMailer-master/src/Exception.php';
    require_once '/path/al/mailer/PHPMailer-master/src/PHPMailer.php';
    require_once '/path/al/mailer/PHPMailer-master/src/SMTP.php';
  }else{
    include "/chroot/home/S4750770/public_html/sys/common/error/errore.php";
    exit();
  }

  if(isset($_SESSION["loggato"])){

  if(!empty($_POST['testoMail'])){

    //PHPMailer Object
    $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

    //Enable SMTP debugging.
    //$mail->SMTPDebug = 3;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password
    $mail->Username = "starterpunchofficial@gmail.com";
    $mail->Password = "Animalcrossing";
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to
    $mail->Port = 587;

    //From email address and name
    $mail->From = $sender['email'];
    $mail->FromName = $sender['nome']." ".$sender['cognome'];

    //To address and name
    //$mail->addAddress("recepient1@example.com", "Recepient Name");


      $mail->addAddress($destinatari[$i]['email']);
      //echo $destinatari[$i]['email'];


    //Address to which recipient will reply
    //$mail->addReplyTo("reply@yourdomain.com", "Reply");

    //CC and BCC
    //$mail->addCC("cc@example.com");
    //$mail->addBCC("bcc@example.com");

    //Send HTML or Plain Text email
    $mail->isHTML(true);

    $mail->Subject = "Newsletter StarterPunch! sul progetto ".$_POST['nomeProgetto'];
    $mail->Body =  $_POST['testoMail'];
    //$mail->AltBody = $_POST['testoMail'];


    try {
        $mail->send();
          //echo "Message has been sent successfully to ".$destinatario['email']."<br>";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;

    }

  }else{

    echo("Devi scrivere qualcosa ai tuoi follower!");
          echo"</div>";
      echo"</div>";
      echo"</div>";
    echo"</div>";
    include "/chroot/home/S4750770/public_html/www/common/footer.php";
    header("Refresh:2; url=/~S4750770/www/account/startup/tuttiprogetti.php");
    exit();


  }

}else{

  include "/chroot/home/S4750770/public_html/sys/common/error/errore.php";

}

?>
