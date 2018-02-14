<?php
	include("core/core.php");
	
	$clients=Model::load("clients");
	$abonnements=Model::load("abonnements");
	$formules=Model::load("formules");
	
		
	$message="";	
	
	
	//Recuperation  de tous les clients 
	$clientAll=$clients->find(array());
	
	//Recuperation  de tous les clients FIT GROUP & CROSS TRAINING
	$clientGroup=$clients->find(array("othertable"=>"abonnements, formules" , "conditions"=>"clients.id=abonnements.idClient and abonnements.idFormule=formules.id and formules.id=7 or formules.id=5  
														and clients.id=abonnements.idClient and abonnements.idFormule=formules.id   "));
	
	//Recuperation  de tous les clients FIT ONE
	$clientOne=$clients->find(array("othertable"=>"abonnements, formules" , "conditions"=>"clients.id=abonnements.idClient and abonnements.idFormule=formules.id and formules.id=1 
																							or clients.id=abonnements.idClient and abonnements.idFormule=formules.id and formules.id=2
																							or clients.id=abonnements.idClient and abonnements.idFormule=formules.id and formules.id=3
																							"
																							));
	
	
	//anthony BOURMAUD
	$clientBourmaud=$clients->find(array("conditions"=>"clients.nom=\"bourmaud\""));
	
$moi=array('id' => 290, 'nom' => 'BOURMAUD', 'prenom' => 'ANTHONY', 'numCarte' => 11091976, 'adresse' =>'17000 LA ROCHELLE', 'tel' => 0667281221, 'email' => 'abourmau@univ-lr.fr' );

$clientAll[]=$moi;

print_r("nb clients ".count($clientAll));







 include('view.php') ; // Fait appel à la vue pour l'affichage
  
  
?>  