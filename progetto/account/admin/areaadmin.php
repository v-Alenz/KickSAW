<!DOCTYPE html>
<html lang="it">
<head>
    <title> Area Admin </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";
                
//session_start();

if($_SESSION["rid"] === "2" ){

?>


<div class="wrapper">

    <?php include $_SERVER['DOCUMENT_ROOT']."/progetto/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Area Admin </div>
            <div class="info">  

                <form action="/progetto/account/admin/tuttiutenti.php" method="post">
                    <div> Vedi tutti gli utenti registrati : </div>
                    <input type="submit" name="submit" value="Vedi tutti gli utenti" class="btn">
                </form>
                <br>

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