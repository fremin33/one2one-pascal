<?php
	require("core/core.php");
	$clients=Model::load("clients");
	$abonnements=Model::load("abonnements");
	$formules=Model::load("formules");


	$listeClientFitGroup=array();
	$listeClientFitOne=array();
	$listeClientFitOneDuo=array();
	$listeClientFitOneTrio=array();
	$listeClientFitTeam=array();
    $listeClientCrossTraining=array();
    $listeClientCarte=array();
	$sans=array();
	
	//LEs différents clients
	
	$lesAbonnements=$abonnements->find(array('fields'=>'idFormule, clients.id, nbSeancesRestantes, date, nom, prenom, numCarte','othertable'=>"clients", 'conditions'=>'idClient=clients.id','order'=>'nom'));

	//Pour chaque client recherche de  ses abonnements
	// recheche des clients FIT GROUP
	
	
	
	foreach ($lesAbonnements as $key => $value) {
			
			if($value['idFormule']==5 || $value['idFormule']==6 )
			{
				array_push($listeClientFitGroup,$value);
				
			}
			
			if($value['idFormule']==7 || $value['idFormule']==8 )
			{
				array_push($listeClientFitTeam,$value);
				
			}
			
			if($value['idFormule']==1 )
			{
				array_push($listeClientFitOne,$value);
				
			}
			
				if($value['idFormule']==2 )
			{
				array_push($listeClientFitOneDuo,$value);
				
			}
			
				if($value['idFormule']==3 )
			{
				array_push($listeClientFitOneTrio,$value);
				
			}
        
        
            if($value['idFormule']==9 )
			{
				array_push($listeClientCrossTraining,$value);
				
			}
        
        
        
            if($value['idFormule']==10 )
			{
				array_push($listeClientCarte,$value);
				
			}
	
			
	
		//<ec></ec>ho "<p>toto</p>";	
		//$lesAbonnements=$abonnements->find(array('conditions'=>'idClient='.$value['id']));
			
	}	 
	
	//sans abonnement
	$sans=$clients->find(array('fields'=>'id,nom, prenom, numCarte', 'conditions'=>'id NOT IN (SELECT abonnements.idClient FROM abonnements)','order'=>'nom'));
	
	
	
	


	

	
	include 'view.php';
?>