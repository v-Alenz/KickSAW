<!DOCTYPE html>
<html lang="it">
<head>
    <title> Modifica password </title>
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
        <div class="header"> Modifica password </div>
            <div class="info">

                <form action="/progetto/account/updatepass.php" method="post">
                    <div>Vecchia password : <input type="password" name="oldpass" class="form-control" minlength="8"> </div>
                    <div>Nuova password : <input type="password" name="newpass" class="form-control" minlength="8" > </div>
                    <div>Ripeti nuova password : <input type="password" name="newppass" class="form-control" minlength="8" > </div>

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
