<?php
	/*echo '<pre>';
	print_r($_POST);
	echo '</pre>';*/
	
	
	include('../core/core.php');
	
	
	$coursFitGroup=Model::load("coursFitGroup");
	
	
	$reponse="";
	
	
	
	//Modification du cours
	if(isset($_POST['idCours']) && !empty($_POST['idCours']))
	{
		
		$unCoursPresent=$coursFitGroup->find(array("conditions"=>"date='".$_POST['date']. "' AND heure='".$_POST['heure']."'"));
		
		
		if (empty($unCoursPresent)) 
		{
			$data=array(
				"id"=>$_POST['idCours'],
				"idTypeFitGroup"=>$_POST['idTypeCours'],
				"date" =>$_POST['date'],
				"heure" =>$_POST['heure'],
				"nombrePlaces"=>$_POST['place']
			);
		
			$coursFitGroup->save($data);
		
		}
		
	}
	else 
	{
		
		//insertion d'un nouveau cours	
	
		$unCoursPresent=$coursFitGroup->find(array("conditions"=>"date='".$_POST['date']. "' AND heure='".$_POST['heure']."'"));
		
		if (empty($unCoursPresent)) 
		{
			$data=array(
				"idTypeFitGroup"=>$_POST['idTypeCours'],
				"date" =>$_POST['date'],
				"heure" =>$_POST['heure'],
				"nombrePlaces"=>$_POST['place']
			);
		
			$coursFitGroup->save($data);
		}	
		
		else {
			$reponse="<p>Le cours du ".$_POST['date']." à ".$_POST['heure']."n 'a pas pas etre ajouté car un cours est présent</p>";
		}
	
	}
	
	if(isset($_POST['lesSemaines']) && !empty($_POST['lesSemaines']))
	{
		
		$semaines=$_POST['lesSemaines'];
	
		$semaines=explode('-',$semaines);
		
		if(!isset($semaines[1])) $semaines[1]=$semaines[0]+1;
		
		$date=$_POST['date'];
		
		$date=explode('-',$date);
		
		for($i=1;$i<=$semaines[1]-$semaines[0];$i++)
		{
			$date1=date("Y-m-d", mktime(0, 0, 0, $date[1]  , $date[2]+(7*$i), $date[0]));
			
			echo $date1;
			
			$unCoursPresent=$coursFitGroup->find(array("conditions"=>"date='".$date1. "' AND heure='".$_POST['heure']."'"));
	
	
			if (empty($unCoursPresent)) 
			{
				$data=array(
					"idTypeFitGroup"=>$_POST['idTypeCours'],
					"date" =>$date1,
					"heure" =>$_POST['heure'],
					"nombrePlaces"=>$_POST['place']
	
				);
				$coursFitGroup->save($data);
			}
			else {
				$reponse.="<p>Le cours du ".$_POST['date']." à ".$_POST['heure']."n 'a pas pas etre ajouté car un cours est présent</p>";
			}
		}
		
		
		
		
		
	}
	
	
	
	
	echo "enregistrement effectué ".$reponse;

?>