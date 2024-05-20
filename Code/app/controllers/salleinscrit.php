<?php

Class SalleInscrit extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
		$salle_id = $_GET['salle_id'] ?? null;

 	 	$data['page_title'] = "salle ".$salle_id;


		if ($salle_id && $cinema_id) {
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
		show($this->getSeance());
	}
}