<!DOCTYPE html>
<html lang="it">
<head>
    <title> Visualizza profilo </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";

//session_start();

if(isset($_SESSION["loggato"])){

?>


<div class="wrapper">

<?php include $_SERVER['DOCUMENT_ROOT']."/progetto/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header">Profilo </div>
            <div class="info">

                <?php
                include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

                $query = "SELECT * FROM utente where uid = ? ";

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

                mysqli_stmt_bind_param($stmt, "s", $_SESSION["uid"]);

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

                $res=mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($res) === 1){

                    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                    ?>

                    <div>Nome : <?php echo $row["nome"] ?> </div>

                    <div>Cognome : <?php echo $row["cognome"] ?> </div>

                    <div>Email : <?php echo $row["email"] ?> </div>

                    <div>Data di nascita : <?php echo $row["datan"] ?> </div>

                    <div>Indirizzo : <?php echo $row["indirizzo"] ?> </div>

                    <div>Genere : <?php echo $row["genere"] ?> </div>

                    <div>Saldo : <?php echo  $row["saldo"] ?> </div>


                    <?php
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

}else{

    include $_SERVER['DOCUMENT_ROOT']."/progetto/account/errora.php";

}

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
