<?php

Class SalleInscrit extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
		$salle_id = $_GET['salle_id'] ?? null;

 	 	$data['page_title'] = "salle ".$salle_id;


		if ($salle_id) {
            $DB = new Database();
            $arr['idsalle'] = $salle_id;
            $query = "SELECT * FROM salle WHERE idsalle = :idsalle";
            $data['salle'] = $DB->read($query, $arr);
        }


		$this->view("salleinscrit",$data);
	}

	function getSeance(){
		$DB = new Database();
		$arr['idsalle'] = $_GET['salle_id'];

		$query = "SELECT * FROM diffuser WHERE salle_idsalle = :idsalle";
		return $DB->read($query, $arr);
	}

	function showSeance(){
		$DB = new Database();
		$seances=$this->getSeance();
		$query="SELECT * FROM film WHERE id_film=:idfilm";
		$arr['idfilm']=$seances[0]->Film_id_film;
		$film=$DB->read($query, $arr);
		$dureeH=intval($film[0]->duree/3600);
		$dureeM=fmod($film[0]->duree,3600);
		echo'<section class="descriptiffilm">
				<img src="'.$film[0]->image_file.'" class="img-film">
			</section>

			<section class="film-data">
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
			</section>';
	}
	function getRowNumbers(){
		$DB = new Database();
		$arr['idsalle'] = $_GET['salle_id'];
		$query = "SELECT * FROM salle WHERE idsalle = :idsalle";
		$salle=$DB->read($query, $arr);
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
}