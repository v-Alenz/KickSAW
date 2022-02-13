<?php

ini_set('display_errors', false);
ini_set('error_log', 'php.log');

if ( !empty($email)){
  //ricavo l'id dell'utente appena aggiunto/////////////////////////////////////
  $query="SELECT idUtente FROM utente WHERE email = ?";

  include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "s", $email);

  include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

  include dirname(__FILE__)."/sys/common/db/executequery.php";

  $res=mysqli_stmt_get_result($stmt);
  $utente = mysqli_fetch_array($res, MYSQLI_ASSOC);
  $id=$utente['idUtente'];


  //aggiungo il saldo dell'utente///////////////////////////////////////////////
  $query= "INSERT INTO saldo (Utente_idUtente) values (?)";

  include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $id);

  include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

  include dirname(__FILE__)."/sys/common/db/executequery.php";

  if ( mysqli_affected_rows($conn) === 0){
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/progetto/startSAW.php");
  }

  //assegno un ruolo all'utente/////////////////////////////////////////////////
  $query= "INSERT INTO ruolo (Utente_idUtente) values (?)";

  include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $id);

  include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

  include dirname(__FILE__)."/sys/common/db/executequery.php";

  if ( mysqli_affected_rows($conn) === 0){
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/progetto/startSAW.php");
  }
}

else{

    include  dirname(__FILE__)."/sys/common/error/errore.php";
    header("Refresh:2; url=/progetto/startSAW.php");
}

?>
