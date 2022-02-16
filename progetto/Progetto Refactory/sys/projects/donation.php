<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Donazione </title>
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

if(!isset($_POST['idprog']) || !isset($_POST['ammount'])){
  echo("Errore, riprova piu' tardi!");
  header("Refresh:2; url=/~S4750770/startSAW.php");
  echo "</div></div></div></div>";
  include "/chroot/home/S4750770/public_html/www/common/footer.php";
  exit();
}

  if(!isset($_SESSION['rid'])){
    echo("Devi essere loggato!");
    header("Refresh:2; url=/~S4750770/formlogin.php");
  }else{

  include  "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

  $query = "SELECT starterbits
            FROM saldo
            WHERE Utente_idUtente = ?
            ";

  include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

  include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

  include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) === 0){
    echo("Errore, riprova piu' tardi");
    header("Refresh:2; url=/~S4750770/www/projects/dettagliprogetto.php?prog=".$_POST['idprog']);
    echo "</div></div></div></div>";
    include "/chroot/home/S4750770/public_html/www/common/footer.php";
    exit();
  }

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if($row['starterbits'] - $_POST['ammount'] >= 0){

    include  "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

    $query = "SELECT finanzia.Ammount
              FROM finanzia
              WHERE Utente_idUtente = ?
              AND Progetto_idProgetto = ?
              ";

    include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "ii", $_SESSION["uid"], $_POST['idprog']);

    include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

    include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) === 0){

      include  "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

      mysqli_autocommit($conn, false);

      $query = "INSERT INTO finanzia
                VALUES(?,?,?)
                ";

      include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

      mysqli_stmt_bind_param($stmt, "iii", $_SESSION["uid"], $_POST['idprog'], $_POST['ammount']);

      include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

      include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

      $query= "UPDATE saldo
               SET starterbits = starterbits - ?
               WHERE Utente_idUtente = ?
               ";

      include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

      mysqli_stmt_bind_param($stmt, "ii", $_POST['ammount'], $_SESSION["uid"] );

      include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

      include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

      $query= "UPDATE sogliafinanziamento
               SET sogliaAttuale = sogliaAttuale + ?
               WHERE Progetto_idProgetto = ?
               ";

      include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

      mysqli_stmt_bind_param($stmt, "ii", $_POST['ammount'], $_POST['idprog'] );

      include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

      include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

      if ( mysqli_commit($conn) === false){
        echo("Errore, riprova più tardi!");
        header("Refresh:2; url=/~S4750770/www/projects/elencoprogetti.php");
        echo "</div></div></div></div>";
        include "/chroot/home/S4750770/public_html/www/common/footer.php";
        exit();
      }


    }else{

        include  "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

        mysqli_autocommit($conn, false);

        $query = "UPDATE finanzia
                  SET Ammount = Ammount + ?
                  WHERE Utente_idUtente = ?
                  AND Progetto_idProgetto = ?
                  ";

        include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "iii", $_POST['ammount'], $_SESSION["uid"], $_POST['idprog']);

        include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

        include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

        $query= "UPDATE saldo
                 SET starterbits = starterbits - ?
                 WHERE Utente_idUtente = ?
                 ";

        include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "ii", $_POST['ammount'], $_SESSION["uid"] );

        include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

        include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

        $query= "UPDATE sogliafinanziamento
                 SET sogliaAttuale = sogliaAttuale + ?
                 WHERE Progetto_idProgetto = ?
                 ";

        include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "ii", $_POST['ammount'], $_POST['idprog'] );

        include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

        include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

        if ( mysqli_commit($conn) === false){
          echo("Errore, riprova più tardi!");
          header("Refresh:2; url=/~S4750770/www/projects/elencoprogetti.php");
          echo "</div></div></div></div>";
          include "/chroot/home/S4750770/public_html/www/common/footer.php";
          exit();
        }

    }
  }else{
      echo("Saldo insufficiente :( ");
      header("Refresh:2; url=/~S4750770/www/account/caricosaldo.php");
      echo "</div></div></div></div>";
      include "/chroot/home/S4750770/public_html/www/common/footer.php";
      exit();
  }

  echo("Grazie per la donazione! :) ");
  header("Refresh:2; url=/~S4750770/www/projects/elencoprogetti.php");

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
