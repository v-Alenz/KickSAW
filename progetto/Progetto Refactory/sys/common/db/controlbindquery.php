<?php

ini_set('display_errors', false);
ini_set('error_log', 'php.log');

if(isset($query)) {

    if(!$stmt){
        error_log("Binding parameters failed: (" . mysqli_errno($stmt) . ")" .  mysqli_error($stmt));
        echo("Errore, riprova più tardi!");
        include dirname(__FILE__)."/www/common/footer.php";
        exit();
        header("Refresh:3; url=/startSAW.php");
    }
    
}else{

    include  dirname(__FILE__)."/sys/common/error/errore.php";

}

?>