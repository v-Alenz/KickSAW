<!DOCTYPE html>
<html lang="it">
<head>
  <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <title> StartSAW </title>
    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>

<body>
  <?php

  include "/chroot/home/S4750770/public_html/www/common/navbar.php";

  if(!isset($_POST["idprog"])){
    include  "/chroot/home/S4750770/public_html/sys/common/error/errora.php";
  }else{

  ?>

  <div class="sfondopagprincipale sfondodonazione">
      <div class="small-container single-product ">
        <div class="col-2">
          <form action="/~S4750770/sys/projects/donation.php" method="post">
            <br><h2>Sei sicuro di voler donare a questo progetto?</h2><br>
              <button type="submit" name="idprog" class="btn"
              value=<?php echo $_POST['idprog'] ?>>Conferma</button><br>
              <input type="hidden" name="ammount" value=<?php echo '"'.$_POST['ammount'].'"'?>/>
          </form>
          <form action="/~S4750770/www/projects/dettagliprogetto.php" method="get">
              <button type="submit" name="prog" class="btn"
              value=<?php echo $_POST['idprog'] ?>>Annulla</button>
              <br><br><br><br>
          </form>
        </div>
      </div>
  </div>

  <?php

  }

  include "/chroot/home/S4750770/public_html/www/common/footer.php";

?>

</body>
</html>
