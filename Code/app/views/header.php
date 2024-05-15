
<div class="loader">
    <span class="lettre">L</span>
    <span class="lettre">O</span>
    <span class="lettre">A</span>
    <span class="lettre">D</span>
</div>

<header>
    
    <a class="topleft" href="<?=ROOT?>home">
        <div class="Logo_Nom">
            <img src="<?=ASSETS?>img/Falcon (1).png" alt="Logo" class="logo" >
            <p class="Nom">E-GLE</p>
        </div>
    </a>
    <nav id="nav" >
    <?php 
        $currentURL = strtok($_SERVER['REQUEST_URI'], '?');

        $currentPage = basename($currentURL); 
        if (isset($_SESSION["username"]) && htmlspecialchars($_SESSION['type'])=='gerant'){

        $pageClassMap = [
            'home' => 'nav_elmt',
            'seancesgerant' => 'nav_elmt',
            'cinemasalle' => 'nav_elmt'
        ];
        $pageName=[
            'home' => 'Acceuil',
            'seancesgerant' => 'Sceances',
            'cinemasalle' => 'Salles'
        ];
        }elseif (isset($_SESSION["username"]) && htmlspecialchars($_SESSION['type'])=='admin'){
            $pageClassMap = [
                'home' => 'nav_elmt',
                'adminusers' => 'nav_elmt',
                'faq' => 'nav_elmt'
            ];
            $pageName=[
                'home' => 'Acceuil',
                'adminusers' => 'utilisateurs',
                'faq' => 'FAQ'
            ];
        }else{

            $pageClassMap = [
                'home' => 'nav_elmt',
                'seancesflorent' => 'nav_elmt',
                'salles' => 'nav_elmt'
            ];
            $pageName=[
                'home' => 'Acceuil',
                'seancesflorent' => 'Sceances',
                'salles' => 'Salles'
            ];
        }
        foreach ($pageClassMap as $filename => $class) {
            if ($currentPage == $filename) {
                $class .= ' active';
            }
            echo '<li><a href="' . ROOT . $filename . '" class="' . $class . '">' . $pageName[$filename] . '</a></li>';
        }
        ?>
    </nav>
    <img src="<?=ASSETS?>img/Menu.png" alt="Menu" class="menu" id="menuburger">
    <div class="topright">
        <div class="lg">
            <li><a href="" class="lg_elmt1">EN</a></li>
            <li><a href="" class="lg_elmt">FR</a></li>
        </div>    
        <?php if (isset($_SESSION["username"])): ?>
            <a href="<?=ROOT?>logout" ><button class="button1" >Logout</button></a>
        <?php else:  ?>
            <a href="<?=ROOT?>login"><button class="button1">Login</button></a>
        <?php endif; ?> 
    </div>
</header>
<script src="<?=ASSETS?>js/index.js">
    
</script>