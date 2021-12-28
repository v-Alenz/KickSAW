<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update profilo </title>
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
    $nome = trim($_POST['firstname']);
    $cognome = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $datan = trim($_POST['datan']);
    $ind = trim($_POST['indirizzo']);
    $genere = trim($_POST['genere']);


    if(!empty($nome) & !empty($cognome) & !empty($email)){

        
        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/checkemail.php";
        if ( $emailusata === 0){


            include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

                $query= "UPDATE utente set nome = ?, cognome = ?, email = ? , datan = ?, indirizzo = ?, genere = ? where uid = ?";

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

                mysqli_stmt_bind_param($stmt, "sssssss", $nome, $cognome, $email, $datan, $ind, $genere, $_SESSION["uid"] );

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

                if ( mysqli_affected_rows($conn) === 0){

                    echo("Errore, riprova più tardi!");
                    header("Refresh:2; url=/progetto/account/modificaprofilo.php");

                }else{
                    //echo("Modifica avvenuta con sucesso");
                    header("Refresh:2; url=/progetto/account/show_profile.php");

                }


            }else{
                //echo("Email già usata!");
                header("Refresh:2; url=/progetto/account/modificaprofilo.php");
            }

    }else{
        echo("Mancano dei dati importanti, riprova!");
        header("Refresh:2; url=/progetto/account/modificaprofilo.php");
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
