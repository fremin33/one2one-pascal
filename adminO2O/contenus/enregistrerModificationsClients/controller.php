<?php
	
	
	$clients=Model::load("clients");
	$abonnements=Model::load("abonnements");
	$formules=Model::load("formules");
	
	
	$okClients=false;
	$okAbonnementFitOne=false;
	$okAbonnementFitGroup=false;
	$okAbonnementFitDuo=false;
	$okAbonnementFitTrio=false;
	$okAbonnementFitTeam=false;
    $okAbonnementCrossTraining=false; 
$okAbonnementCarte=false;
	
	$nbFitOne=0;
	$nbFitGroup=0;
	
	$reponse="";
	
	//enregistrer les modifications d'un client
	
	
	$data_clients=array(
		"id"=>$_POST['id'],
		"nom"=>$_POST['nom'],
		"prenom"=>$_POST['prenom'],
		"numCarte"=>$_POST['numCarte'],
		"adresse"=>$_POST['adresse'],
		"tel"=>$_POST['tel'],
		"email"=>$_POST['email']		
		);
	

	echo "<p>num carte : ".$_POST['numCarte']."</p>";
	echo  "<p>id : ".$_POST['id']."</p>";
	//verification du numero de carte
	$idClient=$clients->find(array("fields"=>'id',"conditions"=>'numCarte='.$_POST['numCarte'].' and id!='.$_POST['id']));

