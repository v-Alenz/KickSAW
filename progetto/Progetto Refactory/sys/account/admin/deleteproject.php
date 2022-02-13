<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Delete project </title>
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

if(isset($_POST["eliminaprogetto"])){

    $idprogetto = $_POST['eliminaprogetto'];

    include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

    $query= "DELETE FROM progetto WHERE idProgetto = ?";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "i", $idprogetto );

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

    if ( mysqli_affected_rows($conn) === 0){
        
        echo("Errore, riprova più tardi!");
        header("Refresh:2; url=/progetto/account/admin/areaadmin.php");

    }else{

            echo("Progetto eliminato con successo");
            header("Refresh:2; url=/progetto/account/admin/vedituttiprogetti.php");

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

