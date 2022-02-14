
<!DOCTYPE html>
<html lang="it">
<head>
    <title> Contatta follower </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include "/chroot/home/S4750770/public_html/www/common/navbar.php";

//session_start();

if(isset($_SESSION["loggato"]) && isset($_POST['progetto'])  ){

?>


<div class="wrapper">

    <?php include "/chroot/home/S4750770/public_html/www/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Tieni i follower aggiornati </div>
            <div class="info">

              Cosa vuoi comunicare ai follower di "<?php echo $_POST['progetto'];?>"?

              <form action="/~S4750770/sys/account/startup/prepareMail.php" method="post" id="emailtext">
                <textarea rows="5" cols="160" name="testoMail" form="emailtext" placeholder="Enter text here"></textarea>

                <button type="submit" name="nomeProgetto" class="btn" value=<?php echo $_POST['progetto'] ?>>
                Invia</button>
              </form>

            </div>
        </div>
    </div>
</div>

<?php

}else{

include "/chroot/home/S4750770/public_html/sys/common/error/errora.php";

}

include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
