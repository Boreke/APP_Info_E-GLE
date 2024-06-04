<?php

Class MentionsLegales extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Mentions Légales";
		$this->view("mentionslegales",$data);
	}

	function updateMentions(){
		if(isset($_SESSION['user_id'])&&$_SESSION['type']=='admin'){
			//traiter le POST
			//->verifier ajout catégories
			//->recreation liste data
			//modifier info legales.php
			//->$configContent = "<?php\n\nreturn " . var_export($data, true) . ";\n";
			//->file_put_contents('legal_info.php', $configContent);
		}
	}
}