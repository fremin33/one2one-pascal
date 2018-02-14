<?php
	include("../../core/core.php");
	include("envoiMail2.php");
	$clients=Model::load("clients");
	$abonnements=Model::load("abonnements");
	$formules=Model::load("formules");
	
		
	$message="";	
	
	
	//Recuperation  de tous les clients 
		$idClient=$clients->find(array());
	
	//Recuperation  de tous les clients FIT GROUP
	/*	$idClient=$clients->find(array("othertable"=>"abonnements, formules" , "conditions"=>"clients.id=abonnements.idClient and abonnements.idFormule=formules.id and formules.id=7 or formules.id=5 and clients.id=abonnements.idClient and abonnements.idFormule=formules.id "));
	*/
	
	//anthony BOURMAUD
	//$idClient=$clients->find(array("conditions"=>"clients.nom=\"bourmaud\""));
	
	
	echo "<pre>";
	print_r($idClient);
	echo "</pre>";
	
	echo "<p>".count($idClient)."</p>";
	
	
	
	
	
	
	
	
	
	foreach($idClient as $unClient)
	{
		//recherche de ses abonnements
	//	$okAbonnementFitGroup=$abonnements->find(array("othertable"=>formules,"conditions"=>"formules.id=idFormule and idClient=".$unClient["id"]));
		
	/*	$reponse="<p>Bonjour ".$unClient["prenom"]."</p>";
		$reponse.="<p>L’été touche à sa fin, il est donc plus que temps de penser à la rentrée sportive !</p>
		<p>Celle-ci se fera évidemment en notre compagnie au sein de <span class=\"rose\">votre salle ONE2ONE Personal Training Center.</span></p>
		
		<p>Vous découvrirez <span class=\"rose\">dès la semaine prochaine le nouveau planning de cours FIT GROUP</span>, avec des nouveautés et une programmation encore plus étoffée afin de répondre au plus près à vos attentes.</p>
		<p><span class=\"rose\">Notre concept FIT GROUP: les cours de fitness </span>  les plus mondialement reconnus enfin accessibles <span class=\"rose\">en small group (6 à  10 participants maximum )</span>. </p>
		<p>Nous savons que votre  motivation dépend essentiellement de l’attention que nous vous portons. Avec des cours collectifs à effectif réduit, vous êtes placés dans des conditions optimales de pratique.  </p>
		<p>Vous voulez vous affranchir des horaires de séances alors pensez à <span class=\"rose\">notre concept FIT TEAM : constituez votre propre équipe </span> (4 à 8 participants) et venez relever le défi en partageant un moment sportif, innovant, ludique et intense. Vous profiterez des dernières méthodologies d'entraînement de type HIIT (<span class=\"rose\">High Interval Intensity Training</span>) et de type <span class=\"rose\">CROSSFIT</span> (à partir de 13,50 EUROS / séance).</p>
		<p> Votre personal trainer sera à vos côtés tout au long de ces entraînements pour vous motiver et créer l'émulation de groupe qui vous permettra de sortir de votre zone de confort.</p>
		<p>Plus que jamais nous comptons sur vous et votre complicité pour faire découvrir à votre entourage (amis, famille, collègues de travail, voisins, …) une manière innovante d’aborder le monde de la remise en forme, du coaching sportif et du Fitness dans votre salle ONE2ONE. </p>
		<p>Invitez votre entourage à vous accompagner (gratuitement et sans engagement) à la séance de votre choix. Pour toute souscription, une offre de parrainage vous sera dédiée avec 2 séances créditées sur votre abonnement.</p>
		<p><span class=\"rose\">Notre réussite dépend aussi de vous !</span></p>
		<p>Bientôt la première date anniversaire de votre salle ONE2ONE, une surprise vous sera réservée !</p>
		
		<p>Sportivement, vos coach Alexandre et Pascal.</p>";
		
		*/
		
			/*$reponse="<p>Découvrez le <span class=\"rose\"> nouveau planning FIT GROUP™</span> de votre salle <span class=\"rose\">ONE2ONE™ PERSONAL TRAINING CENTER™ </span>: </p>
		
		<ul>
			<li><span class=\"rose\"> Plus de 25 cours collectifs…</span><br />
(exclusivement en effectifs réduits chez ONE2ONE)
</li>
			<li><span class=\"rose\"> Des nouveautés…</span><br />
(FIT CORE™, FIT STEP™, FIT BOOT™, FIT STRETCH™, FIT TEENAGER™),
</li>
			<li><span class=\"rose\"> De nouveaux horaires…</span><br />
(en matinée et en début de soirée),
</li>
			<li><span class=\"rose\"> Nos concepts FIT GROUP™ déjà plébiscités…</span><br />
(FIT BIKING™, FIT EQUILIBRE™, FIT TIMER™, FIT BARRE™)
</li>
		</ul>
		
	<p>

</p>
	En cette rentrée 2014, votre salle <span class=\"rose\"> ONE2ONE™ fête son premier anniversaire</span> : 1  an déjà que chaque jour nous mettons tout en œuvre pour vous satisfaire afin de mériter votre confiance ! 
Pour vous remercier de votre fidélité, <span class=\"rose\"> nous avons le plaisir de vous offrir une séance</span> sur votre carte d’adhérent (le crédit de celle-ci sera donc augmenté d’une unité supplémentaire dans les jours à venir).

<p>
	Enfin, et tout au long du mois de septembre, nous lançons une <span class=\"rose\"> campagne de parrainage</span> pour nous permettre, grâce à vous, de développer encore ONE2ONE : pour toute nouvelle souscription d’adhésion initiée par vos soins, nous serons ravis de vous offrir <span class=\"rose\"> 2 nouvelles séances sur votre carte.
Alors… Qu’attendez-vous ? Faites connaître autour de vous ONE2ONE™</span>, votre salle de remise en forme sur La Rochelle qui propose <span class=\"rose\"> une manière innovante d'aborder le monde du fitness et l’envie permanente de faire du sport</span>. Nous comptons sur vous !

</p>	
		
	
		
		<p>Sportivement, vos coach Alexandre, Pascal et Valérie.</p>"; */


$reponse="<p><span class=\"rose\">ONE2ONE Personal Training Center</span> crée l'événement en organisant un dîner <span class=\"rose\">\"NUTRITION et PERFORMANCE SPORTIVE : de la théorie à l'assiette...\"</span> au restaurant <span class=\"rose\">le comptoir des saveurs</span> (centre d'affaire Beaulieu 2, à côté de la salle) le <span class=\"rose\">MARDI 7 OCTOBRE à partir de 20h00.</span></p>

<p>Organisée conjointement par nos soins, le chef restaurateur <span class=\"rose\">Alain Oculi</span> et le <span class=\"rose\">Docteur Chaillé</span>, médecin nutritionniste, cette soirée sera l'occasion d'une part d'appréhender de façon ludique l'ensemble des problématiques lié à l'équilibre alimentaire et la nutrition et d'autre part de découvrir (et déguster) un menu hypocalorique (composé par le médecin nutritionniste) réalisé sous vos yeux par le chef cuisinier.</p>

<p>
Ce sera aussi l'occasion pour nous de <span class=\"rose\">faire découvrir à votre entourage notre savoir faire dans le domaine de la remise en forme et de l'accompagnement sportif</span> en profitant de cette soirée pour présenter notre outil de travail. N'hésitez donc pas à diffuser largement cette invitation afin de publiciter notre salle. En pièce jointe, vous trouverez l'invitation à cette soirée au caractère original.</p>

<p>Réservation par téléphone ou mail. </p>

<p>Comptant sur votre participation...</p>
<p>Sportivement, vos coach Alexandre, Pascal et Valérie.</p>"; 







		
//envoyerUnMail("mas.pascal@free.fr",$reponse,"soiree-nutrition-invitation.pdf","soiree-nutrition-invitation.jpg");
		
		//if(envoyerUnMail($unClient["email"],$reponse,null,"soiree-nutrition-invitation.pdf"))


	/*	if(envoyerUnMail("abourmau@univ-lr.fr",$reponse,null,"soiree-nutrition-invitation.pdf"))
		{
			echo "<p>ok: ".$unClient["email"]."</p>";
		}

		else
		{
			echo "<p>probleme : ".$unClient["email"]."</p>";
		}*/


		echo $unClient["email"].", ";
			
	
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