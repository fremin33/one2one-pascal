$(document).ready(function(){
	
	/*
	
	
	*/
	


	/*************************/
	/* Désinscription		*/
	/***********************/


	$('#desinscriptionCours').click(function(event)
		{
			 event.preventDefault();
		
		
			$.ajax(
				
				{
					url:"calendrier/desinscriptionBdFitGroup.php",
					data:$("#inscriptionCoursFitGroup").serialize(),
					type    : "GET",
		    		dataType : "json",
					 success: function(data) {
					 	
							  
							  		$("#information").text(data.texte);
							  window.alert(data.texte);
							  	 
							   
							  	//Modification de l'affichage du nombre de place 
		  						var num=$("#idCoursIns").val();
		  						if(data.valPlace!=-1) {$("body").find('.'+num).find('.nbPlace').text(data.valPlace);}
							  
							  
							   //cacher la fenetre modale
							   $('#myModal2').modal('hide');
							   
								if(data.contenuMail!="")
		   				{
		   					console.log(data.contenuMail);
		   					$.post("calendrier/mailAEnvoyer.php",{dest:data.adresseMail,message:data.contenuMail});


		   				}
					 	
					}
				}
				);
				
				
		  		//return false;	
  			});
	
	
	
	
	
	


/*********************************/
/* Enregistement inscription	*/
/*******************************/


	$('#inscriptionCours').click(function(event){
	 			 		
	 		event.preventDefault();
			
			
			
			$.ajax(
				{
					url: "calendrier/inscriptionBdFitGroup.php",
					data: $("#inscriptionCoursFitGroup").serialize(),
					type    : "GET",
		    		dataType : "json",
					 success: function(data) {
			
		  				
		  				
		  				$("#information").text(data.texte);
		  				
		  				window.alert(data.texte);
		  				
		  				//Modification de l'affichage du nombre de place 
		  				
		  				var num=$("#idCoursIns").val();
		  				
		  				if(data.valPlace!=-1) {$("body").find('.'+num).find('.nbPlace').text(data.valPlace);}
		  				
		  				
		  				
		  				
		  				//cacher la fenetre modale
		   				$('#myModal2').modal('hide');

		   				if(data.contenuMail!="")
		   				{
		   					//console.log(data.contenuMail);
		   					$.post("calendrier/mailAEnvoyer.php",{dest:data.adresseMail,message:data.contenuMail});


		   				}
		   			
  				},
  				error : function(data) { alert(code) }
 		 }
	);
	
//return false;
});

//return false;	
});



/*********************************************************/
/* Possibilite d'inscrire ou de désinscrire un client	*/
/*********************************************************/

function inscription(e,idCase){
	
	
	
		//alert('inscription');
		
		//var num=$(this).find('#idCours').text();
		
		
		//Transmet le numero du cours
		$('#myModal2 #idCoursIns').val(e);
		$('#myModal2 #idCase').val(idCase);
		
		
		$('#myModal2').modal('show');
		
		
		return false;
		
}

/*********************************************************/
/* Voir les clients inscrits					*/
/*********************************************************/

function survol(e)
{
	
	$.ajax(
				{
					url: "calendrier/affichageReservations.php",
					data: {id:e},
					type    : "GET",
		    		//dataType : "json",
					 success: function(data) {
			
		  				
		  				
		  				//Modification de l'affichage du nombre de place 
		  				//$('#nombrePlace').text(data.valPlace);
		  				
		  				
		  				
		  				$("#listeDesInscripts").html(data);
		  				
		  				
		  				//cacher la fenetre modale
		   				//$('#myModal2').modal('hide');
		   			
  				},
  				error : function(data) { alert(code) }
 		 }
	);
	
	
	return false;
	
	
	
	
}






	
