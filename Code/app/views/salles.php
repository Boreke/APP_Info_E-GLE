<!DOCTYPE html>
<html lang="en">

<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader($data['page_title']);
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