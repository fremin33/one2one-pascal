<?php

	if(isset($_POST['id']) && !empty($_POST['id']) )
	{
			
		include('../core/core.php');
			
		$coursFitGroup=Model::load("coursFitGroup");
		
		$coursFitGroup->deleteAll($_POST['id'])	;
			
		
		echo 'suppression effectué';
		
	}



?>