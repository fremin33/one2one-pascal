<?php



function creationCalendrier ($dateDebSemaine,$dateFinSemaine,$listeCours,$typeFitGroup) {


	
	
	
	

	
	
	     

		
	$jourTexte = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
		 
	$nom_mois =array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
	 
	 
	 
	 //creation des variables
	 $explodeDebut=explode('-',$dateDebSemaine);
	 $jourDebut=$explodeDebut[2];
	 $moisDebut=$nom_mois[$explodeDebut[1]-1];
	 $anneeDebut=$explodeDebut[0];
	 
	 
	 
	  $explodeFin=explode('-',$dateFinSemaine);
	  $jourFin=$explodeFin[2];
	 $moisFin=$nom_mois[$explodeFin[1]-1];
	 $anneeFin=$explodeFin[0];
	 
	 
	$num_week = date("W",strtotime($dateDebSemaine)); // numéro de la semaine actuelle
	
      if((($num_week>=36) && ($anneeDebut>=2017)) || ($anneeDebut>=2018) )
    {
        $plageH = array('11:00:00','12:30:00','18:30:00', '19:45:00'); 
    }
    
    else{
    
          if(($num_week>=13)&& $anneeDebut>=2017)
        {
            $plageH = array('11:00:00','18:30:00', '19:45:00'); 
        }

        else{


        if((($num_week<37)&& $anneeDebut==2014) || ($anneeDebut<2014))	
            $plageH = array('09:00:00', '10:00:00', '11:30:00', '12:30:00', '18:00:00', '19:15:00');

        else
        {
             if((($num_week>=23)&& $anneeDebut==2016) || $anneeDebut>=2017) 
                $plageH = array('18:40:00', '19:45:00');
           else
           {
            if((($num_week>=9)&& $anneeDebut==2016) ) 
                $plageH = array('10:15:00', '11:30:00', '12:30:00', '17:30:00', '18:40:00', '19:45:00');
           else
                $plageH = array('10:15:00', '11:30:00', '12:30:00', '17:00:00', '18:15:00', '19:30:00');
           }
        }
        }
    }
	
	 $tableauCalendrier=array("infos"=>array("jourDebut"=>$jourDebut,"moisDebut"=>$moisDebut,"anneeDebut"=>$anneeDebut,
	 										"jourFin"=>$jourFin,"moisFin"=>$moisFin,"anneeFin"=>$anneeFin,
											"numSemaine"=>$num_week,"dateDebutSemaine"=>$dateDebSemaine));
	 
	 /*
	 echo '<pre>';
	 print_r($tableauCalendrier);
	 echo '</pre>';
	 exit();
	 */
	 
	 $tableauSemaine=array();
	
	 $entete=array();
	    // en tête de colonne  
	    $t1=array('jour'=>'','date'=>'');
		array_push($entete,$t1);
		
		
		$jourDebut=date('d',strtotime($dateDebSemaine));
		$jourComplet=$dateDebSemaine;
		
		
		foreach ($jourTexte as $k=> $v) {
			$t=array('jour'=>$v,"date"=>$jourDebut);
			array_push($entete,$t);
			$jourComplet=date('Y-m-d',strtotime('+1 day',strtotime($jourComplet)));
			$jourDebut=date('d',strtotime($jourComplet));
		
		}
	    
	      array_push( $tableauSemaine,$entete);
		;
	 
	    // les 2 plages horaires : matin - midi
	 
	 $ligne=array();
	  $contenu="";
	  $classe="";
	  $idCours="";
	  
	  
	  
	   foreach ($plageH as $k=> $v)
	     {
	   		$t=array("contenu"=>substr($v,0,-3),"id"=>'',"classe"=>'');
	   	array_push($ligne,$t);
	        // les infos pour chaque jour
	            for ($j = 0; $j < 7; $j++)
	            {
	            		
					$chaine='+'.$j.' day';	
	            	$id=date("Y-m-d", strtotime($chaine,strtotime($dateDebSemaine))).'_'.$v;
					
				
	               
				   
					
					foreach ($listeCours as $key => $value) 
					{
							
							
							
							
						$dateHeure=$value['date'].'_'.$value['heure'];
											
					
					
						
						if($dateHeure===$id)
						{
							
						
							$cours=$typeFitGroup->find(array(
											"fields"=>'id, nom',
											"conditions"=>'id='.$value['idTypeFitGroup']));
							
							$nom=explode(' ',$cours[0]['nom']);
							
							$contenu='<p id="idFit">'.$cours[0]['id'].'</p>';
							$contenu.='<p id="idCours">'.$value['id'].'</p>';
                            
                            if(sizeof($nom) === 4)
                            {
                            
				            $contenu.= '<p style="text-align:center;color:red;text-decoration:underline;">'.$nom[3].'</p>';
                            $contenu.= '<p>'.$nom[0].'</p>';
							$contenu.= '<p>'.$nom[1].' '.$nom[2].'</p>';
                            }
                            else if (sizeof($nom) === 3)
                            {
                                 $contenu.= '<p style="text-align:center;color:red;text-decoration:underline;">'.$nom[2].'</p>';
                                $contenu.= '<p>'.$nom[0].'</p>';
							     $contenu.= '<p>'.$nom[1].'</p>';
							}
							else if (sizeof($nom) === 2) {
                                $contenu.= '<p>'.$nom[0].'</p>';
							     $contenu.= '<p>'.$nom[1].'</p>';

							} else {
                                $contenu.= '<p>'.$nom[0].'</p>';
								
							}
                            
							
							$contenu.='<p class="nbPlace">'.$value['nombrePlaces'].'</p>';
							
							$idCours=$value['id'];
							$classe="cours";
							
						}
						
					}
					
					$t=array("id"=>$id,"contenu"=>$contenu,"classe"=>$classe,"idCours"=>$idCours);
					array_push($ligne,$t);
					$contenu="";
					$classe="";
					$idCours="";
					
					
	            }
				
					array_push($tableauSemaine,$ligne);
					$ligne=array();
					
	           
	   }
	   
	   		
	     
		  $tableauCalendrier['donnees']=$tableauSemaine;
		  
		  
		  
		 
		  return $tableauCalendrier;
	}	 


?>