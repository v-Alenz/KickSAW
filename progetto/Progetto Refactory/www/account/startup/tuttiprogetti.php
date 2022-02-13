<!DOCTYPE html>
<html lang="it">
<head>
    <title> Tutti gli utenti </title>
    <link rel="stylesheet" type="text/css" href="/style.css">

    <?php
    include dirname(__FILE__)."/sys/common/googlefont.php";
    ?>

</head>
<body>

<?php
include dirname(__FILE__)."/www/common/navbar.php";

//session_start();

if(isset($_SESSION["loggato"])){

    if($_SESSION["rid"] === "pro" || $_SESSION["rid"] === "admin"){

    ?>

    <div class="wrapper">

        <?php include dirname(__FILE__)."/www/account/navbaraccount.php"; ?>

        <div class="content">
            <div class="header"> Tutti i tuoi progetti </div>
                <div class="info">

                <?php  include dirname(__FILE__)."/sys/account/startup/allproject.php"; ?>

                </div>
            </div>
        </div>
    </div>

    <?php

    }else{

        include dirname(__FILE__)."/sys/common/error/errorenopro.php";
    }

}else{

    include dirname(__FILE__)."/sys/common/error/errora.php";
}


include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
