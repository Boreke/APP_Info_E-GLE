<?php

Class Gerant{

    function ajout_film($POST,$data = []){
        $_SESSION['error_message'] = "";
        $DB = new Database();
        if(isset($_POST['form_type']) && $_POST['form_type'] === 'add_film') {
            if(isset($_FILES["image"])){
                if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                
                    echo "file uploading";
                    $target_dir = "../public/assets/img/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        
                    if (file_exists($target_file)) {
                        $uploadOk = 0;
                        $fileExists=0;
                    }
                
                    
                    if ($_FILES["image"]["size"] > 500000) { 
                        echo "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }
                
                    
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                
                   
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    
                    } else {
                        if ($fileExists) {
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
        
                    if ($uploadOk == 1||$fileExists==0) {
                        $hour = isset($_POST["hour"]) ? (int) $_POST["hour"] : 0;
                        $minute = isset($_POST["minute"]) ? (int) $_POST["minute"] : 0;
                        $duration = $hour * 3600 + $minute * 60;

                        $film_date = strtotime($_POST['film_release']);
                        $formatted_date = date('Y-m-d', $film_date);

                        $cine_query = "SELECT * FROM cinema WHERE user_id_user = :user_id";
                        $arr["user_id"]=$_SESSION["user_id"];
                        $cinemaResult = $DB->read($cine_query,$arr);
                        
                        if(isset($cinemaResult)){  
                            $cinema_id=$cinemaResult[0]->idcinema;
                            $arr = [
                            'titre' => $_POST['titre'],
                            'synopsis' => $_POST['synopsis'],
                            'duree' => $duration,
                            'genre' => $_POST['genre'],
                            'id_cinema' => $cinema_id,
                            'image_file' => $target_file,
                            'release' => $formatted_date
                            ];

                            $query = " insert into film (titre, synopsis, duree, genre, id_cinema, image_file, date_sortie) values (:titre, :synopsis, :duree, :genre, :id_cinema, :image_file, :release)";
                            $result = $DB->write($query,$arr,false);

                            if (!$result) {
                                die("Failed to add film");
                            }
                        }
                    }
                
                } else {
                    echo "Error uploading file: " . $_FILES["image"]["error"];
                }
            }else{
                echo "Is not set";
                print_r($_FILES);
            }
            
        }
        
    }

    function create_sceance($POST) {
        $DB = new Database();
        if (isset($_POST['form_type']) && $_POST['form_type'] === 'create_screening') {
            $film_date = strtotime($_POST['film_date']);
            $time = $_POST['time'];
            $formatted_date = date('Y-m-d', $film_date);
            $datetime = $formatted_date . ' ' . $time . ':00';
    
            $reserved = 0;
    
            $sqlRequest = "SELECT * FROM cinema WHERE user_id_user = :user_id";
            $arr["user_id"] = $_SESSION["user_id"];
            $cinemaResult = $DB->read($sqlRequest, $arr);
            if ($cinemaResult) {
                $cinema_id = $cinemaResult[0]->idcinema;
    
                if (isset($cinema_id)) {
                    $arr2["cinema_id"] = $cinema_id;
                    $salle_query = "SELECT distinct nbr_places FROM salle WHERE cinema_idcinema = :cinema_id";
                    $salle_seats = $DB->read($salle_query, $arr2);
                    $empty = $salle_seats[0]->nbr_places;
    
                    $check_query = "SELECT COUNT(*) AS existing_count FROM diffuser WHERE Film_id_film = :film_id AND salle_idsalle = :salle_id AND film_date = :date";
                    $check_arr = [
                        'film_id' => $_POST['film'],
                        'salle_id' => $_POST['salle'],
                        'date' => $datetime
                    ];
                    $existing = $DB->read($check_query, $check_arr);
                    
                    if ($existing[0]->existing_count == 0) {
                        $arr3 = [
                            'film_id' => $_POST['film'], 
                            'salle_id' => $_POST['salle'], 
                            'date' => $datetime,
                            'reserved' => $reserved,
                            'empty' => $empty,
                            'price' => $_POST['price']
                        ];
    
                        $query = "INSERT INTO diffuser (Film_id_film, salle_idsalle, film_date, nbr_places_rsv, nbr_places_disp,price) VALUES (:film_id, :salle_id, :date, :reserved, :empty,:price)";
                        $result = $DB->write($query, $arr3, false);
    
                        if ($result) {
                            echo "Screening successfully created.";
                        } else {
                            echo "Failed to create screening.";
                        }
                    } else {
                        echo "A screening for this film at the specified time and salle already exists.";
                    }
                }
            }
        }
    }    

    function fetchAllSeances() {
        $DB = new Database(); 
        $today = date('Y-m-d H:i:s');
        $query = "SELECT d.idseance, d.Film_id_film, d.salle_idsalle, d.film_date, d.price, f.titre, s.numero, d.nbr_places_disp FROM diffuser d
                  JOIN film f ON d.Film_id_film = f.id_film
                  JOIN salle s ON d.salle_idsalle = s.idsalle
                  WHERE d.film_date >= :today AND s.cinema_idcinema =:idcinema
                  ORDER BY d.film_date ASC";
        $data = ['today' => $today];
        $data['idcinema']=$this->fetchCinema()[0]->idcinema;
        $seances = $DB->read($query, $data);
        return $seances; 
    }
    function fetchAllFilms() {
        $DB = new Database(); 
        $today = date('Y-m-d H:i:s');
        $query = "SELECT * FROM film WHERE id_cinema =:idcinema
                  ORDER BY date_sortie ASC";
        $data['idcinema']=$this->fetchCinema()[0]->idcinema;
        $seances = $DB->read($query, $data);
        return $seances; 
    }
    
    function deleteSeance($id) {
        $DB = new Database();
        $query = "DELETE FROM diffuser WHERE idseance = :idseance";
        $data = ['idseance' => $id];
        if ($DB->write($query, $data)) {
            echo "Seance removed successfully.";
        } else {
            echo "Failed to remove seance.";
        }
    }

    function fetchCinema(){
        $DB = new Database(); 
        $sqlRequest = "SELECT * FROM cinema WHERE user_id_user = :user_id";
        $arr["user_id"] = $_SESSION["user_id"];
        $cinemaResult = $DB->read($sqlRequest, $arr);
        return $cinemaResult;
    }

    function getSeanceById($id) {
        $DB = new Database();
        $query = "SELECT * FROM diffuser WHERE idseance = :idseance";
        $data = ['idseance' => $id];
        return $DB->read($query, $data);
    }
    
    function updateSeance($POST) {
        $DB = new Database();
        $query = "UPDATE diffuser SET
                  Film_id_film = :film_id,
                  salle_idsalle = :salle_id,
                  film_date = :film_date,
                  price = :price
                  WHERE idseance = :idseance";
        $arr = [
            'film_id' => $POST['film'],
            'salle_id' => $POST['salle'],
            'film_date' => $POST['film_date'],
            'price' =>$_POST['price'],
            'idseance' => $POST['idseance']
            
        ];
    
        if ($DB->write($query, $arr)) {
            echo "Seance updated successfully.";
        } else {
            echo "Failed to update seance.";
        }
    }


    function updateFilm($POST) {
        $DB = new Database();

        $query = "UPDATE film SET
                  date_sortie = :date,
                  genre=:genre
                  WHERE id_film = :idfilm";
        $arr = [
            'genre' => $POST['genre'],
            'date' => $POST['film_date'],
            'idfilm' => $POST['idfilm']
        ];
    
        if ($DB->write($query, $arr)) {
            echo "Film mis à jour.";
        } else {
            echo "echec de la mise à jour du film.";
        }
        
    }
    

}

?>