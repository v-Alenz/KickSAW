<?php

if(isset($_POST["email"])) {


    include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

    $emailusata = 1;        //se $emailusata = 1 -> email già usata . Se $emailusata = 0 -> non email usata

    $email=trim($_POST["email"]);

    $query = "SELECT * FROM utente where email = ? ";

    include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "s", $email);

    include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

    include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($res) == 1){
        echo "Email già usata, riprova!";
    }else{
        //echo "Registrazione avvenuta con successo!";
        //echo "Operazione avvenuta con successo!";
        $emailusata = 0;
    }


}else{

    include  "/chroot/home/S4750770/public_html/sys/common/error/errore.php";

}


?>
