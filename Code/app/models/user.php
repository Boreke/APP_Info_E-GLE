<?php 

Class User 
{

	function login($POST)
	{
		$DB = new Database();

		$_SESSION['error_message'] = "";
		if(isset($POST['username']) && isset($POST['password']))
		{

			$arr['username'] = $POST['username'];

			
			$query = "select * from user where username = :username limit 1";
			$data = $DB->read($query,$arr);

			if(is_array($data))
			{
				if(password_verify($_POST["password"], $data[0]->password_hash)){
					//logged in
					$_SESSION['username'] = $data[0]->username;
					$_SESSION['user_id'] = $data[0]->id_user;
					$_SESSION['type']=$data[0]->type;
					header("Location:". ROOT . "home");
					die;
				}
			}else{

				$_SESSION['error_message'] = "wrong username or password";
			}
		}else{

			$_SESSION['error_message'] = "please enter a valid username and password";
		}

	}

	function signup($POST)
	{

		$DB = new Database();
		
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
        
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        if(isset($_POST['type'])){
            $type = 'gerant';
			$return_user_id = true;
        } else{
            $type = 'client';
			$return_user_id = false;
        }

		
        
		$_SESSION['error_message'] = "";
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
			$user_id = $DB->write($query,$arr,$return_user_id);

			if ($return_user_id && $user_id) {
				// Insert into cinema table only if user is a gérant and user_id is successfully retrieved
				$arr2 = [
					'nom_cinema' => $POST['nom_cinema'],
					'adresse_cinema' => $POST['adresse_cinema'],
					'user_id' => $user_id
				];
				$result = $DB->write("INSERT INTO cinema (nom_cinema, adresse_cinema, user_id_user) VALUES (:nom_cinema, :adresse_cinema, :user_id)", $arr2);
		
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

		$DB = new Database();

		if(isset($_SESSION['user_id']))
		{
			
			$arr['user_id'] = $_SESSION['user_id'];
			$query = "select * from user where id_user = :user_id limit 1";
			$data = $DB->read($query,$arr);
			if(is_array($data))
			{
				
				//logged in
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
		//logged in
		unset($_SESSION['username']);
		unset($_SESSION['user_id']);
		header("Location:". ROOT . "login");
		die;
	}

	function getCinemaId(){
		$DB = new Database();
		$sqlRequest = "SELECT * FROM cinema WHERE user_id_user = :user_id";
		$arr["user_id"]=$_SESSION["user_id"];
		$cinemaResult =$DB->read($sqlRequest,$arr);
		if (isset($cinemaResult)) {
			$cinema_id = $cinemaResult[0]->idcinema;
			return $cinema_id;
		}
		
	}

}