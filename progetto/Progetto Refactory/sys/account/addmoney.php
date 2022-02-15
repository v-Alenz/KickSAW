<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add money </title>
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

    $money = trim($_POST['money']);

    if(!empty($money) && $money>0 && is_numeric($money)){

        include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

        $query = "SELECT starterbits
        FROM saldo
        WHERE Utente_idUtente = ?";

        include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

        include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

        include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1){

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if($row['starterbits'] + $money <= 2000000000 ){

                $query= "UPDATE saldo set starterbits = starterbits + ? where Utente_idUtente = ?";

                include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

                mysqli_stmt_bind_param($stmt, "is", $money, $_SESSION["uid"] );

                include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

                include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

                if ( mysqli_affected_rows($conn) === 0){

                    echo("Errore, riprova più tardi!");
                    header("Refresh:2; url=/~S4750770/www/account/caricosaldo.php");

                }else{

                    echo("Il tuo conto è stato ricaricato con successo!");
                    header("Refresh:2; url=/~S4750770/show_profile.php");
                }

            }else{

                echo("Non puoi caricare tutti questi soldi, riprova!");
                header("Refresh:2; url=/~S4750770/www/account/caricosaldo.php");
            }

        }else{

            echo("Errore, riprova più tardi!");
            header("Refresh:2; url=/~S4750770/www/account/caricosaldo.php");

        }

    }else{
        echo("Inserisci una quantità valida, riprova!");
        header("Refresh:2; url=/~S4750770/www/account/caricosaldo.php");
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
