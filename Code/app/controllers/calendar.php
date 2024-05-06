<?php

Class Calendar extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "calendrier";

		$this->view("calendar",$data);
	}

}