<div  class="lesCours">
	
        <table class="tableauLesCours">	
        	
            <!--Creation du cours CROSS TRAINING-->
        	
        	   <tr><td class="drop">
                        <div class="item">
                           
                            <p>CROSS</p><p>TRAINING</p>
                            <p class="nbPlace">6</p>
                        </div></td></tr>
				
			 
        	
        </table>
</div>
	
	






<div id="calendrier" class="left">




<div id="titreMois" align="center">
	
	<p>
    	<a id="preDate" href="?week=pre&date=<?php echo $tableauCalendrier['infos']['dateDebutSemaine'] ; ?>"><<</a>
    	<span id="maDate" class='<?php echo $tableauCalendrier['infos']['dateDebutSemaine'] ; ?> '> SEMAINE  <?php echo $tableauCalendrier['infos']['numSemaine'] ?> 
    
    DU 
    
    <?php echo $tableauCalendrier['infos']['jourDebut'] ?>
     <?php echo $tableauCalendrier['infos']['moisDebut']; ?> AU <?php echo $tableauCalendrier['infos']['jourFin'] ; ?> <?php echo $tableauCalendrier['infos']['moisFin']; ?></span>
     <a id="nextDate" href="?week=next&date=<?php echo $tableauCalendrier['infos']['dateDebutSemaine'] ; ?>">>></a>
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
							if (!empty($case['contenu']))
							{
								echo '<td id="'.$case['id'].'" class="drop '.$case['classe'].'" onclick="inscription('.$case['idCours'].')" >';
								echo '<div class="item assigned">'.$case['contenu'].'</div>';
							} 
							else {
								echo '<td id="'.$case['id'].'" class="drop '.$case['classe'].'" >';
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
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Creation d'un cours FIT GROUP</h3>
  </div>
  <div class="modal-body">
    <p>Le cours que vous déposez est uniquement pour <strong>la semaine <?php echo $tableauCalendrier['infos']['numSemaine']; ?></strong> </p>
    <p> </p>
    <p class="aCacher">Si vous voulez ajouter des semaines, saisissez sous <em>la forme 35-40 (cours pour les semaines 35 à 40)</em> </p>
    
    <form id="enregistementCoursFitGroup" method="post" action="" >
    	<p class="aCacher"><label for="">Autres semaines</label></p>
    	<input type="text" name="lesSemaines" id="listeSemaines" class="aCacher" value="" />
    	
    	<input type="hidden" name="idTypeCours" id="idFG" value="" />
    	<input type="hidden" name="idCours" id="idCoursFG" value="" />
    	<input type="hidden" name="heure" id="heureFG" value="" />
    	<input type="hidden" name="date" id="dateFG" value="" />
    	<input type="hidden" name="place" id="placeFG" value="" />
    	
    	 <div class="modal-footer">
    <!--<button  class="btn" data-dismiss="modal" aria-hidden="true">Close</button>-->
    <input type="submit"  class=" btn btn-primary centerAlign" text="Enregistrer"></button>
  </div>
</div>

    	
    </form>
    
    
  </div>
 























</div>