<!DOCTYPE html>
<html lang="it">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">

    <title> StartSAW </title>
    <?php
    include dirname(__FILE__)."/sys/common/googlefont.php";
    ?>
</head>

<?php

  if(isset($_SESSION['rid'])){
      die("Devi essere registrato");
  }

?>

<body>
  <?php
  include "common/navbar.php";
  ?>

  <div class="sfondopagprincipale">
      <div class="small-container single-product ">
        <div class="col-2">
          <form action="common/donation.php" method="post">
            <br><h2>Sei sicuro di voler donare a questo progetto?</h2><br>
              <button type="submit" name="idprog" class="btn"
              value=<?php echo $_POST['idprog'] ?>>Conferma</button><br>
              <input type="hidden" name="ammount" value=<?php echo '"'.$_POST['ammount'].'"'?>/>
          </form>
          <form action="dettagliprogetto.php" method="get">
              <button type="submit" name="prog" class="btn"
              value=<?php echo $_POST['idprog'] ?>>Annulla</button>
              <br><br><br><br>
          </form>
        </div>
      </div>
  </div>

  <?php
include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
