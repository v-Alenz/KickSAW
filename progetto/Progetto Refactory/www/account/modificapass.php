<!DOCTYPE html>
<html lang="it">
<head>
    <title> Modifica password </title>
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

?>


<div class="wrapper">

    <?php include dirname(__FILE__)."/www/account/navbaraccount.php"; ?>

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

    include dirname(__FILE__)."/sys/common/error/errora.php";

}

include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
