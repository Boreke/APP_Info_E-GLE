<?php

Class Logout extends Controller 
{
	function index()
	{
 	 	
 	 	$user = $this->loadModel("user");
 	 	$user->logout();
	}

}