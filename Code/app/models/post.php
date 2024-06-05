<?php 

Class Post 
{

    function getCommentaireById($id){
		$DB = new Database();
		$sqlRequest = "SELECT * FROM commentaire WHERE post_idpost = :id";
		$arr["id"]=$id;
		$Result =$DB->read($sqlRequest,$arr);
		if (isset($Result)) {
			return $Result;
		}
		
	}

}