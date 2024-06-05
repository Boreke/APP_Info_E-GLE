<?php
Class Calendar extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "calendrier";
		$data['seanceData']=$this->getSeances();


		$this->view("calendar",$data);
	}
	function getMovie(){
		$db = new Database(); 

		$movieId = isset($_GET['id']) ? $_GET['id'] : null; 
		$query = "SELECT * FROM film WHERE id_film = ?";
		$movieDetails = $db->read($query, [$movieId]);
		return $movieDetails;
	}
	
	function getSeances(){
		$db=new Database();
		$movieId=isset($_GET['id']) ? $_GET['id'] : null; 
		$seanceQuery = "SELECT * FROM diffuser WHERE Film_id_film = ? ORDER BY film_date ASC";
		$seances = $db->read($seanceQuery, [$movieId]);

		$seanceData = [];
		if($seances){
			foreach ($seances as $seance) {
				$query="SELECT * FROM salle WHERE idsalle=?";
				$idcinema=$db->read($query,[$seance->salle_idsalle])[0]->cinema_idcinema;
				unset($query);
				$query="SELECT * FROM cinema WHERE idcinema = ?";
				$cinema=$db->read($query,[$idcinema]);
				if(empty($seanceData[date('Y-m-d', strtotime($seance->film_date))])){
					$seanceData[date('Y-m-d', strtotime($seance->film_date))][0] = ['time' => date('H:i', strtotime($seance->film_date)), 'id' => $seance->idseance, 'nomCinema'=> $cinema[0]->nom_cinema, 'price'=>$seance->price];
				}else{
					array_push($seanceData[date('Y-m-d', strtotime($seance->film_date))] ,['time' => date('H:i', strtotime($seance->film_date)), 'id' => $seance->idseance, 'nomCinema'=> $cinema[0]->nom_cinema, 'price'=>$seance->price]);
				}
			}
		}
		return $seanceData;
	}

	function showMovieData(){
		$movieDetails=$this->getMovie();
		if ($movieDetails) {
			$movie = $movieDetails[0];
			$durationInSeconds = $movie->duree;
			$hours = floor($durationInSeconds / 3600); 
			$minutes = floor(($durationInSeconds % 3600) / 60); 
		
			$formattedDuration = ($hours > 0 ? $hours . ' heure' . ($hours == 1 ? '' : 's') : '') . 
								 ($minutes > 0 ? ' ' . $minutes . ' minute' . ($minutes == 1 ? '' : 's') : '');
		
			echo "<div class='movie-layout'>";
			echo "<div class='movie-image'>";
			echo "<img class='cinema-image' src='" .  htmlspecialchars($movie->image_file) . "' alt='Cinema Image'>";
			echo "</div>";
			echo "<div class='movie-info'>";
			echo "<p class='movie-title'>" . htmlspecialchars($movie->titre) . "</p>";
			echo "<div class='movie-genre-duration'>";
			echo "<p><strong>Genre:</strong> " . htmlspecialchars($movie->genre) . "</p>";
			echo "<p><strong>Durée:</strong> " . $formattedDuration . "</p>";
			echo "</div>";
			echo "<p><strong>Synopsis:</strong><br>" . htmlspecialchars($movie->synopsis) . "</p>";
			echo "</div>";
			echo "</div>";
		} else {
			echo "<p>Movie not found.</p>";
		}
	}

	function reserver($nbPlaces,$idseance){
		$DB = new Database();
		
		$query="SELECT * FROM diffuser WHERE idseance=?";
		$seance=$DB->read($query,[$idseance]);
		$placeDisp=$seance[0]->nbr_places_disp;
        $query = "UPDATE diffuser SET
                  nbr_places_rsv=:nbPlacesRsv,
				  nbr_places_disp=:nbPlacesDisp
                  WHERE idseance = :idseance";
        $arr = [
            'nbPlacesRsv' => $nbPlaces,
            'nbPlacesDisp' => $placeDisp-$nbPlaces,
			'idseance' =>$idseance
        ];
		if(!($arr['nbPlacesDisp']<0)){

			$seanceCheck=$DB->write($query, $arr);
			unset($arr);
			$query="SELECT * FROM salle JOIN cinema ON salle.cinema_idcinema=cinema.idcinema WHERE salle.idsalle=?";
			$salle=$DB->read($query,[$seance[0]->salle_idsalle]);

			$query="INSERT INTO billet (price, Film_id_film, user_id_user, id_salle, id_cinema, idseance, nbplaces) VALUES (:price,:idfilm, :iduser, :idsalle,:idcinema,:idseance,:nbplaces)";
			$arr=[
				'price'=>$seance[0]->price,
				'idfilm'=>$seance[0]->Film_id_film,
				'iduser'=>$_SESSION['user_id'],
				'idsalle'=>$seance[0]->salle_idsalle,
				'idcinema'=>$salle[0]->idcinema,
				'idseance'=>$seance[0]->idseance,
				'nbplaces'=>$nbPlaces
			];
			$billetCheck=$DB->write($query,$arr);
			if ($seanceCheck && $billetCheck) {
				$_SESSION['error-message']="Seance reservée.";
			} else {
				$_SESSION['error-message']="Echec lors de la reservation, aucun paiement n'a été éfféctué.";
			}
		}else{
			$_SESSION['error-message']="Seance complète.";
		}
	}
	function checkPayment(){
		$user=$this->loadmodel('user');
		$today = date('Y-m-d');

		if($user->check_logged_in()){
			$idseance = $_POST['idSeanceClicked'];
			$film_date = strtotime($_POST['expiryDate']);
        	$formatted_date = date('Y-m-d', $film_date);
			$formData=[
				'cardNumber' => $_POST['cardNumber'],
				'cvc' => $_POST['cvc'],
				'expiryDate' => $formatted_date,
				'owner' => $_POST['owner']
			];
			
			if(!is_numeric($formData['cardNumber'])||strlen($formData['cardNumber'])!=16){
				$_SESSION['error-message']="Numero de carte invalide.";
			}elseif (!is_numeric($formData['cvc'])||strlen($formData['cvc'])!=3) {
				$_SESSION['error-message']="CVC invalide.";
			}elseif(preg_match_all("/\W/", $formData['owner'])){
				$_SESSION['error-message']="Nom invalide.";
			}elseif($formData['expiryDate'] < $today){
				$_SESSION['error-message']="Carte expirée.";
			}else{
				// Assuming reserver() function sets a session message upon success
				$this->reserver($_POST['seatCount'], $idseance);
				if (isset($_SESSION['error-message'])) {
				echo $_SESSION['error-message']; // Return error message
				} else {
				echo "success"; // Return success
				}
			}
		}else{
			$_SESSION['error-message']="veuillez vous connecter.";
		}
	}


}