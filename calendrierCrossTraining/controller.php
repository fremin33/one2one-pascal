<?php
	include ('core/core.php');
	
	include('calendrier.php');
	
	$coursCrossTraining=Model::load("coursCrossTraining");

	$typeCrossTraining=Model::load("typeCrossTraining");
	

	//Recherche des differnts cours
	
	//$listeCours=$coursFitGroup->find();
	
		
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
	
	//echo $dateDebSemaine; 
	//echo $dateFinSemaine;
	
	
	
	
	
	
	//Recherche des differnts cours comopris entre 2 dates
	
	$lesCours=$coursCrossTraining->find(array('conditions'=>'date BETWEEN \''.$dateDebSemaine.'\' AND \''.$dateFinSemaine.'\''));
	
	
   
	
	
	
 	$tableauCalendrier= creationCalendrier($dateDebSemaine,$dateFinSemaine,$lesCours,$typeCrossTraining);
	
	/*
	echo'<pre>';
		print_r($tableauCalendrier);
	echo'</pre>';
		
		
	exit();
	*/
	
	
	
	// creation de variable
	
	/*$mois=array("janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre");
	
		
	$premierJour=explode('-',$tableauCalendrier['infos']['dateDebut']);
	$dernierJour=explode('-',$tableauCalendrier['infos']['dateFin']);
	
	
	
	$val=intval($premierJour[1])-1;
	$moisDebut=$mois[$val];
	$moisFin=$mois[(intval($dernierJour[1])-1)];
	
	
	$jour=$tableauCalendrier['infos']['jour'];

	*/
	
	//Recherche des cours de FIT GROUP

	//$lesDifferentsFitGroup=$typeFitGroup->find(array('fields'=>'id, nom'));


	




 
?>  