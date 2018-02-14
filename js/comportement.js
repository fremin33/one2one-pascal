var hautNav=0;
var temps=800;
$(document).ready(init2);




function init2(){


//$("nav").center();
	//$(".slide").dimension();
	

	 
	
		$(".fancybox").fancybox();

	

	
	//mise en page de la page PROGRAMM accordion 
	/*activeItem = $("#accordion li:first");
    $(activeItem).addClass('active');
 
    $("#accordion li").hover(function(){
        $(activeItem).animate({width: "50px"}, {duration:300, queue:false});
        $(this).animate({width: "621px"}, {duration:300, queue:false});
        activeItem = this;
    });*/
   
  
  /********************Survol image *****************************************************************/   
   
    
    	
    
    	
   $('#sousMenuFitOne .light').each(function() {
                $(this).hover(
                    function() {
                        $(this).stop().animate({ opacity: 1.0 }, 800);
                    },
                   function() {
                       $(this).stop().animate({ opacity: 0 }, 800);
                   })
                });
       
   
   
 
 /********************Accordeon FIT GROUP *****************************************************************/  
   $('#accordion li')
    .bind('active',{deplacement:516,val:160}, evenementActive);

	//Triggering from the buttons 
	$('#accordion li h2').click(evenementClick);	
	        

	//Binding Events to the Slide Contents 
	$('.contentFitGroup').bind('show',evenementShow);
	
 /********************Accordeon FIT ONE PROGRAM*****************************************************************/  
	 $('.accordionFitOne li')
    .bind('active',{deplacement:490,val:150}, evenementActive);

	//Triggering from the buttons 
	$('.accordionFitOne li h2').click(evenementClick);	
	        

	//Binding Events to the Slide Contents 
	$('.contentFitOneProgram').bind('show',evenementShow);
	
	
/*********************************Gestion click bouton calendrier ******************************************/	
	$('#nextDate').click(function(){
		
		var date=$('span#maDate').attr('class');
		
		
		
		$.get("calendrier/titre.php", 
				{ week:'next',date:date },
				function(data){
					$('#titreMois span').replaceWith(data);
					
									
					
				} );
		
	
		////////////////////////////////
		$.get("calendrier/tableau.php", 
				{ week:'next',date:date   },
				function(data){
					$('#calendrier table').remove();					
					$('#calendrier').prepend(data);
				} );
		
		
		
	return false;	
		
		
	});
	
	$('#preDate').click(function(){
		
			var date=$('span#maDate').attr('class');
		
		
		
		
		$.get("calendrier/titre.php", 
				{ week:'pre',date:date },
				function(data){
					$('#titreMois span').replaceWith(data);
					
									
					
				} );
		
	
		////////////////////////////////
		$.get("calendrier/tableau.php", 
				{  week:'pre',date:date  },
				function(data){
					$('#calendrier table').remove();					
					$('#calendrier').prepend(data);
				} );
		
		
		
	return false;	
		
		
	});
	
	
}


/********************fonctions generalistes accord�ons *****************************************************************/  
	
function evenementActive(event)
{
	var deplacement=event.data.deplacement;
	var valeur=event.data.val;
	var deplacementPositif="+="+deplacement+"px";
	var deplacementNegatif="-="+deplacement+"px";
	
	/*supression active*/
    	$(this).siblings().removeClass('active');
    	$(this).addClass('active');
    	
    	
    	 $(this).prevAll().each(function(i){
    	 										$(this).removeClass('close');
    	 										$(this).addClass('open');
    	 										console.log($(this).css("right"));
            									if(parseInt($(this).css("right"))<valeur)  
            									{          
            										$(this).animate({right: deplacementPositif},{duration :temps});
            										temps-=200;
            										console.log(temps);
                                                    
                                                    $(this).css("right",0);
            									}
            									
            								});
    	temps=800;
    	
    	 $(this).nextAll().each(function(i){
    	 										$(this).removeClass('open');
    	 										$(this).addClass('close');
            									if(parseInt($(this).css("right"))>valeur)
            									{            
            										$(this).animate({right: deplacementNegatif},{duration:temps});
            										temps-=200;
            									}
            									
            										
            								});
         temps=800;
    	if($(this).hasClass('open'))
    	{
    		$(this).animate({right: deplacementNegatif});
    		$(this).removeClass('open');
    	}





}	
	
	


function evenementShow(){
	$(this).parent().find('.open').removeClass('active');
	   $(this).parent().find('.open').animate({opacity:0},{duration:600});
		$(this).parent().find('.open').removeClass('open');
		
		
		$(this).addClass('open');
		$(this).animate({opacity:1},{duration:600});

}

 





function evenementClick(){
		
		if(!$(this).parent().hasClass('active'))
		{
			$(this).parent().trigger('active');
		

			$('#content-' + $(this).parent().attr('id')).trigger('show');
		}
 }

   
   
  
   
   
   
   
   
   
   
   
   
   
   
   


   
   
   
   



/*




$(window).resize(function(){
	
	var gauche;
	var haut;
				
	//placement du nav
		
	if( $(window).width()>=1024) gauche= ($(window).width()/2 - 472)+$(window).scrollLeft(); else  gauche=40;
 
 
 	//haut=( $(window).height() - $("#concept").height() ) / 2+$(window).scrollTop()+40;
	//haut=( $(window).height() - this.children().height() ) / 2+$(window).scrollTop()


	$("nav").css({
				top:hautNav,
				left:gauche,
				position:'fixed'
				});
	
	
	//console.log(hautNav+"-"+gauche+"-"+$(window).scrollTop());
 	
 	
 	
 	$(".slide").dimension();
 	
 		
});
*/
