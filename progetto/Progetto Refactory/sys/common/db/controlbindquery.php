<?php

//ini_set('display_errors', false);
//ini_set('error_log', 'php.log');

if(isset($query)) {

    if(!$stmt){
        echo("Errore, riprova più tardi!"."</div></div></div></div>");
        include "/chroot/home/S4750770/public_html/www/common/footer.php";
        exit();
        header("Refresh:3; url=/~S4750770/startSAW.php");
    }

}else{

    include  "/chroot/home/S4750770/public_html/sys/common/error/errore.php";

}

?>
