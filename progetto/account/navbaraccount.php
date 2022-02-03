
<?php if(isset($_SESSION["loggato"])){    ?>

  <div class="sidebar">
      <ul>
          <li><a href="/progetto/account/show_profile.php">Profilo</a></li>
          <li><a href="/progetto/account/modificaprofilo.php">Modifica profilo</a></li>
          <li><a href="/progetto/account/modificapass.php">Modifica password</a></li>
          <li><a href="/progetto/account/caricosaldo.php">Ricarica saldo</a></li>
          <li><a href="/progetto/account/accountpremium.php">Account premium</a></li>

          <?php

          if($_SESSION["rid"] === "pro"){ 
            echo '<li><a href="/progetto/account/startup/tuttiprogetti.php">I tuoi progetti</a></li>';
            echo '<li><a href="/progetto/account/startup/creaprogetto.php">Carica un nuovo progetti</a></li>';
          }
          if($_SESSION["rid"] === "admin" ){
              echo '<li><a href="/progetto/account/admin/areaadmin.php">Area admin</a></li> ';
          }
          ?>
      </ul>
  </div>

<?php  } else {
  include  $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";
}
?>
