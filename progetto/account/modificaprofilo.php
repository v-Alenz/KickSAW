<!DOCTYPE html>
<html lang="it">
<head>
    <title> Modifica profilo </title>
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
        <div class="header"> Modifica profilo </div>
            <div class="info">

                <?php
                include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

                $query = "SELECT * FROM utente where idUtente = ? ";

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

                mysqli_stmt_bind_param($stmt, "s", $_SESSION["uid"]);

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

                include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

                $res=mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($res) === 1){

                    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                    ?>
                    <form action="/progetto/account/update_profile.php" method="post">
                        <div>Nome : <input type="text" name="firstname" class="form-control" value="<?php echo $row['nome'] ?>" > </div>
                        <div>Cognome : <input type="text" name="lastname" class="form-control" value="<?php echo $row['cognome'] ?>" > </div>
                        <div>Email : <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>" > </div>
                        <div>Data di nascita : <input type="date" name="datan" class="form-control" value="<?php echo $row['dataNascita'] ?>" > </div>
                        <div>Indirizzo : <input type="text" name="indirizzo" class="form-control" value="<?php echo $row['indirizzo'] ?>" > </div>
                        <div>Genere :
                          <select name="genere" id="genere" class="form-control">
                              <option
                                <?php
                                  if ($row["genere"] == 'maschio') {
                                    echo " selected ";
                                  }
                                ?>
                                value="maschio">Maschio</option>
                              <option
                                <?php
                                  if ($row["genere"] == 'femmina') {
                                    echo " selected ";
                                  }
                                ?>
                                value="femmina">Femmina</option>
                              <option
                                <?php
                                  if ($row["genere"] == 'preferisco non specificare') {
                                    echo " selected ";
                                  }
                                ?>
                                value="preferisco non specifare">Preferisco non specifare</option>
                          </select>
                        </div>
                        <input type="submit" name="submit" value="Modifica" class="btn">
                    </form>

                    <?php
                }else{

                    echo("Errore, riprova più tardi!");
                    header("Refresh:2; url=/progetto/startSAW.php");

                }
                ?>

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
