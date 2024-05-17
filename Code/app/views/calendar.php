<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendar</title>
    <link rel="stylesheet" href="<?=ASSETS?>css/calendar.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/footer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">   
    <link rel="icon" type="image/png" href="<?=ASSETS?>img/Falcon (1).png">
</head>
<body>
<?php $this->view("header")?>

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
