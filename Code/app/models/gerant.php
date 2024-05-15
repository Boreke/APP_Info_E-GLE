<?php

Class Gerant{

    function ajout_film($POST,$data = []){
        $_SESSION['error_message'] = "";
        $DB = new Database();
        if(isset($_POST['form_type']) && $_POST['form_type'] === 'add_film') {
            if(isset($_FILES["image"])){
                if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                
                    echo "file uploading";
                    $target_dir = "../public/assets/img/"; // Ensure this directory exists and is writable
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
                        $hour = isset($_POST["hour"]) ? (int) $_POST["hour"] : 0;
                        $minute = isset($_POST["minute"]) ? (int) $_POST["minute"] : 0;
                        $duration = $hour * 3600 + $minute * 60;

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
                            ];

                            $query = " insert into film (titre, synopsis, duree, genre, id_cinema, image_file) values (:titre, :synopsis, :duree, :genre, :id_cinema, :image_file)";
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

    function create_sceance($POST){
        $DB = new Database();
        if (isset($_POST['form_type']) && $_POST['form_type'] ===  'create_screening') {

            $film_date = strtotime($_POST['film_date']);
            $time = $_POST['time'];
            $formatted_date = date('Y-m-d', $film_date);
            $datetime = $formatted_date . ' ' . $time . ':00';

            $arr3 = [
                'film_id' => $_POST['film'], 
                'salle_id' => $_POST['salle'], 
                'date' => $datetime
            ];
        
            $query = "insert into diffuser (Film_id_film, salle_idsalle, film_date) values (:film_id,:salle_id,:date)";
            $result = $DB->write($query,$arr3,false);

        }
    }

}

?>