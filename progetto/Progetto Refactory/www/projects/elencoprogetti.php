<!DOCTYPE html>
<html lang="it">
<head>
    <title> StartSAW </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>

<body>

<?php
include "/chroot/home/S4750770/public_html/www/common/navbar.php";
?>

<?php
define('AccessDbForProgects', TRUE);
include "/chroot/home/S4750770/public_html/sys/projects/loadProgects.php"
?>

<div class="sfondopagprincipalelight elencoprogetti">
    <section id="ricerca">
        <div class="container">
            <h1>Progetti</h1>
            <form>
              <?php
                if (mysqli_num_rows($res) !=  0){
                  echo '  <input id="searchBar" onkeyup="searchBarJS()" type="text" placeholder="Cerca per Titolo o Autore...">';
                }
              ?>
            </form>
        </div>
    </section>
    <noscript>
        <div>
          <h4 class="noscriptmsg"> I tuoi JavaScript sono disabilitati, non potrai accedere a tutte le funzionalita' della pagina! </h4>
        </div>
    </noscript>
    <div id="container" class="small-container">
        <div class="row">
          <?php
          if (mysqli_num_rows($res) ===  0){

            echo "<div class='head_title'>";
            echo "  <h4> Non è stato trovato alcun progetto :( </h4><br><br>";
            echo "</div>";

            }else{
              while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                echo '<div name="progects" class="col-4 progBg">';
                echo '    <a href="/~S4750770/www/projects/dettagliprogetto.php?prog='.$row["idProgetto"].'"><img src ="'.$row["mediaLink"].'" alt="Immagine progetto" class="progPrew">';
                echo '    <h3 class="progPrew">'.$row["nomeP"].'</h3>';
                echo '    <p class="author">'.$row["nome"].' '.$row["cognome"].'</p></a>';
                echo '</div>';
              }
            }
          ?>
        </div>
        <div name="missProg" class="head_title" hidden>
          <h4> Non è stato trovato alcun progetto :( </h4><br><br>    <!--- per js --->
        </div>
    </div>
</div>
<?php
include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>
</body>
  <script type="text/javascript" src="/~S4750770/www/projects/searchBar.js"></script>
</html>
