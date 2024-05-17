<!DOCTYPE html>
<html lang="en">

<body>
    
<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>
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
    <?= $this->view("footer")?>

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