<!DOCTYPE html>
<html lang="it">
<head>
    <title> Elimina utente </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>

</head>
<body>

<?php
include "/chroot/home/S4750770/public_html/www/common/navbar.php";

//session_start();

if(isset($_SESSION["loggato"])){

    if(!isset($_POST['nome']) || !isset($_POST['idUtente'])){
      include "/chroot/home/S4750770/public_html/sys/common/error/errora.php";
      include "/chroot/home/S4750770/public_html/www/common/footer.php";
      exit();
    }

    if($_SESSION["rid"] === "admin" ){

    ?>


    <div class="wrapper">

        <?php include "/chroot/home/S4750770/public_html/www/account/navbaraccount.php"; ?>

        <div class="content">
            <div class="header"> Elimina Utente </div>
                <div class="info">

                    <form action="/~S4750770/sys/account/admin/deleteuser.php" method="post">
                        <div> Sei sicuro di voler eliminare l'utente "<?php echo $_POST['nome'];?>"?</div>
                        <button type="submit" name="eliminautente"  class="btnsmall"
                        value=<?php echo $_POST['idUtente'] ?>>Elimina Definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

    }else{

        include "/chroot/home/S4750770/public_html/sys/common/error/errorenoadmin.php";

    }

}else{

    include "/chroot/home/S4750770/public_html/sys/common/error/errora.php";

}

include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
