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


<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="form-container log">
                    <div class="form-btn">
                        <span>Loggati</span>
                    </div>
                    <form action="login.php" method="post">
                            <input type="email" name="email" placeholder="Email" class="form-control">
                            <input type="password" name="pass" placeholder="Password" class="form-control">
                            <input type="submit" name="submit" value="Loggati" class="btn">
                    </form>
                </div> 
           </div>
            <div class="col-2">
                <img class="img" src="immagini/gabibbo.jpg" alt="">
            </div>
        </div>      
    </div>
</div>


<?php
include "footer.php";
?>

</body>
</html>