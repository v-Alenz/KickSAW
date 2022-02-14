<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add user in the mail-list </title>
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

if(isset($_POST["idprog"] )){

    if(isset($_SESSION["loggato"])){

        $idprog = $_POST['idprog'];

        include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

        $query= "SELECT * FROM maillist WHERE Utente_idUtente = ? and MailList_idProgetto = ?";

        include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "ii", $_SESSION["uid"], $idprog);

        include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

        include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

        $res=mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($res) == 1){

            echo("Non puoi iscriverti più volte allo stesso progetto!");
            header("Refresh:2; url=/~S4750770/www/projects/elencoprogetti.php");

        }else{

            $query= "INSERT INTO maillist (Utente_idUtente, MailList_idProgetto) values ( ?, ?)";

            include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

            mysqli_stmt_bind_param($stmt, "ii", $_SESSION["uid"], $idprog);

            include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

            include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

            if ( mysqli_affected_rows($conn) === 0){

                echo("Errore, riprova più tardi!");
                header("Refresh:2; url=/~S4750770/startSAW.php");

            }else{

                echo("Ti sei registrato con successo alla newsletter!");
                header("Refresh:2; url=/~S4750770/www/projects/elencoprogetti.php");

            }
        }

    }else{
        echo("Devi essere loggato/registrato per iscriverti alla newsletter");
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
