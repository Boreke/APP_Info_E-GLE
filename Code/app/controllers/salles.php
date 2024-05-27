<?php

Class Salles extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
 	 	$data['page_title'] = "salles";
		  $data['salles'] = $this->getSalles();
		$user=$this->loadModel('user');
		$this->view("salles",$data);
	}

	function showCinemas(){
		$DB=new Database();
		$query="SELECT * FROM cinema";
		$cinemas= $DB->read($query);
		$salles=$this->getSalles();
		foreach($cinemas as $cinema){
			echo '<div class="cinema-elmt">
			<div class="cinema-elmt-top">
				<div class="cinema-info">
					<img class="objet-fit" src="'.ASSETS.'img/logo-ugc.png" alt="Logo UGC">
					<div class="cinema-desc">
						<h3>'.$cinema->nom_cinema.'</h3>
						<p>'.$cinema->adresse_cinema.'</p>';
						if(empty($salles[$cinema->idcinema])){
							echo'<p>aucune salle</p>';
							echo '</div></div>';
						}else{
										echo'<p>'.count($salles[$cinema->idcinema]).' salles</p>';
									echo'</div>
								</div>
								<img class="dropdown" src="'.ASSETS.'img/Drop Down.png" alt="">
							</div>
							<div class="cinema-elmt-bot">';
							foreach($salles[$cinema->idcinema] as $salle){
								$url = ROOT . 'salleinscrit?salle_id=' . $salle->idsalle;
								echo '<div  class="salle"><a class="btn-salle" href="'.$url.'">Salle '. $salle->numero.'</a></div>';
							}
						}
							echo '</div></div>';
			
		}
	}

	function getSalles(){
		$DB=new Database();
		$query="SELECT * FROM cinema";
		$cinemas= $DB->read($query);
		unset($query);
		foreach($cinemas as $cinema){
			$arr['idcinema']=$cinema->idcinema;
			$sqlquery="SELECT * FROM salle WHERE cinema_idcinema = :idcinema";
			$salles= $DB->read($sqlquery,$arr);
			$salleCinema[$cinema->idcinema]=$salles;
		}
		return $salleCinema;
	}
}