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
		$sqlRequest="SELECT * FROM salle WHERE cinema_idcinema = :idCinema ORDER BY numero ASC";
		$arr["idCinema"]=$cinemaId;
		$existingRooms=$DB->read($sqlRequest,$arr);
		unset($sqlRequest);
		return $existingRooms;
	}
	function showExistingSalles(){
		$existingRooms=$this->getExistingSalles();
		
		if($existingRooms){
			$seances=$this->getSeance();
			foreach ($existingRooms as $room){
				echo '<div class="salle">
							<div class="salle-top">
								<h1>Salle '.$room->numero.'</h1>
								<a><img class="dropdown" src="../public/assets/img/Drop Down.png" alt=""></a>
							</div>
							<div class="salle-bot">
								<div class="disposition">
									<h1 class="place-header">Places:</h1> 
									<div class="layout">
								
										<div class="container">
											<div class="screen"></div>';
												$this->showRows($room->idsalle);
										echo '</div>
										<ul class="showcase">
											<li>
												<div class="seat"></div>
												<small>N/A</small>
											</li>
											<li>
												<div class="seat occupied"></div>
												<small>Occupied</small>
												</li>    
										</ul>
									</div>
								</div>';
								if(!empty($seances[$room->idsalle])){
								echo'<div class="infos-seances" id="infos-seances">
										<button id="pre-btn"><img src="'.ASSETS.'img/arrow.png" alt="" class="pre-btn-img"></button>
										<div class="seances-container" id="seances-container">';
											$this->showSeance($seances[$room->idsalle]);
								echo '	</div>
										<button id="nxt-btn"><img src="'.ASSETS.'img/arrow.png" alt="" class="nxt-btn-img"></button>
									</div>';
								}
						echo '</div>
						</div>
						</div>';
			}
		}else{
			echo '<h1 class="no-salles">Aucune Salle</h1>';
		}
	}
	function add_salle(){
		$DB = new Database();
		$user=new User();
		
		if ($user->check_logged_in()) {
			
			$cinema_id=$user->getCinemaId();
			if (empty($_POST["numero_salle"])) {
				$_SESSION["error_message"] = "Veuillez saisir un numéro de salle.";
			} elseif (!is_numeric($_POST["numero_salle"])&& $_POST["numero_salle"]==0) {
				$_SESSION["error_message"] = "Veuillez saisir un numéro valide pour la salle.";
			}
			$sql = "INSERT INTO salle (numero, nbr_places, cinema_idcinema) VALUES (:numero, :nb_places, :cinema_idcinema)";
			unset($arr);
			$arr["numero"]=$_POST["numero_salle"];
			$arr["nb_places"]=$_POST["nb_places"];
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



	function delete_salle() {
        $DB = new Database();
        if (empty($_POST["numero_salle_del"])) {
            $_SESSION["error_message"] = "Veuillez saisir un numéro de salle.";
        } elseif (!is_numeric($_POST["numero_salle_del"]) || $_POST["numero_salle_del"] == 0) {
            $_SESSION["error_message"] = "Veuillez saisir un numéro valide pour la salle.";
        } else {
            $arr = ['numero_salle_del' => $_POST['numero_salle_del']];
            $sql = 'DELETE FROM salle WHERE idsalle = :numero_salle_del';
            try {
                $DB->write($sql, $arr);
            } catch (PDOException $e) {
                $_SESSION["error_message"] = "Erreur lors de la suppression de la salle: " . $e->getMessage();
            }
			$sql = 'DELETE FROM diffuser WHERE salle_idsalle = :numero_salle_del';
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
	function showRows($idsalle){
		$row=$this->getRowNumbers();
		$seatId=1;
		for ($i=0; $i < $row[$idsalle]['number']; $i++) { 
			echo'<div class="row">';
			for ($j = 0; $j < 15; $j++) {
				echo '<div class="seat" id="'.$idsalle.'-'. $seatId . '"></div>';
				$seatId++;
			}
			echo'</div>';
		}
		if ($row[$idsalle]['remaining_places'] > 0) {
			echo '<div class="row">';
			for ($i = 0; $i < $row[$idsalle]['remaining_places']; $i++) {
				echo '<div class="seat" id="'.$idsalle.'-'. $seatId . '"></div>';
				$seatId++;
			}
			echo '</div>';
		}
	}
	function getRowNumbers(){
		$salles=$this->getExistingSalles();
		foreach($salles as $salle){	
			$nbPlaces=$salle->nbr_places;
			$rows[$salle->idsalle]['number']=intval($nbPlaces/15);
			$rows[$salle->idsalle]['remaining_places']=fmod($nbPlaces,15);
		}
		return $rows;
	}
	function getSeance(){
		$DB = new Database();
		$salles=$this->getExistingSalles();
		$arr['today']=date('Y-m-d H:i:s');
		$query = "SELECT * FROM diffuser WHERE salle_idsalle = :idsalle AND film_date >= :today ORDER BY film_date ASC";
		foreach($salles as $salle){
			$arr['idsalle'] = $salle->idsalle;
			$seances[$salle->idsalle]=$DB->read($query, $arr);
		}
		return $seances;
	}

	function showSeance($seances){
		$DB = new Database();
		foreach ($seances as $seance) {
			$query="SELECT * FROM film WHERE id_film=:idfilm";
		$arr['idfilm']=$seance->Film_id_film;
		$film=$DB->read($query, $arr);
		$dureeH=intval($film[0]->duree/3600);
		$dureeM=intval(fmod($film[0]->duree,3600)/60);
		echo'<div class="seance">
				<div class="descriptiffilm">
					<img src="'.$film[0]->image_file.'" class="img-film">
				</div>

				<div class="film-data">
					<div>
						<h2 class="titre">'.$film[0]->titre.'</h2>
					</div>
					<div class="genre-duree">
						<div class="genre">
							<h3 class="genre-header">Genre : </h3>
							<h3 class="genre-content"> &nbsp'.$film[0]->titre.'</h3> 
						</div>
						<div class="duree">
							<h3 class="duree-header">Durée du film : </h3>
							<h3>&nbsp'.$dureeH.'h'.$dureeM.'min</h3>
						</div>
					</div>
					<div class="syn-date">
						<div class="headers-syn-date">
							<h3 class="date-header">Date : </h3>
							<h3>&nbsp'.date("F j, Y, g:i a", strtotime($seance->film_date)).'</h3>
							<h3 class="syn-header">Synopsis : </h3>
							</div>
							<p class="syn-content">'.$film[0]->synopsis.'</p>
							
						
					</div>
				</div>
			</div>';
		}
		
	}
}