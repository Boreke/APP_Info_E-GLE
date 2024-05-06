<?php

Class AdminUsers extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "utilisateurs";

		$this->view("adminusers",$data);
	}

}