<?php

Class Seancesgerant extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Mes films et séances";
		

		
		if($this->user->check_logged_in()){
			if(isset($_POST['titre'])){
				$this->user->ajout_film($_POST,$_SESSION["user_id"]); 
			}
			if (isset($_POST['salle'])) {
				$this->user->create_sceance($_POST);
			}
			if (isset($_POST['editSeance'])) {
				$this->user->updateSeance($_POST);
			}
			if (isset($_POST['deleteSeance'])) {
				$this->user->deleteSeance($_POST['idseance']);
			}
			if (isset($_POST['editFilm'])) {

				$this->user->updateFilm($_POST);
			}
			
		}
		$this->view("seancesgerant",$data);
	}

	function afficher_salle(){
		
		$cine_query = "select idcinema from cinema where user_id_user = :user_id limit 1";
        $arr["user_id"]=$_SESSION["user_id"];
        $cinemaResult =$this->DB->read($cine_query,$arr);
        if ($cinemaResult) {
			$cinema_id = $cinemaResult[0]->idcinema;
            $arr2["cinema_id"] = $cinema_id;
            $salle_query = "select distinct idsalle, numero, cinema_idcinema from salle where cinema_idcinema = :cinema_id ORDER BY numero";
            $salle_row =$this->DB->read($salle_query,$arr2);
            if (is_array($salle_row) && count($salle_row) > 0) {
				foreach ($salle_row as $row) {
					echo "<option value=\"{$row->idsalle}\">{$row->numero}</option>";
				}
			} else {
				echo "<option>No data found</option>";
			}
        } else {
            echo "<option>No cinema found for user</option>";
        }
	}

	function afficher_film(){
		
		$cine_query = "select idcinema from cinema where user_id_user = :user_id limit 1";
        $arr["user_id"]=$_SESSION["user_id"];
        $cinemaResult =$this->DB->read($cine_query,$arr);

        if ($cinemaResult) {
			$cinema_id = $cinemaResult[0]->idcinema;
            $arr2["cinema_id"] = $cinema_id;
			$film_query = "SELECT DISTINCT id_film, titre, id_cinema FROM film WHERE id_cinema = :cinema_id ORDER BY titre";
            $film_row =$this->DB->read($film_query,$arr2);

			if (is_array($film_row) && count($film_row) > 0) {
				foreach ($film_row as $row) {
					echo "<option value=\"{$row->id_film}\">{$row->titre}</option>";
				}
			} else {
				echo "<option>No data found</option>";
			}
		} else {
			echo "<option>No cinema found for user</option>";
		}

	}

	function displaySeances() {

		$seances = $this->user->fetchAllSeances();  
		if ($seances && count($seances) > 0) {
			echo '<table  >';
			echo '<tr>';
			echo '<th>Titre</th>';
			echo '<th>Date et Horaires</th>';
			echo '<th>Salle</th>';
			echo '<th>Places disponibles</th>';
			echo '</tr>';
	
			foreach ($seances as $seance) {
				$popupID = "popupEdit" . $seance->idseance;
				$buttonID = "buttonEdit" . $seance->idseance;

				echo '<tr>';

				echo '<td>' . htmlspecialchars($seance->titre) . '</td>';
				echo '<td>' . htmlspecialchars(date("F j, Y, g:i a", strtotime($seance->film_date))) . '</td>';
				echo '<td>' . htmlspecialchars($seance->numero) . '</td>';
				echo '<td>' . htmlspecialchars($seance->nbr_places_disp) . '</td>';

				echo '<td>';
				echo '<div class="table-btn">';
				echo '<div id="section">';
				echo 	'<button class ="btn-edit" onclick="openPopupEdit(\'' . $popupID . '\')" id="' . $buttonID . '"><img class="modify-img" src="'.ASSETS.'img/modifier.png" ></button>';
				                  
				echo	'</div>';

				echo'</div>';

				

				echo '<form method="POST" onsubmit="return confirm(\'Êtes-vous sûr que vous voulez supprimer cette séance?\');">';
				echo '<input type="hidden" name="idseance" value="' . $seance->idseance . '">';
				echo '<input type="submit" name="deleteSeance" class="btn-remove">';
				echo '</form>';
				echo '</td>';
				echo '</div>';
				echo '</tr>';

			}
			echo '</table>';
			echo '</div>';
			foreach ($seances as $seance) {
				$popupID = "popupEdit" . $seance->idseance;
				echo 	'<div id="' . $popupID . '" class="popup">';
				echo		'<div class="popup-content">';
				echo			'<span class="close" onclick="closePopupEdit(\'' . $popupID . '\')">&times;</span>';
				echo			'<form class="form" method="POST">';
				echo 				'<input type="hidden" name="idseance" value="' . $seance->idseance . '">';
				echo 				'<input type="hidden" name="editSeance" value="">';
				echo 				'<label for="film_date">Date et Horaire:</label>';
				echo 				'<input type="datetime-local" name="film_date" value="' . htmlspecialchars(date('Y-m-d\TH:i', strtotime($seance->film_date))) . '" required>';
				echo 				'<label for="film">Film:</label>';
				echo 				'<input type="text" name="film" value="' . htmlspecialchars($seance->Film_id_film) . '" required>';
				echo 				'<label for="salle">Salle:</label>';
				echo 				'<input type="text" name="salle" value="' . htmlspecialchars($seance->salle_idsalle) . '" required>';
				echo 				'<label for="price">Prix en euros:</label>';
				echo 				'<input type="number" name="price" value="' . htmlspecialchars($seance->price) . '" required>';
				echo 				'<input type="submit" name="editSeance" value="Modifier" class="submit-edit">';
				echo			'</form>';
				echo		'</div>';
			}
		} else {
			echo '<h2 class="no-seance">Aucune séance à venir.</h2>';
		}
	}
	function displayFilms() {

		$films = $this->user->fetchAllFilms();  
		if ($films && count($films) > 0) {
			echo '<table  >';
			echo '<tr>';
			echo '<th>Titre</th>';
			echo '<th>Date de sortie</th>';
			echo '<th>Genre</th>';
			echo '</tr>';
	
			foreach ($films as $film) {
				$popupID = "popupEdit" . $film->id_film;
				$buttonID = "buttonEdit" . $film->id_film;

				echo '<tr>';

				echo '<td>' . htmlspecialchars($film->titre) . '</td>';

				echo '<td>' . htmlspecialchars(date("F j, Y, g:i a", strtotime($film->date_sortie))) . '</td>';

				echo '<td>' . htmlspecialchars($film->genre) . '</td>';

				echo '<td>';
				echo '<div class="table-btn">';
				echo 	'<button class ="btn-edit" onclick="openPopupEdit(\'' . $popupID . '\')" id="' . $buttonID . '"><img class="modify-img" src="'.ASSETS.'img/modifier.png" ></button>';
				echo '<form method="POST" onsubmit="return confirm(\'Êtes-vous sûr que vous voulez supprimer ce film?\');">';
				echo '<input type="hidden" name="idfilm" value="' . $film->id_film . '">';
				echo '<input type="submit" name="deletefilm" class="btn-remove">';
				echo '</form>';
				echo '</td>';

				echo '</div>';

				echo '</tr>';
			}
			echo '</table>';
			echo '</div>';
			foreach ($films as $film) {
				$popupID = "popupEdit" . $film->id_film;
				echo '<div id="' . $popupID . '" class="popup">';
				echo		'<div class="popup-content">';
				echo			'<span class="close" onclick="closePopupEdit(\'' . $popupID . '\')">&times;</span>';
				echo			'<form class="form" method="POST">';
				echo 				'<input type="hidden" name="idfilm" value="' . $film->id_film . '">';
				echo 				'<input type="hidden" name="editFilm" value="">';
				echo 				'<label for="film_date">Date de sortie:</label>';
				echo 				'<input type="date" name="film_date" value="' . htmlspecialchars(date('Y-m-d', strtotime($film->date_sortie))) . '" required>';
				echo 				'<label for="genre">Genre:</label>';
				echo 				'<input type="text" name="genre" value="' . htmlspecialchars($film->genre) . '" required>';
				echo 				'<input type="submit" name="editfilm" value="Modifier" class="submit-edit">';
				echo			'</form>';
				echo		'</div>';                  
				echo	'</div>';
			}
		} else {
			echo '<h2 class="no-film">Vous n\'avez aucun film pour l\'instant.</h2>';
		}
	}

}