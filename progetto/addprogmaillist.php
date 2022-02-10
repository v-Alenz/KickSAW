<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add user in the mail-list </title>
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

if(isset($_POST["idprog"] )){

    if(isset($_SESSION["loggato"])){

        $idprog = $_POST['idprog'];

        include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

        $query= "INSERT INTO maillist (Utente_idUtente, MailList_idProgetto) values ( ?, ?)";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "ii", $_SESSION["uid"], $idprog);

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

        if ( mysqli_affected_rows($conn) === 0){

            echo("Errore, riprova più tardi!");
            header("Refresh:2; url=/progetto/startSAW.php");

        }else{

            echo("Ti sei registrato con sucesso alla newsletter!");
            header("Refresh:2; url=/progetto/elencoprogetti.php");

        }

    }else{
        echo("Devi essere loggato/registrato per iscriverti alla newsletter");
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
