<?php

Class About extends Controller
{
	function index()
	{
		unset($_SESSION['error_message']);
		$data['page_title'] = "About";
		$this->view("about-us",$data);
	}

}