<?php

Class About extends Controller
{
	function index()
	{
		unset($_SESSION['error_message']);
		$data['page_title'] = "Forum";

        $db = new Database();
        $query = "SELECT * FROM post p JOIN commentaire c ON p.idpost = c.post_id_post";
        $data['posts'] = $db->read($query);

		$this->view("forum",$data);
	}

}