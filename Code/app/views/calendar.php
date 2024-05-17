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
    
    </body>
    <?= $this->view("footer")?>
    </html>
