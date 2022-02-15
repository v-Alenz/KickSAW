<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Trova dati mail </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include "/chroot/home/S4750770/public_html/www/common/navbar.php";
?>


<div class="account-page">
    <div class="container">
        <div class="col-2">
            <div class="form-container msg">


<?php
  if(isset($_POST["nomeProgetto"])){
    //trovo dati sender
    include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

    $query= "SELECT email, nome, cognome FROM utente WHERE idUtente = ?";

    include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"] );

    include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

    include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) ===  0){

      echo("Errore, riprova più tardi!");
      header("Refresh:2; url=/~S4750770/www/account/startup/scriviMail.php");

    }else{

      $sender= mysqli_fetch_array($res, MYSQLI_ASSOC);

      //trovo mail dei follower
      //include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

      $query= "SELECT email FROM utente
              JOIN maillist ON utente.idUtente = maillist.Utente_idUtente
              JOIN progetto ON maillist.MailList_idProgetto = progetto.idProgetto
              WHERE progetto.nome = ?";

      include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

      mysqli_stmt_bind_param($stmt, "s", $_POST['nomeProgetto'] );

      include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

      include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

      $receivers=mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($receivers) ===  0){

        echo("Non c'è nessuno iscritto alla tua newsletter :( !");
        header("Refresh:2; url=/~S4750770/www/account/startup/tuttiprogetti.php");

      }else{

        //echo mysqli_num_rows($receivers);

          $i = 0;
          for ( $i ; $i < mysqli_num_rows($receivers) ; $i++){

            $destinatari[$i] =  mysqli_fetch_array($receivers, MYSQLI_ASSOC);
            //echo $destinatari[$i]['email'];

          }

          $i = 0;

          for ( $i ; $i < mysqli_num_rows($receivers) ; $i++){

            //include "/chroot/home/S4750770/public_html/sys/account/startup/sendMail.php";

          }

          echo "Messaggio inviato con successo";
          header("Refresh:2; url=/~S4750770/www/account/startup/tuttiprogetti.php");

      }
    
    }

  } else{

    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/~S4750770/www/account/startup/tuttiprogetti.php");

  }
?>


            </div>
        </div>
    </div>
</div>


<?php
include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
