<?php

ini_set('display_errors', false);
ini_set('error_log', 'php.log');

if(!defined('AccessDbForProgects')){
  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";
}


  include  $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

  $query = "SELECT idProgetto, progetto.nome AS nomeP, utente.nome, cognome, mediaLink
            FROM progetto
            JOIN utente ON progetto.Utente_idUtente = utente.idUtente
            JOIN mediaprogetto ON progetto.idProgetto = mediaprogetto.Progetto_idProgetto
           ";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

  $res = mysqli_stmt_get_result($stmt);

?>
