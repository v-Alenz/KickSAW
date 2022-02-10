<?php

//session_start();

if(isset($_SESSION["loggato"])){

    if($_SESSION["rid"] === "pro"){

        include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

        $query="SELECT * FROM progetto WHERE Utente_idUtente= ?";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

        include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

        $res=mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) ===  0){

            echo"Non hai ancora caricato nessun progetto!";

        }else{

            echo"<table>";
            echo"<tr>";
                echo"<th> </th>";
                echo"<th>Nome progetto</th>";
                echo"<th>Introduzione</th>";
                echo"<th> </th>";
                echo"<th> </th>";
            echo"</tr>";

            $numProj=1;
            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){

                echo"<tr>";
                    echo"<td>". $numProj . "</td>";
                    echo"<td>". $row['nome'] . "</td>";
                    echo"<td>". $row['introduzione']. "</td>";
                        echo '<form action="/progetto/account/startup/scriviMail.php" method="post">';
                            echo '<td><button type="submit" name="progetto" class="btnsmall" value="';
                            echo $row['nome'];
                            echo '" class="btn-link">Aggiorna i follower</button></td>';
                        echo '</form>';
                    echo '<td><a href="'.'/progetto/dettagliprogetto.php?prog='.$row['idProgetto'].'" class="btnsmall">Visualizza</a>';
                echo"</tr>";
                $numProj=$numProj+1;
            }

            echo"</table>";

        }

    }else{
        
        include $_SERVER['DOCUMENT_ROOT']."/progetto/account/startup/errorenopro.php";

    }

}else{

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/errore.php";


}

?>
