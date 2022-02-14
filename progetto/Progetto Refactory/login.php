<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
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

    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);

    if(!empty($email) & !empty($pass)){

        if (strlen($pass)>= 8){

            include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

            $query="SELECT idUtente, nome, password, stato FROM utente JOIN ruolo ON idUtente=Utente_idUtente WHERE email = ?";

            include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

            mysqli_stmt_bind_param($stmt, "s",$email);

            include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

            include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";


            $res=mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($res) === 1){

                $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                if( password_verify($pass, $row["password"]) ){

                    $_SESSION["loggato"] = 1;
                    $_SESSION["uid"] = $row["idUtente"];
                    $_SESSION["rid"] = $row["stato"];
                    echo("Bentornato/a " . $row["nome"] . " !");
                    header("Refresh:2; url=/~S4750770/startSAW.php");

                }else{

                    echo("Password errata, riprova!");
                    header("Refresh:2; url=/~S4750770/formlogin.php");
                }

            }else{
                echo("Non sei ancora registrato/a, registrati ora!");
                header("Refresh:2; url=/~S4750770/formregistration.php");
            }

        }else{
            echo("La password deve essere lunga almeno otto caratteri, riprova!");
            header("Refresh:2; url=/~S4750770/formlogin.php");
        }

    }else{
        echo("Mancano dei dati, riprova!");
        header("Refresh:2; url=/~S4750770/formlogin.php");
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
