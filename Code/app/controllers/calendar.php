<?php

Class Calendar extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "calendrier";

		$this->view("calendar",$data);
	}

}