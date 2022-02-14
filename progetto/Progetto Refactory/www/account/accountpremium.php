<!DOCTYPE html>
<html lang="it">
<head>
    <title> Account premium </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>

<body>

<?php
  include "/chroot/home/S4750770/public_html/www/common/navbar.php";

  //session_start();

  if(isset($_SESSION["loggato"])){

?>

<div class="wrapper">

    <?php include "/chroot/home/S4750770/public_html/www/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Account premium </div>
            <div class="info">
              <?php if($_SESSION["rid"] === "standard"){  ?>
                <form action="/~S4750770/sys/account/becomepremium.php" method="post">
                    <div> Ottieni account premium per poter pubblicare i tuoi progetti! </div>

                    <input type="submit" name="submit" value="Diventa premium" class="btn">
                </form>
              <?php }else {
                include "/chroot/home/S4750770/public_html/sys/account/showexpire.php"; ?>
                <div> Il tuo account premium scadrà il <?php echo $scadenza ?> </div>
                <br><br><br>
                <?php if($_SESSION["rid"] === "pro"){  ?>
                  <form action="/~S4750770/sys/account/becomeAdmin.php" method="post">
                      <div> Vuoi entrare nell'amministrazione del sito? Fai richiesta, ti contatteremo noi </div>

                      <input type="submit" name="submit" value="Unisciti a noi" class="btn">
                  </form>
                <?php }
               }
              ?>
            </div>
        </div>
    </div>
</div>
<?php

}else{ ?>
  <div class="account-page">
      <div class="container">
          <div class="col-2">
              <div class="form-container msg">

  <?php
    echo ("Ti serve un account per diventare premium");
    header("Refresh:2; url=/~S4750770/formregistration.php");
  ?>
              </div>
          </div>
      </div>
  </div>
<?php }

include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
