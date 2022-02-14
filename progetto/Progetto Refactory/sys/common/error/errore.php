<?php
    
    echo '<link rel="stylesheet" type="text/css" href="/style.css">';

    include dirname(__FILE__)."/sys/common/googlefont.php";

    include dirname(__FILE__)."/www/common/navbar.php";

    echo '<div class="account-page">';
        echo '<div class="container">';
            echo '<div class="col-2">';
                echo '<div class="form-container msg">';


        echo("Errore, riprova più tardi!");
        header("Refresh:2; url=/startSAW.php");


                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

    include dirname(__FILE__)."/www/common/footer.php";
?>