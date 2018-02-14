<?php
	/*echo '<pre>';
	print_r($_GET);
	echo '</pre>';*/
	
	
	include('../core/core.php');
	include('envoiMail.php');
	
	$clientFitGroup=Model::load("clients");
	$reservationCrossTraining=Model::load("reservationCrossTraining");
	$lesCoursCrossTraining=Model::load("coursCrossTraining");
	$abonnements=Model::load("abonnements");
	
	
	$reponse="";
	$nb=-1;
	
	$mail="";
	$contenuMail="";
	
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
		
		$prenom=$carteExiste[0]['prenom'];
		$mail=$carteExiste[0]['email'];
		
		
		//Est il déjà inscrit à ce cours
		$resa=$reservationCrossTraining->find(array("conditions"=>"idClient=".$idClient." and idCoursCrossTraining=".$_GET['id']));
		
		
		
		
		if(empty($resa))
		{
		
		
		
		
		
		
		
								//recherche de l'abonnement
								$abonnementExiste=$abonnements->find(array("conditions"=>"idClient=".$carteExiste[0]["id"]));
								
								$numAbonnement=0;
								$enregistrement=-1;
								foreach ($abonnementExiste as $k=>$v) 
								{
									//9: CROSS TRAINING
                                    if($v['idFormule']==9 || $v['idFormule']==10)
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
										$placeRestante=$lesCoursCrossTraining->find(array("conditions"=>"id=".$_GET['id']));
										
                                        
                                                                              
										
										//$idDuCours=$placeRestante[0]['idTypeFitGroup'];
										
										
										
										//teste pour savoir si la date n'est pas passée
										
										/*echo strtotime(date('Y-m-d'))." ";
										echo strtotime($placeRestante[0]['date']);
										*/
										
										if(strtotime($placeRestante[0]['date'])>=strtotime(date('Y-m-d')))
										{
										
                                            
                                            /* Si 2h10 avant */
                                            
                                            $dateDuCours=$placeRestante[0]['date'];
				                        $heureDuCours=$placeRestante[0]['heure'];
                                            				$dateHeure=$dateDuCours.' '.$heureDuCours;
				
				
			
				
				$dateJour=date('Y-m-d H:i:s');
				
				//echo $dateJour;
				$dateJourPlus2h10=date('Y-m-d H:i:s',strtotime('+2 hour 10 minutes',strtotime($dateJour)));
                                            
           
				
//A RAJOUTER				
				
				//if(strtotime($dateJourPlus2h10)<strtotime($dateHeure))
                 
                                            
                 //si nous sommes avant 14h le jour meme 
                                           if(strtotime($placeRestante[0]['date'])==strtotime(date('Y-m-d')) && date("G")>=14)
                                            {
										      $reponse.="Vous ne pouvez pas vous inscrire à un cours après 14h. Contactez Alex ou Pascal pour voir les possibilités" ;
                                            }
                                            else                     
                                                                    
                                            
				{
							
						
                                            
                                            
                                            
                                            
                                            
                                            
                                            
										
										//print_r($placeRestante);
										
										if(!empty($placeRestante))
										{
												
											//echo $placeRestante[0]['nombrePlaces'];
											
											//recupere le nom du cours
											//$lesCours=$type->find(array("conditions"=>"id=".$idDuCours));
												
$nomDuCours="CROSS TRAINING";											
															
											if($placeRestante[0]['nombrePlaces']>0)
											{
												//je peux reserver
												
												$reservationOk=$reservationCrossTraining->save(array("idClient"=>$idClient,"idCoursCrossTraining"=>$_GET['id']));
												
												$reponse.="Votre réservation a été effectuée pour le cours de ".$nomDuCours." du ".$placeRestante[0]['date']." à ".$placeRestante[0]['heure']."";
												
												//je décrémente le nombre de séance effectué
												$nbSeanceRestante=$abonnementExiste[$enregistrement]['nbSeancesRestantes']-1;
												
												$abonnements->save(array("id"=>$idAbonnement,"nbSeancesRestantes"=>$nbSeanceRestante));
												
												
												
												
												//je décremente le nombre de place dela séance
												
												$nbPl=$placeRestante[0]['nombrePlaces']-1;
												
												$lesCoursCrossTraining->save(array("id"=>$_GET['id'],"nombrePlaces"=>$nbPl));	
												
												
												$nb=$nbPl;
												
												//le mail
												$mois=array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"); 
												
												$laDate=explode('-',$placeRestante[0]['date']);
												$num=$laDate[2];
												$leMois=$mois[intval($laDate[1])];
												$annee=$laDate[0];
												
												$lesJours=array("dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi");
											
											
												$timestamp = mktime(0, 0, 0, $laDate[1], $laDate[2], $laDate[0]);
												$jour = $lesJours[intval(date('w', $timestamp))];
												
												
												//j'envoie un mail à faire
											
													if ($nbSeanceRestante>1) $texte="séances"; else $texte="séance";

												//j'envoie un mail à faire
											
												$contenuMail="<p>Bonjour $prenom</p>";
												$contenuMail.="<p>Votre réservation a été effectuée pour le cours de <span class='rose'> ".$nomDuCours."</span> du <span class='rose'> ".$jour." ".$num." ".$leMois." ".$annee." </span> à <span class='rose'> ".$placeRestante[0]['heure']."</span></p>";
												$contenuMail.="<p>Pour votre information, il vous reste <span class='rose'>".$nbSeanceRestante." ".$texte." </span>sur votre abonnement CROSS TRAINING.</p> ";
												$contenuMail.="<p>Merci de la confiance que vous nous accordez,</p>
	<p>Au plaisir de vous voir pour votre prochaine séance,</p>
	<p>Sportivement,</p>
	<p>Vos coach : Alexandre Bares et Pascal Mas </p>
	<p class=\"petit\">Les séances pour lesquelles vous êtes inscrits vous sont déjà décomptées</p>";
	
	
		
		
												
												
												
																
												
											}
											else {
												$reponse.="Il n'y a plus de place";
											}			
										}
                                    
									
									else
										{
											$reponse.="problème de cours";
										}
										
									}
                                            
                                   /* else{
                                            $reponse.="la réservation est possible 2h10 avant le début d'un cours";
                                    }*/
                                }
										else
										{
											$reponse.="la date de ce cours est antérieure à la date d'aujourd'hui. la réservation ne peut pas avoir lieu";
										
										}
										
										
										
									}
									else
											$reponse.="Vous avez épuissé le nombre de séances de votre abonnement";
									
									
									
									
								}
								else 
									$reponse.="Votre abonnement n'est plus valable (validité de 4 mois) ";
								
								
								
								
								
								
							}
							
							else
								$reponse.="Vous n'avez pas d'abonnement CROSS TRAINING ";	
								
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
	
	
		$tabRep=array("texte"=>$reponse,"valPlace"=>$nb,"adresseMail"=>$mail,"contenuMail"=>$contenuMail);
	
	echo json_encode($tabRep);

?>