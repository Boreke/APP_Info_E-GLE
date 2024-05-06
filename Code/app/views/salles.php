<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salles - Events-IT</title>
    <link rel="stylesheet" href="<?=ASSETS?>css/salles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?=ASSETS?>img/Falcon (1).png">

</head>
<body>
    <div class="loader">
        <span class="lettre">L</span>
        <span class="lettre">O</span>
        <span class="lettre">A</span>
        <span class="lettre">D</span>
    </div>
    <header>
        <a href="<?=ROOT?>home" class="topleft">
            <div class="Logo_Nom">
                <img src="<?=ASSETS?>img/Falcon (1).png" alt="Logo">
                <p class="Nom">E-GLE</p>
            </div>
        </a>
       
        <nav id="nav">
            <li><a href="<?=ROOT?>home"  class="nav_elmt">Accueil</a></li>
            <li><a href="<?=ROOT?>seancesflorent"  class="nav_elmt">Séances</a></li>
            <li><a href="<?=ROOT?>salles"  class="nav_elmt1">Salles</a></li>
        </nav>
        <img src="<?=ASSETS?>img/Menu.png" alt="Menu" class="menu" id="menuburger">
        <div class="topright">
            <div class="lg">
                <li><a href="" class="lg_elmt1">EN</a></li>
                <li><a href="" class="lg_elmt">FR</a></li>
            </div>    
            <a href="<?=ROOT?>login"><button class="button">Login</button></a>
        </div>
    </header>

    <section class="center">
        <div class="center-top">
            <h2>Cinémas</h2>
            <div class="barre-recherche">
                <img src="<?=ASSETS?>img/Search.png" alt="Search">
                <input type="search" placeholder="Rechercher un cinéma" class="zone-recherche">
            </div>
        </div>
        
        <div class="cinema-list">
            <div class="cinema-elmt">

                <div class="cinema-elmt-top">
                    <div class="cinema-info">
                        <img class="objet-fit" src="<?=ASSETS?>img/logo-ugc.png" alt="Logo UGC">
                        <div class="cinema-desc">
                            <h3>UGC Ciné Cité Les Halles</h3>
                            <p>7 place De La Rotonde, 75001 Paris</p>
                            <p>10 salles</p>
                        </div>
                    </div>
                    <img class="dropdown" src="<?=ASSETS?>img/Drop Down.png" alt="">
                </div>
                <div class="cinema-elmt-bot">
                    <div class="salle">Salle 1</div>
                    <div class="salle">Salle 2</div>
                    <div class="salle">Salle 3</div>
                    <div class="salle">Salle 4</div>
                    <div class="salle">Salle 5</div>
                    <div class="salle">Salle 6</div>
                    <div class="salle">Salle 7</div>
                    <div class="salle">Salle 8</div>
                    <div class="salle">Salle 9</div>
                    <div class="salle">Salle 10</div>
                </div>

            </div>
            <div class="cinema-elmt">

                <div class="cinema-elmt-top">
                    <div class="cinema-info">
                        <img class="objet-fit" src="<?=ASSETS?>img/logo-mk2.png" alt="Logo mk2">
                        <div class="cinema-desc">
                            <h3>mk2 Parnasse</h3>
                            <p>7 place De La Rotonde, 75001 Paris</p>
                            <p>10 salles</p>
                        </div>
                    </div>
                    <img class="dropdown" src="<?=ASSETS?>img/Drop Down.png" alt="">
                </div>
                <div class="cinema-elmt-bot">
                    <div class="salle">Salle 1</div>
                    <div class="salle">Salle 2</div>
                    <div class="salle">Salle 3</div>
                    <div class="salle">Salle 4</div>
                    <div class="salle">Salle 5</div>
                    <div class="salle">Salle 6</div>
                    <div class="salle">Salle 7</div>
                </div>

            </div>
            <div class="cinema-elmt">

                <div class="cinema-elmt-top">
                    <div class="cinema-info">
                        <img class="objet-fit" src="<?=ASSETS?>img/logo-pathe.png" alt="Logo Pathé">
                        <div class="cinema-desc">
                            <h3>UGC Ciné Cité Les Halles</h3>
                            <p>7 place De La Rotonde, 75001 Paris</p>
                            <p>10 salles</p>
                        </div>
                    </div>
                    <img class="dropdown" src="<?=ASSETS?>img/Drop Down.png" alt="">
                </div>
                <div class="cinema-elmt-bot">
                    <div class="salle">Salle 1</div>
                    <div class="salle">Salle 2</div>
                    <div class="salle">Salle 3</div>
                    <div class="salle">Salle 4</div>
                </div>

            </div>
        </div>
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
            <li><a href="https://www.twitter.com"><img src="<?=ASSETS?>img/Twitter.png" alt="Twitter"></a></li>
            <li><a href="https://www.instagram.com"><img src="<?=ASSETS?>img/Instagram.png" alt="Instagram"></a></li>
            <li><a href="https://www.facebook.com"><img src="<?=ASSETS?>img/Facebook.png" alt=""></a></li>
        </div>
        <div class="mention_legales">
            <img src="<?=ASSETS?>img/Copyright.png" alt="" class="Copyright">
            <p class="mention_legales_text">E-GLE 2024 Tous droits réservés</p>
        </div>
    </footer>

    
</body>
<script src="<?=ASSETS?>js/index.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Select all cinema elements
    const cinemaElements = document.querySelectorAll('.cinema-elmt');

    // Loop through each cinema element
    cinemaElements.forEach(function(cinemaElement) {
        // Find elements within the current cinema element
        const dropdownImage = cinemaElement.querySelector('.dropdown');
        const cinemaBotElement = cinemaElement.querySelector('.cinema-elmt-bot');

        let isCinemaBotVisible = false; // Track initial state

        // Add click event listener to dropdown image
        dropdownImage.addEventListener('click', function() {
            // Toggle visibility of cinema-elmt-bot for the current cinema element
            if (isCinemaBotVisible) {
                cinemaBotElement.style.display = 'none';
                cinemaElement.style.backgroundColor = '#202020'; // Change background color
            } else {
                cinemaBotElement.style.display = 'flex';
                cinemaElement.style.backgroundColor = '#4d4d4d'; // Change background color
            }

            // Toggle state for the current cinema element
            isCinemaBotVisible = !isCinemaBotVisible;

            // Rotate the dropdown image by 90 degrees
            dropdownImage.style.transform = isCinemaBotVisible ? 'rotate(-90deg)' : 'rotate(0deg)';
        });
    });
});
</script>
</html>