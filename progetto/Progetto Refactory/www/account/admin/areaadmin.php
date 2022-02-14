<!DOCTYPE html>
<html lang="it">
<head>
    <title> Area Admin </title>
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

    if($_SESSION["rid"] === "admin" ){

    ?>


    <div class="wrapper">

        <?php include dirname(__FILE__)."/www/account/navbaraccount.php"; ?>

        <div class="content">
            <div class="header"> Area Admin </div>
                <div class="info">

                    <form action="/www/account/admin/tuttiutenti.php" method="post">
                        <div> Vedi tutti gli utenti registrati : </div>
                        <input type="submit" name="submit" value="Vedi tutti gli utenti" class="btn">
                    </form>
                    <br>

                    <form action="/www/account/admin/vedituttiprogetti.php" method="post">
                        <div> Vedi tutti i progetti : </div>
                        <input type="submit" name="submit" value="Vedi tutti i progetti" class="btn">
                    </form>
                    <br>

                </div>
            </div>
        </div>
    </div>

    <?php

    }else{

        include dirname(__FILE__)."/sys/common/error/errorenoadmin.php";

    }

}else{

    include dirname(__FILE__)."/sys/common/error/errora.php";

}

include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
