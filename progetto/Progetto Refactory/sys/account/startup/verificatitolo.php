<?php

if(!empty($titolo)) {


    include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

    $query = "SELECT * FROM progetto where nome = ? ";

    include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "s", $titolo);

    include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

    include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($res) == 1){

        echo "Nome del titolo già usato, riprova con un altro!";
        ?>          </div>
                </div>
            </div>
        </div>

        <?php
        include "/chroot/home/S4750770/public_html/www/common/footer.php";
        header("Refresh:2; url=/~S4750770/www/account/startup/creaprogetto.php");
        exit();

    }


}else{

    include  "/chroot/home/S4750770/public_html/sys/common/error/errore.php";

}


?>
