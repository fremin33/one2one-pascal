<?php
	/*echo '<pre>';
	print_r($_GET);
	echo '</pre>';*/
	
	header('content-type: text/html; charset=utf-8');
	
	include('../core/core.php');
	
	
	$clientFitGroup=Model::load("clients");
	$reservationFitGroup=Model::load("reservation");
	$lesCoursFitGroup=Model::load("coursFitGroup");
	$abonnements=Model::load("abonnements");
	
	
	
	//LEs différents clients
	
	$resa=$reservationFitGroup->find(array('fields'=>'nom, prenom, numCarte','othertable'=>"clients", 'conditions'=>'idClient=clients.id and idCoursFitGroup='.$_GET['id']));
	
	$reponse="";
	
	foreach($resa as $val)
	{
		$reponse.="<li>".$val['numCarte'].'  '.$val['nom'].'  '.$val['prenom']."</li>";
	}
	
	
	 
	
	//$tabRep=array("texte"=>$reponse,"valPlace"=>$nb);
	
	echo $reponse;

?>