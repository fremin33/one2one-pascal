<?php include('controller.php'); ?>

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

