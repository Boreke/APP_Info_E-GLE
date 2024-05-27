<?php

Class Login extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Login";
		$user=$this->loadModel("user");
		if(isset($_POST["username"])){
			
			$user->login($_POST);
		}
		$this->view("connexion",$data);
	}

}