<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendar</title>
    <link rel="stylesheet" href="../css/calendar.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">   
    <link rel="icon" type="image/png" href="img/Falcon (1).png">
</head>
<body>
    <header>
        <a href="index.php" class="topleft">
            <div class="Logo_Nom">
                <img src="../img/Falcon (1).png" alt="Logo">
                <h1 class="Nom">E-GLE</h1>
            </div>
        </a>
       
        <nav id="nav" >
            <li><a href="index.php"  class="nav_elmt">Accueil</a></li>
            <li><a href="../seancesflorent.html"  class="nav_elmt1">Séances</a></li>
            <li><a href="../salles.html"  class="nav_elmt">Salles</a></li>
        </nav>
        <img src="img/Menu.png" alt="Menu" class="menu" id="menuburger">
        <div class="topright">
            <div class="lg">
                <li><a href="" class="lg_elmt1">EN</a></li>
                <li><a href="" class="lg_elmt">FR</a></li>
            </div>    
            <a href="connexion.php"><button class="button">Login</button></a>
        </div>
    </header>

    <?php
$mysqli = require __DIR__ . "/database.php";
$movieId = isset($_GET['id']) ? $_GET['id'] : 1;
$sql = "SELECT * FROM film WHERE id_film = $movieId";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $movie = $result->fetch_assoc();
    echo "<div class='movie-layout'>";
    echo "<div class='movie-image'>";
    echo "<img src='" . htmlspecialchars($movie['image_path']) . "' alt='Movie Image' style='width:100%;'>";
    echo "</div>";
    echo "<div class='movie-info'>";
    echo "<p><strong></strong> " . htmlspecialchars($movie['titre']) . "</p>";
    echo "<p><strong>Genre:</strong> " . htmlspecialchars($movie['genre']) . "</p>";
    echo "<p><strong>Duration:</strong> " . htmlspecialchars($movie['duree']) . "</p>";
    echo "<p><strong>Synopsis:</strong> " . htmlspecialchars($movie['synopsis']) . "</p>";
    echo "</div>";
    echo "</div>";
} else {
    echo "<p>Movie not found.</p>";
}
?>
    <div class="center-top">
        <h2>Réserver ma séance</h2>
        
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
        <script src="../js/calendar.js" defer></script>
        <div>
        </div>
    <footer>
        <img src="img/logo-events-IT 1.png" alt="">
        <div class="nav_bas">
            <li><a href="#" class="nav_bas_elmt">A propos</a></li>
            <li><a href="#" class="nav_bas_elmt">Forum</a></li>
            <li><a href="#" class="nav_bas_elmt">Contact</a></li>
            <li><a href="#" class="nav_bas_elmt">Mention légales</a></li>
            <li><a href="#" class="nav_bas_elmt">FAQ</a></li>
        </div>
        <div class="reseaux">
            <li><a href="www.twitter.com"><img src="../img/Twitter.png" alt="Twitter"></a></li>
            <li><a href="www.instagram.com"><img src="../img/Instagram.png" alt="Instagram"></a></li>
            <li><a href="www.facebook.com"><img src="../img/Facebook.png" alt=""></a></li>
        </div>
        <div class="mention_legales">
            <img src="../img/Copyright.png" alt="" class="Copyright">
            <p class="mention_legales_text">E-GLE 2024 Tous droits réservés</p>
        </div>
    </footer>
    
    </body>
    </html>
