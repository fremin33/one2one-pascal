<?php
	include ('../../core/core.php');
	
	include('../calendrier.php');
	
	$coursFitGroup=Model::load("coursFitGroup");
	$typeFitGroup=Model::load("typeFitGroup");

	
	
	

	//Recherche des differnts cours
	
	$listeCours=$coursFitGroup->find();
	
		
	//Variable
	$jour = date("w"); // numéro du jour actuel
	
	$nom_mois = date("F"); // nom du mois actuel
	$annee = date("Y"); // année actuelle
	$num_week = date("W"); // numéro de la semaine actuelle
	
	$dateJour=date('Y-m-d');
	
	
	
	
	
	//Creation de la date de debut et de la date de fin de semaine
	
		$nbChaine='-'.($jour-1).'day';
		$nbfin='+'.(7-$jour).'day';		
		
		$dateDebSemaine = date('Y-m-d',strtotime($nbChaine,strtotime($dateJour)));
		$dateFinSemaine = date('Y-m-d',strtotime($nbfin,strtotime($dateJour)));
		
	
	if($jour==0)
	{
		$dateDebSemaine = date('Y-m-d',strtotime('-6 day',strtotime($dateJour)));
		$dateFinSemaine = date('Y-m-d',strtotime(($dateJour)));
	}
	
	
	
	
	
	
	
	//decalage de semaine
	
	if(isset($_GET['week'])) {
		
		
		
		$dateD=$_GET['date'];
		$dateF= date('Y-m-d',strtotime('+6 day',strtotime($dateD)));
		
		if($_GET['week']=='next')
		{
			$dateDebSemaine = date('Y-m-d',strtotime('+1 week',strtotime($dateD)));
			$dateFinSemaine = date('Y-m-d',strtotime('+1 week',strtotime($dateF)));
		}
		else
			{
				$dateDebSemaine = date('Y-m-d',strtotime('-1 week',strtotime($dateD)));
			$dateFinSemaine = date('Y-m-d',strtotime('-1 week',strtotime($dateF)));
			}
		
	}
	
	$jourTexte = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
	$plageH = array('09:00:00', '10:00:00', '11:30:00', '12:30:00', '17:30:00', '19:00:00');
	 
	$nom_mois =array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
	 
	 
	 
	 //creation des variables
	 $explodeDebut=explode('-',$dateDebSemaine);
	 $jourDebut=$explodeDebut[2];
	 $moisDebut=$nom_mois[$explodeDebut[1]-1];
	 $anneeDebut=$explodeDebut[0];
	 
	 
	 
	  $explodeFin=explode('-',$dateFinSemaine);
	  $jourFin=$explodeFin[2];
	 $moisFin=$nom_mois[$explodeFin[1]-1];
	 $anneeFin=$explodeFin[0];
	 
	 
	$num_week = date("W",strtotime($dateDebSemaine)); // numéro de la semaine actuelle
	



	    echo	'<span id=\'maDate\' class=\''.$dateDebSemaine.'\'> SEMAINE <span class=\'numeroSemaine\'>'.$num_week.'</span> DU '.
    
    			$jourDebut.' '.
     			$moisDebut.' AU '.$jourFin.' '.$moisFin.'</span>';




 
?>  