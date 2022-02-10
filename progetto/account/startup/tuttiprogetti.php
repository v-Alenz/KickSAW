<!DOCTYPE html>
<html lang="it">
<head>
    <title> Tutti gli utenti </title>
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

    if($_SESSION["rid"] === "pro"){

    ?>

    <div class="wrapper">

        <?php include $_SERVER['DOCUMENT_ROOT']."/progetto/account/navbaraccount.php"; ?>

        <div class="content">
            <div class="header"> Tutti i tuoi progetti </div>
                <div class="info">

                <?php  include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/allproject.php"; ?>

                </div>
            </div>
        </div>
    </div>

    <?php

    }else{

        include $_SERVER['DOCUMENT_ROOT']."/progetto/account/errorenopro.php";
    }
    
}else{

    include $_SERVER['DOCUMENT_ROOT']."/progetto/account/errora.php";
}


include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
