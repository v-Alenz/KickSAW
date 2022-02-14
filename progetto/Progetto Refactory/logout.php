<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Logout </title>
    <link rel="stylesheet" type="text/css" href="/style.css">

    <?php
    include dirname(__FILE__)."/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include dirname(__FILE__)."/www/common/navbar.php";
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

header("Refresh:2; url=/startSAW.php");

?>


            </div>
        </div>
    </div>
</div>


<?php
include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
