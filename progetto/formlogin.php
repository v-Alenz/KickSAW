<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";
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
                            <input type="password" name="pass" placeholder="Password" class="form-control" id="pass">
                            <div id="passerror" class="error"></div>
                            <input type="submit" name="submit" value="Loggati" class="btn">
                    </form>
                </div>
           </div>
            <div class="col-2">
                <img class="img" src="/progetto/immagini/gabibbo.jpg" alt="">
            </div>
        </div>
    </div>
</div>


<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

<script src="/progetto/common/controlinput.js"></script>

</body>
</html>
