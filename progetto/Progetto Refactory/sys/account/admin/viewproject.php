<?php

//session_start();

if(isset($_SESSION["loggato"])){

    include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

    $query="SELECT progetto.nome as pnome, utente.nome as unome, cognome, idProgetto
         FROM progetto join utente on Utente_idUtente = idUtente";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) ===  0){

        echo"Tabella vuota!";

    }else{

        echo"<table>";
        echo"<tr>";
            echo"<th>Nome progetto</th>";
            echo"<th>nome autore</th>";
            echo"<th>cognome autore</th>";
            echo"<th> </th>";

        echo"</tr>";

        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){

            echo"<tr>";
                echo"<td>". $row['pnome'] . "</td>";
                echo"<td>". $row['unome']. "</td>";
                echo"<td>". $row['cognome']. "</td>";
                echo '<form action="/progetto/account/admin/eliminaprogetto.php" method="post">';
                    echo '<td><button type="submit" name="idProgetto" class="btnsmall" value="';
                    echo $row['idProgetto'];
                    echo '" class="btn-link">Elimina progetto</button></td>';
                echo '</form>';
            echo"</tr>";

        }

        echo"</table>";

    }

}else{

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";

}

?>
