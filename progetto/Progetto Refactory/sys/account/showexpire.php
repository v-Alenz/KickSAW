<?php

if(isset($_SESSION["loggato"])){

  include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

  $query="SELECT scadenzaLicenza FROM ruolo WHERE Utente_idUtente = ?";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

  $res=mysqli_stmt_get_result($stmt);
  $statoUtente = mysqli_fetch_array($res, MYSQLI_ASSOC);
  $scadenza=$statoUtente['scadenzaLicenza'];

}

else{

    include  $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";
}
?>
