<?php


if ( !empty($email)){
  //ricavo l'id dell'utente appena aggiunto/////////////////////////////////////
  $query="SELECT idUtente FROM utente WHERE email = ?";

  include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "s", $email);

  include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

  include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

  $res=mysqli_stmt_get_result($stmt);
  $utente = mysqli_fetch_array($res, MYSQLI_ASSOC);
  $id=$utente['idUtente'];


  //aggiungo il saldo dell'utente///////////////////////////////////////////////
  $query= "INSERT INTO saldo (Utente_idUtente) values (?)";

  include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $id);

  include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

  include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

  if ( mysqli_affected_rows($conn) === 0){
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/~S4750770/startSAW.php");
  }

  //assegno un ruolo all'utente/////////////////////////////////////////////////
  $query= "INSERT INTO ruolo (Utente_idUtente) values (?)";

  include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

  mysqli_stmt_bind_param($stmt, "i", $id);

  include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

  include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

  if ( mysqli_affected_rows($conn) === 0){
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/~S4750770/startSAW.php");
  }
}

else{

    include  "/chroot/home/S4750770/public_html/sys/common/error/errore.php";
    header("Refresh:2; url=/~S4750770/startSAW.php");
}

?>
