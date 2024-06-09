<?php 

Class User 
{
	private $DB;
	public function __construct(){
		$this->DB=new Database();
	}
	function login($POST)
	{
		

		unset($_SESSION['error']);

		if(isset($POST['username']) && isset($POST['password']) && $POST['username'] != '' && $POST['password'] != '')
		{
			$arr['username'] = $POST['username'];

			
			$query = "select * from user where username = :username limit 1";
			$data = $this->DB->read($query,$arr);

			if(is_array($data))
			{
				if(password_verify($_POST["password"], $data[0]->password_hash)){
					//logged in
					$_SESSION['username'] = $data[0]->username;
					$_SESSION['user_id'] = $data[0]->id_user;
					$_SESSION['type']=$data[0]->type;
					header("Location:". ROOT . "home");
					die;
				}else{

					$_SESSION['error'] = "Wrong password";
				}
			}else{

				$_SESSION['error'] = "Wrong username";
			}
		}else{
			$_SESSION['error'] = "Please enter a valid username and password";
		}

	}

	function signup($POST)
	{
		unset($_SESSION['error_message']);

		
		
		if( empty($_POST["nom"]) ){
            die("Le nom est requis");
        }
        
        if( empty($_POST["prenom"]) ){
            die("Le prenom est requis");
        }
        
        if( !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ) {
            die("Une adresse mail correcte est nécessaire");
        }
        
        if (strlen($_POST["password"]) < 8){
            die("Le mot de passe doit faire au moins 8 charactères");
        }
        
        if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
            die("Le mot de passe doit contenir au moins une lettre");
        }
        
        if ( ! preg_match("/[0-9]/i", $_POST["password"])) {
            die("Le mot de passe doit contenir au moins un nombre");
        }
        
        if ($_POST["password"] !== $_POST["password_confirmation"]) {
            die("Les mots de passe ne sont pas identique");
        }
        
		$email = $_POST['email'];
		$query = "SELECT * FROM user WHERE email = :email LIMIT 1";
		$email_check = $this->DB->read($query, ['email' => $email]);
		if ($email_check) {
			$_SESSION['error'] = "L'adresse email est déjà utilisée";
			header("Location: ".ROOT."nouveaucompte");
		}

        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        if(isset($_POST['type'])){
            $type = 'gerant';
			$return_user_id = true;
        } else{
            $type = 'client';
			$return_user_id = false;
        }

		
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$arr = [
				'nom' => $_POST['nom'],
				'prenom' => $_POST['prenom'],
				'username' => $_POST['username'],
				'password_hash' => $password_hash,
				'email' => $_POST['email'],
				'type' => $type  
			];

			$query = "insert into user (nom,prenom,username,password_hash,email,type) values (:nom,:prenom,:username,:password_hash,:email,:type)";
			$user_id = $this->DB->write($query,$arr,$return_user_id);

			if ($return_user_id && $user_id) {
				// Insert into cinema table only if user is a gérant and user_id is successfully retrieved
				$arr2 = [
					'nom_cinema' => $POST['nom_cinema'],
					'adresse_cinema' => $POST['adresse_cinema'],
					'user_id' => $user_id
				];
				$result = $this->DB->write("INSERT INTO cinema (nom_cinema, adresse_cinema, user_id_user) VALUES (:nom_cinema, :adresse_cinema, :user_id)", $arr2);
		
				if ($result) {
					header("Location: ".ROOT."login");
					die;
				} else {
					die("Failed to register cinema details.");
				}
			} else if (!$return_user_id) {
				// If user is not a gérant, just redirect to login or perform other actions as necessary
				header("Location: ".ROOT."login");
				die;
			} else {
				// Handle error in case user_id was not obtained but was supposed to be
				die("Failed to register user.");
			}
		}
	}

	function check_logged_in()
	{

		

		if(isset($_SESSION['user_id']))
		{
			
			$arr['user_id'] = $_SESSION['user_id'];
			$query = "select * from user where id_user = :user_id limit 1";
			$data = $this->DB->read($query,$arr);
			if(is_array($data))
			{
				

 				$_SESSION['username'] = $data[0]->username;
				$_SESSION['user_id'] = $data[0]->id_user;
				$_SESSION['type'] = $data[0]->type;
				return true;
			}
		}

		return false;

	}

	function logout()
	{

		unset($_SESSION['username']);
		unset($_SESSION['user_id']);
		unset($_SESSION['type']);
		header("Location:". ROOT . "home");
		die;
	}

	function logoutadmin()
	{
		$_SESSION['username']=$_SESSION['real_username'];
		$_SESSION['user_id']=$_SESSION['real_id'];
		$_SESSION['type']='admin';
		unset($_SESSION['real_username']);
		unset($_SESSION['real_id']);
		unset($_SESSION['real_type']);
		header("Location:". ROOT . "adminusers");
		die;
	}

	function getCinema(){
		
		$sqlRequest = "SELECT * FROM cinema WHERE user_id_user = :user_id";
		$arr["user_id"]=$_SESSION["user_id"];
		$cinemaResult =$this->DB->read($sqlRequest,$arr);
		if ($cinemaResult) {
			return $cinemaResult;
		}
		
	}

	function getUserId(){
		
		$sqlRequest = "SELECT * FROM user WHERE id_user = :user_id";
		$arr["user_id"]=$_SESSION["user_id"];
		$Result =$this->DB->read($sqlRequest,$arr);
		if (isset($Result)) {
			$id = $Result[0]->id_user;
			return $id;
		}
		
	}

	function getUsername(){
		
		$sqlRequest = "SELECT * FROM user WHERE id_user = :user_id";
		$arr["user_id"]=$_SESSION["user_id"];
		$Result =$this->DB->read($sqlRequest,$arr);
		if (isset($Result)) {
			$username = $Result[0]->username;
			return $username;
		}
		
	}
	function ajout_film($POST,$data = []){
		if ($_SESSION['type']=='gerant'){
			$_SESSION['error_message'] = "";
			
			if(isset($_POST['form_type']) && $_POST['form_type'] === 'add_film') {
				if(isset($_FILES["image"])){
					if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
					
						echo "file uploading";
						$target_dir = "../public/assets/img/";
						$target_file = $target_dir . basename($_FILES["image"]["name"]);
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
						$fileExists=false;
			
			
						if (file_exists($target_file)) {
							$uploadOk = 0;
							$fileExists=true;
						}
					
						
						if ($_FILES["image"]["size"] > 50000000) { 
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
							if (!$fileExists) {
								move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
								echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
						}
			
						if ($uploadOk == 1||$fileExists) {
							$hour = isset($_POST["hour"]) ? (int) $_POST["hour"] : 0;
							$minute = isset($_POST["minute"]) ? (int) $_POST["minute"] : 0;
							$duration = $hour * 3600 + $minute * 60;

							$film_date = strtotime($_POST['film_release']);
							$formatted_date = date('Y-m-d', $film_date);

							$cine_query = "SELECT * FROM cinema WHERE user_id_user = :user_id";
							$arr["user_id"]=$_SESSION["user_id"];
							$cinemaResult = $this->DB->read($cine_query,$arr);
							
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
								$result = $this->DB->write($query,$arr,false);

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
    }

    function create_sceance($POST) {
        if ($_SESSION['type']=='gerant'){
			if (isset($_POST['form_type']) && $_POST['form_type'] === 'create_screening') {
				$film_date = strtotime($_POST['film_date']);
				$time = $_POST['time'];
				$formatted_date = date('Y-m-d', $film_date);
				$datetime = $formatted_date . ' ' . $time . ':00';
		
				$reserved = 0;
		
				$sqlRequest = "SELECT * FROM cinema WHERE user_id_user = :user_id";
				$arr["user_id"] = $_SESSION["user_id"];
				$cinemaResult = $this->DB->read($sqlRequest, $arr);
				if ($cinemaResult) {
					$cinema_id = $cinemaResult[0]->idcinema;
		
					if (isset($cinema_id)) {
						$arr2["cinema_id"] = $cinema_id;
						$salle_query = "SELECT distinct nbr_places FROM salle WHERE cinema_idcinema = :cinema_id";
						$salle_seats = $this->DB->read($salle_query, $arr2);
						$empty = $salle_seats[0]->nbr_places;
		
						$check_query = "SELECT COUNT(*) AS existing_count FROM diffuser WHERE Film_id_film = :film_id AND salle_idsalle = :salle_id AND film_date = :date";
						$check_arr = [
							'film_id' => $_POST['film'],
							'salle_id' => $_POST['salle'],
							'date' => $datetime
						];
						$existing = $this->DB->read($check_query, $check_arr);
						
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
							$result = $this->DB->write($query, $arr3, false);
		
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
    }    

    function fetchAllSeances() {
		if ($_SESSION['type']=='gerant'){
			$today = date('Y-m-d H:i:s');
			$query = "SELECT d.idseance, d.Film_id_film, d.salle_idsalle, d.film_date, d.price, f.titre, s.numero, d.nbr_places_disp FROM diffuser d
					JOIN film f ON d.Film_id_film = f.id_film
					JOIN salle s ON d.salle_idsalle = s.idsalle
					WHERE d.film_date >= :today AND s.cinema_idcinema =:idcinema
					ORDER BY d.film_date ASC";
			$data = ['today' => $today];
			$data['idcinema']=$this->fetchCinema()[0]->idcinema;
			$seances = $this->DB->read($query, $data);
			return $seances; 
		}
		return false;
    }
    function fetchAllFilms() {
         
		if ($_SESSION['type']=='gerant'){
			$today = date('Y-m-d H:i:s');
			$query = "SELECT * FROM film WHERE id_cinema =:idcinema
					ORDER BY date_sortie ASC";
			$data['idcinema']=$this->fetchCinema()[0]->idcinema;
			$seances = $this->DB->read($query, $data);
			return $seances;
		}
		return false;
    }
    
    function deleteSeance($id) {
        if ($_SESSION['type']=='gerant'){
			$query = "DELETE FROM diffuser WHERE idseance = :idseance";
			$data = ['idseance' => $id];
			if ($this->DB->write($query, $data)) {
				echo "Seance removed successfully.";
			} else {
				echo "Failed to remove seance.";
			}
		}
    }

    function fetchCinema(){
		if ($_SESSION['type']=='gerant'){
			$sqlRequest = "SELECT * FROM cinema WHERE user_id_user = :user_id";
			$arr["user_id"] = $_SESSION["user_id"];
			$cinemaResult = $this->DB->read($sqlRequest, $arr);
			return $cinemaResult;
		}
		return false;
    }

    function getSeanceById($id) {
        if ($_SESSION['type']=='gerant'){
			$query = "SELECT * FROM diffuser WHERE idseance = :idseance";
			$data = ['idseance' => $id];
			return $this->DB->read($query, $data);
		}
		return false;
    }
    
    function updateSeance($POST) {
        if ($_SESSION['type']=='gerant'){
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
		
			if ($this->DB->write($query, $arr)) {
				echo "Seance updated successfully.";
			} else {
				echo "Failed to update seance.";
			}
		}
    }


    function updateFilm($POST) {
        
		if ($_SESSION['type']=='gerant'){
			$query = "UPDATE film SET
					date_sortie = :newdate,
					genre=:genre
					WHERE id_film = :idfilm";
			$arr = [
				'genre' => $POST['genre'],
				'newdate' => $POST['film_date'],
				'idfilm' => $POST['idfilm']
			];
			
			if ($this->DB->write($query, $arr)) {
				echo "Film mis à jour.";
			} else {
				echo "echec de la mise à jour du film.";
			}
		}
        
    }
    


}