<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Become Admin </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";
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

  include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

  $query="UPDATE ruolo SET stato='admin', scadenzaLinceza=? WHERE Utente_idUtente = ?";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "si", $expireDate, $_SESSION["uid"]);

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

  if ( mysqli_affected_rows($conn) === 0){
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/progetto/startSAW.php");
  }

  else{
    echo ("Sarà un piacere lavorare con te!");
    $_SESSION["rid"]='admin';
    header("Refresh:2; url=/progetto/startSAW.php");
  }
}

else{

  echo("Errore, riprova più tardi!");
  header("Refresh:2; url=/progetto/startSAW.php");

}?>


              </div>
          </div>
      </div>
</div>


<?php

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
