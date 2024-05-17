<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/footer.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/faq.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?=ASSETS?>img/Falcon (1).png">


    <title>FAQ</title>
</head>
<body>
    
<?php $this->view("header")?>
    <section>
        <div>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Titre HTML et CSS</title>
                <link rel="stylesheet" href="<?=ASSETS?>css/faq.CSS">
            </head>
            <body>
                <div class="TITRE">
                    FAQ

                </div>
                <div class="sous-titre">
                        Frequently Asked Questions.
                    </div>
                <div class="general">
                    
                    <div class="question">
                        <p>Comment sont fixés les prix ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>En fonction de ta gentillesse </p>

                    </div>
                </div>
                
                <div class="general"> 
                    <div class="question">
                        <p>Est-ce qu'on peut précommander une séance ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p> Surement </p>

                    </div>
                </div>

                <div class="general">
                    <div class="question">
                        <p>Comment puis-je réserver des billets de cinéma sur votre site ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>OUI C EST LE BUT </p>
                    </div>
                </div>

                <div class="general">
                    <div class="question">
                        <p>Quels modes de paiement acceptez-vous pour la réservation en ligne ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Cartes </p>
                    </div>
                </div>

                <div class="general">
                    <div class="question">
                        <p>Puis-je modifier ou annuler ma réservation ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Force à toi </p>
                    </div>
                </div>

                <div class="general">
                    <div class="question">
                        <p>Est-ce que je peux choisir mes sièges lors de la réservation en ligne ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>OF COURSE</p>
                    </div>
                </div>

                <div class="general"></div>
                    <div class="question">
                        <p>Y a-t-il des réductions disponibles pour les étudiants, les seniors ou d'autres groupes spécifiques ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Non tu payes comme un brave </p>
                    </div>
                </div>


                <div class="general">
                    <div class="question">
                        <p>Comment puis-je récupérer mes billets réservés en ligne au cinéma ?</p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Tu les imprimes </p>
                    </div>
                </div>
            </body>
            </html>
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

<script src="<?=ASSETS?>js/index.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select all general elements
        const generalElements = document.querySelectorAll('.general');

        // Loop through each general element
        generalElements.forEach(function(generalElement) {
            // Find elements within the current general element
            const dropdownImage = generalElement.querySelector('.flechebas');
            const descriptionElement = generalElement.querySelector('.description');

            let isDescriptionVisible = false; // Track initial state

            // Add click event listener to dropdown image
            dropdownImage.addEventListener('click', function() {
                // Toggle visibility of description for the current general element
                if (isDescriptionVisible) {
                    descriptionElement.style.display = 'none';
                } else {
                    descriptionElement.style.display = 'block';
                }

                // Toggle state for the current general element
                isDescriptionVisible = !isDescriptionVisible;

            });
        });
    });
</script>
</body>
</html>