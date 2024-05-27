<?php

Class Contact extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Contact Us";
		$this->view("minima/contact",$data);
	}

}