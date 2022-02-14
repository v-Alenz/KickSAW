<?php

ini_set('display_errors', false);
ini_set('error_log', 'php.log');

if(isset($query)){

    if (!($stmt = mysqli_prepare($conn,$query) )) {
        error_log("Prepare failed: (" . mysqli_errno($conn) . ") " . mysqli_error($conn));
        echo("Errore, riprova più tardi!");
        include dirname(__FILE__)."/www/common/footer.php";
        exit();
        header("Refresh:3; url=/startSAW.php");
    }

}else{

    include  dirname(__FILE__)."/sys/common/error/errore.php";

}

?>