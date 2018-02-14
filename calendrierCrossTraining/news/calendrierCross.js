$(document).ready(function()
{
	
	
/*********************/
/* DRAG AND DROP	*/
/*******************/

$('.item').draggable({
    revert:true,
    proxy:'clone'
	});


//Ajout ou modication de cours
$('.calendrierFitGroup td.drop').droppable({
    onDragEnter:function(){
        $(this).addClass('over');
    },
    onDragLeave:function(){
        $(this).removeClass('over');
        
    },
    onDrop:function(e,source){
    	$(this).css('z-index','1000');
        $(this).removeClass('over');
       $(source).parent().removeClass('cours');
        if ($(source).hasClass('assigned')){
            $(this).append(source);
            $(this).addClass('cours');
        } else {
  
        	$(this).addClass('cours');
            var c = $(source).clone().addClass('assigned');
            $(this).empty().append(c);
            c.draggable({
                revert:true
            });
            
            
            
            
            
        }
        
        var dateHeure=$(this).attr('id');
        
        dateHeure=dateHeure.split('_');
        
        var date=dateHeure[0];
        var heure=dateHeure[1];
        var place=$(this).find('p:last').text();
        
        var id=$(this).find('p:first').text();
        
        var idCours="";
        if($(this).find('#idCours').length>0) 
        {
        	//modification d'un cours
        	idCours=$(this).find('#idCours').text();
        	//cache le champs des semaines
        	 $('#myModal .aCacher').css('display','none');
        }
        	
        	
        
        
        /* Envoyer aux inputs hidden*/
       $('#myModal form #idFG').val(id);
       $('#myModal form #dateFG').val(date);
       $('#myModal form #heureFG').val(heure);
        $('#myModal form #idCoursFG').val(idCours);
        $('#myModal form #placeFG').val(place);
        
        $('#myModal').modal('show');
        
        
        
    }
});	


//Supression de cours

$('.tableauLesCours td.drop').droppable({
    onDragEnter:function(){
        $(this).addClass('over');
    },
    onDragLeave:function(){
        $(this).removeClass('over');
        
    },
    onDrop:function(e,source){
        $(this).removeClass('over');
       $(source).parent().removeClass('cours');
       
       //recuperation de l'id
       var idCours=$(source).find('#idCours').text();
       
       alert(idCours);
       
       $(source).remove();
       
       
        //requete ajax de suppresion
        $.post("calendrierCrossTraining/creation/suppresionBdCrossTraining.php",{'id':idCours},function(data)
        {
        	alert(data);
        });
        
        
    }
});	


/*************************/
/* Enregistement ajax	*/
/***********************/

$('#enregistementCoursFitGroup').submit(function(event){
 event.preventDefault();
var donnee=$(this).serialize() ;
donnee=(donnee.split('='));
donnee=donnee[1].split('-');
var semaineDebut=donnee[0];
var semaineFin=donnee[1];



console.log($(this).serialize() );


console.log(semaineDebut + '_' +semaineFin);


$.post("calendrierCrossTraining/creation/enregistrementBdCrossTraining.php", $("#enregistementCoursFitGroup").serialize(),  function(data) {
  alert(data);
  //cacher la fenetre modale
   $('#myModal').modal('hide');
  });





	
	
});







	
});
