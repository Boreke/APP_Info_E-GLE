<!DOCTYPE html>
<html lang="fr">
<body>
<?php 
    require "../app/controllers/header.php";
    $header = new Header();
    $header->displayHeader();
?>

<!--BARRE DE RECHERCHE-->
<div class="search-container">
    <img src="<?=ASSETS?>img/search.png" alt="Search Icon" class="search-icon">
    <input type="text" placeholder="Rechercher un film" class="search-text">
</div>

<br><br><br>

<!-- Premiere Carousel: Nouveautés -->
<h2 class="movie-category">Nouveautés :</h2>
<br><br>
<section class="new-movie" style="position: relative;">
    <img src="<?=ASSETS?>img/arrow.png" alt="Previous" class="pre-btn">
    <div class="movie-container">
    <?php
            require_once "../app/core/database.php"; 
            $db = new Database();
            $arr['today']=date('Y-m-d');
            $date = new DateTime();
            $date->modify('-3 months');
            $arr['before'] = $date->format('Y-m-d');
            
            $films = $db->read("SELECT id_film, image_file, titre FROM film WHERE date_sortie <= :today AND date_sortie >= :before", $arr);

            if ($films && count($films) > 0) {
                foreach ($films as $film) {
                    echo '<div class="movie-image">';


                    $url = ROOT . 'calendar?id=' .  $film->id_film; 
                

                    echo '<a href="' . $url . '"><img src="'. $film->image_file . '" alt="' . htmlspecialchars($film->titre) . '" class="movie-cover"></a>';
                    echo '<div class="movie-title_1">' . htmlspecialchars($film->titre) . '</div>'; 
                    echo '</div>';
                }
            } else {
                echo "No movies found";
            }
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
            require_once "../app/core/database.php"; 
            $db = new Database();
            $films = $db->read("SELECT id_film, image_file, titre FROM film");

            if ($films && count($films) > 0) {
                foreach ($films as $film) {
                    echo '<div class="movie-image">';


                    $url = ROOT . 'calendar?id=' .  $film->id_film; 
                

                    echo '<a href="' . $url . '"><img src="' . $film->image_file . '" alt="' . htmlspecialchars($film->titre) . '" class="movie-cover"></a>';
                    echo '<div class="movie-title_2">' . htmlspecialchars($film->titre) . '</div>'; // Added movie title
                    echo '</div>';
                }
            } else {
                echo "No movies found";
            }
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
            require_once "../app/core/database.php"; 
            $db = new Database();
            $films = $db->read("SELECT id_film, image_file, titre FROM film");

            if ($films && count($films) > 0) {
                foreach ($films as $film) {
                    echo '<div class="movie-image">';


                    $url = ROOT . 'calendar?id=' .  $film->id_film; 
                

                    echo '<a href="' . $url . '"><img src="' . $film->image_file . '" alt="' . htmlspecialchars($film->titre) . '" class="movie-cover"></a>';
                    echo '<div class="movie-title_3">' . htmlspecialchars($film->titre) . '</div>'; // Added movie title
                    echo '</div>';
                }
            } else {
                echo "No movies found";
            }
        ?>
    </div>
    <img src="<?=ASSETS?>img/arrow.png" alt="Next" class="nxt-btn">
</section>
<!-- Fin Troisieme carroussel-->

<br><br><br><br><br><br>

<script src="<?=ASSETS?>js/script.js"></script> 
</body>
<?= $this->view("footer")?>
</html>