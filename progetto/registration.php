<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registrazione </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
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
    $pass = trim($_POST['pass']);
    $confpass = trim($_POST['confirm']);

    if(!empty($nome) & !empty($cognome) & !empty($email) & !empty($pass) & !empty($confpass)){

        if (strlen($pass)>= 8 && strlen($confpass)>= 8){

            include $_SERVER['DOCUMENT_ROOT']."/progetto/common/verificamail.php";

            if( $pass === $confpass){

                $pass = password_hash($pass, PASSWORD_DEFAULT);

                include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

                $query= "INSERT INTO utente (nome, cognome, email, password) values ( ?, ?, ?, ?)";

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

                mysqli_stmt_bind_param($stmt, "ssss", $nome, $cognome, $email, $pass);

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

                if ( mysqli_affected_rows($conn) === 0){

                    echo("Errore, riprova più tardi!");
                    header("Refresh:2; url=/progetto/startSAW.php");

                }else{

                    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/userdetails.php";
                    echo("Registrazione avvenuta con sucesso");
                    header("Refresh:2; url=/progetto/startSAW.php");

                }

            }else{
                echo("Le password non combaciano, riprova!");
                header("Refresh:2; url=/progetto/formregistration.php");
            }

        }else{
            echo("Le password devono essere lunghe almeno otto caratteri, riprova!");
            header("Refresh:2; url=/progetto/formregistration.php");
        }

    }else{
        echo("Mancano dei dati, riprova!");
        header("Refresh:2; url=/progetto/formregistration.php");
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
