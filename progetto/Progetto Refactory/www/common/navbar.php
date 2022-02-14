<div class="sfondonavbar">
    <div class="navbar">
        <div class="logo">
            <a href="/startSAW.php"><img class="logo_img" src="/www/immagini/logo_grosso.jpg" alt="logo"></a>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="/startSAW.php">Home </a><img class="_img" src="/www/immagini/casa.png" alt="home"></li>
                <li><a href="/www/projects/elencoprogetti.php">Progetti </a><img class="_img" src="/www/immagini/paper.png" alt="progetti"></li>
                <?php
                session_start();
                if(!isset($_SESSION["loggato"])){
                    echo '<li><a href="/formlogin.php">Login</a><img class="_img"src="/www/immagini/account.png" alt="Login"></li>';
                    echo '<li><a href="/formregistration.php">Registrati </a><img class="_img"src="/www/immagini/registration.png" alt="Registrati"></li>';
                }else{
                    echo '<li><a href="/show_profile.php">Account</a><img class="_img"src="/www/immagini/account.png" alt="Account"></li>';
                    echo '<li><a href="/logout.php">Esci</a><img class="_img"src="/www/immagini/logout.png" alt="logout"></li>';
                }
                ?>
            </ul>
        </nav>
        <img class="menu-icon" src="/www/immagini/menu.png" alt="menu-icon" onclick="menutoggle()">
    </div>
</div>

<script src="/www/common/reducemainmenu.js"></script>
