<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add money </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";
?>


<div class="account-page">
    <div class="container">
        <div class="col-2">
            <div class="form-container msg">


<?php

//session_start();

if(isset($_POST["submit"])){

    $money = trim($_POST['money']);

    if(!empty($money)){

        include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";
        
        $query= "UPDATE utente set saldo = saldo + ? where uid = ?";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";
    
        mysqli_stmt_bind_param($stmt, "is", $money, $_SESSION["uid"] );
    
        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";
    
        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";
    
        if ( mysqli_affected_rows($conn) === 0){
    
            echo("Errore, riprova più tardi!");
            header("Refresh:2; url=/progetto/account/modificapass.php");
    
        }else{
            
            echo("Il tuo conto è stato ricaricato con sucesso!");
            header("Refresh:2; url=/progetto/account/show_profile.php");
        }        

    }else{
        echo("Inserisci una quantità valida, riprova!");
        header("Refresh:2; url=/progetto/account/caricosaldo.php");
    }
    
}else{
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/progetto/startSAW.php");
}


?>


            </div>
        </div>
    </div>
</div>


<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
