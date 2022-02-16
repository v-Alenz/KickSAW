
<?php if(isset($_SESSION["loggato"])){    ?>

  <div class="sidebar">
      <ul>
          <li><a href="/~S4750770/show_profile.php">Profilo</a></li>
          <li><a href="/~S4750770/www/account/modificaprofilo.php">Modifica profilo</a></li>
          <li><a href="/~S4750770/www/account/modificapass.php">Modifica password</a></li>
          <li><a href="/~S4750770/www/account/caricosaldo.php">Ricarica saldo</a></li>
          <li><a href="/~S4750770/www/account/accountpremium.php">Account premium</a></li>
          <li><a href="/~S4750770/www/account/cronologiadonazioni.php">Cronologia donazioni</a></li>

          <?php

          if($_SESSION["rid"] === "pro" || $_SESSION["rid"] === "admin"){
            echo '<li><a href="/~S4750770/www/account/startup/tuttiprogetti.php">I tuoi progetti</a></li>';
            echo '<li><a href="/~S4750770/www/account/startup/creaprogetto.php">Carica un nuovo progetto</a></li>';
          }
          if($_SESSION["rid"] === "admin" ){
              echo '<li><a href="/~S4750770/www/account/admin/areaadmin.php">Area admin</a></li> ';
          }
          ?>
      </ul>
  </div>

<?php  } else {
  include  "/chroot/home/S4750770/public_html/sys/common/error/errore.php";
}
?>
