<?php

Class Cinema{
    private $attributes;
    private $DB;

    function __construct(){
        $this->DB=new Database;
        if(isset($_SESSION['user_id']) && $_SESSION['type']=='gerant'){
			$this->attributes=$this->getCinemaById($_SESSION['user_id']);
		}
    }

    function getCinemaById($id){
        $query= "SELECT * FROM cinema WHERE user_id_user=?";
        return $this->DB->read($query,[$id])[0];
    }

    function getOwner(){
        if ($this-> attributes){
            $query= "SELECT * FROM cinema WHERE user_id_user=?";
            return $this->DB->read($query,[$this->attributes->user_id_user]);
        }
        return false;
    }

    function getName(){
        if ($this-> attributes){
            return $this->attributes->nom_cinema;
        }
    }
    function getAddress(){
        if ($this-> attributes){
            return $this->attributes->adresse_cinema;
        }
    }
    function getId(){
        if ($this-> attributes){
            return $this->attributes->idcinema;
        }
    }

    function getExistingSalles(){
		
		$sqlRequest="SELECT * FROM salle WHERE cinema_idcinema = :idCinema ORDER BY numero ASC";
		$arr["idCinema"]=$this->getId();
		$existingRooms=$this->DB->read($sqlRequest,$arr);
		unset($sqlRequest);
		return $existingRooms;
	}
}