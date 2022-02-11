<?php

if(isset($_POST["email"])) {

    include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

    $query = "SELECT email FROM utente WHERE email = ?
              AND email NOT IN(
                SELECT email 
                FROM utente
                WHERE idUtente = ? ) ";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "si", $email, $_SESSION["uid"]);

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($res) === 1){

        echo("Questa email è già stata usata, riprova!");
        ?>           </div>
                </div>
            </div>
        </div>
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
        header("Refresh:2; url=/progetto/account/modificaprofilo.php");
        exit();

    }


}else{

    include  $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";

}


?>
