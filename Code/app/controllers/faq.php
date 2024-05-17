<?php

Class Faq extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "FAQ";

		$this->view("faq",$data);
	}

}