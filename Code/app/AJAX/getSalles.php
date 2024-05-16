<?php
require_once "../app/controllers/cinemasalle.php";

$cinemaSalleController = new cinemasalle();
$existingRooms = $cinemaSalleController->getExistingRooms();
foreach ($existingRooms as $room) {
    echo '<div class="salle">';
    echo '<div class="salle-top">';
    echo '<h1>Salle ' . $room->numero . '</h1>';
    echo '<a href="#"><img class="dropdown" src="../public/assets/img/Drop Down.png" alt=""></a>';
    echo '</div>';
    echo '<div class="salle-bot">red</div>';
    echo '</div>';
}
?>
