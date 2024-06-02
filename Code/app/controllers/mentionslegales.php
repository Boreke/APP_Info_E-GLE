<?php

Class MentionsLegales extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Mentions Légales";
		$this->view("mentionslegales",$data);
	}

}