<?php
	/*	
	 *  	DESINSCRIPTION D UN CLIENT A UN COURS FIT GROUP
	 */
	
	
	include('core/core.php');
	
	
	$clientFitGroup=Model::load("clients");
	$reservationFitGroup=Model::load("reservation");
	$lesCoursFitGroup=Model::load("coursFitGroup");
	$abonnements=Model::load("abonnements");
	
	$reponse="";
	$nb=-1;
	
	
	
	
	
	if(isset($_GET["numCarte"]) && isset($_GET["id"]) && !empty($_GET["numCarte"]) && !empty($_GET["id"]))
	{
	
	
		//le client
		$carteExiste=$clientFitGroup->find(array("conditions"=>"numCarte=".$_GET["numCarte"]));
	
	
	
		if(!empty($carteExiste))
		{
			$idClient=$carteExiste[0]['id'];
			
			
			//Est il déjà inscrit à ce cours
			$resa=$reservationFitGroup->find(array("conditions"=>"idClient=".$idClient." and idCoursFitGroup=".$_GET['id']));
			
			//lecours
			$leCours=$lesCoursFitGroup->find(array("conditions"=>"id=".$_GET['id']));
			
			//l'abonnement client
			$abonnement=$abonnements->find(array("conditions"=>"idClient=".$idClient));
			
			//Trouvez l'abonnement FIT GROUP
			$numAbonnement=0;
			$enregistrement=-1;
			foreach ($abonnement as $k=>$v) 
			{
				if($v['idFormule']>=5)
				{
					$numAbonnement=$v['idFormule'];
					$enregistrement=$k;
				}	
			}
			
			
		
			
			
			
			
			if(!empty($resa))
			{
				//desinscrire : suppression de la reservation si superieur à 24h
				
				$dateDuCours=$leCours[0]['date'];
				$heureDuCours=$leCours[0]['heure'];
				
				$dateHeure=$dateDuCours.' '.$heureDuCours;
				
				
			
				
				$dateJour=date('Y-m-d H:i:s');
				
				//echo $dateJour;
				$dateJourPlus24=date('Y-m-d H:i:s',strtotime('+24 hour',strtotime($dateJour)));
				
				
				
				if(strtotime($dateJourPlus24)<strtotime($dateHeure))
				{
							
						
			
					
					
					//supression resa
					$up=$reservationFitGroup->deleteAll($resa[0]['id']);
					
					//ajout d'une seance
					$nb=$abonnement[$enregistrement]['nbSeancesRestantes']+1;
					$ajout=$abonnements->save(array("id"=>$abonnement[$enregistrement]['id'],"nbSeancesRestantes"=>$nb));
					
					//Ajout d'une place
					$nbPl=$leCours[0]['nombrePlaces']+1;
					$ajoutPlace=$lesCoursFitGroup->save(array("id"=>$leCours[0]['id'],"nombrePlaces"=>$nbPl));
					
					$reponse.="Vous êtes dé-inscrit du cours du ".$dateDuCours." à ".$heureDuCours;
					$nb=$nbPl;
					
					
				}
				else {
					$reponse.="Vous pouvez vous déinscrire d'un cours uniquement 24h avant la séance ";	
				}
			
				
				
				
							
			
										
			}
			else
					$reponse.="Vous n'êtes pas  inscrit pour ce cours ";	
			
		}
	
		else	
			$reponse.="Votre Numero de carte est inexistant ";
	 
	}
	else 
		$reponse="Vous n'avez pas saisi de numéro de carte ";

	
	
	/*
	 * Decrementer le nombre de place dispo
	 */
	
	
		
	
		$tabRep=array("texte"=>$reponse,"valPlace"=>$nb);
	
	echo json_encode($tabRep);

?>