<?php

ini_set('display_errors', false);
ini_set('error_log', 'php.log');

if(isset($query)){

    if (!($stmt = mysqli_prepare($conn,$query) )) {
        error_log("Prepare failed: (" . mysqli_errno($conn) . ") " . mysqli_error($conn));
        echo("Errore, riprova più tardi!");
        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
        exit();
        header("Refresh:3; url=/progetto/startSAW.php");
    }

}else{

    include  $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";

}

?>