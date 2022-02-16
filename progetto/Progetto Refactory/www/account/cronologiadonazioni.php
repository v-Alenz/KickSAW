<!DOCTYPE html>
<html lang="it">
<head>
    <title> Cronologia donazioni </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include "/chroot/home/S4750770/public_html/www/common/navbar.php";

//session_start();

if(isset($_SESSION["loggato"]) ){

?>


<div class="wrapper">

    <?php include "/chroot/home/S4750770/public_html/www/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Cronologia donazioni  </div>
            <div class="info">

                <?php

                include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

                $query="SELECT nome,introduzione, ammount
                        FROM finanzia JOIN progetto ON idProgetto=Progetto_idProgetto
                        AND finanzia.Utente_idUtente= ?";

                include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

                mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);

                include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

                include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

                $res=mysqli_stmt_get_result($stmt);
            
                if (mysqli_num_rows($res) ===  0){
            
                    echo"Non hai ancora fatto delle donazioni!";
            
                }else{

                    echo"<table>";
                    echo"<tr>";
                        echo"<th>Titolo</th>";
                        echo"<th>Introduzione</th>";
                        echo"<th> € donati </th>";
            
                    echo"</tr>";
            
                    while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            
                        echo"<tr>";
                            echo"<td>". $row['nome'] . "</td>";
                            echo"<td>". $row['introduzione']. "</td>";
                            echo"<td>". $row['ammount']. " € </td>";
                        echo"</tr>";
            
                    }
            
                    echo"</table>";
            
                }
                
                ?>

            </div>
        </div>
    </div>
</div>

<?php

}else{

include "/chroot/home/S4750770/public_html/sys/common/error/errora.php";

}

include "/chroot/home/S4750770/public_html/www/common/footer.php";
?>

</body>
</html>
