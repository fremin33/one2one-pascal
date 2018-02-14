/*$(document).ready(function(){
	
	
	
	
	$(".inscriptionFitGroup td.cours").click(function(){*/
		
		
function inscription(e){		
		
		
		
		$('#modalInscriptionDesinscription').show();
		
		
		$('#modalInscriptionDesinscription #idCoursIns').val(e);
		
		
		
	
	
}	
	/********************************/
	/* Enregistement inscription	*/
	/***********************/

function enregistrementInscription(){


 	$.ajax(
				{
					url: "calendrier/inscriptionBdFitGroup.php",
					data: $("#inscriptionCoursFitGroup").serialize(),
					type    : "GET",
		    		dataType : "json",
					 success: function(data) {
			
		  				
		  				
		  				//$("#information").text(data.texte);
		  				
		  				window.alert(data.texte);
		  				
		  				//Modification de l'affichage du nombre de place 
		  				
		  				var num=$("#idCoursIns").val();
		  				
		  				if(data.valPlace!=-1) {$("body").find('.'+num).find('.nbPlace').text(data.valPlace);}
		  				
		  				
		  				
		  				
		  				//cacher la fenetre modale
		   				$('#modalInscriptionDesinscription').hide();

		   				

		   				

		   				if(data.contenuMail!="")
		   				{
		   					//console.log(data.contenuMail);
		   					$.post("calendrier/mailAEnvoyer.php",{dest:data.adresseMail,message:data.contenuMail});


		   				}




		   			
  				},
  				error : function(data) { alert(code) }
 		 }
	);
 
 
 
 
 return false;
	
	
	
}


	/*************************/
	/* Désinscription		*/
	/***********************/
function desincriptionInscription(){

/*

	$.post("calendrier/desinscriptionBdFitGroup.php", $("#inscriptionCoursFitGroup").serialize(),  function(data) {
  alert(data);
  //cacher la fenetre modale
   $('#myModal2').hide();
  });
	*/
	
	
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
							 $('#modalInscriptionDesinscription').hide();
		   			
									if(data.contenuMail!="")
		   				{
		   					//console.log(data.contenuMail);
		   					$.post("calendrier/mailAEnvoyer.php",{dest:data.adresseMail,message:data.contenuMail});


		   				}   
							
					 	
					}
				}
				);
				
				
	
	
	
	
	return false;
	
}

/******************************
 *Suppression du modal inscription desonscription 
 */
function suppression(){
	
	$('#modalInscriptionDesinscription').hide();
	return false;
}
