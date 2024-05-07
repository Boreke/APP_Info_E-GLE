<?php

Class Seances_Gerant extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "page_paiement";

		$this->view("page_paiement",$data);
	}

}