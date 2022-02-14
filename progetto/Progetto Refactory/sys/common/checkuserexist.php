<?php

if(isset($_POST["email"])) {

    include dirname(__FILE__)."/sys/common/db/conn/connDbUtente.php";

    $query = "SELECT email FROM utente WHERE email = ?
              AND email NOT IN(
                SELECT email
                FROM utente
                WHERE idUtente = ? ) ";

    include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "si", $email, $_SESSION["uid"]);

    include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

    include dirname(__FILE__)."/sys/common/db/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($res) === 1){

        echo("Questa email è già stata usata, riprova!");
        ?>           </div>
                </div>
            </div>
        </div>
        <?php
        include dirname(__FILE__)."/www/common/footer.php";
        header("Refresh:2; url=/www/account/modificaprofilo.php");
        exit();

    }


}else{

    include  dirname(__FILE__)."/sys/common/error/errore.php";

}


?>
