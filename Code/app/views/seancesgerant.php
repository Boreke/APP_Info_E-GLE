<!DOCTYPE html>
<html lang="en">
<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader($data['page_title']);

    ?>
<body>
    <main>
    <div class="container">
        <div class="film-div">
            <div id="section">
                <button class="film-btn" onclick="openPopupFilm()" id="button">Ajouter un film</button>
                <div id="popupFilm" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopupFilm()">&times;</span>
                        <form class="form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="form_type" value="add_film">
                        <div class="titre-div">
                            <label for="titre">Titre du film:</label>
                            <input type="text" placeholder="Titre" class="id" id="titre" name="titre">
                        </div>
                        <div class="syn-div">
                            <label for="synopsis">Synopsis du film:</label>
                            <input type="text" placeholder="Synopsis" class="id" id="synopsis" name="synopsis">
                        </div>
                        <div class="hour-div">
                            Durée:
                            <select id="hour" name="hour">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <select id="minute" name="minute">
                                <?php
                                for ($i = 0; $i <= 59; $i++) {
                                echo "<option value=\"$i\">$i</option>";
                                }
                                ?>
                            </select>min
                        </div>
                        <div class="genre-div">
                            <label for="genre">Genre du film :</label>
                            <input type="text" placeholder="Genre" class="id" id="genre" name="genre">
                        </div>
                        <div class="img-div">
                            <label for="image">Image :</label>
                            <input type="file" id="image" name="image">
                        </div>
                        <div class="date-div">
                            <label for="film_release">Date de sortie :</label>
                            <input type="date" name="film_release">
                        </div>
                        
                        <button id="b1">Valider</button>
                        </form>
                    </div>                    
                </div>

            </div>
            <div class="table-container">
                <?php $this -> displayFilms(); ?>
            
            
        </div>

        

        <div class="seances-div">
            <div id="section">
                <button class="seance-btn" onclick="openPopupScreening()" id="button">Créer une nouvelle scéance</button>
                <div id="popupScreening" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopupScreening()">&times;</span>
                        <form class="form" method="post">
                                <input type="hidden" name="form_type" value="create_screening">
                                <label for="salle">Choisissez une salle:</label>
                                <select id="salle" name="salle">
                                    <?php 
                                    $this->afficher_salle();
                                    ?>
                                </select>
                                <label for="film">Choisissez un film:</label>
                                <select id="film" name="film">
                                    <?php 
                                    $this->afficher_film();
                                    ?>
                                </select>
                                <label for="film_date">Choisissez la date:</label>
                                <input type="date" name="film_date">
                                <div class="time-div">
                                    <label for="time">Choisissez l'heure:</label>
                                    <input type="time" id="time" name="time" min="09:00" max="22:00" step="1800">
                                </div>
                                <div class="price-div">
                                    <label for="price">Choisissez le prix en euros:</label>
                                    <input type="number" id="price" name="price">
                                </div>
                                <button id="b1"> VALIDER</button>
                        </form>
                    </div>                    
                </div>

            </div>
            <div class="table-container">
                <?php $this -> displaySeances(); ?>


        </div>
    </div>   
</main>             
</body>

<?= $this->view("footer")?>
<script src="<?=ASSETS?>js/popupsceancegerant.js"></script>
</html>