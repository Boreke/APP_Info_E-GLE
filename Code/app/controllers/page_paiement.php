<?php

Class Seances_Gerant extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "page_paiement";

		$this->view("page_paiement",$data);
	}

}