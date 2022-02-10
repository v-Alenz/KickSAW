<?php

if(!empty($titolo)) {


    include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

    $query = "SELECT * FROM progetto where nome = ? ";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "s", $titolo);

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($res) == 1){

        echo "Nome del titolo già usato, riprova con un altro!";
        ?>          </div>
                </div>
            </div>
        </div>

        <?php
        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
        header("Refresh:2; url=/progetto/account/startup/creaprogetto.php");
        exit();

    }


}else{

    include  $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";

}


?>
