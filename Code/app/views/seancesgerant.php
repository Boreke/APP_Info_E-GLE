<!DOCTYPE html>
<html lang="en">

<body>
<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>

    <div id="section">
        <button onclick="openPopupFilm()" id="button">Ajouter un film</button>
        <div id="popupFilm" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopupFilm()">&times;</span>
                <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="form_type" value="add_film">
                <div>
                    <label for="titre">Titre du film:</label>
                    <input type="Titre" placeholder="Titre" class="id" id="titre" name="titre">
                </div>
                <div>
                    <label for="synopsis">Synopsis du film:</label>
                    <input type="Synopsis" placeholder="Synopsis" class="id" id="synopsis" name="synopsis">
                </div>
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
                <div>
                    <label for="genre">Genre du film:</label>
                    <input type="Genre" placeholder="Genre" class="id" id="genre" name="genre">
                </div>
                <div>
                    <label for="image">Upload Image:</label>
                    <input type="file" id="image" name="image">
                </div>
                <div>
                    <label for="film_release">Film's release date:</label>
                    <input type="date" name="film_release">
                </div>
                
                <button id="b1"> VALIDER</button>
                </form>
            </div>                    
        </div>
        <script src="<?=ASSETS?>js/popupsceancegerant.js"></script>
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
        <script src="<?=ASSETS?>js/popupsceancegerant.js"></script>
    </div>

    <div>

        <?php $this -> displaySeances(); ?>

    </div>

</body>

<?= $this->view("footer")?>