<!DOCTYPE html>
<html lang="fr">

<body>
<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>


    

    <!--BARRE DE RECHERCHE-->
    <div class="search-container">
        <img src="<?=ASSETS?>img/search.png" alt="Loupe-Logo" class="search-icon">
        <input type="text" placeholder="Rechercher un film"  class="search-text">
    </div>
<!-- FIN BARRE DE RECHERCHE-->


    <!--Premier carroussel-->
    <h2 class="movie-category">Nouveautés :</h2>
    <section class="new-movie">
        
        <img src="<?=ASSETS?>img/arrow.png" alt="" class="pre-btn">

        <div class="movie-container">
            <div class="movie-card">
                <div class="movie-image">
                    <a href="<?=ROOT?>planningseancegas"> <img src="<?=ASSETS?>img/shutterisland.jpg" class="movie-cover" alt=""></a>
                    </div>
                <div class="movie-info">
                    <h2 class="movie-name">Shutter Island</h2>
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-image">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/avatar.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-info">
                    <h2 class="movie-name">Avatar</h2>
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-image">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/inception.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-info">
                    <h2 class="movie-name">Inception</h2>
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-image">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/leparrain.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-info">
                    <h2 class="movie-name">Le Parrain</h2>
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-image">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/shutterisland.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-info">
                    <h2 class="movie-name">Shutter Island</h2>
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-image">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/shutterièsland.jpg" class="movie-cover" alt=""></a>
                    <img src="<?=ASSETS?>img/shutterisland.jpg" class="movie-cover" alt="">
                </div>
                <div class="movie-info">
                    <h2 class="movie-name">Shutter Island</h2>
                </div>
            </div>
        </div>
        <img src="<?=ASSETS?>img/arrow.png" alt="" class="nxt-btn">
    </section>
    <!-- FIN Premier carroussel-->

<!-- Debut second carroussel-->
<div class="couleur">
<h2 class="film-affiche-nom">A l'affiche :</h2>
    <section class="movie-a-affiche">
        
        <img src="<?=ASSETS?>img/arrow.png" alt="" class="previous-btn">

        <div class="movie-contenu">
            <div class="movie-affiche">
                <div class="movie-img">
                    <a href="<?=ROOT?>planningseancegas"> <img src="<?=ASSETS?>img/shutterisland.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-info">
                    <h2 class="movie-nom">Shutter Island</h2>
                </div>
            </div>
            <div class="movie-affiche">
                <div class="movie-img">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/avatar.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-info">
                    <h2 class="movie-nom">Avatar</h2>
                </div>
            </div>
            <div class="movie-affiche">
                <div class="movie-img">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/inception.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-info">
                    <h2 class="movie-nom">Inception</h2>
                </div>
            </div>
            <div class="movie-affiche">
                <div class="movie-img">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/leparrain.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-info">
                    <h2 class="movie-nom">Le Parrain</h2>
                </div>
            </div>
            <div class="movie-affiche">
                <div class="movie-img">
                    <a href="<?=ROOT?>planningseancegas"></a><img src="<?=ASSETS?>img/shutterisland.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-info">
                    <h2 class="movie-nom">Shutter Island</h2>
                </div>
            </div>
            <div class="movie-affiche">
                <div class="movie-img">
                    <img src="<?=ASSETS?>img/shutterièsland.jpg" class="movie-cover" alt="">
                </div>
                <div class="movie-info">
                    <h2 class="movie-nom">Shutter Island</h2>
                </div>
            </div>
        </div>
        <img src="<?=ASSETS?>img/arrow.png" alt="" class="next-btn">
    </section>
</div>
 <!-- FIN second carroussel-->  


<!-- Debut troisième carroussel-->

<h2 class="film-venir-nom">A venir :</h2>
    <section class="movie-a-venir">
        
        <img src="<?=ASSETS?>img/arrow.png" alt="" class="precedent-btn">

        <div class="movie-venir-contenu">
            <div class="movie-venir">
                <div class="movie-venir-img">
                    <a href="<?=ROOT?>planningseancegas"> <img src="<?=ASSETS?>img/shutterisland.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-venir-info">
                    <h2 class="movie-venir-nom">Shutter Island</h2>
                </div>
            </div>
            <div class="movie-venir">
                <div class="movie-img">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/avatar.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-info">
                    <h2 class="movie-venir-nom">Avatar</h2>
                </div>
            </div>
            <div class="movie-venir">
                <div class="movie-venir-img">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/inception.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-venir-info">
                    <h2 class="movie-venir-nom">Inception</h2>
                </div>
            </div>
            <div class="movie-venir">
                <div class="movie-venir-img">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/leparrain.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-venir-info">
                    <h2 class="movie-venir-nom">Le Parrain</h2>
                </div>
            </div>
            <div class="movie-venir">
                <div class="movie-venir-img">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/shutterisland.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-venir-info">
                    <h2 class="movie-venir-nom">Shutter Island</h2>
                </div>
            </div>
            <div class="movie-venir">
                <div class="movie-venir-img">
                    <a href="<?=ROOT?>planningseancegas"><img src="<?=ASSETS?>img/shutterisland.jpg" class="movie-cover" alt=""></a>
                </div>
                <div class="movie-venir-info">
                    <h2 class="movie-venir-nom">Shutter Island</h2>
                </div>
            </div>
        </div>
        <img src="<?=ASSETS?>img/arrow.png" alt="" class="suivant-btn">
    </section>
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



    <script src="<?=ASSETS?>js/script.js"></script>
    
</body>
</html>