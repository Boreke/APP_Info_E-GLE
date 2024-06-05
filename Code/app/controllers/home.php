<?php

Class Home extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Accueil";

		$this->view("index",$data);
	}

	function getMoviesPictures(){
		$DB= new Database();
		$query= "SELECT DISTINCT f.image_file FROM film f JOIN diffuser d ON f.id_film= d.Film_id_film WHERE f.image_file IS NOT NULL";
		$pics= $DB->read($query);
		$pics[count($pics)]=$pics[0];
		return $pics;
	}

	function showPictures() {
		$pics = $this->getMoviesPictures();
		$count = count($pics);
		
		echo '<div class="slider-container slider-1" data-count="' . $count . '">';
		echo '<div class="slider">';
		
		foreach ($pics as $pic) {
			echo '<img src="' . $pic->image_file . '" alt="" class="img-carroussel">';
		}
		
		echo '</div>';
		echo '</div>';
	}
}