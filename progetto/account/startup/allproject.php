<?php

//session_start();

if($_SESSION["rid"] === "pro"){

    include $_SERVER['DOCUMENT_ROOT']."/progetto/conn/connDbUtente.php";

    $query="SELECT * FROM progetto WHERE Utente_idUtente= ?";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlpreparequery.php";

    mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/controlbindquery.php";

    include $_SERVER['DOCUMENT_ROOT']."/progetto/common/executequery.php";

    $res=mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) ===  0){

        echo"Tabella vuota!";

    }else{

        echo"<table>";

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
    echo("Errore, riprova più tardi!");
    header("Refresh:2; url=/progetto/startSAW.php");

}

?>
