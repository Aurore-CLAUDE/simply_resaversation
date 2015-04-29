<?php
class Reservation
{
	//variables
	//private
	private $sEmail_Client;
    private $sNom;
	private $sPrenom;
	private $dDate_Resa;
	private $dDate_Creation;
   	private $iNb_Tables;
	private $iNb_Pers;
	private $iActif;

   	//public
	public $aError;
	
	//Constructeur - idem que fonction reserver... 
   	function Reservation($aTableau=''){
   		if(!empty($aTableau)){
   			foreach($aTableau as $k=>$v){
   				switch ($k){
   					case 'email':
   						$this->sEmail_Client = $v;
   					break;
   					case 'nom':
   						$this->sNom = $v;
   					break;
   					case 'prenom':
   						$this->sPrenom = $v;
   					break;
   					case 'date_resa':
   						$this->dDate_Resa = $v;
   					break;
					case 'date_creation':
   						$this->dDate_Creation = $v;
   					break;
					case 'nb_tables':
   						$this->iNb_Tables = $v;
   					break;
					case 'nb_pers':
   						$this->iNb_Pers = $v;
   					break;
   					case 'actif':
   						$this->iActif = $v;
   					break;
   				}
   			}
   		}
   	}
	
	//Getter
	public function getEmail(){
		return $this->sEmail_Client;
	}
	
	public function getPrenom(){
		return $this->sPrenom;
	}

	public function getNom(){
		return $this->sNom;
	}
	
	public function getDate_Resa(){
		return $this->dDate_Resa;
	}

	public function getDate_Creation(){
		return $this->dDate_Creation;
	}
	
	public function getNbre_Tables(){
		return $this->iNb_Tables;
	}
	
	public function getNbre_Pers(){
		return $this->iNb_Pers;
	}
	
	public function getActif(){
		return $this->iActif;
	}
	
	//Setter

	public function setEmail($sNvEmail) {
		$this->sEmail_Client = $sNvEmail;
	}
	
	public function setNom($sNvNom) {
		$this->sNom = $sNvNom;	
	}
	
	public function setPrenom($sNvPrenom) {
		$this->sNom = $sNvPrenom;	
	}
	
	public function setDate_Resa($dNvDate_Resa) {
		$this->sAdresse = $dNvDate_Resa;	
	}
	
	public function setDate_Creation($dNvDate_Creation){
		$this->dDate_Creation = $dDate_Creation;
	}
	
	public function setNbre_Tables($iNvNb_Tables){
		$this->iNb_Tables = $iNvNb_Tableseree;
	}
	
	public function setNbre_Pers($iNvNb_Pers){
		$this->iNb_Pers = $iNvNb_Pers;
	}
	
	public function setActif($iNvActif){
		$this->iActif = $iNvActif;
	}

	//Fonctions internes
	
	//Attention risque de conflit si deux clients portants le même noms réservent en même temps... => utiliser IDUSER ?
	public function modificationResa($sNomModif, $dDate_ResaModif, $aTableau){
		$sNomActuel = $this->$sNom;
		$dDate_ResaActuelle = $this->$dDate_Resa;
		if($sNomActuel == $sNomModif && $dDate_ResaActuelle == $dDate_ResaModif) {
			if(!empty($aTableau)){
				foreach($aTableau as $k=>$v){
					switch ($k){
						case 'email':
							$this->setEmail($v);
						break;
						case 'nom':
							$this->setNom($v);
						break;
						case 'prenom':
							$this->setPrenom($v);
						break;
						case 'date_resa':
							$this->setDate_Resa($v);
						break;
						case 'date_creation':
							$this->setDate_Creation($v);
						break;
						case 'nb_tables':
							$this->setNbre_Tables($v);
						break;
						case 'nb_pers':
							$this->setNbre_Pers($v);
						break;
						case 'actif':
							$this->setActif($v);
						break;
					}
   				}
			}
   		}
   	}
	
	// Utilise t-on l'IDRESA ou le Nom et la Date de résa ?
	public function annulerResa($sNomSup, $dDate_ResaSup) {
		$sNomActuel = $this->$sNom;
		$dDate_ResaActuelle = $this->$dDate_Resa;
		if($sNomActuel == $sNomSup && $dDate_ResaActuelle == $dDate_ResaSup) {
			$this->setActif(false);
		}
	}
}
?>