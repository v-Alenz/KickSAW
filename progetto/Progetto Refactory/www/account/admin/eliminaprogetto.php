<!DOCTYPE html>
<html lang="it">
<head>
    <title> Elimina progetto </title>
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

  if(!isset($_POST['nome']) || !isset($_POST['idProgetto'])){
    include "/chroot/home/S4750770/public_html/sys/common/error/errora.php";
    include "/chroot/home/S4750770/public_html/www/common/footer.php";
    exit();
  }

    if($_SESSION["rid"] === "admin" ){

    ?>


    <div class="wrapper">

        <?php include "/chroot/home/S4750770/public_html/www/account/navbaraccount.php"; ?>

        <div class="content">
            <div class="header"> Elimina Progetto </div>
                <div class="info">

                    <form action="/~S4750770/sys/account/admin/deleteproject.php" method="post">
                        <div> Sei sicuro di voler eliminare il progetto "<?php echo $_POST['nome'];?>"? </div>
                        <button type="submit" name="eliminaprogetto"  class="btnsmall"
                        value=<?php echo $_POST['idProgetto'] ?>>Elimina Definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

    }else{

        include "/chroot/home/S4750770/public_html/sys/common/error/errorenoadmin.php";

    }

}else{

    include "/chroot/home/S4750770/public_html/sys/common/error/errora.php";

}

include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
