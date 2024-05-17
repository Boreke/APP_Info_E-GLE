<?php

Class Home extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Home";

		$this->view("index",$data);
	}

}