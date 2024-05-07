
<div class="loader">
    <span class="lettre">L</span>
    <span class="lettre">O</span>
    <span class="lettre">A</span>
    <span class="lettre">D</span>
</div>

<header>
    <a href="<?=ROOT?> home" class="topleft">
        <div class="Logo_Nom">
            <img src="<?=ASSETS?>img/Falcon (1).png" alt="Logo" class="logo">
            <p class="Nom">E-GLE</p>
        </div>
    </a>
    <?php if (isset($_SESSION["username"]) && htmlspecialchars($_SESSION['type'])=='gerant'):?>
    <nav id="nav" >
        <li><a href="<?=ROOT?>home"  class="nav_elmt1">Accueil</a></li>
        <li><a href="<?=ROOT?>seancesgerant"  class="nav_elmt">Séances</a></li>
        <li><a href="<?=ROOT?>cinemasalle"  class="nav_elmt">Salles</a></li>
    </nav>
    <?php elseif (isset($_SESSION["username"]) && htmlspecialchars($_SESSION['type'])=='admin'):?>
        <nav id="nav" >
        <li><a href="<?=ROOT?>index"  class="nav_elmt1">Accueil</a></li>
        <li><a href="<?=ROOT?>adminusers"  class="nav_elmt">Séances</a></li>
        <li><a href="<?=ROOT?>faq"  class="nav_elmt">Salles</a></li>
    </nav>
    <?php else: ?>
        <nav id="nav" >
        <li><a href="<?=ROOT?>index"  class="nav_elmt1">Accueil</a></li>
        <li><a href="<?=ROOT?>seancesflorent"  class="nav_elmt">Séances</a></li>
        <li><a href="<?=ROOT?>salles"  class="nav_elmt">Salles</a></li>
    </nav>
    <?php endif; ?>
    <img src="<?=ASSETS?>img/Menu.png" alt="Menu" class="menu" id="menuburger">
    <div class="topright">
        <div class="lg">
            <li><a href="" class="lg_elmt1">EN</a></li>
            <li><a href="" class="lg_elmt">FR</a></li>
        </div>    
        <?php if (isset($user)): ?>
            <a href="<?=ROOT?>deconnexion"><button class="button1">Logout</button></a>
        <?php else:  ?>
            <a href="<?=ROOT?>login"><button class="button1">Login</button></a>
        <?php endif; ?> 
    </div>
</header>
<script src="<?=ASSETS?>js/index.js">
    
</script>