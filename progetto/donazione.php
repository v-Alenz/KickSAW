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
        <h1 class="head_title">ROBA BELLISSIMISSIMA CHE TI DICE COSA STA SUCCEDENDO</h1>
        <div class="col-2">
          <form action="common/donation.php" method="post">
              <button type="submit" name="idprog" class="btn"
              value=<?php echo $_POST['idprog'] ?>>Coferma</button><br>
              <input type="hidden" name="ammount" value=<?php echo '"'.$_POST['ammount'].'"'?>/>
          </form>
          <form action="dettagliprogetto.php" method="get">
              <button type="submit" name="prog" class="btn"
              value=<?php echo $_POST['idprog'] ?>>Annulla</button><br>
          </form>
        </div>
      </div>
  </div>

  <?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
