<?php

	//recupération des données du client
		require("core/core.php");
	$clients=Model::load("clients");
	$abonnements=Model::load("abonnements");
	$formules=Model::load("formules");


	$leClient=array();
	
	
	//LEs différents clients
	
	$donneesClients=array();
	
	if(isset($_GET['num']) && !empty($_GET['num']))
	{
		$num=$_GET['num'];
			
		//recupération des informations	
		$leClient=$clients->find(array('othertable'=>"abonnements", 'conditions'=>'idClient=clients.id and clients.id='.$num));
	
	if (!empty($leClient)) {
		
	
	
		
	
		foreach($leClient as $k =>$v)
		{
			if($v['idFormule']==1) 
			{
				$donneesClients['fitOne']=true;
				$donneesClients['nbfitOne']=$v['nbSeancesRestantes'];
				$donneesClients['datefitOne']=$v['date'];
				$donneesClients['idfitOne']=$v['id'];
				
			}
			
			if($v['idFormule']==2) 
			{
				$donneesClients['fitDuo']=true;
				$donneesClients['nbfitDuo']=$v['nbSeancesRestantes'];
				$donneesClients['datefitDuo']=$v['date'];
				$donneesClients['idfitDuo']=$v['id'];
			}
			
			if($v['idFormule']==3) 
			{
				$donneesClients['fitTrio']=true;
				$donneesClients['nbfitTrio']=$v['nbSeancesRestantes'];
				$donneesClients['datefitTrio']=$v['date'];
				$donneesClients['idfitTrio']=$v['id'];
			}
			
			if($v['idFormule']==5) 
			{
				$donneesClients['fitGroup']=true;
				$donneesClients['nbfitGroup']=$v['nbSeancesRestantes'];
				$donneesClients['datefitGroup']=$v['date'];
				$donneesClients['idfitGroup']=$v['id'];
			}
			
			if($v['idFormule']==7) 
			{
				$donneesClients['fitTeam']=true;
				$donneesClients['nbfitTeam']=$v['nbSeancesRestantes'];
				$donneesClients['datefitTeam']=$v['date'];
				$donneesClients['idfitTeam']=$v['id'];
			}
            
            
            if($v['idFormule']==9) 
			{
				$donneesClients['crossTraining']=true;
				$donneesClients['nbCrossTraining']=$v['nbSeancesRestantes'];
				$donneesClients['dateCrossTraining']=$v['date'];
				$donneesClients['idCrossTraining']=$v['id'];
			}
		
            if($v['idFormule']==10) 
			{
				$donneesClients['carte']=true;
				$donneesClients['nbCarte']=$v['nbSeancesRestantes'];
				$donneesClients['dateFitCarte']=$v['date'];
				$donneesClients['idCarte']=$v['id'];
			}
			
		
		}
		
	}
	else
	{

		$leClient=$clients->find(array('conditions'=>'clients.id='.$num));

		$leClient[0]["idClient"]=$num;

	}
		
	
		
	
	/*echo "<pre>";
	print_r($leClient);
	echo "</pre>";*/

  	include('view.php') ;
	}
	else 
	{
		 header('Location: index.php');  	
	}
?>


