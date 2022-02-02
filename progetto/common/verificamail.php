<?php

if(isset($_POST["email"])) {


    include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

    $email=trim($_POST["email"]);

    $query = "SELECT * FROM utente where email = ? ";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "s", $email);

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($res) == 1){

        echo "Email già usata, riprova!";
        header("Refresh:2; url=/progetto/startSAW.php");

    }


}else{

    include  $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";

}


?>
