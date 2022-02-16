<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registrazione </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include "/chroot/home/S4750770/public_html/www/common/navbar.php";
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

        if(filter_var($email, FILTER_VALIDATE_EMAIL )){

            if (strlen($pass)>= 8 && strlen($confpass)>= 8){

                include "/chroot/home/S4750770/public_html/sys/verificamail.php";

                if( $pass === $confpass){

                    $pass = password_hash($pass, PASSWORD_DEFAULT);

                    include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

                    mysqli_autocommit($conn, FALSE);

                    $query= "INSERT INTO utente (nome, cognome, email, password) values ( ?, ?, ?, ?)";

                    include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

                    mysqli_stmt_bind_param($stmt, "ssss", $nome, $cognome, $email, $pass);

                    include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

                    include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

                    $query= "INSERT INTO saldo (Utente_idUtente)
                             VALUES ((SELECT idUtente FROM utente WHERE email = ?))";

                    include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

                    mysqli_stmt_bind_param($stmt, "s", $email);

                    include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

                    include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

                    $query= "INSERT INTO ruolo (Utente_idUtente)
                             VALUES ((SELECT idUtente FROM utente WHERE email = ?))";

                    include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

                    mysqli_stmt_bind_param($stmt, "s", $email);

                    include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

                    include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

                    if (mysqli_commit($conn) == FALSE){
                        echo("Errore, riprova più tardi!");
                        header("Refresh:2; url=/~S4750770/startSAW.php");

                    }else{
                        echo("Registrazione avvenuta con successo");
                        header("Refresh:2; url=/~S4750770/startSAW.php");
                    }

                }else{
                    echo("Le password non combaciano, riprova!");
                    header("Refresh:2; url=/~S4750770/formregistration.php");
                }

            }else{
                echo("Le password devono essere lunghe almeno otto caratteri, riprova!");
                header("Refresh:2; url=/~S4750770/formregistration.php");
            }

        }else{
            echo("La mail inserita non è valida, riprova!");
            header("Refresh:2; url=/~S4750770/formregistration.php");
        }

    }else{
        echo("Mancano dei dati, riprova!");
        header("Refresh:2; url=/~S4750770/formregistration.php");
    }

}else{

    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/~S4750770/startSAW.php");
}

?>


            </div>
        </div>
    </div>
</div>


<?php
include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
