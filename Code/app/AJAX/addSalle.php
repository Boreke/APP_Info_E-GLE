<?php
require_once "../app/controllers/cinemasalle.php";

$cinemaSalleController = new cinemasalle();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cinemaSalleController->add_salle($_POST);
}
?>