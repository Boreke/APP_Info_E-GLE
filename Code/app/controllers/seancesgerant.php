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
			
		}
		$this->view("seancesgerant",$data);
	}

	function afficher_salle(){
		$DB = new Database();
		$cine_query = "select idcinema from cinema where user_id_user = :user_id limit 1";
        $arr["user_id"]=$_SESSION["user_id"];
        $cinemaResult =$DB->read($cine_query,$arr);

        if ($cinemaResult) {
            $arr2["cinema_id"] = $cinemaResult;
            $salle_query = "select distinct idsalle, numero, cinema_idcinema from salle where cinema_idcinema = :cinema_id ORDER BY numero";
            $salle_row =$DB->read($salle_query,$arr2);
            if ($salle_row->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo "<option value=\"{$row['idsalle']}\">{$row['numero']}</option>";
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
            $arr2["cinema_id"] = $cinemaResult;
			$film_query = "SELECT DISTINCT id_film, titre, id_cinema FROM film WHERE id_cinema = :cinema_id ORDER BY titre";
            $film_row =$DB->read($film_query,$arr2);

			if ($film_row->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
				echo "<option value=\"{$row['id_film']}\">{$row['titre']}</option>";
				}
			} else {
				echo "<option>No data found</option>";
			}
			} else {
				echo "<option>No cinema found for user</option>";
			}

	}

}