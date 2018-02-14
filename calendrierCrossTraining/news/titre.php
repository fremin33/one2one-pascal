
<?php

	include('controller.php');



    echo	'<span id=\'maDate\' class=\''.$tableauCalendrier['infos']['dateDebutSemaine'].'\'> SEMAINE <span class=\'numeroSemaine\'>'.$tableauCalendrier['infos']['numSemaine'].'</span> DU '.
    
    			$tableauCalendrier['infos']['jourDebut'].' '.
     			$tableauCalendrier['infos']['moisDebut'].' AU '.$tableauCalendrier['infos']['jourFin'].' '.$tableauCalendrier['infos']['moisFin'].'</span>';
     
?>