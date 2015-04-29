<?php
//Ne sert que pour l'affichage et pour la modification
class Restaurant
{
	//variables
	//private
	private $iIdRestaurateur; // Objet restaurateur ou seulement un nom ?
	private $sNom;
    private $sAdresse;
	private $sTelephone;
	private $sDescriptif;
   	private $sImage; // Image = un string ?
	private $iActif;

   	//public
	public $aError;
	
	//Constructeur
   	function Restaurant($aTableau=''){
   		if(!empty($aTableau)){
   			foreach($aTableau as $k=>$v){
   				switch ($k){
					case 'restaurateur':
						$this->iIdRestaurateur = $v;
					break;
   					case 'nom':
   						$this->sNom = $v;
   					break;
   					case 'adresse':
   						$this->sAdresse = $v;
   					break;
   					case 'telephone':
   						$this->sTelephone = $v;
   					break;
   					case 'descriptif':
   						$this->sDescriptif = $v;
   					break;
					case 'image':
   						$this->sImage = $v;
   					break;
   					case 'actif':
   						$this->iActif = $v;
   					break;
   				}
   			}
   		}
   	}
	
	//Getter
	
	public function getRestaurateur() {
		return $this->iIdRestaurateur;
	}
	
	public function getNom(){
		return $this->sNom;
	}

	public function getAdresse(){
		return $this->sAdresse;
	}

	public function getTelephone(){
		return $this->sTelephone;
	}
	
	public function getDescriptif(){
		return $this->iDroit;
	}
	
	public function getImage(){
		return $this->sImage;
	}
	
	public function getActif(){
		return $this->iActif;
	}
	
	//Setter

	public function setRestaurateur($sNvRestaurateur) {
		$this->iIdRestaurateur = $sNvRestaurateur;
	}
	
	public function setNom($sNvNom) {
		$this->sNom = $sNvNom;	
	}
	
	public function setAdresse($sNvAdresse) {
		$this->sAdresse = $sNvAdresse;	
	}
	
	public function setTelephone($sNvTelephone) {
		$this->sTelephone = $sNvTelephone;
	}
	
	public function setDescriptif($sNouveauDescriptif){
		$this->sDescriptif = $sNouveauDescriptif;
	}
	
	public function setImage($sNouveauImage){
		$this->sImage = $iNouveauImage;
	}
	
	public function setActif($bNouveauActif){
		$this->bActif = $bNouveauActif;
	}

	//Fonctions internes
	
	public function modificationResto($sNomModif, $sAdresseModif, $aTableau){
		$sNomActuel = $this->$sNom;
		$sAdresseActuelle = $this->$sAdresse;
		if($sNomActuel == $sNomModif && $sAdresseActuelle == $sAdresseModif) {
			if(!empty($aTableau)){
				foreach($aTableau as $k=>$v){
					switch ($k){
						case 'nom':
							$this->setNom($v);
						break;
						case 'adresse':
							$this->setAdresse($v);
						break;
						case 'telephone':
							$this->setTelephone($v);
						break;
						case 'descriptif':
							$this->setDescriptif($v);
						break;
						case 'image':
							$this->setImage($v);
						break;
						case 'actif':
							$this->setActif($v);
						break;
					}
				}
			}
   		}
   	}
	
		public function supprimerResto($sNomSup, $sAdresseSup) {
		$sNomActuel = $this->$sNom;
		$sAdresseActuelle = $this->$sAdresse;
		if($sNomActuel == $sNomSup && $sAdresseActuelle == $sAdresseSup) {
			$this->setActif(false);
		}
	}
}
?>