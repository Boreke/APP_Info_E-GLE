<?php

Class PlanningSeanceGas extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "PlanningSeanceGas";

		$this->view("planningseancegas",$data);
	}

}