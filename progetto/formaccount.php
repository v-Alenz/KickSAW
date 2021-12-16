<!DOCTYPE html>
<html lang="it">
<head>
    <title> StartSAW </title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php
include "navbar.php";
?>

<div class="account-page">
    <div class="container">
        <div class="col-2">
                <div class="form-container reg">
                    <div class="form-btn">
                        <span>Profilo</span>
                    </div>
                    <form action="account.php" method="post">
                            <input type="text" name="firstname" placeholder="Nome" class="form-control">
                            <input type="text" name="lastname" placeholder="Cognome" class="form-control">
                            <input type="email" name="email" placeholder="Email" class="form-control">
                            <input type="submit" name="submit" value="Modifica" class="btn">
                    </form>
                </div> 
        </div>
    </div>
</div>  


<?php
include "footer.php";
?>

</body>
</html>