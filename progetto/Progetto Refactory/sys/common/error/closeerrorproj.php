
<?php

if(!empty($titolo)){ 

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    include "/chroot/home/S4750770/public_html/www/common/footer.php";
    header("Refresh:3; url=/~S4750770/www/account/startup/creaprogetto.php");
    exit();

}else{

    include  "/chroot/home/S4750770/public_html/sys/common/error/errore.php";

}

?>


