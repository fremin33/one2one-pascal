<?php include('controller.php'); ?>

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
<div id="myModal2" class="reveal-modal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">INSCRIRE UN CLIENT</h3>
  </div>
  <div class="modal-body">
    
    
    <form id="inscriptionCoursFitGroup" method="post" action="" >
    	<p class="text-center"><label for="numCarte">Saisir votre numéro de carte client</label></p>
    	<p class="text-center"><input type="text" name="numCarte" id="numCarte" value="" /></p>
    	
    	<input type="hidden" name="id" id="idCoursIns" value="" />
    	
    	
    	 
    
   <p> 
   	<input type="button"  id="inscriptionCours" class="btn centerAlign" value="M'INSCRIRE" onclick="enregistrementInscription()"/>
    <input type="button"  id="desinscriptionCours" class="btn centerAlign" value="ME DESINSCRIRE" onclick="desincriptionInscription()"/></p>
  
</div>

    	
    </form>
    
   
  </div>
 
  <a class="close-reveal-modal">&#215;</a>

</div>