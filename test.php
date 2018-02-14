<?php
	$dateJour=date('Y-m-d H:i:s');
				
				//echo $dateJour;
				$dateJourPlus2h10=date('Y-m-d H:i:s',strtotime('+4 hour 10 minutes',strtotime($dateJour)));
                                            
            echo $dateJourPlus2h10;
?>