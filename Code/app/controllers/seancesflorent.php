<?php

Class SeancesFlorent extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "Seances_Client";

		$this->view("seancesflorent",$data);
	}

}