//echo $idClient;

		$idClient=current($idClient);

	
	

	
	
	if(empty($idClient)){
	
	
	//enregistrement des modifications
	
		$okClients=$clients->save($data_clients);
		$reponse="les données ont été modifiées";
	}
	else {
		$reponse="le numéro de carte existe déjà. les données n'ont pas été modifiées";
	}
	
	//Modifications des abonnements
	
	
	if(isset($_POST['idfitOne']) && isset($_POST['formuleFitOne']))
	{
				
		$data_Fit_one=array(
			"id"=>$_POST['idfitOne'],
			"nbSeancesRestantes"=>$_POST["nbSeanceOne"],
			"date"=>$_POST["dateFitOne"]		
		);
		
		$modifFitOne=$abonnements->save($data_Fit_one);
		
		
	
	}
	
	else {
		if (!isset($_POST['formuleFitOne']) &&  isset($_POST['idfitOne']))
			{
				$modifFitOne=$abonnements->deleteAll($_POST['idfitOne']);
				
			}
		else
		{
			//AJOUT
			if(isset($_POST['formuleFitOne']))
			{
				$data_Fit_one=array(
						"nbSeancesRestantes"=>$_POST["nbSeanceOne"],
						"date"=>$_POST["dateFitOne"],
						"idClient"=>$_POST['id'],
						"idFormule"=>$_POST['formuleFitOne']
					);
		
				$modifFitOne=$abonnements->save($data_Fit_one);
				
			
			}
		}
		
		
	}
	
	
	//DUO
	
	if(isset($_POST['idfitDuo'])  && isset($_POST['formuleFitDuo']) )
	{
		$data_Fit_duo=array(
			"id"=>$_POST['idfitDuo'],
			"nbSeancesRestantes"=>$_POST["nbSeanceDuo"],
			"date"=>$_POST["dateFitDuo"]		
		);
		
		$modifFitOne=$abonnements->save($data_Fit_duo);
	
	}
	
	
	else {
		if (!isset($_POST['formuleFitDuo']) && isset($_POST['idfitDuo']))
			{
				$modifFitOne=$abonnements->deleteAll($_POST['idfitDuo']);
			}
			
		else
		{
			//AJOUT
			if(isset($_POST['formuleFitDuo']) )
			{
				$data_Fit_duo=array(
				
				"nbSeancesRestantes"=>$_POST["nbSeanceDuo"],
				"date"=>$_POST["dateFitDuo"],
				"idClient"=>$_POST['id'],
				"idFormule"=>$_POST['formuleFitDuo']				
			);
		
			$modifFitOne=$abonnements->save($data_Fit_duo);
	
	}
		
		}
	}
	
	
	
	//TRIO
	
	if(isset($_POST['idfitTrio']) &&  isset($_POST['formuleFitTrio']))
	{
		$data_Fit_trio=array(
			"id"=>$_POST['idfitTrio'],
			"nbSeancesRestantes"=>$_POST["nbSeanceTrio"],
			"date"=>$_POST["dateFitTrio"]		
		);
		
		$modifFitOne=$abonnements->save($data_Fit_trio);
	
	}

	else {
		if (!isset($_POST['formuleFitTrio']) && isset($_POST['idfitTrio']) )
			{
				$modifFitOne=$abonnements->deleteAll($_POST['idfitTrio']);
			}
		else
		{
			//ajout
			if(isset($_POST['formuleFitTrio']))
			{
				$data_Fit_trio=array(
					"nbSeancesRestantes"=>$_POST["nbSeanceTrio"],
					"date"=>$_POST["dateFitTrio"],
					"idClient"=>$_POST['id'],
					"idFormule"=>$_POST['formuleFitTrio']					
				);
				
				$modifFitOne=$abonnements->save($data_Fit_trio);
			
			}
		
		
		}
	}


	//GROUP
	if(isset($_POST['idfitGroup']) &&  isset($_POST['formuleFitGroup']))
	{
		$data_Fit_group=array(
			"id"=>$_POST['idfitGroup'],
			"nbSeancesRestantes"=>$_POST["nbSeanceGroup"],
			"date"=>$_POST["dateFitGroup"]		
		);
		
		$modifFitOne=$abonnements->save($data_Fit_group);
	
	}
	
	else {
		if (!isset($_POST['formuleFitGroup']) && isset($_POST['idfitGroup']) )
			{
				$modifFitOne=$abonnements->deleteAll($_POST['idfitGroup']);
			}
		else
		{
			//ajout
			if(isset($_POST['formuleFitGroup']))
			{
				$data_Fit_group=array(
						"nbSeancesRestantes"=>$_POST["nbSeanceGroup"],
					"date"=>$_POST["dateFitGroup"],
					"idClient"=>$_POST['id'],
					"idFormule"=>$_POST['formuleFitGroup']					
			);
		
		$modifFitOne=$abonnements->save($data_Fit_group);
	
			}
		
		
		
		}
	}
	
	//TEAM
	
	if(isset($_POST['idfitTeam'])  && isset($_POST['formuleFitTeam']))
	{
		$data_Fit_team=array(
			"id"=>$_POST['idfitTeam'],
			"nbSeancesRestantes"=>$_POST["nbSeanceTeam"],
			"date"=>$_POST["dateFitTeam"]		
		);
		
		$modifFitOne=$abonnements->save($data_Fit_team);
	
	}
	
	else {
		if (!isset($_POST['formuleFitTeam']) &&  isset($_POST['idfitTeam']))
			{
				$modifFitOne=$abonnements->deleteAll($_POST['idfitTeam']);
			}
		else
		{
			//ajout
			if(isset($_POST['formuleFitTeam']))
			{
				$data_Fit_team=array(
					"nbSeancesRestantes"=>$_POST["nbSeanceTeam"],
					"date"=>$_POST["dateFitTeam"],
					"idClient"=>$_POST['id'],
					"idFormule"=>$_POST['formuleFitTeam']						
				);
				
				$modifFitOne=$abonnements->save($data_Fit_team);
	
			}
		}
	}


    //CROSS TRAINING
	
	if(isset($_POST['idCrossTraining'])  && isset($_POST['formuleCrossTraining']))
	{
		$data_cross_training=array(
			"id"=>$_POST['idCrossTraining'],
			"nbSeancesRestantes"=>$_POST["nbSeanceCrossTraining"],
			"date"=>$_POST["dateCrossTraining"]		
		);
		
		$modifFitOne=$abonnements->save($data_cross_training);
	
	}
	
	else {
		if (!isset($_POST['formuleCrossTraining']) &&  isset($_POST['idCrossTraining']))
			{
				$modifFitOne=$abonnements->deleteAll($_POST['idCrossTraining']);
			}
		else
		{
			//ajout
			if(isset($_POST['formuleCrossTraining']))
			{
				$data_cross_training=array(
					"nbSeancesRestantes"=>$_POST["nbSeanceCrossTraining"],
					"date"=>$_POST["dateCrossTraining"],
					"idClient"=>$_POST['id'],
					"idFormule"=>$_POST['formuleCrossTraining']						
				);
				
				$modifFitOne=$abonnements->save($data_cross_training);
	
			}
		}
	}




    //CROSS TRAINING & FIT GROUP
	
	if(isset($_POST['idCarte'])  && isset($_POST['formuleFitCarte']))
	{
		$data_cross_training=array(
			"id"=>$_POST['idCarte'],
			"nbSeancesRestantes"=>$_POST["nbSeanceCarte"],
			"date"=>$_POST["dateFitCarte"]		
		);
		
		$modifFitOne=$abonnements->save($data_cross_training);
	
	}
	
	else {
		if (!isset($_POST['formuleFitCarte']) &&  isset($_POST['idCarte']))
			{
				$modifFitOne=$abonnements->deleteAll($_POST['idCarte']);
			}
		else
		{
			//ajout
			if(isset($_POST['formuleFitCarte']))
			{
				$data_cross_training=array(
					"nbSeancesRestantes"=>$_POST["nbSeanceCarte"],
					"date"=>$_POST["dateFitCarte"],
					"idClient"=>$_POST['id'],
					"idFormule"=>$_POST['formuleFitCarte']						
				);
				
				$modifFitOne=$abonnements->save($data_cross_training);
	
			}
		}
	}





	
	
	
	
	//Recuperation des infos
	
	$leClient=$clients->find(array('othertable'=>"abonnements", 'conditions'=>'idClient=clients.id and clients.id='.$_POST['id']));




  include('view.php') ; // Fait appel à la vue pour l'affichage
?>  