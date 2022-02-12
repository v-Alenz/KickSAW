<!DOCTYPE html>
<html lang="it">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">

    <title> StartSAW </title>
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
</head>

<?php

  include  $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

  $query = "SELECT progetto.nome, introduzione, descrizione, obiettivo, sogliaAttuale, utente.nome, cognome, dataScadenza, mediaLink
            FROM progetto
            JOIN sogliafinanziamento  on progetto.idProgetto = sogliafinanziamento.Progetto_idProgetto
            JOIN utente ON  progetto.Utente_idUtente = utente.idUtente
            JOIN mediaprogetto ON progetto.idProgetto = mediaprogetto.Progetto_idProgetto
            WHERE idProgetto = ?";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $_GET['prog']);

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_all($result);

  if(!$row){
    include  $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";
    exit();
  }

?>

<?php
include "common/navbar.php";
?>


<body>

  <div class="sfondopagprincipale">
      <div class="small-container single-product ">
        <h1 class="head_title">
          <?php
            echo $row[0][0];
          ?>
        </h1>
        <h2 class="author">
            <?php
              echo "by<br>".$row[0][5]." ".$row[0][6];
            ?>
        </h2>
          <div class="row">
              <div>
                  <?php echo '<br><img src="'.$row[0][8].'" alt="immagine progetto" class="immagineprogetto">' ?>
              </div>
              <div class="col-2">
                  <br>
                  <h4>Soldi raccolti :
                      <?php
                        echo $row[0][4];
                      ?>
                  €</h4>
                  <h4>Su un obiettivo di:
                    <?php
                      echo $row[0][3];
                    ?>
                  €</h4>
                  <form action="donazione.php" method="post">
                      <button type="submit" name="idprog" class="btn"
                      value=<?php echo $_GET['prog'] ?>>Sostieni questo progetto</button><br>
                      <input type="number" name="ammount" min="1" value="1" step="any">€</input>
                  </form>
                  <h4>
                    Scade il:
                    <?php
                        echo $row[0][7]
                    ?>
                  </h4>
                  <br>
                  <form action="/progetto/addprogmaillist.php" method="post">
                      <button type="submit" name="idprog" class="btn"
                      value=<?php echo $_GET['prog'] ?>>Iscriviti alla newsletter</button>
                  </form>
              </div>
          </div>

      </div>

      <div class="small-container single-product">
          <h4>
            <?php
              echo $row[0][1]
            ?>
          </h4>
          <p>
            <?php
              echo $row[0][2]
            ?>
          </p>
          <br><br><br><br>
      </div>

  </div>

  <?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
