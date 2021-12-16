<!DOCTYPE html>
<html lang="it">
<head>
    <title> StartSAW </title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php
include "navbar.php";
?>

<div class="sfondopagprincipale">

    <div class="small-container single-product ">

        <div class="row">
            <div class="col-2">
                <img src="immagini/ilgabibbo.jpg" alt="progetto" >
            </div>
            <div class="col-2">
                <h1>Titolo progetto</h1>
                <h4>Slogan accattivante progetto</h4>
                <br>
                <h4>Soldi raccolti : €</h4>
                <h4>Su un obiettivo di: €</h4>
                €<input type="number" min="1" value="1" step="any">
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
include "footer.php";
?>

</body>
</html>