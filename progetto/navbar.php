<div class="sfondonavbar">
    <div class="navbar">
        <div class="logo">
            <a href=""><img class="logo_img" src="immagini/logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="">Home </a><img class="_img" src="immagini/casa.png" alt="home"></li>
                <li><a href="">Progetti </a><img class="_img" src="immagini/paper.png" alt="progetti"></li>
                <li><a href="">Loggati</a><img class="_img"src="immagini/account.png" alt="loggati"></li>
                <li><a href="">Registrati </a><img class="_img"src="immagini/registration.png" alt="registrati"></li>
            </ul>
        </nav>
        <img class="menu-icon" src="immagini/menu.png" alt="menu-icon" 
        onclick="menutoggle()">
    </div>
</div>

<!-------------------------js for toggle menu------------------------------>

<script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle(){
        if(MenuItems.style.maxHeight == "0px"){
            MenuItems.style.maxHeight ="200px";
        }else{
            MenuItems.style.maxHeight ="0px";
        }
    }
</script>