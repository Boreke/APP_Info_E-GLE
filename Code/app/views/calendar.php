<!DOCTYPE html>
<html lang="en">

<body>
<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>

    <?php
    $mysqli = require __DIR__ . "/database.php";

    // Fetch movie details
    $movieId = isset($_GET['id']) ? $_GET['id'] : 1; // Default to 1 if no ID is provided
    $sql = "SELECT * FROM film WHERE id_film = $movieId";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $movie = $result->fetch_assoc();
        echo "<div class='movie-details'>";
        echo "<h1>" . htmlspecialchars($movie['titre']) . "</h1>";
        echo "<p><strong>Genre:</strong> " . htmlspecialchars($movie['genre']) . "</p>";
        echo "<p><strong>Duration:</strong> " . htmlspecialchars($movie['duree']) . "</p>";
        echo "<p><strong>Synopsis:</strong> " . htmlspecialchars($movie['synopsis']) . "</p>";
        echo "<img src='" . htmlspecialchars($movie['image_path']) . "' alt='Movie Image' style='max-width: 100%;'>";
        echo "</div>";
    } else {
        echo "<p>Movie not found.</p>";
    }
    ?>
    <div class="center-top">
        <h2>Cinémas</h2>
        <div class="barre-recherche">
            <img src="<?=ASSETS?>img/Search.png" alt="Search">
            <input type="search" placeholder="Rechercher un cinéma" class="zone-recherche">
        </div>
    </div>
    <div class="container">
        <div class="calendar">
        <header>
            <h3></h3>
            
            <button id="prev"></button>
            <button id="next"></button>
            
        </header>
        <section>
            <ul class="days">
            <li>Sun</li>
            <li>Mon</li>
            <li>Tue</li>
            <li>Wed</li>
            <li>Thu</li>
            <li>Fri</li>
            <li>Sat</li>
            </ul>
            <ul class="dates"></ul>
        </section>
        </div>
        <div class="rectangle">
        <h1 id="rectangleTitle"></h1>
        </div>
        </div>
        <script src="<?=ASSETS?>js/calendar.js" defer></script>
        <div>
        </div>
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
    
    </body>
    </html>
