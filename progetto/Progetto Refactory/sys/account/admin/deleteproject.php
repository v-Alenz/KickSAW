<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Delete project </title>
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

if(isset($_POST["eliminaprogetto"])){

    $idprogetto = $_POST['eliminaprogetto'];

    include dirname(__FILE__)."/sys/common/db/conn/connDbUtente.php";

    $query= "DELETE FROM progetto WHERE idProgetto = ?";

    include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "i", $idprogetto );

    include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

    include dirname(__FILE__)."/sys/common/db/executequery.php";

    if ( mysqli_affected_rows($conn) === 0){

        echo("Errore, riprova più tardi!");
        header("Refresh:2; url=/www/account/admin/areaadmin.php");

    }else{

            echo("Progetto eliminato con successo");
            header("Refresh:2; url=/www/account/admin/vedituttiprogetti.php");

        }


}else{

    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/startSAW.php");

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
