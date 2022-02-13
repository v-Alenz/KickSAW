<?php

if(isset($_SESSION["loggato"])){

  include dirname(__FILE__)."/sys/common/db/conn/connDbUtente.php";

  $query="SELECT scadenzaLicenza FROM ruolo WHERE Utente_idUtente = ?";

  include dirname(__FILE__)."/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

  include dirname(__FILE__)."/sys/common/db/controlbindquery.php";

  include dirname(__FILE__)."/sys/common/db/executequery.php";

  $res=mysqli_stmt_get_result($stmt);
  $statoUtente = mysqli_fetch_array($res, MYSQLI_ASSOC);
  $scadenza=$statoUtente['scadenzaLicenza'];

}

else{

    include  dirname(__FILE__)."/sys/common/error/errore.php";
}
?>
