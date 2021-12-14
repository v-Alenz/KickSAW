<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div class="sfondopagprincipale">


<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img class="img" src="immagini/gabibbo.jpg" alt="">
            </div>
            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span>Registrati</span>
                        <hr id="Indicator">
                    </div>
                    <form action="registration.php" method="post">
                            <input type="text" name="firstname" placeholder="Nome">
                            <input type="text" name="lastname" placeholder="Cognome">
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="pass" placeholder="Password">
                            <input type="password" name="confirm" placeholder="Conferma password">
                            <input type="submit" name="submit" value="Registrati" class="btn">
                    </form>
                </div> 
           </div>
        </div>      
    </div>
</div>

</div>

<?php
include "footer.php";
?>

</body>
</html>