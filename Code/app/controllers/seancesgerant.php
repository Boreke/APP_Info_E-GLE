<?php

Class Seancesgerant extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "seancesgerant";
		$user=$this->loadModel("user");
		$gerant=$this->loadModel("gerant");
		
		if($user->check_logged_in()){
			if(isset($_POST['titre'])){
				$gerant->ajout_film($_POST,$_SESSION["user_id"]); 
			}
			if (isset($_POST['salle'])) {
				$gerant->create_sceance($_POST);
			}
			if (isset($_POST['editSeance'])) {
				$gerant->updateSeance($_POST);
			}
			if (isset($_POST['deleteSeance'])) {
				$gerant->deleteSeance($_POST['idseance']);
			}

			
		}
		$this->view("seancesgerant",$data);
	}

	function afficher_salle(){
		$DB = new Database();
		$cine_query = "select idcinema from cinema where user_id_user = :user_id limit 1";
        $arr["user_id"]=$_SESSION["user_id"];
        $cinemaResult =$DB->read($cine_query,$arr);
        if ($cinemaResult) {
			$cinema_id = $cinemaResult[0]->idcinema;
            $arr2["cinema_id"] = $cinema_id;
            $salle_query = "select distinct idsalle, numero, cinema_idcinema from salle where cinema_idcinema = :cinema_id ORDER BY numero";
            $salle_row =$DB->read($salle_query,$arr2);
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
		$DB = new Database();
		$cine_query = "select idcinema from cinema where user_id_user = :user_id limit 1";
        $arr["user_id"]=$_SESSION["user_id"];
        $cinemaResult =$DB->read($cine_query,$arr);

        if ($cinemaResult) {
			$cinema_id = $cinemaResult[0]->idcinema;
            $arr2["cinema_id"] = $cinema_id;
			$film_query = "SELECT DISTINCT id_film, titre, id_cinema FROM film WHERE id_cinema = :cinema_id ORDER BY titre";
            $film_row =$DB->read($film_query,$arr2);

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
		$gerant = new Gerant();
		$seances = $gerant->fetchAllSeances();  
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
				echo 	'<div id="' . $popupID . '" class="popup">';
				echo		'<div class="popup-content">';
				echo			'<span class="close" onclick="closePopupEdit(\'' . $popupID . '\')">&times;</span>';
				echo			'<form class="form" method="POST">';
				echo 				'<input type="hidden" name="idseance" value="' . $seance->idseance . '">';
				echo 				'<label for="film_date">Date et Horaire:</label>';
				echo 				'<input type="datetime-local" name="film_date" value="' . htmlspecialchars(date('Y-m-d\TH:i', strtotime($seance->film_date))) . '" required>';
				echo 				'<label for="film">Film:</label>';
				echo 				'<input type="text" name="film" value="' . htmlspecialchars($seance->Film_id_film) . '" required>';
				echo 				'<label for="salle">Salle:</label>';
				echo 				'<input type="text" name="salle" value="' . htmlspecialchars($seance->salle_idsalle) . '" required>';
				echo 				'<input type="submit" name="editSeance" value="Modifier" class="submit-edit">';
				echo			'</form>';
				echo		'</div>';                  
				echo	'</div>';
				echo	'<script src="<?=ASSETS?>js/popupsceancegerant.js"></script>';
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
		} else {
			echo '<h2 class="no-seance">No upcoming seances available.</h2>';
		}
	}

}