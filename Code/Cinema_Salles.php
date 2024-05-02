<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cinema - Salles</title>
        <link rel="stylesheet" href="css/cinema_salles.css">
        <link rel="stylesheet" href="css/footer.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="php/index.php" class="topleft">
                <div class="Logo_Nom">
                    <img src="img/Falcon (1).png" alt="Logo">
                    <h1 class="Nom"> E-GLE</h1>
                </div>
            </a>
            <nav class="topnav">
                <li><a href="php/index.php"  class="nav_elmt1">Accueil</a></li>
                <li><a href="seancesflorent.html"  class="nav_elmt">Séances</a></li>
                <li><a href="salles.html"  class="nav_elmt">Salles</a></li>
            </nav>
            <div class="topright">
                <div class="lg">
                    <li><a href="" class="lg_elmt1">EN</a></li>
                    <li><a href="" class="lg_elmt">FR</a></li>
                </div>    
                <a href="php/connexion.php"><button class="button">Login</button></a>
            </div>
        </header>
        <section class="center">
            <div class="ajouter_salle">
                <h1>Ajouter une salle</h1>
                <button onclick="openPopup()" id="popup11" > <img src="img/Addplus.png" alt="Bouton Add" class="add_btn"></button>
                    <div id="popup" class="popup">
                        <div class="popup-content">
                            <div class="haut">
                                <button class="close" onclick="closePopup()">&times;</button>
                                <h1>Entrez le numero de la salle.</h1>
                                
                            </div>
                            <form class="form_salle">

                                <input type="numero" placeholder="numero de la salle" class="numero_salle" id="numero_salle" name="numero_salle">
                                <button class="button-creer">Créer</button>
                        </form>
                        
                    </div>  
                <script src="js/planningSeanceGas.js"></script>
            </div>        
        </section>    
    </body>
    <footer>
        <img src="img/logo-events-IT 1.png" alt="">
        <div class="nav_bas">
            <li><a href="#" class="nav_bas_elmt">A propos</a></li>
            <li><a href="#" class="nav_bas_elmt">Forum</a></li>
            <li><a href="#" class="nav_bas_elmt">Contact</a></li>
            <li><a href="#" class="nav_bas_elmt">Mention légales</a></li>
            <li><a href="#" class="nav_bas_elmt">FAQ</a></li>
        </div>
        <div class="reseaux">
            <li><a href="www.twitter.com"><img src="img/Twitter.png" alt="Twitter"></a></li>
            <li><a href="www.instagram.com"><img src="img/Instagram.png" alt="Instagram"></a></li>
            <li><a href="www.facebook.com"><img src="img/Facebook.png" alt=""></a></li>
        </div>
        <div class="mention_legales">
            <img src="img/Copyright.png" alt="" class="Copyright">
            <p class="mention_legales_text">E-GLE 2024 Tous droits réservés</p>
        </div>
    </footer>
</html>