<?php

Class cinemasalle extends Controller 
{
	function index()
	{
 	 	unset($_SESSION['error_message']);
 	 	$data['page_title'] = "salle";
		if(isset($_POST['numero_salle'])){
			$this->add_salle($_POST);
		}
		$this->view("cinemasalle",$data);
	}

	function add_salle($POST){
		$DB = new Database();
		$user=$this->loadModel("user");
		if ($user->check_logged_in()) {
			$sqlRequest = "SELECT * FROM cinema WHERE user_id_user = :user_id";
			$arr["user_id"]=$_SESSION["user_id"];
			$cinemaResult =$DB->read($sqlRequest,$arr);
			if (isset($cinemaResult)) {
				$cinema_id = $cinemaResult[0]->idcinema;
				if (empty($_POST["numero_salle"])) {
					$_SESSION["error_message"] = "Veuillez saisir un numéro de salle.";
				} elseif (!is_numeric($_POST["numero_salle"])&& $_POST["numero_salle"]==0) {
					$_SESSION["error_message"] = "Veuillez saisir un numéro valide pour la salle.";
				}
				$sql = "INSERT INTO salle (numero, cinema_idcinema) VALUES (:numero, :cinema_idcinema)";
				unset($arr);
				$arr["numero"]=$_POST["numero_salle"];
				$arr["cinema_idcinema"]=$cinema_id;
				try {
					$DB->write($sql,$arr);
					echo "La salle a été créer.";
				} catch (mysqli_sql_exception $e) {
					if ($e->getCode() == 1062) {
						$_SESSION["error_message"]="une salle de ce numero existe deja pour ce cinéma";
					} else {
						$_SESSION["error_message"]="Erreur lors de l'ajout de la salle: " . $e->getMessage();
					}
				}
				
			}
		}

	}
}