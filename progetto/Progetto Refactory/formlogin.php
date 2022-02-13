<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" type="text/css" href="/style.css">

    <?php
    include dirname(__FILE__)."/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include dirname(__FILE__)."/www/common/navbar.php";
?>


<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="form-container log">
                    <div class="form-btn">
                        <span>Loggati</span>
                    </div>
                    <form id="form" action="/progetto/login.php" method="post">
                            <input type="email" name="email" placeholder="Email" class="form-control" id="email">
                            <div id="emailerror" class="error"></div>
                            <input type="password" name="pass" placeholder="Password" class="form-control" id="pass" minlength="8">
                            <div id="passerror" class="error"></div>
                            <input type="submit" name="submit" value="Loggati" class="btn">
                    </form>
                </div>
           </div>
            <div class="col-2">
                <img class="img" src="/progetto/immagini/piplog.png" alt="immagine login">
            </div>
        </div>
    </div>
</div>


<?php
include dirname(__FILE__)."/www/common/footer.php";
?>

<script src="/progetto/common/controlinput.js"></script>

</body>
</html>
