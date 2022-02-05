
<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Trova dati mail </title>
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
        <div class="col-2">
            <div class="form-container msg">


<?php
  if(isset($_POST["nomeProgetto"])){
    //trovo dati sender
    include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

    $query= "SELECT email, nome, cognome FROM utente WHERE idUtente = ?";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"] );

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

    $res=mysqli_stmt_get_result($stmt);
    $sender= mysqli_fetch_array($res, MYSQLI_ASSOC);

    //trovo mail dei follower
    include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

    $query= "SELECT email FROM utente
             JOIN maillist ON utente.idUtente = maillist.Utente_idUtente
             JOIN Progetto ON maillist.MailList_idProgetto = progetto.idProgetto
             WHERE progetto.nome = ?";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "s", $_POST['nomeProgetto'] );

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

    $receivers=mysqli_stmt_get_result($stmt);

    while($destinatario = mysqli_fetch_array($receivers, MYSQLI_ASSOC)){

      include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/sendMail.php";

    }

    //echo "Messaggi inviati con successo";
    //header("Refresh:2; url=/progetto/account/startup/tuttiprogetti.php");

  } else{

    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/progetto/account/startup/tuttiprogetti.php");

  }
?>


            </div>
        </div>
    </div>
</div>


<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>

</body>
</html>
