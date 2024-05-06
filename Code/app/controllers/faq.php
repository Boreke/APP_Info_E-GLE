<?php

Class Faq extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "FAQ";

		$this->view("faq",$data);
	}

}