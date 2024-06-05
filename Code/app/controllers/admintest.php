<?php

Class Admintest extends Controller 
{
	function index()
	{
        unset($_SESSION['error_message']);
        $data['page_title'] = "test";
        $this->view("admintest",$data);
    }

}