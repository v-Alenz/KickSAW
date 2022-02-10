<?php

//session_start();

if(isset($_SESSION["loggato"])){

    include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

    $query="SELECT * FROM utente";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) ===  0){

        echo"Tabella vuota!";

    }else{

        echo"<table>";
        echo"<tr>";
            echo"<th>Nome</th>";
            echo"<th>Cognome</th>";
            echo"<th>Email</th>";
            echo"<th>Data di nascita</th>";
            echo"<th>Indirizzo</th>";
            echo"<th>Genere</th>";
            echo"<th> </th>";

        echo"</tr>";

        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){

            echo"<tr>";
                echo"<td>". $row['nome'] . "</td>";
                echo"<td>". $row['cognome']. "</td>";
                echo"<td>". $row['email']. "</td>";
                echo"<td>". $row['dataNascita']. "</td>";
                echo"<td>". $row['indirizzo']. "</td>";
                echo"<td>". $row['genere']. "</td>";
                echo '<form action="/progetto/account/admin/eliminautente.php" method="post">';
                    echo '<td><button type="submit" name="idUtente" class="btnsmall" value="';
                    echo $row['idUtente'];
                    echo '" class="btn-link">Elimina utente</button></td>';
                echo '</form>';
            echo"</tr>";

        }

        echo"</table>";

    }

}else{

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";

}

?>
