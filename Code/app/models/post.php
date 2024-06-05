<?php 

Class Post 
{

    function getCommentaireById($id){
		$DB = new Database();
		$sqlRequest = "SELECT c.*, u.username FROM commentaire c JOIN user u ON u.id_user = c.user_id WHERE post_idpost = :id";
		$arr["id"]=$id;
		$Result =$DB->read($sqlRequest,$arr);
		if (isset($Result)) {
			return $Result;
		}
		
	}
	function getPosts(){
		$db=new Database();
		$query ="SELECT * FROM post p JOIN user u ON p.user_id_user = u.id_user";
        return $db->read($query);
	}

}