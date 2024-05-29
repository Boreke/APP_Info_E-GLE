<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../app/public/css/calendar.css">
<?php
require "../app/controllers/header.php";
$header = new Header();
$header->displayHeader();

?>
<body>

<?php $this->showMovieData();?>
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
        <h1 id="rectangleTitle" onclick="showReservation()" ></h1>
    </div>
</div>
<div id="festival-popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="hideReservation()">&times;</span>
        <h1>RÉSERVATION :</h1>
        <form class="form" method='get'>
            <div class="popup-body">
                <label for="seatCount">Nombre de places:</label>
                <input type="number" id="seatCount" name="seatCount" min="1">
            </div>
            <br><br>
            <div class="popup-footer">
                <button type="submit" onclick="reserveSeats()">Réserver</button>
            </div>
        </form>
    </div>
</div>
<div id="payment-popup" class="popup" style="display:none;">
    <div class="popup-content">
        <span class="close" onclick="hidePaymentPopup()">&times;</span>
        <h1>Paiement</h1>
        <form class="form" method='get'>
            <div class="popup-body">
                <label for="cardNumber">Numéro de carte:</label>
                <br>
                <input type="text" id="cardNumber" name="cardNumber">
                <br>
                <label for="expiryDate">Date d'expiration:</label>
                <br>
                <input type="date" id="expiryDate" name="expiryDate" placeholder="MM/YY">
                <br>
                <label for="owner">Nom sur la carte:</label>
                <br>
                <input type="text" id="owner" name="owner" >
                <br>
                <label for="cvc">CVC:</label>
                <br>
                <input type="text" id="cvc" name="cvc">
            </div>
            <div class="popup-footer">
                <button type="submit" onclick="hidePaymentPopup()">Payer</button>
            </div>
        </form>
    </div>
</div>
<script>


const seanceData = <?= json_encode($data['seanceData']); ?>;
</script>
<script src="<?=ASSETS?>js/calendar.js" defer></script>
</body>
<?= $this->view("footer")?>
</html>
