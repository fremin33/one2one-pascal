<?php
	/*	
	 *  	DESINSCRIPTION D UN CLIENT A UN COURS FIT GROUP
	 */
	
	
	include('../core/core.php');
	
	
	$clientFitGroup=Model::load("clients");
	$reservationCrossTraining=Model::load("reservationCrossTraining");
	$lesCoursCrossTraining=Model::load("coursCrossTraining");
	$abonnements=Model::load("abonnements");
	//$type=Model::load("typeFitGroup");
	
	
	$reponse="";
	$nb=-1;
	
	$prenom="";
	$mail="";
	$contenuMail="";
	
	
	
	if(isset($_GET["numCarte"]) && isset($_GET["id"]) && !empty($_GET["numCarte"]) && !empty($_GET["id"]))
	{
	
	
		//le client
		$carteExiste=$clientFitGroup->find(array("conditions"=>"numCarte=".$_GET["numCarte"]));
	
	
	
		if(!empty($carteExiste))
		{
			$idClient=$carteExiste[0]['id'];
			
			$prenom=$carteExiste[0]['prenom'];
			$mail=$carteExiste[0]['email'];
			
			
			//Est il déjà inscrit à ce cours
			$resa=$reservationCrossTraining->find(array("conditions"=>"idClient=".$idClient." and idCoursCrossTraining=".$_GET['id']));
			
			//lecours
			$leCours=$lesCoursCrossTraining->find(array("conditions"=>"id=".$_GET['id']));
			
			//$idDuCours=$leCours[0]['idTypeFitGroup'];
			
			//l'abonnement client
			$abonnement=$abonnements->find(array("conditions"=>"idClient=".$idClient));
			
			//Trouvez l'abonnement FIT GROUP
			$numAbonnement=0;
			$enregistrement=-1;
			foreach ($abonnement as $k=>$v) 
			{
				if($v['idFormule']==9 || $v['idFormule']==10)
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
				
//A RAJOUTER				
				
				/*if(strtotime($dateJourPlus24)<strtotime($dateHeure))
				{*/
							
						
			
					
					
					//supression resa
					$up=$reservationCrossTraining->deleteAll($resa[0]['id']);
					
					//ajout d'une seance
					$nb=$abonnement[$enregistrement]['nbSeancesRestantes']+1;
					$ajout=$abonnements->save(array("id"=>$abonnement[$enregistrement]['id'],"nbSeancesRestantes"=>$nb));
					
					//Ajout d'une place
					$nbPl=$leCours[0]['nombrePlaces']+1;
					$ajoutPlace=$lesCoursCrossTraining->save(array("id"=>$leCours[0]['id'],"nombrePlaces"=>$nbPl));
					
					$reponse.="Vous êtes dé-inscrit du cours du ".$dateDuCours." à ".$heureDuCours;
					$nb=$nbPl;
					
					
					
					//recupere le nom du cours
					//$lesCours=$type->find(array("conditions"=>"id=".$idDuCours));
									
					$nomDuCours="CROSS TRAINING";			
					
					
					
						$mois=array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"); 
												
												$laDate=explode('-',$dateDuCours);
												$num=$laDate[2];
												$leMois=$mois[intval($laDate[1])];
												$annee=$laDate[0];
								$lesJours=array("dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi");
											
											
										$timestamp = mktime(0, 0, 0, $laDate[1], $laDate[2], $laDate[0]);
										$jour = $lesJours[intval(date('w', $timestamp))];				
												
												
												//j'envoie un mail à faire
											
												$contenuMail="<p>Bonjour $prenom</p>";
												$contenuMail.="<p>Vous êtes dé-inscrit du cours de <span class='rose'> ".$nomDuCours."</span> du <span class='rose'> ".$jour." ".$num." ".$leMois." ".$annee." </span> à <span class='rose'> ".$heureDuCours."</span></p>";
												$contenuMail.="<p>Merci de la confiance que vous nous accordez,</p>
	<p>Au plaisir de vous voir pour votre prochaine séance,</p>
	<p>Sportivement,</p>
	<p>Vos coach : Alexandre Bares et Pascal Mas </p>
	<p class=\"petit\">Les séances pour lesquelles vous êtes inscrits vous sont déjà décomptées</p>";
					
					
					
					
					
					
					
				//}
				/*else {
					$reponse.="Vous pouvez vous déinscrire d'un cours uniquement 24h avant la séance ";	
				}*/
			
				
				
				
							
			
										
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
	
	
		
	
		$tabRep=array("texte"=>$reponse,"valPlace"=>$nb,"adresseMail"=>$mail,"contenuMail"=>$contenuMail);
	
	echo json_encode($tabRep);

?>