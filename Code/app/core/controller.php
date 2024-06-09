<?php 

Class Controller
{
	protected $DB;
	protected $user;
	protected $cinema;

	public function __construct(){
		$this->DB=new Database();
		$this->user=$this->loadModel("user");
		
		$this->cinema=$this->loadModel("cinema");

	}

	protected function view($view,$data = [])
	{
		if(file_exists("../app/views/". $view .".php"))
 		{
 			include "../app/views/". $view .".php";
 		}else{
 			include "../app/views/404.php";
 		}
	}

	protected function loadModel($model)
	{
		if(file_exists("../app/models/". $model .".php"))
 		{
 			include "../app/models/". $model .".php";
 			return $model = new $model();
 		}

 		return false;
	}


}