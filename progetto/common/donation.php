<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Donazione </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";
?>

<?php

  if(!isset($_SESSION['rid'])){
      die("Devi essere registrato");
  }

  include  $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

  $query = "SELECT starterbits
            FROM saldo
            WHERE Utente_idUtente = ?
            ";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if($row['starterbits'] - $_POST['ammount'] >= 0){

    include  $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

    $query = "SELECT finanzia.Ammount
              FROM finanzia
              WHERE Utente_idUtente = ?
              AND Progetto_idProgetto = ?
              ";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "ii", $_SESSION["uid"], $_POST['idprog']);

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) === 0){

      include  $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

      mysqli_autocommit($conn, false);

      $query = "INSERT INTO finanzia
                VALUES(?,?,?)
                ";

      include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

      mysqli_stmt_bind_param($stmt, "iii", $_SESSION["uid"], $_POST['idprog'], $_POST['ammount']);

      include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

      include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

      $query= "UPDATE saldo
               SET starterbits = starterbits - ?
               WHERE Utente_idUtente = ?
               ";

      include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

      mysqli_stmt_bind_param($stmt, "ii", $_POST['ammount'], $_SESSION["uid"] );

      include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

      include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

      $query= "UPDATE sogliafinanziamento
               SET sogliaAttuale = sogliaAttuale + ?
               WHERE Progetto_idProgetto = ?
               ";

      include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

      mysqli_stmt_bind_param($stmt, "ii", $_POST['ammount'], $_POST['idprog'] );

      include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

      include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

      if ( mysqli_commit($conn) === false){
        echo("Errore, riprova più tardi!");
        header("Refresh:2; url=/progetto/account/startup/creaprogetto.php");
      }


    }else{

        include  $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

        mysqli_autocommit($conn, false);

        $query = "UPDATE finanzia
                  SET Ammount = Ammount + ?
                  WHERE Utente_idUtente = ?
                  AND Progetto_idProgetto = ?
                  ";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "iii", $_POST['ammount'], $_SESSION["uid"], $_POST['idprog']);

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

        $query= "UPDATE saldo
                 SET starterbits = starterbits - ?
                 WHERE Utente_idUtente = ?
                 ";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "ii", $_POST['ammount'], $_SESSION["uid"] );

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

        $query= "UPDATE sogliafinanziamento
                 SET sogliaAttuale = sogliaAttuale + ?
                 WHERE Progetto_idProgetto = ?
                 ";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "ii", $_POST['ammount'], $_POST['idprog'] );

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

        if ( mysqli_commit($conn) === false){
          echo("Errore, riprova più tardi!");
          header("Refresh:2; url=/progetto/account/startup/creaprogetto.php");
        }

    }
  }else{
      die("sando insufficiente");
  }

?>

DONE!

<?php

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
