<!DOCTYPE html>
<html lang="it">
<head>
    <title> Account premium </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
</head>

<body>

<?php
  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";

  //session_start();

  if(isset($_SESSION["loggato"])){

?>

<div class="wrapper">

    <?php include $_SERVER['DOCUMENT_ROOT']."/progetto/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Account premium </div>
            <div class="info">
              <?php if($_SESSION["rid"] === "standard"){  ?>
                <form action="/progetto/account/becomepremium.php" method="post">
                    <div> Ottieni account premium per poter pubblicare i tuoi progetti! </div>

                    <input type="submit" name="submit" value="Diventa premium" class="btn">
                </form>
              <?php }else {
                include $_SERVER['DOCUMENT_ROOT']."/progetto/account/showexpire.php"; ?>
                <div> Il tuo account premium scadrà il <?php echo $scadenza ?> </div>
              <?php }
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
    header("Refresh:2; url=/progetto/formregistration.php");
  ?>
              </div>
          </div>
      </div>
  </div>
<?php }

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
