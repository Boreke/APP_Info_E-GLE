<?php

Class SeancesFlorent extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Seances_Client";

		$this->view("seancesflorent",$data);
	}

}