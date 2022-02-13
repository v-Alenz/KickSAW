<!DOCTYPE html>
<html lang="it">
<head>
    <title> Crea nuova startup </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";

//session_start();

if(isset($_SESSION['rid']) && $_SESSION["rid"] === "pro" || $_SESSION["rid"] === "admin"){

?>


<div class="wrapper">

    <?php include $_SERVER['DOCUMENT_ROOT']."/progetto/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Crea la tua nuova startup!</div>
            <div class="info">

                <form action="/progetto/account/startup/addproject.php" method="post" id="projform" enctype="multipart/form-data">

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
                    <input type="datetime-local" name="expire" class="form-control"> </div>

                    <div> <input type="submit" name="submit" value="Crea Progetto" class="btn"> </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!----<script src="/progetto/account/startup/controlloTesto.js"></script>

<?php

}else{

    include $_SERVER['DOCUMENT_ROOT']."/progetto/account/errora.php";

}

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
