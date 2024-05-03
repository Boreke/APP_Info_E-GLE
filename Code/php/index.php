<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user WHERE id_user = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Events-IT</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
<body>
    <div class="loader">
        <span class="lettre">L</span>
        <span class="lettre">O</span>
        <span class="lettre">A</span>
        <span class="lettre">D</span>
    </div>
    <header>
        <a href="index.php" class="topleft">
            <div class="Logo_Nom">
                <img src="../img/Falcon (1).png" alt="Logo" class="logo">
                <p class="Nom">E-GLE</p>
            </div>
        </a>
        <?php if (isset($user) && htmlspecialchars($user['type'])=='gerant'):?>
        <nav id="nav" >
            <li><a href="index.php"  class="nav_elmt1">Accueil</a></li>
            <li><a href="seancesgerant.php"  class="nav_elmt">Séances</a></li>
            <li><a href="../Cinema_Salles.html"  class="nav_elmt">Salles</a></li>
        </nav>
        <?php elseif (isset($user) && htmlspecialchars($user['type'])=='admin'):?>
            <nav id="nav" >
            <li><a href="index.php"  class="nav_elmt1">Accueil</a></li>
            <li><a href="../adminusers.html"  class="nav_elmt">Séances</a></li>
            <li><a href="../faq.html"  class="nav_elmt">Salles</a></li>
        </nav>
        <?php else: ?>
            <nav id="nav" >
            <li><a href="index.php"  class="nav_elmt1">Accueil</a></li>
            <li><a href="../seancesflorent.html"  class="nav_elmt">Séances</a></li>
            <li><a href="../salles.html"  class="nav_elmt">Salles</a></li>
        </nav>
        <?php endif; ?>
        <img src="../img/Menu.png" alt="Menu" class="menu" id="menuburger">
        <div class="topright">
            <div class="lg">
                <li><a href="" class="lg_elmt1">EN</a></li>
                <li><a href="" class="lg_elmt">FR</a></li>
            </div>    
            <?php if (isset($user)): ?>
                <a href="deconnexion.php"><button class="button1">Logout</button></a>
            <?php else:  ?>
                <a href="connexion.php"><button class="button1">Login</button></a>
            <?php endif; ?> 
           
            

        </div>
    </header>
    <section class="center">
        <div class="center1">
            <div class="left1">
                <h1>Explorez l'essence de l'expérience <br>cinématographique.</h1>
                <a href="#center2"><img src="../img/Scroll Down.png" alt="Bouton Scroll" class="scroll-btn"></a>
            </div>
            <img src="../img/SoundWavesIMG.svg" alt="" class="soundwaves">
        </div>
        <div class="center2" id="center2">
            <div class="left2">
                <p class="reserver_text">Réservez vos séances de cinéma</p>
                <a href="#"><button class="button">Réserver</button></a>
            </div>
            <div class="right2">
                <h2>A l'affiche :</h2>
                <div class="caroussel">
                    
                    
                    <div class="slider-container slider-1">
                        <div class="slider">
                            <img src="../img/intouchables.svg" alt="" class="img-intouchables">
                            <img src="../img/shutterIsland.png" alt="" class="img-intouchables">
                            <img src="../img/avatar.png" alt="" class="img-intouchables">
                            <img src="../img/intouchables.svg" alt="" class="img-intouchables">
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="center3">
            <div class="left3">
                <img src="../img/enceinte.svg" alt="Enceinte" class="img-enceinte">
            </div>
            <div class="right3">
                <h1 class="small-h1">Une <span class="expérience">expérience</span> sonore immersive</h1>
                <p class="texte_son">Découvrez une expérience sonore inégalée dans nos salles de cinéma partenaires. Grâce à une technologie audio de pointe, chaque film prend vie avec une clarté cristalline et une immersion totale. Plongez au cœur de l'action avec un son surround époustouflant, où chaque murmure, explosion et note de musique est restitué avec une fidélité exceptionnelle.</p>
            </div>
        </div>
        <div class="center4">
            <div class="left4">
                <h1 class="small-h1">Un visuel <span class="captivant">captivant</span></h1>
                <p class="texte_image">Découvrez une vision nouvelle du cinéma dans nos salles partenaires, où chaque image est une œuvre d'art en mouvement. Grâce à des technologies de projection de pointe, nous vous offrons une qualité visuelle d'une clarté saisissante, où les couleurs éclatent et les détails prennent vie sous vos yeux.</p>
            </div>
            <div class="right4">
                <img src="../img/terre.png" alt="Terre" class="img-terre">
            </div>
        </div>

        <footer>
            <img src="../img/logo-events-IT 1.png" alt="">
            <div class="nav_bas">
                <li><a href="#" class="nav_bas_elmt">A propos</a></li>
                <li><a href="#" class="nav_bas_elmt">Forum</a></li>
                <li><a href="#" class="nav_bas_elmt">Contact</a></li>
                <li><a href="#" class="nav_bas_elmt">Mention légales</a></li>
                <li><a href="#" class="nav_bas_elmt">FAQ</a></li>
            </div>
            <div class="reseaux">
                <li><a href="https://www.twitter.com"><img src="../img/Twitter.png" alt="Twitter"></a></li>
                <li><a href="https://www.instagram.com"><img src="../img/Instagram.png" alt="Instagram"></a></li>
                <li><a href="https://www.facebook.com"><img src="../img/Facebook.png" alt=""></a></li>
            </div>
            <div class="mention_legales">
                <img src="../img/Copyright.png" alt="" class="Copyright">
                <p class="mention_legales_text">E-GLE 2024 Tous droits réservés</p>
            </div>
        </footer>
    </section>
        

    
</body>
<script src="../js/index.js">
    
</script>
</html>