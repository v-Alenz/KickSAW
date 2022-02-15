<?php

if(isset($_SESSION["loggato"])){

  include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

  $query="SELECT scadenzaLicenza FROM ruolo WHERE Utente_idUtente = ?";

  include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

  include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

  include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

  $res=mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($res) === 1){

    $statoUtente = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $scadenza=$statoUtente['scadenzaLicenza'];

  }else{

    $scadenza='error';
    
  }

}

else{

    include  "/chroot/home/S4750770/public_html/sys/common/error/errore.php";
}
?>
