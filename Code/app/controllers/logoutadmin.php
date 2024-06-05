<?php

Class Logoutadmin extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$user = $this->loadModel("user");
 	 	$user->logoutadmin();
	}

}