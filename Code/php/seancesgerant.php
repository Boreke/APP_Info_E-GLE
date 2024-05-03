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

        $sql = "INSERT INTO film (titre, synopsis, duree, genre) VALUES (?, ?, ?, ?)";

        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("SQL error: " . $mysqli->error);
        }

        $hour = isset($_POST["hour"]) ? (int) $_POST["hour"] : 0;
        $minute = isset($_POST["minute"]) ? (int) $_POST["minute"] : 0;
        $duration = $hour * 3600 + $minute * 60;

        $stmt->bind_param("ssis", $_POST["titre"], $_POST["synopsis"], $duration, $_POST["genre"]);

        if ($stmt->execute()) {
            echo "Film added successfully";
        } else {
            echo "Error adding film: " . $stmt->error;
        }

    } elseif ($_POST['form_type'] === 'create_screening') {
        
        $sql2 = "INSERT INTO diffuser (Film_id_film, salle_idsalle, date) VALUES (?, ?, ?)";

        $stmt2 = $mysqli->prepare($sql);
        if (!$stmt2) {
            die("SQL error: " . $mysqli->error);
        }

        $film_date = strtotime($_POST['film_date']);
        $formatted_date = date('Y-m-d', $film_date);

        $stmt2->bind_param("ssd", $_POST['film'], $_POST['salle'], $formatted_date);

        if ($stmt2->execute()) {
            echo "Screening created successfully";
        } else {
            echo "Error Creating Screening: " . $stmt2->error;
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
    <link rel="stylesheet" href="../css/seancesgerant.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/Falcon (1).png">
</head>

<body>
    <header>
        <a href="index.php" class="topleft">
            <div class="Logo_Nom">
                <img src="../img/Falcon (1).png" alt="Logo" class="logo">
                <p class="Nom">E-GLE</p>
            </div>
        </a>
        <?php if (isset($user) && htmlspecialchars($user['type'])=='gerant'):?>
        <nav id="nav" >
            <li><a href="index.php"  class="nav_elmt1">Accueil</a></li>
            <li><a href="seancesgerant.php"  class="nav_elmt">Séances</a></li>
            <li><a href="../Cinema_Salles.html"  class="nav_elmt">Salles</a></li>
        </nav>
        <?php elseif (isset($user) && htmlspecialchars($user['type'])=='admin'):?>
            <nav id="nav" >
            <li><a href="index.php"  class="nav_elmt1">Accueil</a></li>
            <li><a href="../adminusers.html"  class="nav_elmt">Séances</a></li>
            <li><a href="../faq.html"  class="nav_elmt">Salles</a></li>
        </nav>
        <?php else: ?>
            <nav id="nav" >
            <li><a href="index.php"  class="nav_elmt1">Accueil</a></li>
            <li><a href="../seancesflorent.html"  class="nav_elmt">Séances</a></li>
            <li><a href="../salles.html"  class="nav_elmt">Salles</a></li>
        </nav>
        <?php endif; ?>
        <img src="../img/Menu.png" alt="Menu" class="menu" id="menuburger">
        <div class="topright">
            <div class="lg">
                <li><a href="" class="lg_elmt1">EN</a></li>
                <li><a href="" class="lg_elmt">FR</a></li>
            </div>    
            <?php if (isset($user)): ?>
                <a href="deconnexion.php"><button class="button1">Logout</button></a>
            <?php else:  ?>
                <a href="connexion.php"><button class="button1">Login</button></a>
            <?php endif; ?> 
           
            

        </div>
    </header>

    <div id="section">
        <button onclick="openPopupFilm()" id="button">Ajouter un film</button>
        <div id="popupFilm" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopupFilm()">&times;</span>
                <form method="post">
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
                <button id="b1"> VALIDER</button>
                </form>
            </div>                    
        </div>
        <script src="../js/popupsceancesgerant.js"></script>
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

                                $sql = "SELECT DISTINCT id_film, titre, cinema_idcinema FROM film WHERE cinema_idcinema = ? ORDER BY title";
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
                        <button id="b1"> VALIDER</button>
                </form>
            </div>                    
        </div>
        <script src="../js/popupsceancesgerant.js"></script>
    </div>

    <footer>
            <img src="../img/logo-events-IT 1.png" alt="">
            <div class="nav_bas">
                <li><a href="#" class="nav_bas_elmt">A propos</a></li>
                <li><a href="#" class="nav_bas_elmt">Forum</a></li>
                <li><a href="#" class="nav_bas_elmt">Contact</a></li>
                <li><a href="#" class="nav_bas_elmt">Mention légales</a></li>
                <li><a href="#" class="nav_bas_elmt">FAQ</a></li>
            </div>
            <div class="reseaux">
                <li><a href="https://www.twitter.com"><img src="../img/Twitter.png" alt="Twitter"></a></li>
                <li><a href="https://www.instagram.com"><img src="../img/Instagram.png" alt="Instagram"></a></li>
                <li><a href="https://www.facebook.com"><img src="../img/Facebook.png" alt=""></a></li>
            </div>
            <div class="mention_legales">
                <img src="../img/Copyright.png" alt="" class="Copyright">
                <p class="mention_legales_text">E-GLE 2024 Tous droits réservés</p>
            </div>
    </footer>
</body>