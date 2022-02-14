<div class="sfondonavbar">
    <div class="navbar">
        <div class="logo">
            <a href="/~S4750770/startSAW.php"><img class="logo_img" src="/~S4750770/www/immagini/logo_grosso.jpg" alt="logo"></a>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="/~S4750770/startSAW.php">Home </a><img class="_img" src="/~S4750770/www/immagini/casa.png" alt="home"></li>
                <li><a href="/~S4750770/www/projects/elencoprogetti.php">Progetti </a><img class="_img" src="/~S4750770/www/immagini/paper.png" alt="progetti"></li>
                <?php
                session_start();
                if(!isset($_SESSION["loggato"])){
                    echo '<li><a href="/~S4750770/formlogin.php">Login</a><img class="_img"src="/~S4750770/www/immagini/account.png" alt="Login"></li>';
                    echo '<li><a href="/~S4750770/formregistration.php">Registrati </a><img class="_img"src="/~S4750770/www/immagini/registration.png" alt="Registrati"></li>';
                }else{
                    echo '<li><a href="/~S4750770/show_profile.php">Account</a><img class="_img"src="/~S4750770/www/immagini/account.png" alt="Account"></li>';
                    echo '<li><a href="/~S4750770/logout.php">Esci</a><img class="_img"src="/~S4750770/www/immagini/logout.png" alt="logout"></li>';
                }
                ?>
            </ul>
        </nav>
        <img class="menu-icon" src="/~S4750770/www/immagini/menu.png" alt="menu-icon" onclick="menutoggle()">
    </div>
</div>

<script src="/~S4750770/www/common/reducemainmenu.js"></script>
