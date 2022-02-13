<?php
    
    echo '<link rel="stylesheet" type="text/css" href="/progetto/style.css">';

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";

    echo '<div class="account-page">';
        echo '<div class="container">';
            echo '<div class="col-2">';
                echo '<div class="form-container msg">';


        echo("Errore, riprova più tardi!");
        header("Refresh:2; url=/progetto/startSAW.php");


                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>