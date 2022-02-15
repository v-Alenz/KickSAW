<!DOCTYPE html>
<html lang="it">
<head>
    <title> Donatori </title>
    <link rel="stylesheet" type="text/css" href="/~S4750770/style.css">

    <?php
    include "/chroot/home/S4750770/public_html/sys/common/googlefont.php";
    ?>
</head>
<body>

<?php
include "/chroot/home/S4750770/public_html/www/common/navbar.php";

//session_start();

if(isset($_SESSION["loggato"]) && isset($_POST['donatori']) ){

?>


<div class="wrapper">

    <?php include "/chroot/home/S4750770/public_html/www/account/navbaraccount.php"; ?>

    <div class="content">
        <div class="header"> Donatori del progetto  </div>
            <div class="info">

                <?php

                include "/chroot/home/S4750770/public_html/sys/common/db/conn/connDbUtente.php";

                $query="SELECT nome,cognome,Ammount
                        FROM finanzia JOIN utente ON idUtente=Utente_idUtente
                        AND Progetto_idProgetto= ?";

                include "/chroot/home/S4750770/public_html/sys/common/db/controlpreparequery.php";

                mysqli_stmt_bind_param($stmt, "i", $_POST['donatori']);

                include "/chroot/home/S4750770/public_html/sys/common/db/controlbindquery.php";

                include "/chroot/home/S4750770/public_html/sys/common/db/executequery.php";

                $res=mysqli_stmt_get_result($stmt);
            
                if (mysqli_num_rows($res) ===  0){
            
                    echo"Tabella vuota!";
            
                }else{

                    echo"<table>";
                    echo"<tr>";
                        echo"<th>Nome</th>";
                        echo"<th>Cognome</th>";
                        echo"<th> € donati </th>";
            
                    echo"</tr>";
            
                    while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            
                        echo"<tr>";
                            echo"<td>". $row['nome'] . "</td>";
                            echo"<td>". $row['cognome']. "</td>";
                            echo"<td>". $row['Ammount']. " € </td>";
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
