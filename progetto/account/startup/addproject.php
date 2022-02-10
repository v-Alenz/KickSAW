<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title> Creazione Startup </title>
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
    /*if(!isset($_SESSION)){
      session_start();
    }*/

    if(isset($_POST['submit'])){

      $titolo = trim($_POST['titolo']);
      $intro = trim($_POST['intro']);
      $descr = trim($_POST['descr']);
      $obj = trim($_POST['obiettivo']);
      $date = str_replace('T', ' ', trim($_POST['expire']).":00");

      if(!empty($titolo) && !empty($intro) && !empty($descr) && !empty($obj) && !empty($date)){

        include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/verificatitolo.php";

        if(is_numeric($obj) && strlen($titolo) < 100 && strlen($descr) < 1000 && strlen($descr) < 10000 && $obj>0){

          include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

          //creo il progetto
          $query="INSERT INTO progetto (Utente_idUtente, nome, introduzione, descrizione)
                  VALUES( ?, ?, ?, ?)";

          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

          mysqli_stmt_bind_param($stmt, "isss", $_SESSION['uid'], $titolo, $intro, $descr);

          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";
          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";
          //echo 'ho eseguito la query<br>';

          if ( mysqli_affected_rows($conn) === 0){

            echo("Errore, riprova più tardi!");
            header("Refresh:2; url=/progetto/account/startup/creaprogetto.php");

        }else{

          //imposto la soglia da raggiungere
// NOTA BENE: Siccome la chiave per progetti (IdProgetto) e' autogenerato e ignoro il suo valore
//            uso per identificare il progetto la chiave alternativa progetto.nome
          $query="INSERT INTO sogliafinanziamento (Progetto_idProgetto, obiettivo, dataScadenza)
                   VALUES ((SELECT idProgetto FROM progetto WHERE nome = ?), ?, ?)
                  ";
          //echo 'ho esequito la query2<br>';
          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

          mysqli_stmt_bind_param($stmt, 'sis', $titolo, $obj, $date);

          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";
          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

          //imposto l'immagine del progetto
          //$querry="";
          //include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";
          //include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";
          //include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

        }if ( mysqli_affected_rows($conn) === 0){

          echo("Errore, riprova più tardi!");
          header("Refresh:2; url=/progetto/account/startup/creaprogetto.php");
        }else{
          echo("inserimento del progetto avvenuta con sucesso");
          header("Refresh:2; url=/progetto/account/startup/tuttiprogetti.php");

        }


        }else{
          // campo con valori sballati
          echo("Valori non conformi, riprova!");
          header("Refresh:2; url=/progetto/account/startup/creaprogetto.php");
        }
      }
      else{
        //campi vuoti
        echo("Mancano dei dati, riprova!");
        header("Refresh:2; url=/progetto/account/startup/creaprogetto.php");
      }
    }
    else{
      // ho fatto il furbo accedendo alla pagina manualmente
      echo("Errore, riprova più tardi!");
      header("Refresh:2; url=/progetto/startSAW.php");
    }

?>
          </div>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
