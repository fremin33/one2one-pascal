<?php

	if(isset($_POST['id']) && !empty($_POST['id']) )
	{
			
		include('../core/core.php');
			
		$coursCrossTraining=Model::load("coursCrossTraining");
		
		$coursCrossTraining->deleteAll($_POST['id'])	;
			
		
		echo 'suppression effectué';
		
	}



?>