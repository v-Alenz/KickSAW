<!DOCTYPE html>
<html lang="it">
<head>
    <title> Visualizza profilo </title>
    <link rel="stylesheet" type="text/css" href="/style.css">

    <?php
    include dirname(__FILE__)."/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include dirname(__FILE__)."/www/common/navbar.php";

//session_start();

if(isset($_SESSION["loggato"])){

?>


<div class="wrapper">

<?php include dirname(__FILE__)."/www/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header">Profilo </div>
            <div class="info">

                <?php
                include dirname(__FILE__)."/sys/common/db/conn/connDbUtente.php";

                $query = "SELECT * FROM utente JOIN saldo ON idUtente=Utente_idUtente where idUtente = ? ";

                include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

                mysqli_stmt_bind_param($stmt, "s", $_SESSION["uid"]);

                include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

                include dirname(__FILE__)."/sys/common/db/executequery.php";

                $res=mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($res) === 1){

                    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                    ?>

                    <div>Nome : <?php echo $row["nome"] ?> </div>

                    <div>Cognome : <?php echo $row["cognome"] ?> </div>

                    <div>Email : <?php echo $row["email"] ?> </div>

                    <div>Data di nascita : <?php echo $row["dataNascita"] ?> </div>

                    <div>Indirizzo : <?php echo $row["indirizzo"] ?> </div>

                    <div>Genere : <?php echo $row["genere"] ?> </div>

                    <div>Saldo : <?php echo  $row["starterbits"] ?> </div>


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

    include dirname(__FILE__)."/sys/common/error/errora.php";

}

include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
