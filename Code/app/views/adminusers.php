<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="<?=ASSETS?>css/adminusers.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
<body>
<header>
        <a href="<?=ROOT?> home" class="topleft">
            <div class="Logo_Nom">
                <img src="<?=ASSETS?>img/Falcon (1).png" alt="Logo" class="logo">
                <p class="Nom">E-GLE</p>
            </div>
        </a>
        <?php if (isset($user) && htmlspecialchars($user['type'])=='gerant'):?>
        <nav id="nav" >
            <li><a href="<?=ROOT?>home"  class="nav_elmt1">Accueil</a></li>
            <li><a href="<?=ROOT?>seancesgerant"  class="nav_elmt">Séances</a></li>
            <li><a href="<?=ROOT?>cinemasalle"  class="nav_elmt">Salles</a></li>
        </nav>
        <?php elseif (isset($user) && htmlspecialchars($user['type'])=='admin'):?>
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

    <section class="container">
        <div>
            <div class="nav">
                <a href="#" class="elmt_nav elmt1">Clients</a>
                <a href="#" class="elmt_nav">Cinéma</a>
            </div>
        </div>
        <div class="main">
            <h2>Utilisateurs</h2>
            <div class="listecontainer">
                <div class="top">
                    <ul>
                        <li><p>Prénom</p></li>
                        <li><p>Nom</p></li>
                        <li><p>Email</p></li>
                        <li><p>Pseudo</p></li>
                    </ul>
                </div>
                <div class="liste">
                    <div class="elmt">
                        <li><p>Hugo</p></li>
                        <li><p>O'Neill</p></li>
                        <li><p>honeill2000@gmail.com</p></li>
                        <li><p>Hugo</p></li>
                        <li><a href="#" class="supp_btn"><img src="<?=ASSETS?>img/Waste.png" alt="Supprimer"></a></li>
                    </div>
                    <div class="elmt">
                        <li><p>Hugo</p></li>
                        <li><p>O'Neill</p></li>
                        <li><p>honeill2000@gmail.com</p></li>
                        <li><p>Hugo</p></li>
                        <li><a href="#" class="supp_btn"><img src="<?=ASSETS?>img/Waste.png" alt="Supprimer"></a></li>
                    </div>
                    <div class="elmt">
                        <li><p>Hugo</p></li>
                        <li><p>O'Neill</p></li>
                        <li><p>honeill2000@gmail.com</p></li>
                        <li><p>Hugo</p></li>
                        <li><a href="#" class="supp_btn"><img src="<?=ASSETS?>img/Waste.png" alt="Supprimer"></a></li>
                    </div>
                    <div class="elmt">
                        <li><p>Hugo</p></li>
                        <li><p>O'Neill</p></li>
                        <li><p>honeill2000@gmail.com</p></li>
                        <li><p>Hugo</p></li>
                        <li><a href="#" class="supp_btn"><img src="<?=ASSETS?>img/Waste.png" alt="Supprimer"></a></li>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>