<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Become Admin </title>
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
if(isset($_POST["submit"])){

  // settare la data di scadenza alla data corrente di due anni dopo
  $thisYear=substr(date("Y/m/d"), 0, 4);
  $yearExp=$thisYear+2;
  $expireDate=str_replace($thisYear, $yearExp, date("Y-m-d"))." 00:00:00";

  include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

  $query="UPDATE ruolo SET stato='admin', scadenzaLicenza=? WHERE Utente_idUtente = ?";

  include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "si", $expireDate, $_SESSION["uid"]);

  include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

  include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

  if ( mysqli_affected_rows($conn) === 0){
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/~S4750770/startSAW.php");
  }

  else{
    echo ("Sarà un piacere lavorare con te!");
    $_SESSION["rid"]='admin';
    header("Refresh:2; url=/~S4750770/startSAW.php");
  }
}

else{

  echo("Errore, riprova più tardi!");
  header("Refresh:2; url=/~S4750770/startSAW.php");

}?>


              </div>
          </div>
      </div>
</div>


<?php

include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
