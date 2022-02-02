<?php

ini_set('display_errors', false);
ini_set('error_log', 'php.log');

if ( !empty($nome) & !empty($cognome)){
  //ricavo l'id dell'utente appena aggiunto/////////////////////////////////////
  $query="SELECT idUtente FROM utente WHERE email = ?";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "s", $email);

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

  $res=mysqli_stmt_get_result($stmt);
  $utente = mysqli_fetch_array($res, MYSQLI_ASSOC);
  $id=$utente['idUtente'];


  //aggiungo il saldo dell'utente///////////////////////////////////////////////
  $query= "INSERT INTO saldo (Utente_idUtente) values (?)";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $id);

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

  if ( mysqli_affected_rows($conn) === 0){
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/progetto/startSAW.php");
  }

  //assegno un ruolo all'utente/////////////////////////////////////////////////
  $query= "INSERT INTO ruolo (Utente_idUtente) values (?)";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $id);

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

  if ( mysqli_affected_rows($conn) === 0){
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/progetto/startSAW.php");
  }
}

else{

    include  $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";
    header("Refresh:2; url=/progetto/startSAW.php");
}

?>
