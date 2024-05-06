<?php
Class NouveauCompte extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "nouveaucompte";

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
        
        if(isset($_POST["type"])){
            $type = 'gerant';
        } else{
            $type = 'client';
        }
        
        $mysqli = require __DIR__ . "/database.php";
        
        $sql = "INSERT INTO user (nom, prenom, username, email, password_hash, type)
                VALUES (?, ?, ?, ?, ?, ?)";
                
        $stmt = $mysqli->stmt_init();
        
        if ( ! $stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }
        
        $stmt->bind_param("ssssss", $_POST["nom"], $_POST["prenom"], $_POST["username"], $_POST["email"], $password_hash, $type);
        
        if ($stmt->execute()) {
        
            $user_id = $stmt->insert_id;
        
            $sql2 = "INSERT INTO cinema (nom_cinema, adresse_cinema, user_id_user) VALUES (?, ?, ?)";
            $stmt2 = $mysqli->stmt_init();
            if(!$stmt2->prepare($sql2)) {
                die("SQL error: " . $mysqli->error);
            }
        
            $stmt2->bind_param("ssi", $_POST['nom_cinema'], $_POST['adresse_cinema'],$user_id);
            if(!$stmt2->execute()) {
                die($mysqli->error . " " . $mysqli->errno);
            }
        
            header("Location: index.php");
            exit;
            
        } else {
            
            if ($mysqli->errno === 1062) {
                die("email already taken");
            } else {
                die($mysqli->error . " " . $mysqli->errno);
            }
        }

 	 	if(isset($_POST['email']))
 	 	{
 	 		$user = $this->loadModel("user");
 	 		$user->signup($_POST);

 	 	}elseif(isset($_POST['username']) && !isset($_POST['email'])){

 	 		$user = $this->loadModel("user");
 	 		$user->login($_POST);
 	 	}
 	 	
		$this->view("nouveaucompte",$data);
	}

}


?>  