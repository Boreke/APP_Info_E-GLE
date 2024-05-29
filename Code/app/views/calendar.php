<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../app/public/css/calendar.css">
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

$seanceQuery = "SELECT * FROM diffuser WHERE Film_id_film = ?";
$seances = $db->read($seanceQuery, [$movieId]);

$seanceData = [];
foreach ($seances as $seance) {
    $seanceData[date('Y-m-d', strtotime($seance->film_date))] = ['time' => date('H:i', strtotime($seance->film_date)), 'id' => $seance->idseance];
}

if ($movieDetails) {
    $movie = $movieDetails[0];
    $durationInSeconds = $movie->duree;
    $hours = floor($durationInSeconds / 3600); 
    $minutes = floor(($durationInSeconds % 3600) / 60); 

    $formattedDuration = ($hours > 0 ? $hours . ' heure' . ($hours == 1 ? '' : 's') : '') . 
                         ($minutes > 0 ? ' ' . $minutes . ' minute' . ($minutes == 1 ? '' : 's') : '');

    echo "<div class='movie-layout'>";
    echo "<div class='movie-image'>";
    echo "<img class='cinema-image' src='" .  htmlspecialchars($movie->image_file) . "' alt='Cinema Image'>";
    echo "</div>";
    echo "<div class='movie-info'>";
    echo "<p class='movie-title'>" . htmlspecialchars($movie->titre) . "</p>";
    echo "<div class='movie-genre-duration'>";
    echo "<p><strong>Genre:</strong> " . htmlspecialchars($movie->genre) . "</p>";
    echo "<p><strong>Durée:</strong> " . $formattedDuration . "</p>";
    echo "</div>";
    echo "<p><strong>Synopsis:</strong><br>" . htmlspecialchars($movie->synopsis) . "</p>";
    echo "</div>";
    echo "</div>";
} else {
    echo "<p>Movie not found.</p>";
}
?>

<br><br><br><br><br><br>
<div class="center-top"></div>
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
        <h1 id="rectangleTitle" onclick="showReservation()"></h1>
    </div>
</div>
<div id="festival-popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="hideReservation()">&times;</span>
        <h1>RÉSERVATION :</h1>
        <div class="popup-body">
            <label for="seatCount">Nombre de places:</label>
            <input type="number" id="seatCount" name="seatCount" min="1">
        </div>
        <br><br>
        <div class="popup-footer">
            <button type="submit" onclick="reserveSeats()">Réserver</button>
        </div>
    </div>
</div>
<div id="payment-popup" class="popup" style="display:none;">
    <div class="popup-content">
        <span class="close" onclick="hidePaymentPopup()">&times;</span>
        <h1>Paiement</h1>
        <div class="popup-body">
            <label for="cardNumber">Numéro de carte:</label>
            <br>
            <input type="text" id="cardNumber" name="cardNumber">
            <br>
            <label for="expiryDate">Date d'expiration:</label>
            <br>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY">
            <br>
            <label for="cvv">CVV:</label>
            <br>
            <input type="text" id="cvv" name="cvv">
        </div>
        <div class="popup-footer">
            <button type="button" onclick="processPayment()">Payer</button>
        </div>
    </div>
</div>
<script>
function showReservation() {
    document.getElementById("festival-popup").style.display = "block";
}

function hideReservation() {
    document.getElementById("festival-popup").style.display = "none";
}

function reserveSeats() {
    document.getElementById('festival-popup').style.display = 'none';  // Hide the reservation popup
    document.getElementById('payment-popup').style.display = 'block';  // Show the payment popup
}

function hidePaymentPopup() {
    document.getElementById('payment-popup').style.display = 'none';
}

function processPayment() {
    console.log('Processing payment...');
    alert('Paiment validé!');  
    hidePaymentPopup();
}

const seanceData = <?= json_encode($seanceData); ?>;
</script>
<script src="<?=ASSETS?>js/calendar.js" defer></script>
</body>
<?= $this->view("footer")?>
</html>
