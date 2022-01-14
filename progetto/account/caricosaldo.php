<!DOCTYPE html>
<html lang="it">
<head>
    <title> Carico saldo </title>
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

    include $_SERVER['DOCUMENT_ROOT']."/progetto/account/errora.php";

}

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
