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

		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])){
			$this->deleteUser($_POST['delete_id']);
		} elseif (isset($_POST['login_id'])) {
			$this->loginAsUser($_POST['login_id']);
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

	public function loginAsUser($id) {
        $query = "SELECT * FROM user WHERE id_user = :id limit 1";
        $user = $this->db->read($query, ['id' => $id]);

        if (is_array($user)) {
            // Connectez l'utilisateur en initialisant la session
            $_SESSION['username'] = $user[0]->username;
            $_SESSION['user_id'] = $user[0]->id_user;
            $_SESSION['type'] = $user[0]->type;
        }
    }

}