
<!DOCTYPE html>
<html lang="it">
<head>
    <title> Contatta follower </title>
    <link rel="stylesheet" type="text/css" href="/style.css">

    <?php
    include dirname(__FILE__)."/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include dirname(__FILE__)."/www/common/navbar.php";

//session_start();

if(isset($_SESSION["loggato"]) && isset($_POST['progetto'])  ){

?>


<div class="wrapper">

    <?php include dirname(__FILE__)."/www/account/navbaraccount.php"; ?>

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

include dirname(__FILE__)."/sys/common/error/errora.php";

}

include dirname(__FILE__)."/www/common/footer.php";
?>

</body>
</html>
