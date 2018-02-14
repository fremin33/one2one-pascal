
 
<?php
  	
  	$texteFitOne="";
	$texteFitDuo="";
	$texteFitTrio="";
  	$texteFitGroup="";
	$texteFitTeam="";
	
	$rep="";
  	
	if($okAbonnementFitOne===true) {if($_POST['nbSeanceOne']>1) $seance="séances"; else $seance="séance";
									$rep.="<li> une adhésion FIT ONE de ".$_POST['nbSeanceOne']." ".$seance." valable jusqu'au <span class=\"rose\">".$_POST['dateFitOne']."</span></li>";}
	
	if($okAbonnementFitDuo===true) {if($_POST['nbSeanceDuo']>1) $seance="séances"; else $seance="séance";
									$rep.="<li> une adhésion FIT ONE à 2 de ".$_POST['nbSeanceDuo']." ".$seance." valable jusqu'au <span class=\"rose\">".$_POST['dateFitDuo']."</span></li>";}
	
	if($okAbonnementFitTrio===true) {if($_POST['nbSeanceTrio']>1) $seance="séances"; else $seance="séance";
									$rep.="<li> une adhésion FIT ONE à 3 de ".$_POST['nbSeanceTrio']." ".$seance." valable jusqu'au <span class=\"rose\">".$_POST['dateFitTrio']."</span></li>";}
	
	
	if($okAbonnementFitGroup===true) {if($_POST['nbSeanceGroup']>1) $seance="séances"; else $seance="séance";	
										$rep.="<li>  une adhésion FIT GROUP de ".$_POST['nbSeanceGroup']." ".$seance." valable jusqu'au <span class=\"rose\">".$_POST['dateFitGroup']."</span></li>";}
	
	if($okAbonnementFitTeam===true) {if($_POST['nbSeanceTeam']>1) $seance="séances"; else $seance="séance";
		$rep.="<li>  une adhésion FIT TEAM de ".$_POST['nbSeanceTeam']." ".$seance." valable jusqu'au <span class=\"rose\">".$_POST['dateFitTeam']."</span></li>";}
	
	
	if($okClients===true) {
		echo "<h3>INSCRIPTION CLIENT</h3>";
		echo "<p>le client ".$_POST['nom']." ".$_POST['prenom']." a bien été enregistré</p><p>Il a soucrit à </p><ul>$rep</ul>";
	
	
	
		
	
	
		include 'envoiMail.php';
	
	}
	







?>
	
	
	

 