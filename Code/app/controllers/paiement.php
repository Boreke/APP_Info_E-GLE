<?php

Class paiement extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "paiement";

		$this->view("paiement",$data);
	}

}