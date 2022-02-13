<!DOCTYPE html>
<html lang="it">
<head>
    <title> Elimina progetto </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
    
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";

//session_start();

if(isset($_SESSION["loggato"])){

    if($_SESSION["rid"] === "admin" ){

    ?>


    <div class="wrapper">

        <?php include $_SERVER['DOCUMENT_ROOT']."/progetto/account/navbaraccount.php"; ?>

        <div class="content">
            <div class="header"> Elimina Progetto </div>
                <div class="info">

                    <form action="/progetto/account/admin/deleteproject.php" method="post">
                        <div> Sei sicuro di voler eliminare questo progetto " numero <?php echo $_POST['idProgetto'];?> " ? </div>
                        <button type="submit" name="eliminaprogetto"  class="btnsmall" 
                        value=<?php echo $_POST['idProgetto'] ?>>Elimina Definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

    }else{

        include $_SERVER['DOCUMENT_ROOT']."/progetto/account/admin/errorenoadmin.php";
        
    }
    
}else{

    include $_SERVER['DOCUMENT_ROOT']."/progetto/account/errora.php";

}

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
