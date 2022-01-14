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

    <div class="small-container single-product ">

        <div class="row">
            <div class="col-2">
                <img src="/progetto/immagini/ilgabibbo.jpg" alt="progetto" >
            </div>
            <div class="col-2">
                <h1>Titolo progetto</h1>
                <h4>Slogan accattivante progetto</h4>
                <br>
                <h4>Soldi raccolti : €</h4>
                <h4>Su un obiettivo di: €</h4>
                <div> € : <input type="int" min="1" value="1" step="any"> </div>
                <a href="" class="btn">Sostieni questo progetto</a>

            </div>
        </div>

    </div>

    <div class="small-container single-product">
        <h4>In dettaglio di cosa si tratta...</h4>
        <p> aaaaaaa aaaaaaaa aaaaaa aaaa aaaaaaaaa aaaaaaa aaaaaaa aaaa aaaa aaaaa aaaaaaaa aaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaa aaaa .</p>
        <br><br><br><br>
    </div>

</div>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
