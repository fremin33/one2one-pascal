<?php
	include("../../core/core.php");
	include("envoiMail.php");
	$clients=Model::load("clients");
	$abonnements=Model::load("abonnements");
	$formules=Model::load("formules");
	
		
	$message="";	
	
	
	//Recuperation  de tous les clients 
	$idClient=$clients->find(array());
	
	echo "<pre>";
	print_r($idClient);
	echo "</pre>";

    echo "<p>NB clients : ".count($idClient)."</p>";
	
	
	
	foreach($idClient as $unClient)
	{
		//recherche de ses abonnements
		$okAbonnementFitGroup=$abonnements->find(array("othertable"=>formules,"conditions"=>"formules.id=idFormule and idClient=".$unClient["id"]));
		
		$reponse="<p>Bonjour ".$unClient["prenom"]."</p>";
		$reponse.="<p>Il vous reste : </p><ul>";
		
		foreach($okAbonnementFitGroup as $unAbonnement)
		{
			//print_r($unAbonnement);
			
			$reponse.="<li>pour votre adhésion <span class=\"rose\">".$unAbonnement["nom"]." : ".$unAbonnement["nbSeancesRestantes"]." séance(s) </span> valable(s) jusqu'au <span class=\"rose\">".date("d/m/Y",strtotime($unAbonnement["date"]))."</span></li>";
		
		
		}
		
		$reponse.="</ul>";
		
		$reponse.="<p><a href=\"http://one2one-larochelle.com/fit-group.php\">cliquez ici pour réserver votre prochaine séance</a> puis cliquez sur le calendrier en bas de la page</p>
		<p>Merci de la confiance que vous nous accordez,</p>
	<p>Au plaisir de vous voir pour votre prochaine séance,</p>
	<p>Sportivement,</p>
	<p>Vos coach : Alexandre Bares et Pascal Mas </p>
	<p class=\"petit\">Les séances pour lesquelles vous êtes inscrits vous sont déjà décomptées</p>";
	
	
		
		//envoyerUnMail($unClient["email"],$reponse);
	
	}

	
	

	/*
	
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
	
	
	
		
	
		
	}
	else {
		echo " le numéro du client existe déjà. Il faut le recréer.";
		
	}

}



  include('view.php') ; // Fait appel à la vue pour l'affichage
  
  */
?>  