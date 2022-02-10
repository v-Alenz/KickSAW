
<!DOCTYPE html>
<html lang="it">
<head>
    <title> Contatta follower </title>
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

?>


<div class="wrapper">

    <?php include $_SERVER['DOCUMENT_ROOT']."/progetto/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Tieni i follower aggiornati </div>
            <div class="info">

              Cosa vuoi comunicare ai follower di "<?php echo $_POST['progetto'];?>"?

              <form action="/progetto/account/startup/prepareMail.php" method="post" id="emailtext">
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

include $_SERVER['DOCUMENT_ROOT']."/progetto/account/errora.php";

}

include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
