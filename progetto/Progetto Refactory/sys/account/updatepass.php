<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update password </title>
    <link rel="stylesheet" type="text/css" href="/style.css">

    <?php
    include dirname(__FILE__)."/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include dirname(__FILE__)."/www/common/navbar.php";
?>


<div class="account-page">
    <div class="container">
        <div class="col-2">
            <div class="form-container msg">


<?php

//session_start();

if(isset($_POST["submit"])){
    $oldpass = trim($_POST['oldpass']);
    $newpass = trim($_POST['newpass']);
    $newppass = trim($_POST['newppass']);

    if(!empty($oldpass) & !empty($newpass) & !empty($newppass)){

        if (strlen($oldpass)>= 8 && strlen($newpass)>= 8  && strlen($newppass)>= 8){

            if( $newpass === $newppass){

                include dirname(__FILE__)."/sys/common/db/conn/connDbUtente.php";

                $query= "SELECT password FROM utente where idUtente = ?";

                include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

                mysqli_stmt_bind_param($stmt, "s", $_SESSION["uid"] );

                include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

                include dirname(__FILE__)."/sys/common/db/executequery.php";

                $res=mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($res) === 1){

                    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                    if( password_verify($oldpass, $row["password"]) ){

                        $newpasscifr = password_hash($newpass, PASSWORD_DEFAULT);

                        $query= "UPDATE utente set password = ? where idUtente = ?";

                        include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

                        mysqli_stmt_bind_param($stmt, "ss", $newpasscifr, $_SESSION["uid"] );

                        include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

                        include dirname(__FILE__)."/sys/common/db/executequery.php";

                        if ( mysqli_affected_rows($conn) === 0){

                            echo("Errore, riprova più tardi!");
                            header("Refresh:2; url=/progetto/account/modificapass.php");

                        }else{
                            echo("Modifica della password avvenuta con successo!");
                            header("Refresh:2; url=/progetto/account/show_profile.php");
                        }

                    }else{
                        echo("Vecchia password errata, riprova!");
                        header("Refresh:2; url=/progetto/account/modificapass.php");
                    }

                }else{
                    echo("Errore, riprova più tardi!");
                    header("Refresh:2; url=/progetto/startSAW.php");
                }

            }else{
                echo("Le nuove password non combaciano, riprova!");
                header("Refresh:2; url=/progetto/account/modificapass.php");
            }

        }else{
            echo("Le password troppo lunga, riprova!");
            header("Refresh:2; url=/progetto/account/modificapass.php");
        }

    }else{
        echo("Mancano dei dati, riprova!");
        header("Refresh:2; url=/progetto/account/modificapass.php");
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
include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
