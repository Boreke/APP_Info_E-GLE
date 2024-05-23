<?php

Class Profil extends Controller{

    function index()
    {
        unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Profil";

		$this->view("profil",$data);
    }

}