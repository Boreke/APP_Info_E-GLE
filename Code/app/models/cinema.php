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
        return $this->DB->read($query,[$id]);
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
}