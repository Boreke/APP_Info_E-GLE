<?php

Class AdminUsers extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "utilisateurs";

		$this->view("adminusers",$data);
	}

}