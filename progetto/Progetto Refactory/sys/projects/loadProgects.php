<?php

ini_set('display_errors', false);
ini_set('error_log', 'php.log');

if(!defined('AccessDbForProgects')){
  include dirname(__FILE__)."/sys/common/error/errore.php";
}


  include  dirname(__FILE__)."/sys/common/db/conn/connDbUtente.php";

  $query = "SELECT idProgetto, progetto.nome AS nomeP, utente.nome, cognome, mediaLink
            FROM progetto
            JOIN utente ON progetto.Utente_idUtente = utente.idUtente
            JOIN mediaprogetto ON progetto.idProgetto = mediaprogetto.Progetto_idProgetto
           ";

  include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

  include dirname(__FILE__)."/sys/common/db/executequery.php";

  $res = mysqli_stmt_get_result($stmt);

?>
