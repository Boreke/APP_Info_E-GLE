<?php

Class Salles extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "salles";

		$this->view("salles",$data);
	}

}