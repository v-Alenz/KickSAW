<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update password </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
    $oldpass = trim($_POST['oldpass']);
    $newpass = trim($_POST['newpass']);
    $newppass = trim($_POST['newppass']);

    if(!empty($oldpass) & !empty($newpass) & !empty($newppass)){

        if( $newpass === $newppass){

            include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

            $query= "SELECT password FROM utente where uid = ?";

            include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

            mysqli_stmt_bind_param($stmt, "s", $_SESSION["uid"] );

            include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

            include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

            $res=mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($res) === 1){
                
                $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                if( password_verify($oldpass, $row["password"]) ){

                    $newpasscifr = password_hash($newpass, PASSWORD_DEFAULT);

                    $query= "UPDATE utente set password = ? where uid = ?";

                    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";
    
                    mysqli_stmt_bind_param($stmt, "ss", $newpasscifr, $_SESSION["uid"] );
    
                    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";
    
                    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";
    
                    if ( mysqli_affected_rows($conn) === 0){
    
                        echo("Errore, riprova più tardi!");
                        header("Refresh:2; url=/progetto/account/modificapass.php");
    
                    }else{
                        echo("Modifica della password avvenuta con sucesso!");
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
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
