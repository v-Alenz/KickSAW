<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
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

    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);

    if(!empty($email) & !empty($pass)){

        include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

        $query="SELECT uid, nome, password, ruoloid FROM utente WHERE email = ?";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "s",$email);

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";


        $res=mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) === 1){

            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

            if( password_verify($pass, $row["password"]) ){

                $_SESSION["loggato"] = 1;
                $_SESSION["uid"] = $row["uid"];
                $_SESSION["rid"] = $row["ruoloid"];
                echo("Bentornato/a " . $row["nome"] . " !");
                header("Refresh:2; url=/progetto/startSAW.php");

            }else{

                echo("Password errata, riprova!");
                header("Refresh:2; url=/progetto/formlogin.php");
            }

        }else{
            echo("Non sei ancora registrato/a, registrati ora!");
            header("Refresh:2; url=/progetto/formregistration.php");
        }

    }else{
        echo("Mancano dei dati, riprova!");
        header("Refresh:2; url=/progetto/formlogin.php");
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