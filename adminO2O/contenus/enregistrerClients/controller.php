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
	
	
	// client bien saisi attention verifier l'unicité de la carte
	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['numCarte']) && isset($_POST['tel']) && isset($_POST['email']))
	{
	
		
	
	
	
	$data_clients=array(
		"nom"=>$_POST['nom'],
		"prenom"=>$_POST['prenom'],
		"numCarte"=>$_POST['numCarte'],
		"adresse"=>$_POST['adresse'],
		"tel"=>$_POST['tel'],
		"email"=>$_POST['email']		
		);
	
	//Recuperation numero client
	$idClient=$clients->find(array("fields"=>'id',"conditions"=>'numCarte='.$_POST['numCarte']));
	
		$idClient=current($idClient);

	
	echo "<pre>";
	echo print_r($_POST);
	echo "</pre>";

	
	
	if(empty($idClient)){
		//enregistrement du client
		$okClients=$clients->save($data_clients);
		
		//Recuperation numero client
	$idClient=$clients->find(array("fields"=>'id',"conditions"=>'numCarte='.$_POST['numCarte']));
	
		$idClient=current($idClient);

		
		//abonnement Fit One
		
		if(isset($_POST['formuleFitOne']))
		{
				
			//Recherche nombre de séances
			//$nb=$formules->find(array("fields"=>'nombreSeances',"conditions"=>'id='.$_POST['formuleFitOne']));
			
			//$nb=current($nb);	
			
			//$nbFitOne=$nb['nombreSeances'];
				
			$data_formule=array(
				"idClient"=>$idClient['id'],
				"idFormule"=>$_POST['formuleFitOne'],
				"date"=>$_POST['dateFitOne'],
				"nbSeancesRestantes"=>$_POST['nbSeanceOne']
			);
			
			$okAbonnementFitOne=$abonnements->save($data_formule);
			
		}	


			//abonnement Fit One Duo
		
		if(isset($_POST['formuleFitDuo']))
		{
				
			//Recherche nombre de séances
			//$nb=$formules->find(array("fields"=>'nombreSeances',"conditions"=>'id='.$_POST['formuleFitOne']));
			
			//$nb=current($nb);	
			
			//$nbFitOne=$nb['nombreSeances'];
				
			$data_formule=array(
				"idClient"=>$idClient['id'],
				"idFormule"=>$_POST['formuleFitDuo'],
				"date"=>$_POST['dateFitDuo'],
				"nbSeancesRestantes"=>$_POST['nbSeanceDuo']
			);
			
			$okAbonnementFitDuo=$abonnements->save($data_formule);
			
		}	
		
		
			if(isset($_POST['formuleFitTrio']))
		{
				
			//Recherche nombre de séances
			//$nb=$formules->find(array("fields"=>'nombreSeances',"conditions"=>'id='.$_POST['formuleFitOne']));
			
			//$nb=current($nb);	
			
			//$nbFitOne=$nb['nombreSeances'];
				
			$data_formule=array(
				"idClient"=>$idClient['id'],
				"idFormule"=>$_POST['formuleFitTrio'],
				"date"=>$_POST['dateFitTrio'],
				"nbSeancesRestantes"=>$_POST['nbSeanceTrio']
			);
			
			$okAbonnementFitTrio=$abonnements->save($data_formule);
			
		}	
		
	
		//abonnement Fit Group
		if(isset($_POST['formuleFitGroup']))
		{
				
			//Recherche nombre de séances
		//	$nb=$formules->find(array("fields"=>'nombreSeances',"conditions"=>'id='.$_POST['formuleFitGroup']));
			//$nb=current($nb);	
				
		//	$nbFitGroup=$nb['nombreSeances'];		
							
			$data_formule=array(
				"idClient"=>$idClient['id'],
				"idFormule"=>$_POST['formuleFitGroup'],
				"date"=>$_POST['dateFitGroup'],
				"nbSeancesRestantes"=>$_POST['nbSeanceGroup']
			
			);
			
			$okAbonnementFitGroup=$abonnements->save($data_formule);
		}
	
	
		//abonnement Fit Team
		if(isset($_POST['formuleFitTeam']))
		{
				
			//Recherche nombre de séances
		//	$nb=$formules->find(array("fields"=>'nombreSeances',"conditions"=>'id='.$_POST['formuleFitTeam']));
			//$nb=current($nb);	
				
			//$nbFitTeam=$nb['nombreSeances'];		
							
			$data_formule=array(
				"idClient"=>$idClient['id'],
				"idFormule"=>$_POST['formuleFitTeam'],
				"date"=>$_POST['dateFitTeam'],
				"nbSeancesRestantes"=>$_POST['nbSeanceTeam']
			
			);
			
			$okAbonnementFitTeam=$abonnements->save($data_formule);
		}
	
        
        //abonnement Cross training
		if(isset($_POST['formuleCrossTraining']))
		{
				
			//Recherche nombre de séances
		//	$nb=$formules->find(array("fields"=>'nombreSeances',"conditions"=>'id='.$_POST['formuleFitTeam']));
			//$nb=current($nb);	
				
			//$nbFitTeam=$nb['nombreSeances'];		
							
			$data_formule=array(
				"idClient"=>$idClient['id'],
				"idFormule"=>$_POST['formuleCrossTraining'],
				"date"=>$_POST['dateCrossTraining'],
				"nbSeancesRestantes"=>$_POST['nbSeanceCrossTraining']
			
			);
			
			$okAbonnementCrossTraining=$abonnements->save($data_formule);
		}
        
        
        
        
         //abonnement CARTE UNIQUE
		if(isset($_POST['formuleFitCarte']))
		{
				
			//Recherche nombre de séances
		//	$nb=$formules->find(array("fields"=>'nombreSeances',"conditions"=>'id='.$_POST['formuleFitTeam']));
			//$nb=current($nb);	
				
			//$nbFitTeam=$nb['nombreSeances'];		
							
			$data_formule=array(
				"idClient"=>$idClient['id'],
				"idFormule"=>$_POST['formuleFitCarte'],
				"date"=>$_POST['dateFitCarte'],
				"nbSeancesRestantes"=>$_POST['nbSeanceCarte']
			
			);
			
			$okAbonnementCarte=$abonnements->save($data_formule);
		}
        
        
        
	
	
	
		
	
		
	}
	else {
		echo " le numéro du client existe déjà. Il faut le recréer.";
		
	}

}



  include('view.php') ; // Fait appel à la vue pour l'affichage
?>  