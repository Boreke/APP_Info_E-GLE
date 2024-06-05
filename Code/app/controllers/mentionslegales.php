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
			//->verifier ajout catégories
			  

			//modifier info legales.php
			if($dataArr){
				$configContent = "<?php\n\nreturn " . var_export($dataArr, true) . ";\n";
				file_put_contents('../app/models/mentions_legales_content.php', $configContent);
			}
			//envoyer la nouvelle version en reponse ajax
			echo'<h2>1. Éditeur du site</h2>

            <p>Le site E-GLE est édité par :
            <br>
            Nom du responsable : '.$dataArr['editor']['name'].' <br>
            Adresse : '.$dataArr['editor']['address'].'<br>
            Téléphone : '.$dataArr['editor']['phone'].' <br>
            Email : '.$dataArr['editor']['email'].' <br>
            </p>

            <h2>'.$dataArr["headers"][2].'</h2>

            <p>'.$dataArr['intellectual_property'].'</p>
            
            <h2>'.$dataArr['headers'][3].'</h2>
            <p>'.$dataArr['data_protection'].'</p>

            <h2>'.$dataArr['headers'][4].'</h2>
            <p>'.$dataArr['responsibility'].'</p>

            <h2>'.$dataArr['headers'][5].'</h2>
            <p>'.$dataArr['applicable_law'].'</p>';
		}
	}
	
}