<!DOCTYPE html>
<html lang="it">
<head>
    <title> Tutti gli utenti </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";

//session_start();

if($_SESSION["rid"] === "pro"){

?>

<div class="wrapper">

    <?php include $_SERVER['DOCUMENT_ROOT']."/progetto/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Tutti i tuoi progetti </div>
            <div class="info">

            <?php // include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/allproject.php"; ?>

            </div>
        </div>
    </div>
</div>

<?php

}else{
?>
    <div class="account-page">
    <div class="container">
        <div class="col-2">
            <div class="form-container msg">

<?php
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/progetto/startSAW.php");
?>

            </div>
        </div>
    </div>
</div>

<?php
}

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
