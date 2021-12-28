<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Logout </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";
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

header("Refresh:2; url=/progetto/startSAW.php");

?>


            </div>
        </div>
    </div>
</div>


<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
