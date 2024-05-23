<!DOCTYPE html>
<html lang="en">

<body>
<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>
    <section class="center">
        <div class="center-top">
            <h2>Cinémas</h2>
            <div class="barre-recherche">
                <img src="<?=ASSETS?>img/Search.png" alt="Search">
                <input type="search" placeholder="Rechercher un cinéma" class="zone-recherche">
            </div>
        </div>
        
        <div class="cinema-list">
            <?php $this->showCinemas();?>
            
        </div>
    </section>
</body>
<?= $this->view("footer")?>
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