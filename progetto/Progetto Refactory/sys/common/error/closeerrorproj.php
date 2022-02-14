
<?php

if(!empty($titolo)){ 

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    include dirname(__FILE__)."/www/common/footer.php";
    header("Refresh:3; url=/www/account/startup/creaprogetto.php");
    exit();

}else{

    include  dirname(__FILE__)."/sys/common/error/errore.php";

}

?>


