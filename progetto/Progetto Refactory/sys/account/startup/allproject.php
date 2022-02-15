<?php

//session_start();

if(isset($_SESSION["loggato"])){

    if($_SESSION["rid"] === "pro" || $_SESSION["rid"] === "admin"){

        include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

        $query="SELECT * FROM progetto WHERE Utente_idUtente= ?";

        include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

        mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

        include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

        include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

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
                echo"<th> </th>";
            echo"</tr>";

            $numProj=1;
            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){

                echo"<tr>";
                    echo"<td>". $numProj . "</td>";
                    echo"<td>". $row['nome'] . "</td>";
                    echo"<td>". $row['introduzione']. "</td>";

                    echo '<form action="/~S4750770/www/account/startup/scriviMail.php" method="post">';
                        echo '<td><button type="submit" name="progetto" class="btnsmall" value="';
                        echo $row['nome'];
                        echo '" class="btn-link">Aggiorna i follower</button></td>';
                    echo '</form>';

                    echo '<td><a href="/~S4750770'.'/www/projects/dettagliprogetto.php?prog='.$row['idProgetto'].'" class="btnsmall">Visualizza</a>';
                
                    echo '<form action="/~S4750770/www/account/startup/donatori.php" method="post">';
                        echo '<td><button type="submit" name="donatori" class="btnsmall" value="';
                        echo $row['idProgetto'];
                        echo '" class="btn-link">Donatori</button></td>';
                    echo '</form>'; 

                echo"</tr>";
            $numProj=$numProj+1;

            }

            echo"</table>";

        }

    }else{

        include "/chroot/home/S4750770/public_html/sys/common/error/errorenopro.php";

    }

}else{

    include "/chroot/home/S4750770/public_html/sys/common/error/errore.php";


}

?>
