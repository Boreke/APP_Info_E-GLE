<?php

Class Seances_Gerant extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "Seances_Gerant";

		$this->view("seancesgerant",$data);
	}

}