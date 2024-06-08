<?php

Class Profil extends Controller{

    function index()
    {
        unset($_SESSION['error_message']);


 	 	$data['page_title'] = "Profil";
        $data['user_info'] = $this->getUserInfo();
        $data['user_cinema'] = $this->getCinemaInfo();
        $data['user_posts'] = $this->getUserPosts();
        $data['user_comments'] = $this->getUserComments();
        $data['user_tickets'] = $this->getUserTickets();
        if(isset($_SESSION['type']) && $_SESSION['type'] == 'gerant'){
            $data['cinema_id'] = $this->user->getCinemaId();
        }
        

        if(isset($_POST['form_type']) && $_POST['form_type'] == "update_password"){
            $this->updatePassword($_POST);
        }

        if(isset($_POST['form_type']) && $_POST['form_type'] == "delete_profile"){
            $this->deleteProfile($_POST);
        }

        if (isset($_POST['form_type']) && $_POST['form_type'] == "update_profile") {
            $this->updateProfile($_POST);
        }

        if (isset($_POST['form_type']) && $_POST['form_type'] == "update_cinema") {
            $this->updateCinema($_POST);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_post'])) {
            $this->deletePost($_POST['post_id']);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_comment'])) {
            $this->deleteComment($_POST['comment_id']);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_post'])) {
            $this->updatePost($_POST);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_comment'])) {
            $this->updateComment($_POST);
        }

		$this->view("profil",$data);
    }

    function getUserInfo(){
		
		$sqlRequest="SELECT * FROM user WHERE id_user = :user_id";
		$arr["user_id"]=$_SESSION["user_id"];
		$userinfo=$this->DB->read($sqlRequest,$arr);
		unset($sqlRequest);
		return $userinfo ? $userinfo[0] : null;
	}

    function getCinemaInfo(){
		
		$sqlRequest="SELECT * FROM cinema WHERE user_id_user = :user_id";
		$arr["user_id"]=$_SESSION["user_id"];
		$cinemainfo=$this->DB->read($sqlRequest,$arr);
		unset($sqlRequest);
		return $cinemainfo ? $cinemainfo[0] : null;
	}

    function getUserTickets() {
        
        $sqlRequest = "
            SELECT b.idbillet, b.price, 
                   f.titre AS film_title, f.synopsis AS film_synopsis, f.duree AS film_duration, f.genre AS film_genre, f.image_file AS film_image,
                   s.numero AS salle_number, 
                   c.nom_cinema AS cinema_name, c.adresse_cinema AS cinema_address
            FROM billet b
            JOIN film f ON b.Film_id_film = f.id_film
            JOIN salle s ON b.id_salle = s.idsalle
            JOIN cinema c ON b.id_cinema = c.idcinema
            WHERE b.user_id_user = :user_id
        ";
        $arr["user_id"] = $_SESSION["user_id"];
        return $this->DB->read($sqlRequest, $arr);
    }

    function displayUserInfo(){
        $userinfo = $this -> getUserInfo();
        if ($userinfo) {
            echo '<div class="infouser">';
            echo '<h3>Bienvenue ' . htmlspecialchars($userinfo->prenom) . ' ' . htmlspecialchars($userinfo->nom) . '!</h3>';
            echo '<ul>';
            echo '<li><strong>Email:</strong> ' . htmlspecialchars($userinfo->email) . '</li>';
            echo '<li><strong>Nom:</strong> ' . htmlspecialchars($userinfo->nom) . '</li>';
            echo '<li><strong>Prénom:</strong> ' . htmlspecialchars($userinfo->prenom) . '</li>';
            echo '<li><strong>Username:</strong> ' . htmlspecialchars($userinfo->username) . '</li>';
            echo '</ul>';
            echo '</div>';
        } else {
            echo '<p>Utilisateur non trouvé ou erreur de requête.</p>';
        }
    }

    function displayCinemaInfo(){
        $cinemainfo = $this -> getCinemaInfo();
        $userinfo = $this -> getUserInfo();
        if ($cinemainfo) {
            echo '<h3>Bienvenue au cinema ' . htmlspecialchars($cinemainfo->nom_cinema) . ' ' . htmlspecialchars($userinfo->prenom) . ' ' . htmlspecialchars($userinfo->nom) . '!</h3>';
            echo '<ul>';
            echo '<li><strong>Nom du Cinema:</strong> ' . htmlspecialchars($cinemainfo->nom_cinema) . '</li>';
            echo '<li><strong>Adresse du Cinema:</strong> ' . htmlspecialchars($cinemainfo->adresse_cinema) . '</li>';
            echo '</ul>';
        } else {
            echo '<p>Cinema non trouvé ou erreur de requête.</p>';
        }
    }

    function updateProfile($postData) {
        
        $updateQuery = "UPDATE user SET prenom = :prenom, nom = :nom, username = :username, email = :email WHERE id_user = :user_id";
        $params = [
            'prenom' => $postData['current_surname'],
            'nom' => $postData['current_name'],
            'email' => $postData['current_email'],
            'username' => $postData['current_username'],
            'user_id' => $_SESSION["user_id"]
        ];

        if ($this->DB->write($updateQuery, $params)) {
            echo "<p>Profil mis à jour avec succès.</p>";
        } else {
            echo "<p>Échec de la mise à jour du profil.</p>";
        }
    }

    function updateCinema($postData) {
        
        
        $cinema_id = $this->user->getCinemaId();
        
        $updateQuery = "UPDATE cinema SET nom_cinema = :nom_cinema, adresse_cinema = :adresse_cinema WHERE idcinema = :cinema_id";
        $params = [
            'nom_cinema' => $postData['current_cinema'],
            'adresse_cinema' => $postData['current_address'],
            'cinema_id' => $cinema_id
        ];
    
        if ($this->DB->write($updateQuery, $params)) {
            echo "<p>L'information a été mise à jour avec succès.</p>";
        } else {
            echo "<p>Échec de la mise à jour de l'information.</p>";
        }
    }

    function updatePassword($postData) {
        
        $userInfo = $this->getUserInfo();

        if ($userInfo && count($userInfo) > 0) {
            $userInfo = $userInfo[0]; 
            
            $currentPassword = $postData['current_password'];
            $newPassword = $postData['new_password'];
            $confirmPassword = $postData['confirm_password'];

            $currentPasswordHash = password_hash($currentPassword, PASSWORD_DEFAULT);

            if (password_verify($currentPassword, $userInfo->password_hash)) {
                if ($newPassword === $confirmPassword) {
                    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $updateQuery = "UPDATE user SET password_hash = :new_password WHERE id_user = :user_id";
                    $arr = [
                        'new_password' => $newPasswordHash,
                        'user_id' => $_SESSION["user_id"]
                    ];

                    if ($this->DB->write($updateQuery, $arr)) {
                        echo "<p>Mot de passe mis à jour avec succès.</p>";
                    } else {
                        echo "<p>Échec de la mise à jour du mot de passe.</p>";
                    }
                } else {
                    echo "<p>Les nouveaux mots de passe ne correspondent pas.</p>";
                }
            } else {
                echo "<p>Le mot de passe actuel est incorrect.</p>";
            }
        } else {
            echo "<p>Utilisateur non trouvé.</p>";
        }
    }

    function deleteProfile($postData) {
        
        $userInfo = $this->getUserInfo();

        if ($userInfo && count($userInfo) > 0) {
            $userInfo = $userInfo[0]; 
            
            $currentPassword = $postData['delete_password'];
            $currentPasswordHash = password_hash($currentPassword, PASSWORD_DEFAULT);

            if (password_verify($currentPasswordHash, $userInfo->password_hash)) {
                $deleteQuery = "DELETE FROM user WHERE id_user = :user_id";
                $params = ['user_id' => $_SESSION["user_id"]];

                if ($this->DB->write($deleteQuery, $params)) {
                    session_destroy(); 
                    header("Location: /login"); 
                    exit;
                } else {
                    echo "<p>Échec de la suppression du compte.</p>";
                }
            } else {
                echo "<p>Le mot de passe actuel est incorrect.</p>";
            }
        } else {
            echo "<p>Utilisateur non trouvé.</p>";
        }
    }

    function getUserPosts() {
        
        $sqlRequest = "SELECT * FROM post WHERE user_id_user = :user_id";
        $arr["user_id"] = $_SESSION["user_id"];
        return $this->DB->read($sqlRequest, $arr);
    }

    function getUserComments() {
        
        $sqlRequest = "
            SELECT c.idcommentaire AS id, c.date AS comment_date, 
                   c.contenu AS comment_content, p.idpost AS post_id, p.titre AS post_title 
            FROM commentaire c
            JOIN post p ON p.idpost = c.post_idpost
            WHERE c.user_id= :user_id";
        $arr["user_id"] = $_SESSION["user_id"];
        return $this->DB->read($sqlRequest, $arr);
    }

    function deletePost($post_id) {
        
        $sqlRequest = "DELETE FROM post WHERE idpost = :post_id";
        $arr["post_id"] = $post_id;
        $this->DB->write($sqlRequest, $arr);
    }

    function deleteComment($comment_id) {
        
        $sqlRequest = "DELETE FROM commentaire WHERE idcommentaire = :comment_id";
        $arr["comment_id"] = $comment_id;
        $this->DB->write($sqlRequest, $arr);
    }

    function updatePost($postData) {
        
        $updateQuery = "UPDATE post SET contenu = :content WHERE idpost = :post_id";
        $params = [
            'content' => $postData['post_content'],
            'post_id' => $postData['post_id']
        ];
        $this->DB->write($updateQuery, $params);
    }

    function updateComment($postData) {
        
        $updateQuery = "UPDATE commentaire SET contenu = :content WHERE idcommentaire = :comment_id";
        $params = [
            'content' => $postData['comment_content'],
            'comment_id' => $postData['comment_id']
        ];
        $this->DB->write($updateQuery, $params);
    }

}