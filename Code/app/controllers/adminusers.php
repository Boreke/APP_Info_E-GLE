<?php

Class AdminUsers extends Controller 
{
	function index()
	{

		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "utilisateurs";
		$data['users'] = $this->listUsers();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_keyword']) && isset($_POST['search_category'])) {
            $keyword = $_POST['search_keyword'];
            $category = $_POST['search_category'];
            $data['users'] = $this->searchUsers($category, $keyword);
        } else {
            $data['users'] = $this->listUsers();
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logintest'])) {
			$this->loginAsUser($_POST);
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])){
			$this->deleteUser($_POST['delete_id']);
		}

		$this->view("adminusers",$data);
		
	}
	private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function listUsers() {
        $query = "SELECT id_user, nom, prenom, username, email, type FROM user";
        return $this->db->read($query);
    }

    public function searchUsers($category, $keyword) {
        $allowedCategories = ['nom', 'prenom', 'username', 'email', 'type'];
        
        if (!in_array($category, $allowedCategories)) {
            return []; // Return an empty array if the category is not allowed
        }
        
        $query = "SELECT id_user, nom, prenom, username, email, type FROM user 
                  WHERE $category LIKE :keyword";
        return $this->db->read($query, ['keyword' => '%' . $keyword . '%']);
    }

    public function deleteUser($id) {
        $query = "DELETE FROM user WHERE id_user = :id";
        $this->db->write($query, ['id' => $id]);
    }
	public function handlePost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
            $this->deleteUser($_POST['delete_id']);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }

    public function loginAsUser($POST) {
        $user=$this->loadModel("user");
        $user = new User();
        if($POST['logintest'] == 'client'){
            $query = "SELECT * FROM user WHERE id_user = :id limit 1";
            $userResult = $this->db->read($query, ['id' => 13]);
            if ($userResult) {
                $_SESSION['real_type'] = 'admin';
                $_SESSION['real_id'] = $user->getUserId();
                $_SESSION['real_username'] = $user->getUsername();
                $_SESSION['username'] = $userResult[0]->username;
                $_SESSION['user_id'] = $userResult[0]->id_user;
                $_SESSION['type'] = $userResult[0]->type;
                
                header("Location:". ROOT . "home");
            }
        }elseif($POST['logintest'] == 'gerant'){
            $query = "SELECT * FROM user WHERE id_user = :id limit 1";
            $userResult = $this->db->read($query, ['id' => 14]);
            if ($userResult) {
                $_SESSION['real_type'] = 'admin';
                $_SESSION['real_id'] = $user->getUserId();
                $_SESSION['real_username'] = $user->getUsername();
                $_SESSION['username'] = $userResult[0]->username;
                $_SESSION['user_id'] = $userResult[0]->id_user;
                $_SESSION['type'] = $userResult[0]->type;
                
                header("Location:". ROOT . "home");
            }
        }  
    }

}