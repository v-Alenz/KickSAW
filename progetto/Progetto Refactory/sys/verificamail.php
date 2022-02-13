<?php

if(!empty($email)) {


    include dirname(__FILE__)."/sys/common/db/conn/connDbUtente.php";

    $query = "SELECT * FROM utente where email = ? ";

    include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "s", $email);

    include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

    include dirname(__FILE__)."/sys/common/db/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($res) === 1){

        echo "Email già usata, riprova!";
        ?>           </div>
                </div>
            </div>
        </div>
        <?php
        include dirname(__FILE__)."/www/common/footer.php";
        header("Refresh:2; url=/progetto/startSAW.php");

    }


}else{

    include  dirname(__FILE__)."/sys/common/error/errore.php";

}


?>
