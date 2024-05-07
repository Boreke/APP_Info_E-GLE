<?php

Class Login extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Login";




		$this->view("connexion",$data);
	}

}