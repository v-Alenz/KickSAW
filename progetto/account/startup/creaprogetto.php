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

if($_SESSION["rid"] === "pro"){

?>


<div class="wrapper">

    <?php include $_SERVER['DOCUMENT_ROOT']."/progetto/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Crea la tua nuova startup ! </div>
            <div class="info">

                <form action="/progetto/account/addproject.php" method="post" id="projform">

                    <br>
                    <div>Titolo : <input type="text" name="titolo" class="form-control" > </div>
                    
                    <?php // <div>Immagine : <input type="image" name="imm" class="form-control" > </div> ?>
                
                    Introduzione :
                    <textarea rows="5" cols="160" name="comment" form="projform"> Enter text here...</textarea>
                    <br><br>
                    Descrizione :
                    <textarea rows="5" cols="160" name="comment" form="projform"> Enter text here...</textarea>

                    <br><br><br>
                    <input type="submit" name="submit" value="Crea Progetto" class="btn">
                    
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