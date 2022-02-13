<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registrazione </title>
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
                <img class="img" src="/progetto/immagini/pipreg.png" alt="immagine registration">
            </div>
            <div class="col-2">
                <div class="form-container reg">
                    <div class="form-btn">
                        <span>Registrati</span>
                    </div>
                    <form id="form" action="/progetto/registration.php" method="post">
                            <input type="text" name="firstname" placeholder="Nome" class="form-control">
                            <input type="text" name="lastname" placeholder="Cognome" class="form-control">
                            <input type="email" name="email" placeholder="Email" class="form-control" id="email" onchange="checkemail('/progetto/common/checkemail.php');">
                            <div id="emailerror" class="error"></div>
                            <input type="password" name="pass" placeholder="Password" class="form-control" id="pass" minlength="8">
                            <div id="passerror" class="error"></div>
                            <input type="password" name="confirm" placeholder="Conferma password" class="form-control" minlength="8">
                            <input type="submit" name="submit" value="Registrati" class="btn">
                    </form>
                </div>
           </div>
        </div>
    </div>
</div>


<?php
include dirname(__FILE__)."/www/common/footer.php";
?>

<script src="/progetto/common/checkemail.js"></script>
<script src="/progetto/common/controlinput.js"></script>


</body>
</html>