<!DOCTYPE html>
<html lang="it">
<head>
  <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <title> Dettaglio progetto </title>
    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>

<body>

<?php

  include "/chroot/home/S4750770/public_html/www/common/navbar.php";

    if(!isset($_GET['prog'])){
      include "/chroot/home/S4750770/public_html/sys/common/error/errora.php";
      include "/chroot/home/S4750770/public_html/www/common/footer.php";
      exit();
    }

  include  "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

  $query = "SELECT progetto.nome AS nomeP, introduzione, descrizione, obiettivo, sogliaAttuale, utente.nome, cognome, dataScadenza, mediaLink
            FROM progetto
            JOIN sogliafinanziamento  on progetto.idProgetto = sogliafinanziamento.Progetto_idProgetto
            JOIN utente ON  progetto.Utente_idUtente = utente.idUtente
            JOIN mediaprogetto ON progetto.idProgetto = mediaprogetto.Progetto_idProgetto
            WHERE idProgetto = ?";

  include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $_GET['prog']);

  include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

  include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) === 0){
    include  "/chroot/home/S4750770/public_html/sys/common/error/errora.php";
    include "/chroot/home/S4750770/public_html/www/common/footer.php";
    exit();
  }

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

  <div class="sfondopagprincipale">
      <div class="small-container single-product ">
        <h1 class="head_title">
          <?php
            echo $row['nomeP'];
          ?>
        </h1>
        <h2 class="author">
            <?php
              echo "by<br>".$row['nome']." ".$row['cognome'];
            ?>
        </h2>
          <div class="row">
              <div>
                  <?php echo '<br><img src="'.$row['mediaLink'].'" alt="immagine progetto" class="immagineprogetto">' ?>
              </div>
              <div class="col-2">
                  <br>
                  <h4>Soldi raccolti :
                      <?php
                        echo $row['sogliaAttuale'];
                      ?>
                  €</h4>
                  <h4>Su un obiettivo di:
                    <?php
                      echo $row['obiettivo'];
                    ?>
                  €</h4>
                  <form action="/~S4750770/www/projects/donazione.php" method="post">
                      <button type="submit" name="idprog" class="btnsmall"
                      value=<?php echo $_GET['prog'] ?>>Sostieni questo progetto</button>
                      <input type="number" name="ammount" min="1" value="1" step="any">€</input>
                  </form>
                  <h4>
                    Scade il:
                    <?php
                        echo $row['dataScadenza']
                    ?>
                  </h4>
                  <br>
                  <form action="/~S4750770/sys/projects/addprogmaillist.php" method="post">
                      <button type="submit" name="idprog" class="btnsmall"
                      value=<?php echo $_GET['prog'] ?>>Iscriviti alla newsletter</button>
                  </form>
              </div>
          </div>

      </div>

      <div class="small-container single-product">
          <h4>
            <?php
              echo $row['introduzione']
            ?>
          </h4>
          <p>
            <?php
              echo $row['descrizione']
            ?>
          </p>
          <br><br><br><br>
      </div>

  </div>

  <?php
include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
