<!DOCTYPE html>
<html lang="it">
<head>
    <title> Carico saldo </title>
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
        <div class="header"> Ricarica conto </div>
            <div class="info">

                <form action="/progetto/account/addmoney.php" method="post">
                    <div> Ricarica ora il tuo conto per sostenere i tuoi progetti preferiti! </div>
                    <div> € : <input type="int" min="1" value="1" step="any" class="form-control" name="money"> </div>

                    <input type="submit" name="submit" value="Ricarica" class="btn">
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
