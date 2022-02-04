<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Creazione Startup </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
  </head>

  <?php

    if(!isset($_SESSION)){
      session_start();
    }

    if(isset($_POST['submit'])){

      $titolo = trim($_POST['titolo']);
      $intro = trim($_POST['intro']);
      $descr = trim($_POST['descr']);
      $obj = trim($_POST['obbiettivo']);
      $date = str_replace('T', ' ', trim($_POST['expire']).":00");

      if(!empty($titolo) && !empty($intro) && !empty($descr) && !empty($obj) && !empty($date)){
        if(is_numeric($obj) && strlen($titolo) < 100 && strlen($descr) < 1000 && strlen($descr) < 10000){

          include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

          //creo il progetto
          $query="INSERT INTO progetto (Utente_idUtente, nome, introduzione, descrizione)
                  VALUES( ?, ?, ?, ?)";

          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

          mysqli_stmt_bind_param($stmt, "isss", $_SESSION['uid'], $titolo, $intro, $descr);

          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";
          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";
          echo 'ho eseguito la query<br>';

          //imposto la soglia da raggiungere
// NOTA BENE: Siccome la chiave per progetti (IdProgetto) e' autogenerato e ignoro il suo valore
//            uso per identificare il progetto la chiave alternativa progetto.nome
          $query="INSERT INTO sogliafinanziamento (Progetto_idProgetto, obbiettivo, dataScadenza)
                   VALUES ((SELECT idProgetto FROM progetto WHERE nome = ?), ?, ?)
                  ";
          echo 'ho esequito la query2<br>';
          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

          mysqli_stmt_bind_param($stmt, 'sis', $titolo, $obj, $date);

          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";
          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

          //imposto l'immagine del progetto
          //$querry="";
          //include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";
          //include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";
          //include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";


        }else{
          // campo con valori sballati
          echo 'campi con valori sballati';
        }
      }
      else{
        //campi vuoti
        echo 'campi vuoti';
      }
    }
    else{
      // ho fatto il furbo accedendo alla pagina manualmente
      echo 'hai acceduto alla pagina in maniera truffaldina';
    }
  ?>



  <body>

  </body>
</html>
