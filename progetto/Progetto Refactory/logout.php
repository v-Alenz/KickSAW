<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Logout </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include "/chroot/home/S4750770/public_html/www/common/navbar.php";
?>


<div class="account-page">
    <div class="container">
        <div class="col-2">
            <div class="form-container msg">


<?php

//session_start();

if(isset($_SESSION["loggato"])){

    unset($_SESSION["loggato"]);
    unset($_SESSION["uid"]);
    unset($_SESSION["rid"]);
    session_destroy();
    echo("Logout avvenuto con successo, a presto!");


}else{
    echo("Errore, riprova più tardi!");
}

header("Refresh:2; url=/~S4750770/startSAW.php");

?>


            </div>
        </div>
    </div>
</div>


<?php
include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
