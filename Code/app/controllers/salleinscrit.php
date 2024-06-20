<?php

Class SalleInscrit extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
		$salle_id = $_GET['salle_id'] ?? null;

		$capteur = $this->loadModel("capteur");
		$capteur->updateCapteur();

 	 	$data['page_title'] = "salle ".$salle_id;
		$data['seances']=$this->getSeance();
		$data['capteur']=$this->getCapteur();

		if ($salle_id) {
            
            $arr['idsalle'] = $salle_id;
            $query = "SELECT * FROM salle WHERE idsalle = :idsalle";
            $data['salle'] = $this->DB->read($query, $arr);
        }


		$this->view("salleinscrit",$data);
	}

	function getSeance(){
		
		$arr['today']= date('Y-m-d H:i:s');
		$arr['idsalle'] = $_GET['salle_id'];

		$query = "SELECT * FROM diffuser WHERE salle_idsalle = :idsalle AND film_date >= :today ORDER BY film_date ASC";
		return $this->DB->read($query, $arr);
	}

	function showSeance(){
		
		$seances=$this->getSeance();
		$query="SELECT * FROM film WHERE id_film=:idfilm";
		foreach($seances as $seance){
			$arr['idfilm']=$seance->Film_id_film;
			$film=$this->DB->read($query, $arr);
			$dureeH=intval($film[0]->duree/3600);
			$dureeM=intval(fmod($film[0]->duree,3600)/60);
			
			echo'
			<div class="seance">
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
					<div class="synopsis">
						<h3 class="syn-header">Synopsis : </h3>
						<p class="syn-content">'.$film[0]->synopsis.'</p>
					</div>
				</div>
			</div>';

		}
	}
	function getRowNumbers(){
		
		$arr['idsalle'] = $_GET['salle_id'];
		$query = "SELECT * FROM salle WHERE idsalle = :idsalle";
		$salle=$this->DB->read($query, $arr);
		$nbPlaces=$salle[0]->nbr_places;
		$rows['number']=intval($nbPlaces/15);
		$rows['remaining_places']=fmod($nbPlaces,15);
		return $rows;
	}
	function showRows(){
		$row=$this->getRowNumbers();
		$seatId=1;
		for ($i=0; $i < $row['number']; $i++) { 
			echo'<div class="row">';
			for ($j = 0; $j < 15; $j++) {
				echo '<div class="seat" id="'. $seatId . '"></div>';
				$seatId++;
			}
			echo'</div>';
		}
		if ($row['remaining_places'] > 0) {
			echo '<div class="row">';
			for ($i = 0; $i < $row['remaining_places']; $i++) {
				echo '<div class="seat" id="'. $seatId . '"></div>';
				$seatId++;
			}
			echo '</div>';
		}
	}
	
	function showSeanceDate(){
		$seances=$this->getSeance();
		foreach ($seances as $seance) {
			echo '<li class="date" id="'.$seance->idseance.'">'.date("F j, Y, g:i a", strtotime($seance->film_date)).'</li>';
		}
	}

	function getCapteur(){
		$query = "SELECT * FROM capteur WHERE salle_idsalle = :idsalle ORDER BY idcapteur ASC";
		$arr['idsalle'] = $_GET['salle_id'];
		$capteurs=$this->DB->read($query, $arr);
		
		return $capteurs;
		
	}

	function showCapteur($capteurs){
		if (!empty($capteurs)) {
			foreach ($capteurs as $capteur) {
				echo '<div class="capteur" id="capteur-'.$capteur->idcapteur.'">';
				echo	'<div class="capteur_id">
							<h3 class="capteur-header2">Id Capteur : </h3>
							<h3>'. $capteur->idcapteur .'</h3>
						</div>';
				echo	'<div class="capteur_nv">
							<h3 class="capteur-header2">Niveau sonore : </h3>
							<h3>'. $capteur->niveau_sonore .'dB</h3>
						</div>';
				echo	'<div class="capteur_temp">
							<h3 class="capteur-header2">Température : </h3>
							<h3>'. $capteur->temperature .'°C</h3>
						</div>';
				echo '</div>';
			}
		} else {
			echo '<p>Aucun capteur disponible pour cette salle.</p>';
		}
	}
}