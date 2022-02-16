<!DOCTYPE html>
<html lang="it">
<head>
    <title> Crea nuova startup </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include "/chroot/home/S4750770/public_html/www/common/navbar.php";

//session_start();

if(isset($_SESSION['rid'])){

    if($_SESSION['rid'] === "pro" || $_SESSION['rid'] === "admin"){

?>


<div class="wrapper">

    <?php include "/chroot/home/S4750770/public_html/www/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Crea la tua nuova startup!</div>
            <div class="info">

                <form action="/~S4750770/sys/account/startup/addproject.php" method="post" id="projform" enctype="multipart/form-data">

                    <br>
                    <div>Titolo : <br><input type="text" name="titolo" class="form-control" placeholder="Inserisci titolo" maxlength="200"></div>

                    <div> Introduzione : <br>
                    <textarea rows="5" cols="160" name="intro" form="projform" placeholder="Enter text here (Max 1000 caratteri)" maxlength="1000"></textarea>
                    </div>

                    <div> Descrizione : <br>
                    <textarea rows="5" cols="160" name="descr" form="projform" placeholder="Enter text here (Max 1000 caratteri)" maxlength="10000"></textarea>
                    </div>

                    <div> Immagine: <br>
                        <input type="file" name="image" id="image" class="inputfile"> </div>

                    <div> Obiettivo da raggiungere:
                    <input type="number" min="1" value="1" step="any" name="obiettivo" class="form-control" placeholder="5"> € </div>

                    <div> Data di scadenza:
                    <input type="datetime-local" name="expire" class="form-control"  min="2022-02-17T00:00"> </div>

                    <div> <input type="submit" name="submit" value="Crea Progetto" class="btn"> </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php

    }else{

        include "/chroot/home/S4750770/public_html/sys/common/error/errorenopro.php";

    }

}else{

    echo'<div class="account-page">';
    echo'<div class="container">';
    echo'<div class="col-2">';
    echo'<div class="form-container msg">';

    echo("Devi essere loggato e avere un account premium!");
    header("Refresh:2; url=/~S4750770/formlogin.php");

    echo'</div>';
    echo'</div>';
    echo'</div>';
    echo'</div>';

}

include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
