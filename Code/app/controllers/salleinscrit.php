<?php

Class SalleInscrit extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "salle";

		$this->view("salleinscrit",$data);
	}

}