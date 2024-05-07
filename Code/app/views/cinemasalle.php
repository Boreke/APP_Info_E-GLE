

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cinema - Salles</title>
        <link rel="stylesheet" href="<?=ASSETS?>css/cinema_salles.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/footer.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/header.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="icon" type="image/png" href="<?=ASSETS?>img/Falcon (1).png">

    </head>
    <body>
    <?php $this->view("header")?>
        <section class="center">
            <div class="ajouter_salle">
                <h1>Ajouter une salle</h1>
                <button onclick="openPopup()" id="popup11" > <img src="<?=ASSETS?>img/Addplus.png" alt="Bouton Add" class="add_btn"></button>
                <?php if (!empty($_SESSION["error_message"])) : ?>
                    <div class="error-message"><?php echo $_SESSION["error_message"]; ?></div>
                <?php endif; ?>  
                    <div id="popup" class="popup">
                        <div class="popup-content">
                            <div class="haut">
                                <button class="close" onclick="closePopup()">&times;</button>
                                <h1>Entrez le numero de la salle.</h1>
                                
                            </div>
                            <form class="form_salle" method="post" >
                                <input type="numero" placeholder="numero de la salle" class="numero_salle" id="numero_salle" name="numero_salle">
                                
                                <button class="button-creer">Créer</button>
                        </form>
                        
                    </div>  
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
                
            </div>
                  
        </section>    
    </body>
    <footer>
        <img src="<?=ASSETS?>img/logo-events-IT 1.png" alt="">
        <div class="nav_bas">
            <li><a href="#" class="nav_bas_elmt">A propos</a></li>
            <li><a href="#" class="nav_bas_elmt">Forum</a></li>
            <li><a href="#" class="nav_bas_elmt">Contact</a></li>
            <li><a href="#" class="nav_bas_elmt">Mention légales</a></li>
            <li><a href="#" class="nav_bas_elmt">FAQ</a></li>
        </div>
        <div class="reseaux">
            <li><a href="www.twitter.com"><img src="<?=ASSETS?>img/Twitter.png" alt="Twitter"></a></li>
            <li><a href="www.instagram.com"><img src="<?=ASSETS?>img/Instagram.png" alt="Instagram"></a></li>
            <li><a href="www.facebook.com"><img src="<?=ASSETS?>img/Facebook.png" alt=""></a></li>
        </div>
        <div class="mention_legales">
            <img src="<?=ASSETS?>img/Copyright.png" alt="" class="Copyright">
            <p class="mention_legales_text">E-GLE 2024 Tous droits réservés</p>
        </div>
    </footer>
</html>