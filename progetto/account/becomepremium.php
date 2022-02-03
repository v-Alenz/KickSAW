<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Become Premium </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";

if(isset($_POST["submit"])){

  include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

  $query="UPDATE ruolo SET stato='pro' WHERE Utente_idUtente = ?";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

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

    include  $_SERVER['DOCUMENT_ROOT']."/progetto/account/errora.php";
}

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
