<?php

if(!empty($email)) {


    include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

    $query = "SELECT * FROM utente where email = ? ";

    include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "s", $email);

    include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

    include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($res) === 1){

        echo "Email già usata, riprova!";
        ?>           </div>
                </div>
            </div>
        </div>
        <?php
        include "/chroot/home/S4750770/public_html/www/common/footer.php";
        header("Refresh:2; url=/~S4750770/startSAW.php");

    }


}else{

    include  "/chroot/home/S4750770/public_html/sys/common/error/errore.php";

}


?>
