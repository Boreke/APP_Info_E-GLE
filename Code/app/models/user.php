<?php 

Class User 
{

	function login($POST)
	{
		$DB = new Database();

		$_SESSION['error_message'] = "";
		if(isset($POST['username']) && isset($POST['password']))
		{

			$arr['username'] = $POST['username'];

			
			$query = "select * from user where username = :username limit 1";
			$data = $DB->read($query,$arr);

			if(is_array($data))
			{
				if(password_verify($_POST["password"], $data[0]->password_hash)){
					//logged in
					$_SESSION['username'] = $data[0]->username;
					$_SESSION['user_id'] = $data[0]->user_id;
					$_SESSION['type']=$data[0]->type;
					header("Location:". ROOT . "home");
					die;
				}
			}else{

				$_SESSION['error_message'] = "wrong username or password";
			}
		}else{

			$_SESSION['error_message'] = "please enter a valid username and password";
		}

	}

	function signup($POST)
	{

		$DB = new Database();

		$_SESSION['error_message'] = "";
		if(isset($POST['username']) && isset($POST['password']))
		{

			$arr['username'] = $POST['username'];
			$arr['password'] = $POST['password'];
			$arr['email'] = $POST['email'];
			$arr['url_address'] = get_random_string_max(60);
			$arr['date'] = date("Y-m-d H:i:s");

			$query = "insert into user (username,password,email,url_address,date) values (:username,:password,:email,:url_address,:date)";
			$data = $DB->write($query,$arr);
			if($data)
			{
				
				header("Location:". ROOT . "login");
				die;
			}

		}else{

			$_SESSION['error_message'] = "please enter a valid username and password";
		}
	}

	function check_logged_in()
	{

		$DB = new Database();
		if(isset($_SESSION['user_id']))
		{

			$arr['user_id'] = $_SESSION['user_id'];

			$query = "select * from user where user_id = :user_id limit 1";
			$data = $DB->read($query,$arr);
			if(is_array($data))
			{
				//logged in
 				$_SESSION['user_name'] = $data[0]->username;
				$_SESSION['user_id'] = $data[0]->url_address;

				return true;
			}
		}

		return false;

	}

	function logout()
	{
		//logged in
		unset($_SESSION['username']);
		unset($_SESSION['user_id']);

		header("Location:". ROOT . "login");
		die;
	}


}