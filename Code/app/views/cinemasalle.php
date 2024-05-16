<!DOCTYPE html>
<html lang="en">

    <body>
    <?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>
        <section class="center">
            <div class="salles_existantes">
                <?php foreach ($data["existingRooms"] as $room) : ?>
                    <div class="salle">
                        <div class="salle-top">
                            <h1>Salle <?php echo $room->numero; ?></h1>
                            <a><img class="dropdown" src="<?=ASSETS?>img/Drop Down.png" alt=""></a>
                        </div>
                        <div class="salle-bot">red</div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="ajouter_salle">
                <h1>Ajouter une salle</h1>
                <a onclick="openPopup()" id="popup11" > <img src="<?=ASSETS?>img/Addplus.png" alt="Bouton Add" class="add_btn"></a>
                <?php if (!empty($_SESSION["error_message"])) : ?>
                    <div class="error-message"><?php echo $_SESSION["error_message"]; ?></div>
                <?php endif; ?>  
                    <div id="popup" class="popup">
                        <div class="popup-content">
                            <div class="haut">
                                <a class="close" onclick="closePopup()">&times;</a>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Select all cinema elements
        const salleElements = document.querySelectorAll('.salle');

        // Loop through each cinema element
        salleElements.forEach(function(salleElement) {
            // Find elements within the current cinema element
            const dropdownImage = salleElement.querySelector('.dropdown');
            const salleBotElement = salleElement.querySelector('.salle-bot');

            let isSalleBotVisible = false; // Track initial state
            salleBotElement.style.display = 'none';
            // Add click event listener to dropdown image
            dropdownImage.addEventListener('click', function() {
                // Toggle visibility of cinema-elmt-bot for the current cinema element
                if (isSalleBotVisible) {
                    salleBotElement.style.display = 'none';
                    
                } else {
                    salleBotElement.style.display = 'flex';
                    
                }

                // Toggle state for the current cinema element
                isSalleBotVisible = !isSalleBotVisible;

                // Rotate the dropdown image by 90 degrees
                dropdownImage.style.transform = isSalleBotVisible ? 'rotate(-90deg)' : 'rotate(0deg)';
            });
        });
        });
    </script>
</html>