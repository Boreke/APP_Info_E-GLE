<?php

Class Calendar extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "calendrier";
		$data['seanceData']=$this->getSeances();
		
		if (isset($_GET['seatCount'])){
			$nbPlaces=$_GET['seatCount'];

		}

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
		$seanceQuery = "SELECT * FROM diffuser WHERE Film_id_film = ?";
		$seances = $db->read($seanceQuery, [$movieId]);

		$seanceData = [];
		foreach ($seances as $seance) {
			$seanceData[date('Y-m-d', strtotime($seance->film_date))] = ['time' => date('H:i', strtotime($seance->film_date)), 'id' => $seance->idseance];
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

	function reserver($nbPlaces){
		$DB = new Database();
        $query = "UPDATE diffuser SET
                  nbr_places_rsv=:nbPlacesRsv,
				  nbr_places_disp=:nbPlacesDisp
                  WHERE idseance = :idseance";
        $arr = [
            'nbPlacesRsv' => $nbPlaces,
            'nbPlacesDisp' => $nbPlaces
        ];
    
        if ($DB->write($query, $arr)) {
            echo "Seance updated successfully.";
        } else {
            echo "Failed to update seance.";
        }
	}
	function checkPayment(){
		$formData=[
			'cardNumber' => $_GET['cardNumber'],
			'cvc' => $_GET['cvc'],
			'expiryDate' => $_GET['expiryDate'],
			'owner' => $_GET['owner']
		];

		if(!is_numeric($formData['cardNumber'])||strlen($formData['cardNumber'])!=16){
			$_SESSION['error-message']="numero de carte invalide";
		}elseif (!is_numeric($formData['cvc'])||strlen($formData['cvc'])!=3) {
			$_SESSION['error-message']="cvc invalide";
		}elseif(preg_match_all("/\W/", $formData['owner'])){
			$_SESSION['error-message']="nom invalide";
		}else{
			$this->reserver($_GET['seatCount']);
		}

	}

}