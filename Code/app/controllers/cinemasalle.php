<?php

Class cinemasalle extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "salle";

		$this->view("cinemasalle",$data);
	}

}