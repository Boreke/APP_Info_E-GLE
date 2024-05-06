<?php

Class Seances_Gerant extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "PlanningSceanceGas";

		$this->view("planningSceanceGas",$data);
	}

}