<!DOCTYPE html>
<html lang="fr">

<?php 
    require "../app/controllers/header.php";
    $header = new Header();
    $header->displayHeader($data['page_title']);
?>
<body>
<main>


<br><br><br>

<!-- Premiere Carousel: Nouveautés -->
<h2 class="movie-category">Nouveautés :</h2>
<br><br>
<section class="new-movie" style="position: relative;">
    <img src="<?=ASSETS?>img/arrow.png" alt="Previous" class="pre-btn">
    <div class="movie-container">
    <?php
            $this->showMovies($this->getNewMovies());
        ?>
    </div>
    <img src="<?=ASSETS?>img/arrow.png" alt="Next" class="nxt-btn">
</section>
<!-- FIN Premier carousel-->
<br><br><br>

<!-- DEBUT Deuxieme carroussel-->
<h2 class="movie-category_2">A l'affiche :</h2>

<section class="new-movie carousel-grey" style="position: relative;">
    <img src="<?=ASSETS?>img/arrow.png" alt="Previous" class="pre-btn">
    <div class="movie-container">
    <?php

        $this->showMovies($this->getAffiche());
        ?>
    </div>
    <img src="<?=ASSETS?>img/arrow.png" alt="Next" class="nxt-btn">
</section>
<!-- Fin Deuxieme carroussel-->

<!-- DEBUT Troisieme carroussel-->
<br><br><br>

<h2 class="movie-category">A venir :</h2>
<section class="new-movie" style="position: relative;">
    <img src="<?=ASSETS?>img/arrow.png" alt="Previous" class="pre-btn">
    <div class="movie-container">
    <?php
            $this->showMovies($this->getUpcoming());
        ?>
    </div>
    <img src="<?=ASSETS?>img/arrow.png" alt="Next" class="nxt-btn">
</section>
<!-- Fin Troisieme carroussel-->

<br><br><br><br><br><br>
</main>
<script src="<?=ASSETS?>js/script.js"></script> 
</body>
<?= $this->view("footer")?>
</html>