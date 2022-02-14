<!DOCTYPE html>
<html lang="it">
<head>
    <title> Tutti gli utenti </title>
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

    if($_SESSION["rid"] === "pro" || $_SESSION["rid"] === "admin"){

    ?>

    <div class="wrapper">

        <?php include "/chroot/home/S4750770/public_html/www/account/navbaraccount.php"; ?>

        <div class="content">
            <div class="header"> Tutti i tuoi progetti </div>
                <div class="info">

                <?php  include "/chroot/home/S4750770/public_html/sys/account/startup/allproject.php"; ?>

                </div>
            </div>
        </div>
    </div>

    <?php

    }else{

        include "/chroot/home/S4750770/public_html/sys/common/error/errorenopro.php";
    }

}else{

    include "/chroot/home/S4750770/public_html/sys/common/error/errora.php";
}


include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
