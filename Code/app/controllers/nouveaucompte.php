<?php
Class NouveauCompte extends Controller 
{
	function index()
	{
        unset($_SESSION['error_message']);
 	 	$data['page_title'] = "nouveau compte";
		
 	 	if(isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['password_confirmation']))
 	 	{
 	 		$user = $this->loadModel("user");
 	 		$user->signup($_POST);

 	 	}else{
			$_SESSION['error'] = "All fields are required.";
			
		}
 	 	
		$this->view("nouveaucompte",$data);
	}

}


?>  