<?php

Class About extends Controller
{
	function index()
	{
		unset($_SESSION['error_message']);
		$data['page_title'] = "About";
		$this->view("minima/about-us",$data);
	}

}