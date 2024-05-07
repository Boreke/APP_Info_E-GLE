<?php 

Class Database
{
	public function db_connect()
	{

		try{

			$string = DB_TYPE .":host=".DB_HOST.";dbname=".DB_NAME.";";
			return $db = new PDO($string,DB_USER,DB_PASS);
			
		}catch(PDOException $e){

			die($e->getMessage());
		}
	}

	public function read($query,$data = [])
	{

		$DB = $this->db_connect();
		$stm = $DB->prepare($query);

		if(count($data) == 0)
		{
			$stm = $DB->query($query);
			$check = 0;
			if($stm){
				$check = 1;
			}
		}else{

			$check = $stm->execute($data);
		}

		if($check)
		{
			$data = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($data) && count($data) > 0)
			{
				return $data;
			}

			return false;
		}else
		{
			error_log($stm->errorInfo()[2]);
			return false;
		}
	}

	public function write($query, $data = [], $returnLastId = false) {
		$DB = $this->db_connect();
		$stm = $DB->prepare($query);
		$check = $stm->execute($data);
	
		if ($check) {
			return $returnLastId ? $DB->lastInsertId() : true;
		} else {
			error_log("Database write error: " . implode(", ", $stm->errorInfo()));
			return false;
		}
	}


}