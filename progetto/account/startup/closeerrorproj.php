
<?php

if(!empty($titolo)){ 

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
    header("Refresh:3; url=/progetto/account/startup/creaprogetto.php");
    exit();

}else{

    include  $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";

}

?>


