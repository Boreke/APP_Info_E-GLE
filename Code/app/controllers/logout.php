<?php

Class Logout extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$user = $this->loadModel("user");
 	 	$user->logout();
	}

}