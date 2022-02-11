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

    if(isset($_POST['submit'])){

      $titolo = trim($_POST['titolo']);
      $intro = trim($_POST['intro']);
      $descr = trim($_POST['descr']);
      $obj = trim($_POST['obiettivo']);
      $date = str_replace('T', ' ', trim($_POST['expire']).":00");
      $localImage = 'immaginiProgetti/'.basename($_FILES["image"]["name"]);
      $imageLocation = $_SERVER['DOCUMENT_ROOT'].'/progetto/'.$localImage;

      if(!empty($titolo) && !empty($intro) && !empty($descr) && !empty($obj) && !empty($date) && !empty($_FILES["image"]["name"])){

      // Faccio i controlli sull'Immagine
      $uploadOk = 0;  //prima messo = 1
      $imageFileType = strtolower(pathinfo($imageLocation,PATHINFO_EXTENSION));

      // Controllo se l'imamgine e' veramente un immagino o no
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      }else{
          //echo "File is not an image.";
          //$uploadOk = 0;
          echo "Il file selezionato non è un immagine, riprova!";
          include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/closeerrorproj.php";
      }

      // Contorllo la dimensione del file
      if ($_FILES["image"]["size"] > 5000000) {
        //echo "Sorry, your file is too large.";
        //$uploadOk = 0;
        echo "L'immagine selezionata è troppo grande, riprova!";
        include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/closeerrorproj.php";
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
        //echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        //$uploadOk = 0;
        echo "Sono ammessi solo file JPG, JPEG o PNG, riprova!";
        include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/closeerrorproj.php";
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
        echo "Non è stata caricata correttamente l'immagine, riprova!";
        include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/closeerrorproj.php";

      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imageLocation)) {
          //echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        } else {
          //echo "Sorry, there was an error uploading your file.";
          echo "Non è stata caricata correttamente l'immagine, riprova!";
          include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/closeerrorproj.php";
        }
      }


        include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/verificatitolo.php";

        if(is_numeric($obj) && strlen($titolo) < 100 && strlen($descr) < 1000 && strlen($descr) < 10000 && $obj>0){

          include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

          mysqli_autocommit($conn, FALSE);

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
          $query="INSERT INTO mediaprogetto( Progetto_idProgetto, mediaLink)
                  VALUES ((SELECT idProgetto FROM progetto WHERE nome = ?), ?)
          ";
          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

          mysqli_stmt_bind_param($stmt, 'ss', $titolo, $localImage);

          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";
          include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

        }if ( mysqli_affected_rows($conn) === 0){

          echo("Errore, riprova più tardi!");
          header("Refresh:2; url=/progetto/account/startup/creaprogetto.php");

        }else{
          echo("Inserimento del progetto avvenuta con successo");
          header("Refresh:2; url=/progetto/account/startup/tuttiprogetti.php");

        }

        mysqli_commit($conn);

        }else{
          // campo con valori sballati
          echo("Valori non conformi, riprova!");
          header("Refresh:2; url=/progetto/account/startup/creaprogetto.php");
        }
      
      }else{
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
