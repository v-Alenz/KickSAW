<div class="sfondonavbar">
    <div class="navbar">
        <div class="logo">
            <a href="/progetto/startSAW.php"><img class="logo_img" src="/progetto/immagini/logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="/progetto/startSAW.php">Home </a><img class="_img" src="/progetto/immagini/casa.png" alt="home"></li>
                <li><a href="/progetto/elencoprogetti.php">Progetti </a><img class="_img" src="/progetto/immagini/paper.png" alt="progetti"></li>
                <?php
                session_start();
                if(!isset($_SESSION["loggato"])){
                    echo '<li><a href="/progetto/formlogin.php">Loggati</a><img class="_img"src="/progetto/immagini/account.png" alt="loggati"></li>';
                    echo '<li><a href="/progetto/formregistration.php">Registrati </a><img class="_img"src="/progetto/immagini/registration.png" alt="registrati"></li>';
                }else{ 
                    echo '<li><a href="/progetto/account/show_profile.php">Account</a><img class="_img"src="/progetto/immagini/account.png" alt="Account"></li>';
                    echo '<li><a href="/progetto/account/logout.php">Esci</a><img class="_img"src="/progetto/immagini/logout.png" alt="logout"></li>';
                } 
                ?>
            </ul>
        </nav>
        <img class="menu-icon" src="/progetto/immagini/menu.png" alt="menu-icon" onclick="menutoggle()">
    </div>
</div>

<script src="/progetto/common/reducemainmenu.js"></script>

