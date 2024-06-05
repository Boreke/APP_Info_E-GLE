<!DOCTYPE html>
<html lang="en">

<?php
require "../app/controllers/header.php";
$header = new Header();
$header->displayHeader($data['page_title']);
?>
<body>
<main>
<?php $this->showMovieData();?>

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
        <div id="rectangleTitle"></div>
    </div>
</div>
<div id="festival-popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="hideReservation()">&times;</span>
        <h1>Réservation</h1>
        <form class="form" method="POST" id="form">
            <div class="popup-body">
                <label for="seatCount">Nombre de places:</label>
                <br>
                <input type="number" id="seatCount" name="seatCount" min="1">
                <br>
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
            <br><br>
            <div class="popup-footer">
                <button type="submit" id="submitBtn" onclick="reserveSeats()" value="Submit">Réserver</button>
            </div>
        </form>
    </div>
</div>
</main>
<script>

const root="<?php echo ROOT;?>";

const seanceData = <?= json_encode($data['seanceData']); ?>;
</script>
<script src="<?=ASSETS?>js/calendar.js" defer></script>
</body>
<?= $this->view("footer")?>
</html>
