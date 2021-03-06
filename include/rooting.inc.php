<?php

/* ------------------------------------------------------------------------- /
						
	Ce fichier sert à diriger l'utilisateur et à traiter les informations
	dynamiques. C'est le controller, c'est lui qui appel les classes et les
	vues.

/ ------------------------------------------------------------------------- */

	$iCategory = isset($_GET['category']) && $_GET['category'] > 0 ? $_GET['category'] : 0;

	switch($iCategory){
		case 1:
			define('ROOTING', 'view/inscription.view.php');

			if(isset($_POST['inscription']) && !empty($_POST['inscription'])){

				require_once 'class/user.class.php';

				$oUser = new User();

				$oUser->setNom($_POST['inscription']['nom']);
				$oUser->setPrenom($_POST['inscription']['prenom']);
				$oUser->setMdp($_POST['inscription']['mdp']);
				$oUser->setEmail($_POST['inscription']['email']);
				$oUser->setDroit($_POST['inscription']['droit']);

				$oUser->validation();

				//S'il n'y a aucun retour d'erreur
				if(empty($oUser->aError)){

					require_once 'class/bdd.class.php';

					$oBdd = new Bdd();

					$iReturnIdent = $oBdd->user_insert($oUser);

					if($iReturnIdent > 0){
						$_SESSION['id_user'] = $iReturnIdent;
						header('Location: view/message.view.php');
					}
				}
			}
		break;
		case 0:
			define('ROOTING', 'view/connexion.view.php');
			
			if (isset($_POST['connexion']) && !empty($_POST['connexion'])){
				
				
				$sEmail = $_POST['connexion']['email'];
				$sMdp = md5($_POST['connexion']['mdp']);
				
				if(empty($oUser->aError)){
				require_once 'class/bdd.class.php';
				
				
				$oBdd = new Bdd();
				$aUserdata = $oBdd->user_checkData($sEmail,$sMdp);
				
				if (!empty($aUserdata)){
					 $_SESSION['id_user'] = $aUserdata['id_user'];
					 echo 'les droits de l utilisateur sont ' . $oConnectUser->getDroit();
					// $_SESSION['prenom'] = $oBdd->user_checkData($sEmail,$sMdp)['prenom'];
					// $_SESSION['nom'] = $oBdd->user_checkData($sEmail,$sMdp)['nom'];
					$_SESSION['droit'] = $aUserdata['droit'];
					//require_once 'include/parametres.inc.php';
					header('Location: index.php?category=4');
				}
				else{
					
					echo 'error_log';
					define('ROOTING', 'view/connexion.view.php');
				}
				}
			}
			
		break;
		case 2:
			//define('ROOTING', 'view/calendrier.view.php');
			echo'calendrier';
			/*if(!isset($_SESSION['id_user'])){
				header('Location: index.php');
			}*/

		break;
		case 3:
			define('ROOTING', 'view/bienvenue.view.php');
			
		break;
		
		case 4:
			define('ROOTING', 'include/menu.inc.php');
			
		break;
	}

?>
