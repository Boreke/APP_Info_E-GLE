<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href= "../app/public/css/calendar.css">
<body>
<?php
require "../app/controllers/header.php";
$header = new Header();
$header->displayHeader();

require_once "../app/core/database.php"; 
$db = new Database(); 

$movieId = isset($_GET['id']) ? $_GET['id'] : 1; 
$query = "SELECT * FROM film WHERE id_film = ?";
$movieDetails = $db->read($query, [$movieId]);

if ($movieDetails) {
    $movie = $movieDetails[0]; 
    echo "<div class='movie-layout'>";
    echo "<div class='movie-image'>";
    echo "<img class='cinema-image' src='" .  htmlspecialchars($movie->image_file) . "' alt='Cinema Image'>";
    echo "</div>";
    echo "<div class='movie-info'>";
    echo "<p class='movie-title'><strong></strong> " . htmlspecialchars($movie->titre) . "</p>";
    echo "<div class='movie-genre-duration'>";
    echo "<p><span class='movie-detail-label'><strong>Genre:</strong></span> " . htmlspecialchars($movie->genre) . "</p>";
    echo "<p><span class='movie-detail-label'><strong>Durée:</strong></span> " . htmlspecialchars($movie->duree) . "</p>";
    echo "</div>";
    echo "<p><span class='movie-detail-label'><strong>Synopsis:</strong></span><br><br> " . htmlspecialchars($movie->synopsis) . "</p>";
    echo "</div>";
    echo "</div>";
} else {
    echo "<p>Movie not found.</p>";
}
?>


<br><br><br>br><br><br>
 
 
    <div class="center-top">

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