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

	protected function loadModel($model,$params=[])
	{
		if(file_exists("../app/models/". $model .".php"))
 		{
 			include_once "../app/models/". $model .".php";
			if (count($params)!=0) {
				return $model = new $model($params);
			}
 			return $model = new $model();
 		}

 		return false;
	}


}