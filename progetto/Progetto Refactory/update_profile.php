
<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update profilo </title>
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
    $datan = trim($_POST['datan']);
    $ind = trim($_POST['indirizzo']);
    $genere = trim($_POST['genere']);

    if(empty($datan)){
      $datan = null;
    }
    if(empty($ind)){
      $ind = null;
    }
    if(empty($genere)){
      $genere = "preferisco non specificare";
    }


    if(!empty($nome) && !empty($cognome) && !empty($email)){

        if(filter_var($email, FILTER_VALIDATE_EMAIL )){

            include "/chroot/home/S4750770/public_html/sys/common/checkuserexist.php";

            include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

            $query= "UPDATE utente set nome = ?, cognome = ?, email = ? , dataNascita = ?, indirizzo = ?, genere = ? where idUtente = ?";

            include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

            mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $cognome, $email, $datan, $ind, $genere, $_SESSION["uid"] );

            include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

            include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

            if ( mysqli_affected_rows($conn) === 0 && mysqli_errno($conn)){

                echo("Errore, riprova più tardi!");
                header("Refresh:2; url=/~S4750770/www/account/modificaprofilo.php");

            }else{

                echo("Modifica avvenuta con successo");
                header("Refresh:2; url=/~S4750770/show_profile.php");

            }
        
        }else{
            echo("La mail inserita non è valida, riprova!");
            header("Refresh:2; url=/~S4750770/www/account/modificaprofilo.php");
        }

    }else{
        echo("Mancano dei dati importanti, riprova!");
        header("Refresh:2; url=/~S4750770/www/account/modificaprofilo.php");
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
