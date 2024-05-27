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
                        <p>Les prix sont fixés en fonction des coûts de production et de la demande. </p>

                    </div>
                </div>
                
                <div class="general"> 
                    <div class="question">
                        <p>Est-ce qu'on peut précommander une séance ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Oui, vous pouvez précommander une séance sur notre site.</p>

                    </div>
                </div>

                <div class="general">
                    <div class="question">
                        <p>Comment puis-je réserver des billets de cinéma sur votre site ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Vous pouvez réserver des billets sur notre site web en sélectionnant le film, l'horaire et le nombre de billets désirés. </p>
                    </div>
                </div>

                <div class="general">
                    <div class="question">
                        <p>Quels modes de paiement acceptez-vous pour la réservation en ligne ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Nous acceptons les paiements en ligne par carte de crédit ou de débit. </p>
                    </div>
                </div>

                <div class="general">
                    <div class="question">
                        <p>Puis-je modifier ou annuler ma réservation ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Oui, vous pouvez annuler ou modifier votre réservation selon nos conditions d'annulation. </p>
                    </div>
                </div>

                <div class="general">
                    <div class="question">
                        <p>Est-ce que je peux choisir mes sièges lors de la réservation en ligne ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Oui, vous pouvez choisir vos sièges lors de la réservation en ligne.</p>
                    </div>
                </div>

                <div class="general"></div>
                    <div class="question">
                        <p>Y a-t-il des réductions disponibles pour les étudiants, les seniors ou d'autres groupes spécifiques ? </p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Nous proposons des réductions pour les étudiants, les seniors et d'autres groupes spécifiques. Veuillez consulter notre site web pour les détails. </p>
                    </div>
                </div>


                <div class="general">
                    <div class="question">
                        <p>Comment puis-je récupérer mes billets réservés en ligne au cinéma ?</p>
                        <img src="<?=ASSETS?>img/Drop Down.png" alt="" class="flechebas">
                    </div>
                    <div class="description">
                        <p>Vous pouvez récupérer vos billets réservés en ligne au cinéma en présentant votre confirmation de réservation au guichet. </p>
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