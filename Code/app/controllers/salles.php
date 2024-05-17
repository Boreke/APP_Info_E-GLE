<?php

Class Salles extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "salles";

		$this->view("salles",$data);
	}

}