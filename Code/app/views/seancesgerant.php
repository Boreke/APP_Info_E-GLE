<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user WHERE id_user = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    if ($_POST['form_type'] === 'add_film') {

        $sql = "INSERT INTO film (titre, synopsis, duree, genre, id_cinema, image_file) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("SQL error: " . $mysqli->error);
        }

        $hour = isset($_POST["hour"]) ? (int) $_POST["hour"] : 0;
        $minute = isset($_POST["minute"]) ? (int) $_POST["minute"] : 0;
        $duration = $hour * 3600 + $minute * 60;

        if(isset($_FILES["image"])){
            if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            
                echo "file uploading";
                $target_dir = "../img/"; // Ensure this directory exists and is writable
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
            
                // Check file size
                if ($_FILES["image"]["size"] > 500000) { // size in bytes
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
            
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
            
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
    
                if ($uploadOk == 1) {
                    $sqlRequest = "SELECT idcinema FROM cinema WHERE user_id_user = ?";
                    $stmt2 = $mysqli->prepare($sqlRequest);
                    $stmt2->bind_param("i", $_SESSION["user_id"]);
                    $stmt2->execute();
                    $cinemaResult = $stmt2->get_result();
                    $cinemaRow = $cinemaResult->fetch_assoc();
                    $cinema_id = $cinemaRow['idcinema'];
        
                    $stmt->bind_param("ssisis", $_POST["titre"], $_POST["synopsis"], $duration, $_POST["genre"], $cinema_id, $target_file);
        
                    if ($stmt->execute()) {
                        echo "Film added successfully";
                    } else {
                        echo "Error adding film: " . $stmt->error;
                    }
                }
            
            } else {
                echo "Error uploading file: " . $_FILES["image"]["error"];
            }
        }else{
            echo "Is not set";
            print_r($_FILES);
        }
        

    } elseif ($_POST['form_type'] === 'create_screening') {
        
        $sql2 = "INSERT INTO diffuser (Film_id_film, salle_idsalle, film_date) VALUES (?, ?, ?)";

        $stmt3 = $mysqli->prepare($sql2);
        if (!$stmt3) {
            die("SQL error: " . $mysqli->error);
        }

        $film_date = strtotime($_POST['film_date']);
        $time = $_POST['time'];
        $formatted_date = date('Y-m-d', $film_date);
        $datetime = $formatted_date . ' ' . $time . ':00';

        $stmt3->bind_param("sss", $_POST['film'], $_POST['salle'], $datetime);

        if ($stmt3->execute()) {
            echo "Screening created successfully";
        } else {
            echo "Error Creating Screening: " . $stmt3->error;
        }

    }
    

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Scéance</title>
    <link rel="stylesheet" href="<?=ASSETS?>css/seancesgerant.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?=ASSETS?>img/Falcon (1).png">
</head>

<body>
<?php $this->view("header")?>

    <div id="section">
        <button onclick="openPopupFilm()" id="button">Ajouter un film</button>
        <div id="popupFilm" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopupFilm()">&times;</span>
                <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="form_type" value="add_film">
                <div><input type="Titre" placeholder="Titre" class="id" id="titre" name="titre"></div>
                <div><input type="Synopsis" placeholder="Synopsis" class="id" id="synopsis" name="synopsis"></div>
                <div>
                    Durée:
                    <select id="hour" name="hour">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>h
                    <select id="minute" name="minute">
                        <?php
                        for ($i = 0; $i <= 59; $i++) {
                          echo "<option value=\"$i\">$i</option>";
                        }
                        ?>
                    </select>min
                </div>
                <div><input type="Genre" placeholder="Genre" class="id" id="genre" name="genre"></div>
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image">
                <button id="b1"> VALIDER</button>
                </form>
            </div>                    
        </div>
        <script src="<?=ASSETS?>js/popupsceancesgerant.js"></script>
    </div>

    <div id="section">
        <button onclick="openPopupScreening()" id="button">Créer une nouvelle scéance</button>
        <div id="popupScreening" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopupScreening()">&times;</span>
                <form method="post">
                        <input type="hidden" name="form_type" value="create_screening">
                        <select id="salle" name="salle">
                            <?php
                           
                            $sqlCinema = "SELECT idcinema FROM cinema WHERE user_id_user = ?";
                            $stmtCinema = $mysqli->prepare($sqlCinema);
                            $stmtCinema->bind_param("i", $_SESSION["user_id"]);
                            $stmtCinema->execute();
                            $cinemaResult = $stmtCinema->get_result();
                            $cinemaRow = $cinemaResult->fetch_assoc();

                            if ($cinemaRow) {
                                $cinema_id = $cinemaRow['idcinema'];

                                $sql = "SELECT DISTINCT idsalle, numero, cinema_idcinema FROM salle WHERE cinema_idcinema = ? ORDER BY numero";
                                $stmt = $mysqli->prepare($sql);
                                $stmt->bind_param("i", $cinema_id);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"{$row['idsalle']}\">{$row['numero']}</option>";
                                    }
                                } else {
                                    echo "<option>No data found</option>";
                                }
                                } else {
                                    echo "<option>No cinema found for user</option>";
                                }

                                $stmtCinema->close();
                                $stmt->close();
                            ?>
                        </select>
                        <select id="film" name="film">
                            <?php
                           
                            $sqlCinema = "SELECT idcinema FROM cinema WHERE user_id_user = ?";
                            $stmtCinema = $mysqli->prepare($sqlCinema);
                            $stmtCinema->bind_param("i", $_SESSION["user_id"]);
                            $stmtCinema->execute();
                            $cinemaResult = $stmtCinema->get_result();
                            $cinemaRow = $cinemaResult->fetch_assoc();

                            if ($cinemaRow) {
                                $cinema_id = $cinemaRow['idcinema'];

                                $sql = "SELECT DISTINCT id_film, titre, id_cinema FROM film WHERE id_cinema = ? ORDER BY titre";
                                $stmt = $mysqli->prepare($sql);
                                $stmt->bind_param("i", $cinema_id);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"{$row['id_film']}\">{$row['titre']}</option>";
                                    }
                                } else {
                                    echo "<option>No data found</option>";
                                }
                                } else {
                                    echo "<option>No cinema found for user</option>";
                                }

                                $stmtCinema->close();
                                $stmt->close();
                            ?>
                        </select>

                        <input type="date" name="film_date">
                        <input type="time" id="time" name="time" min="09:00" max="22:00" step="1800">

                        <button id="b1"> VALIDER</button>
                </form>
            </div>                    
        </div>
        <script src="<?=ASSETS?>js/popupsceancesgerant.js"></script>
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
                <li><a href="https://www.twitter.com"><img src="<?=ASSETS?>img/Twitter.png" alt="Twitter"></a></li>
                <li><a href="https://www.instagram.com"><img src="<?=ASSETS?>img/Instagram.png" alt="Instagram"></a></li>
                <li><a href="https://www.facebook.com"><img src="<?=ASSETS?>img/Facebook.png" alt=""></a></li>
            </div>
            <div class="mention_legales">
                <img src="../img/Copyright.png" alt="" class="Copyright">
                <p class="mention_legales_text">E-GLE 2024 Tous droits réservés</p>
            </div>
    </footer>
</body>