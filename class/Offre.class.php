<?php

class Offre
{

	//variables
	//private
	private $iId_Offre;
    private $iId_Restaurant;
	private $bActif;

   	//public
	public $aError;
	
	//Constructeur
   	function Reservation($aTableau=''){
   		if(!empty($aTableau)){
   			foreach($aTableau as $k=>$v){
   				switch ($k){
   					case 'offre':
   						$this->iId_Offre = $v;
   					break;
   					case 'restaurateur':
   						$this->iId_Offre = $v;
   					break;
					case 'actif':
					if($v == 0) {
						$this->bActif = 0;
					}
					else {
						$this->bActif = 1;
					}
					break;
   				}
   			}
   		}
   	}
	
	//Getter
	
	public function getOffre(){
		return $this->iId_Offre;
	}
	
	public function getRestaurateur(){
		return $this->iId_Restaurant;
	}
	
	public function getActif() {
		return $this->bActif;
	}

	//Setter

	public function setOffre($iNvOffre) {
		$this->iId_Offre = $iNvOffre;
	}
	
	public function setRestaurateur($iNvRestaurateur) {
		$this->iId_Restaurant = $iNvRestaurant;	
	}
	
	public function setActif($bNvActif) {
		$this->bActif = $bNvActif;
	}
	
	//Fonctions internes
	
	public function supprimerOffre($iId_OffreSup) {
		$this->setActif(false);
	}
	
	