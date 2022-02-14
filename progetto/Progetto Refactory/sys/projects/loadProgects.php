<?php

ini_set('display_errors', false);
ini_set('error_log', 'php.log');

if(!defined('AccessDbForProgects')){
  include "/chroot/home/S4750770/public_html/sys/common/error/errore.php";
}


  include  "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

  $query = "SELECT idProgetto, progetto.nome AS nomeP, utente.nome, cognome, mediaLink
            FROM progetto
            JOIN utente ON progetto.Utente_idUtente = utente.idUtente
            JOIN mediaprogetto ON progetto.idProgetto = mediaprogetto.Progetto_idProgetto
           ";

  include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

  include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

  $res = mysqli_stmt_get_result($stmt);

?>
