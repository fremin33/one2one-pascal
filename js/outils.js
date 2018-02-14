
jQuery.fn.center = function () {
	console.log("ggg");
   
 	var gauche;
			
		
	if( $(window).width()>=1024)  	  
		gauche= ($(window).width()/2 - 472)+$(window).scrollLeft(); 	
	else
 		 gauche=40;
 
 
 	hautNav=( $(window).height() - $("#concept").height() ) / 2+$(window).scrollTop() + 23;

	if (hautNav<40) hautNav=40;

	this.css({
				top:hautNav,
				left:gauche,
				position:'fixed'
				});
	
	console.log(hautNav+"-"+gauche+"-"+$(window).height() );
  
  return this;
}





jQuery.fn.dimension = function () {
  this.css("width", ( $(window).width()  + "px"));
    this.css("height", ( $(window).height() + "px"));
  
    var haut=( $(window).height() - this.children().height() ) / 2+$(window).scrollTop();
    
    if(haut<=0) haut=0;
 	
 	this.children().css({top:haut});
 	
 	

  
  return this;
}




jQuery.fn.extend({
   findPos : function() {
       obj = jQuery(this).get(0);
       var curleft = obj.offsetLeft || 0;
       var curtop = obj.offsetTop || 0;
       while (obj = obj.offsetParent) {
                curleft += obj.offsetLeft
                curtop += obj.offsetTop
       }
       return {x:curleft,y:curtop};
   }
   
   
});


