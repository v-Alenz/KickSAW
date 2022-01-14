<!DOCTYPE html>
<html lang="it">
<head>
    <title> StartSAW </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";
?>

<div class="sfondopagprincipale">

    <section id="ricerca">
        <div class="container">
            <h1>Progetti</h1>
            <form>
                <input type="text" placeholder="Cerca...">
                <button type="submit" class="btnsmall">Cerca</button>
            </form>
        </div>
    </section>

    <div class="small-container">

        <div class="row">

            <div class="col-4">
                <a href="/progetto/dettaglioprogetto.php"><img src ="/progetto/immagini/placeholder.jpg" alt="progetto">
                <h4> Boia </h4>
                <p> b </p></a>
            </div>

        </div>


    </div>

</div>


<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
