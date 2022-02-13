<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Become Premium </title>
    <link rel="stylesheet" type="text/css" href="/style.css">

    <?php
    include dirname(__FILE__)."/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include dirname(__FILE__)."/www/common/navbar.php";
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

  include dirname(__FILE__)."/sys/common/db/conn/connDbUtente.php";

  $query="UPDATE ruolo SET stato='pro', scadenzaLicenza=? WHERE Utente_idUtente = ?";

  include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "si", $expireDate, $_SESSION["uid"]);

  include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

  include dirname(__FILE__)."/sys/common/db/executequery.php";

  if ( mysqli_affected_rows($conn) === 0){
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/progetto/startSAW.php");
  }

  else{
    echo ("Sarà un piacere aiutarti coi tuoi progetti!");
    $_SESSION["rid"]='pro';
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

include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
