<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> StarterPunch! </title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <?php
    include dirname(__FILE__)."/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include dirname(__FILE__)."/www/common/navbar.php";
?>

<div class="sfondopagprincipale">

    <div class= "container">
        <div class="row">
            <div class="col-2">
                <h1 class="titoloprincipale"> Starter <a class="lettera_nera">P</a>unch! </h1>
                <p>Dove i migliori progetti prendono vita</p>
                <a href="/progetto/elencoprogetti.php" class="btn">Scoprili Ora &#8594;</a>
            </div>
            <div class="col-2">
                <img src="/progetto/immagini/informatics.jpg" alt="computer in rete" class="img">
            </div>
        </div>
        <div class="copyright">
            <br> <br>
            <h3> Su questo sito potrai supportare progetti o proporne di nuovi </h3>
            <br>
            <p> Visita il catalogo per visualizzare i vari progetti che richiedono fondi per diventare realtà! </p>
            <p> Puoi inoltre pubblicare un tuo progetto personale diventando un utente premium </p>
            <br> <br> <br>
        </div>
    </div>

</div>

<?php
include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
