<?php

Class MentionsLegales extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Mentions Légales";
		$user=$this->loadModel('user');
		$data['user']=$user;
		$this->view("mentionslegales",$data);
	}

	function updateMentions(){
		if(isset($_SESSION['user_id'])&&$_SESSION['type']=='admin'){
			//traiter le POST
			//->verifier ajout catégories
			//->recreation liste data
			$dataArr=[
				'page_title' => 'Your Page Title',
				'editor' => [
					'name' => $_POST['name'],
					'address' => $_POST['address'],
					'phone' => $_POST['phone'],
					'email' => $_POST['email'],
				],
				'intellectual_property' => $_POST['intellectual_property'],
				'data_protection' => $_POST['data_protection'],
				'responsibility' => $_POST['responsibility'],
				'applicable_law' => $_POST['applicable_law'],
				'headers' => [
					2 => $_POST['2'],
					3 => $_POST['3'],
					4 => $_POST['4'],
					5 => $_POST['5']
				]
			];
			//modifier info legales.php
			$configContent = "<?php\n\nreturn " . var_export($data, true) . ";\n";
			file_put_contents('../app/models/mentions_legales_content.php', $configContent);
			echo 'success';
		}
	}
}