<!DOCTYPE html>
<html lang="it">
<head>
    <title> Modifica password </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
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
        <div class="header"> Modifica password </div>
            <div class="info">  

                <form action="/progetto/account/updatepass.php" method="post">
                    <div>Vecchia password : <input type="text" name="oldpass" class="form-control" > </div>
                    <div>Nuova password : <input type="text" name="newpass" class="form-control" > </div>
                    <div>Ripeti nuova password : <input type="text" name="newppass" class="form-control" > </div>

                    <input type="submit" name="submit" value="Modifica password" class="btn">
                </form>
            </div>
        </div>
    </div> 
</div>

<?php

}else{
    
    include $_SERVER['DOCUMENT_ROOT']."/progetto/account/errora.php";

}

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>