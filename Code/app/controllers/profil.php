<?php

Class Profil extends Controller{

    function index()
    {
        unset($_SESSION['error_message']);
 	 	$data['page_title'] = "Profil";

        if(isset($_POST['form_type']) && $_POST['form_type'] == "update_password"){
            $this->updatePassword($_POST);
        }

		$this->view("profil",$data);
    }

    function getUserInfo(){
		$DB = new Database();
		$sqlRequest="SELECT * FROM user WHERE id_user = :user_id";
		$arr["user_id"]=$_SESSION["user_id"];
		$userinfo=$DB->read($sqlRequest,$arr);
		unset($sqlRequest);
		return $userinfo;
	}

    function displayUserInfo(){
        $userinfo = $this -> getUserInfo();
        if ($userinfo && count($userinfo) > 0) {
            $userinfo = $userinfo[0]; 
            
            echo '<h3>Bienvenue ' . htmlspecialchars($userinfo->prenom) . ' ' . htmlspecialchars($userinfo->nom) . '</h3>';
            echo '<ul>';
            echo '<li><strong>Email:</strong> ' . htmlspecialchars($userinfo->email) . '</li>';
            echo '<li><strong>Nom:</strong> ' . htmlspecialchars($userinfo->nom) . '</li>';
            echo '<li><strong>Prénom:</strong> ' . htmlspecialchars($userinfo->prenom) . '</li>';
            // Add more fields as necessary
            echo '</ul>';
        } else {
            echo '<p>Utilisateur non trouvé ou erreur de requête.</p>';
        }
    }

    function updatePassword($postData) {
        $DB = new Database();
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

                    if ($DB->write($updateQuery, $arr)) {
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
        $DB = new Database();
        $userInfo = $this->getUserInfo();

        if ($userInfo && count($userInfo) > 0) {
            $userInfo = $userInfo[0]; 
            
            $currentPassword = $postData['delete_password'];
            $currentPasswordHash = password_hash($currentPassword, PASSWORD_DEFAULT);

            if (password_verify($currentPasswordHash, $userInfo->password_hash)) {
                $deleteQuery = "DELETE FROM user WHERE id_user = :user_id";
                $params = ['user_id' => $_SESSION["user_id"]];

                if ($DB->write($deleteQuery, $params)) {
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

}