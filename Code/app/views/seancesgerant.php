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
                            $this->afficher_salle();
                            ?>
                        </select>
                        <select id="film" name="film">
                            <?php 
                            $this->afficher_film();
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