<?php

Class SeancesFlorent extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Seances";

		$this->view("seancesflorent",$data);
	}

	function getNewMovies(){
		$db = new Database();
		$arr['today']=date('Y-m-d');
		$date = new DateTime();
		$date->modify('-3 months');
		$arr['before'] = $date->format('Y-m-d');
		
		$films = $db->read("SELECT id_film, image_file, titre FROM film WHERE date_sortie <= :today AND date_sortie >= :before", $arr);
		if ($films){
			return $films;
		}else{
			return false;
		}
	}
	function getAffiche(){
		$db = new Database();
        $films = $db->read("SELECT DISTINCT f.id_film, f.image_file, f.titre FROM film f JOIN diffuser d ON f.id_film= d.Film_id_film WHERE f.image_file IS NOT NULL");
		if($films){
			foreach ($films as $film1) {
				foreach ($films as $film2){
					if($film1->id_film!=$film2->id_film && $film1->image_file==$film2->image_file && $film1->titre==$film2->titre){
						unset($film2);
					}
				}
			}
		}
		return $films;
	}
	function getUpcoming(){
		$db = new Database();
		$date = new DateTime();
		$date->modify('-3 months');
		$arr['before'] = $date->format('Y-m-d');
        $films = $db->read("SELECT DISTINCT id_film, image_file, titre FROM film WHERE id_film NOT IN (SELECT Film_id_film FROM diffuser) AND date_sortie >= :before",$arr);
		return $films;
	}

	function showMovies($films){

		if ($films && count($films) > 0) {
			foreach ($films as $film) {
				echo '<div class="movie-image">';


				$url = ROOT . 'calendar?id=' .  $film->id_film; 
			

				echo '<a href="' . $url . '"><img src="'. $film->image_file . '" alt="' . htmlspecialchars($film->titre) . '" class="movie-cover"></a>';
				echo '<div class="movie-title_1">' . htmlspecialchars($film->titre) . '</div>'; 
				echo '</div>';
			}
		} else {
			echo "Aucun film";
		}
	}

}