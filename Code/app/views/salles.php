<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title'] ?></title>
</head>
<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>
<body>
    <main>
    <section class="center">
        <div class="center-top">
            <h2>Cinémas</h2>
            <!--
            <div class="barre-recherche">
                <img src="<?=ASSETS?>img/Search.png" alt="Search">
                <input type="search" placeholder="Rechercher un cinéma" class="zone-recherche">
            </div>
            -->
        </div>
        <div class="cinema-list">
            <?php $this->showCinemas();?>
            
        </div>
    </section>
</main>
</body>
<?= $this->view("footer")?>
<script src="<?=ASSETS?>js/index.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

    document.querySelectorAll('.cinema-elmt').forEach(function(cinemaElement) {

        const dropdownImage = cinemaElement.querySelector('.dropdown');
        const cinemaBotElement = cinemaElement.querySelector('.cinema-elmt-bot');

        if (dropdownImage && cinemaBotElement) {
            let isCinemaBotVisible = false;

            cinemaBotElement.style.display = 'none';

            dropdownImage.addEventListener('click', function() {

                if (isCinemaBotVisible) {
                    cinemaBotElement.style.display = 'none';
                } else {
                    cinemaBotElement.style.display = 'flex';
                }
                isCinemaBotVisible = !isCinemaBotVisible;

                dropdownImage.style.transform = isCinemaBotVisible ? 'rotate(-90deg)' : 'rotate(0deg)';
            });
        } else {

            console.warn('Dropdown or cinema bottom element not found for one of the cinema elements.');
        }
    });
});


</script>
</html>