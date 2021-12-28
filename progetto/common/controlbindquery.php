<?php

ini_set('display_errors', false);
ini_set('error_log', 'php.log');

if(isset($query)) {

    if(!$stmt){
        error_log("Binding parameters failed: (" . mysqli_errno($stmt) . ")" .  mysqli_error($stmt));
        echo("Errore, riprova più tardi!");
        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
        exit();
        header("Refresh:3; url=/progetto/startSAW.php");
    }
    
}else{

    include  $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";

}

?>