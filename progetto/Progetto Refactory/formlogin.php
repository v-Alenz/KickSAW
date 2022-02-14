<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include "/chroot/home/S4750770/public_html/www/common/navbar.php";
?>


<div class="sfondopagprincipale">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="form-container log">
                    <div class="form-btn">
                        <span>Loggati</span>
                    </div>
                    <form id="form" action="/~S4750770/login.php" method="post">
                            <input type="email" name="email" placeholder="Email" class="form-control" id="email">
                            <div id="emailerror" class="error"></div>
                            <input type="password" name="pass" placeholder="Password" class="form-control" id="pass" minlength="8">
                            <div id="passerror" class="error"></div>
                            <input type="submit" name="submit" value="Loggati" class="btn">
                    </form>
                </div>
           </div>
            <div class="col-2">
                <img class="img" src="/~S4750770/www/immagini/piplog.png" alt="immagine login">
            </div>
        </div>
    </div>
</div>


<?php
include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

<script src="/~S4750770/sys/controlinput.js"></script>

</body>
</html>
