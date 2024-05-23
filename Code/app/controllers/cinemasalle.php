<?php

Class cinemasalle extends Controller {
	
	function index()
	{
		$user=$this->loadModel("user");
 	 	unset($_SESSION['error_message']);;
 	 	$data['page_title'] = "salle";
		if(isset($_POST['numero_salle_del'])){
			$this->delete_salle($_POST);
		}
		if(isset($_POST['numero_salle'])){
			$this->add_salle($_POST);
		}
		$this->view("cinemasalle",$data);
	}

	function getExistingSalles(){
		$user=new User();
		$DB = new Database();
		$cinemaId=$user->getCinemaID();
		$sqlRequest="SELECT * FROM salle WHERE cinema_idcinema = :idCinema";
		$arr["idCinema"]=$cinemaId;
		$existingRooms=$DB->read($sqlRequest,$arr);
		unset($sqlRequest);
		return $existingRooms;
	}
	function showExistingSalles(){
		$existingRooms=$this->getExistingSalles();
		foreach ($existingRooms as $room){
			echo '<div class="salle">
				<div class="salle-top">
					<h1>Salle '.$room->numero.'</h1>
					<a><img class="dropdown" src="../public/assets/img/Drop Down.png" alt=""></a>
				</div>
				<div class="salle-bot">
					red
				</div>
			</div>';
		}
	}
	function add_salle($POST){
		$DB = new Database();
		$user=new User();
		
		if ($user->check_logged_in()) {
			
			$cinema_id=$user->getCinemaId();
			if (empty($POST["numero_salle"])) {
				$_SESSION["error_message"] = "Veuillez saisir un numéro de salle.";
			} elseif (!is_numeric($POST["numero_salle"])&& $POST["numero_salle"]==0) {
				$_SESSION["error_message"] = "Veuillez saisir un numéro valide pour la salle.";
			}
			$sql = "INSERT INTO salle (numero, nbr_places, cinema_idcinema) VALUES (:numero, :nb_places, :cinema_idcinema)";
			unset($arr);
			$arr["numero"]=$POST["numero_salle"];
			$arr["nb_places"]=$POST["nb_places"];
			$arr["cinema_idcinema"]=$cinema_id;
			try {
				$DB->write($sql,$arr);
			} catch (PDOexception $e) {
				if ($e->getCode() == 23000) {
					$_SESSION["error_message"]="une salle de ce numero existe deja pour ce cinéma";
				} else {
					$_SESSION["error_message"]="Erreur lors de l'ajout de la salle: " . $e->getMessage();
				}
			}
				
		}
		unset($sqlRequest);
		unset($arr);
	}



	function delete_salle($POST) {
        $DB = new Database();
        if (empty($POST["numero_salle_del"])) {
            $_SESSION["error_message"] = "Veuillez saisir un numéro de salle.";
        } elseif (!is_numeric($POST["numero_salle_del"]) || $POST["numero_salle_del"] == 0) {
            $_SESSION["error_message"] = "Veuillez saisir un numéro valide pour la salle.";
        } else {
            $arr = ['numero_salle_del' => $POST['numero_salle_del']];
            $sql = 'DELETE FROM salle WHERE idsalle = :numero_salle_del';
            try {
                $DB->write($sql, $arr);
            } catch (PDOException $e) {
                $_SESSION["error_message"] = "Erreur lors de la suppression de la salle: " . $e->getMessage();
            }
        }
    }

	function afficher_salle(){
		$existingRooms=$this->getExistingSalles();
		if (is_array($existingRooms) && count($existingRooms) > 0) {
			foreach ($existingRooms as $row) {
				echo "<option value=\"{$row->idsalle}\">{$row->numero}</option>";
			}
		} else {
			echo "<option>aucune salle</option>";
		}
	}
}