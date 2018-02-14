<?php
	/*echo '<pre>';
	print_r($_GET);
	echo '</pre>';*/
	
	
	include('core/core.php');
	
	
	$clientFitGroup=Model::load("clients");
	$reservationFitGroup=Model::load("reservation");
	$lesCoursFitGroup=Model::load("coursFitGroup");
	$abonnements=Model::load("abonnements");
	
	$reponse="";
	$nb=-1;
	
	/*
	 * Enregsitrement si numero ok + abonnement fit group + nbSeance Client ok + place disponible
	 */
	
	//print_r($_GET);
	
	if(isset($_GET["numCarte"]) && isset($_GET["id"]) && !empty($_GET["numCarte"]) && !empty($_GET["id"]))
	{
	
	
	
	$carteExiste=$clientFitGroup->find(array("conditions"=>"numCarte=".$_GET["numCarte"]));
	
	
	
	if(!empty($carteExiste))
	{
		$idClient=$carteExiste[0]['id'];
		
		
		//Est il déjà inscrit à ce cours
		$resa=$reservationFitGroup->find(array("conditions"=>"idClient=".$idClient." and idCoursFitGroup=".$_GET['id']));
		
		
		if(empty($resa))
		{
		
		
		
		
		
		
		
								//recherche de l'abonnement
								$abonnementExiste=$abonnements->find(array("conditions"=>"idClient=".$carteExiste[0]["id"]));
								
								$numAbonnement=0;
								$enregistrement=-1;
								foreach ($abonnementExiste as $k=>$v) 
								{
									if($v['idFormule']>=5)
									{
										$numAbonnement=$v['idFormule'];
										$enregistrement=$k;
									}	
								}
								
								
							
							//verification de la validité de la carte et du nombre de séance restante
							if($enregistrement!=-1)
							{
								$dateFinAbonnement=$abonnementExiste[$enregistrement]['date'];
								
								
								//$dateFinAbonnementPlus3mois=date('Y-m-d',strtotime('+4 month',strtotime($dateFinAbonnement)));
									
								if(strtotime($dateFinAbonnement)>strtotime(date('Y-m-d')))
								{
									
							
									
									
									
									//test pour savoir si il reste des séances sur la carte
									if($abonnementExiste[$enregistrement]['nbSeancesRestantes']>0)
									{
												
										$idAbonnement=$abonnementExiste[$enregistrement]['id'];
																
										//Est ce que le cours existe										
										$placeRestante=$lesCoursFitGroup->find(array("conditions"=>"id=".$_GET['id']));
										
										//print_r($placeRestante);
										
										if(!empty($placeRestante))
										{
												
											//echo $placeRestante[0]['nombrePlaces'];
												
															
											if($placeRestante[0]['nombrePlaces']>0)
											{
												//je peux reserver
												
												$reservationOk=$reservationFitGroup->save(array("idClient"=>$idClient,"idCoursFitGroup"=>$_GET['id']));
												
												$reponse.="Votre réservation a été effectué pour le cours du ".$placeRestante[0]['date']." à ".$placeRestante[0]['heure']."";
												
												//je décrémente le nombre de séance effectué
												$nbSeanceRestante=$abonnementExiste[$enregistrement]['nbSeancesRestantes']-1;
												
												$abonnements->save(array("id"=>$idAbonnement,"nbSeancesRestantes"=>$nbSeanceRestante));
												
												
												
												
												//je décremente le nombre de place dela séance
												
												$nbPl=$placeRestante[0]['nombrePlaces']-1;
												
												$lesCoursFitGroup->save(array(
												"id"=>$_GET['id'],"nombrePlaces"=>$nbPl));	
												
												
												$nb=$nbPl;
												
												
																
												
											}
											else {
												$reponse.="Il n'y a plus de place";
											}
									
											
									}
										
										
										
									}
									else
											$reponse.="Vous avez épuissé le nombre de séances de votre abonnement";
									
									
									
									
								}
								else 
									$reponse.="Votre abonnement n'est plus valable (validité de 4 mois) ";
								
								
								
								
								
								
							}
							
							else
								$reponse.="Vous n'avez pas d'abonnement FIT GROUP ";	
								
			}
			else
				$reponse.="Vous êtes déjà inscrit pour le cours ";	
		
	}

else	
	$reponse.="Votre Numero de carte est inexistant ";
	 
	 }
else {
	$reponse.="Vous n'avez pas saisi de numéro de carte ";
}
	
	
	/*
	 * Decrementer le nombre de place dispo
	 */
	
	
		$tabRep=array("texte"=>$reponse,"valPlace"=>$nb);
	
	echo json_encode($tabRep);

?>