<!DOCTYPE html>
<html lang="it">
<head>
    <title> Elimina utente </title>
    <link rel="stylesheet" type="text/css" href="/style.css">

    <?php
    include dirname(__FILE__)."/sys/common/googlefont.php";
    ?>
    
</head>
<body>

<?php
include dirname(__FILE__)."/www/common/navbar.php";

//session_start();

if(isset($_SESSION["loggato"])){

    if($_SESSION["rid"] === "admin" ){

    ?>


    <div class="wrapper">

        <?php include dirname(__FILE__)."/www/account/navbaraccount.php"; ?>

        <div class="content">
            <div class="header"> Elimina Utente </div>
                <div class="info">

                    <form action="/progetto/account/admin/deleteuser.php" method="post">
                        <div> Sei sicuro di voler eliminare questo utente " numero <?php echo $_POST['idUtente'];?> " ? </div>
                        <button type="submit" name="eliminautente"  class="btnsmall" 
                        value=<?php echo $_POST['idUtente'] ?>>Elimina Definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

    }else{

        include dirname(__FILE__)."/sys/common/error/errorenoadmin.php";
        
    }
    
}else{

    include dirname(__FILE__)."/sys/common/error/errora.php";

}

include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
