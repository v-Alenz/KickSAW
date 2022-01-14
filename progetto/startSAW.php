<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> StarterPunch! </title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";
?>

<div class="sfondopagprincipale">

    <div class= "container sfondopagprincipale">
        <div class="row">
            <div class="col-2">
                <h1> Starter Punch! </h1>
                <p>Dove i migliori progetti prendono vita</p>
                <a href="/progetto/elencoprogetti.php" class="btn">Scoprili Ora &#8594;</a>
            </div>
            <div class="col-2">
                <img src="/progetto/immagini/informatics.jpg" alt="computer in rete" class="img">
            </div>
        </div>
    </div>

</div>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
