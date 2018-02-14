var hautNav=0;
var temps=800;
//$(document).ready(init2);




function init2(){


   
	
	
/*********************************Gestion click bouton calendrier ******************************************/	
	$('#nextDate').click(function(){
		
		var date=$('span#maDate').attr('class');
		
		
		
		$.get("calendrier/modificationLegendeSemaine/controllerView.php", 
				{ week:'next',date:date },
				function(data){
					$('#titreMois span').replaceWith(data);
					
									
					
				} );
		
	
		////////////////////////////////
		$.get("calendrier/modificationTableau/controller.php", 
				{ week:'next',date:date   },
				function(data){
					$('#calendrier table').remove();					
					$('#calendrier').append(data);
				} );
		
		
		
	return false;	
		
		
	});
	
	$('#preDate').click(function(){
		
			var date=$('span#maDate').attr('class');
		
		
		
		
		$.get("calendrier/modificationLegendeSemaine/controllerView.php", 
				{ week:'pre',date:date },
				function(data){
					$('#titreMois span').replaceWith(data);
					
									
					
				} );
		
	
		////////////////////////////////
		$.get("calendrier/modificationTableau/controller.php", 
				{  week:'pre',date:date  },
				function(data){
					$('#calendrier table').remove();					
					$('#calendrier').append(data);
				} );
		
		
		
	return false;	
		
		
	});


	
/*********************************Supprimer un client ******************************************/	




	
	
}



	function supprimerClient(){

		alert('gggg');
		if(confirm("Etes vous sûr de vouloir supprimer ce client ainsi que ces différents cours"))
		{
			alert("hjkhhl");


		}

		return false;

	}







   
  
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   






