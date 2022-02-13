<!DOCTYPE html>
<html lang="it">
<head>
    <title> StartSAW </title>
    <link rel="stylesheet" type="text/css" href="/progetto/style.css">

    <?php
    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/googlefont.php";
    ?>
</head>

<?php
  define('AccessDbForProgects', TRUE);
  include $_SERVER['DOCUMENT_ROOT']."/progetto/common/loadProgects.php"
?>

<body>
<?php
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/navbar.php";
?>
<div class="sfondopagprincipalelight">
    <section id="ricerca">
        <div class="container">
            <h1>Progetti</h1>
            <form>
                <input id="searchBar" onkeyup="searchBarJS()" type="text" placeholder="Cerca per Titolo o Autore...">
                <!-- <button type="submit" class="btnsmall">Cerca</button> -->
            </form>
        </div>
    </section>
    <noscript>
        <style type="text/css">
            .pagecontainer {display:none;}
        </style>
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
                echo '<div name="progects" class="col-4">';
                echo '    <a href="/progetto/dettagliprogetto.php?prog='.$row["idProgetto"].'"><img src ="'.$row["mediaLink"].'" alt="Immagine progetto">';
                echo '    <h3>'.$row["nomeP"].'</h3>';
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
include $_SERVER['DOCUMENT_ROOT']."/progetto/common/footer.php";
?>
</body>
  <script type="text/javascript" src="searchBar.js"></script>
</html>
