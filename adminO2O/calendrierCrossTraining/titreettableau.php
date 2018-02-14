
<?php

	include('controller.php');
?>

<div id="titreMois" align="center">
	
	<p>
    	<a id="preDate" href="#"><<</a>
    	<span id="maDate" class='<?php echo $tableauCalendrier['infos']['dateDebutSemaine'] ; ?> '> SEMAINE  <?php echo $tableauCalendrier['infos']['numSemaine'] ?> 
    
    DU 
    
    <?php echo $tableauCalendrier['infos']['jourDebut'] ?>
     <?php echo $tableauCalendrier['infos']['moisDebut']; ?> AU <?php echo $tableauCalendrier['infos']['jourFin'] ; ?> <?php echo $tableauCalendrier['infos']['moisFin']; ?></span>
     <a id="nextDate" href="#">>></a>
     </p>
</div>
 


<div id="calendrier" class="left">
<table class="calendrierFitGroup inscriptionFitGroup">

<?php 


	foreach ($tableauCalendrier['donnees'] as $k=> $l) {
		
		if($k==0)
		{
			echo '<tr>'	;	
			foreach ($l as $a=>$case) 
			{
						if($a==0) 
							echo '<th class="heure"></th>'; 
						else
							echo '<th>'.$case['jour'].' <span>'.$case['date'].'</span></th>';
				
			}
			echo '</tr>';	
		}
		else
			 {
			 echo '<tr class="contentCalendrier">';
			foreach ($l as $g=>$case) 
			{			
					if ($g==0) 	echo '<th id="'.$case['id'].'" class="heure">'.$case['contenu'].'</th>';
					else
						{
							if(!empty($case['contenu'])){
								
								echo '<td id="'.$case['id'].'" class="drop '.$case['classe'].' '.$case['idCours'].'" onclick="inscription('.$case['idCours'].')" >';
								echo '<div class="item assigned">'.$case['contenu'].'</div>';
															
							}
							else {
								echo '<td class="drop" >';	
							}
																				
							
							echo '</td>';
						}
			}
			echo '</tr>';	
		}
			
		
	}

?>

</table>



<!-- Modal -->
<div id="modalInscriptionDesinscription" style="display:none">
  <div class="modal-header">
        <h3 id="myModalLabel">VOTRE INSCRIPTION OU DE-INSCRIPTION</h3>
  </div>
  <div class="modal-body">
    
    
    <form id="inscriptionCoursFitGroup" method="post" action="" >
    	<p id="texteInvite" class="text-center"><label for="numCarte">Saisissez votre numéro de carte client</label></p>
    	<p class="text-center"><input type="text" name="numCarte" id="numCarte" value="" /></p>
    	
    	<p><input type="hidden" name="id" id="idCoursIns" value="" /></p>
    	
    	
    	 
    
   <div id="placementBouton"> 
   	<p id="inscriptionCours" class="btn centerAlign" onclick="enregistrementInscription()">M'INSCRIRE</p>
    <p id="desinscriptionCours" class="btn centerAlign" onclick="desincriptionInscription()">ME DESINSCRIRE</p>
   </div>
  


    	
    </form>
    
   
  </div>
 
  <a class="positionCroix" onclick="suppression()">&#215;</a>

</div>