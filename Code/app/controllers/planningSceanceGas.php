<?php

Class Seances_Gerant extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "PlanningSceanceGas";

		$this->view("planningSceanceGas",$data);
	}

}