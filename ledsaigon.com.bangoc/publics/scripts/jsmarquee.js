// JavaScript Document
var $j = jQuery.noConflict(); 
function marquee(){
	$j('.list-partner').each(function(){
		var jmarquee = $j(this),
			jwrap = jmarquee.find('ul:first'),
			jitems = jwrap.children(),
			displaywidth = jmarquee.outerWidth(true),
			itemwidth = jitems.eq(0).outerWidth(true),
			nvisible = Math.ceil(displaywidth / itemwidth),
			nitems = jitems.length,
			totalwidth = 0,
			ndups = Math.round(nvisible + 3);
		
		for(var i = 0; i < nitems; i++){
			totalwidth += jitems.eq(i).outerWidth(true);
		}
		
		for(var i = 0; i < ndups; i++){
			jitems.eq(i).clone(true).appendTo(jwrap);
		}
		
		var marginleft = 0,
			run = function(){
				marginleft++;
				if(marginleft >= totalwidth){
					marginleft = 0;
				}
				
				jwrap.css('marginLeft', -marginleft);
			},
			runid = null;
			
		runid = setInterval(run, 17);
		
		jmarquee.mouseenter(function(){
			clearInterval(runid);
		}).mouseleave(function(){
			clearInterval(runid);
			runid = setInterval(run, 17);
		});
	});
}

/////////////////
$j(document).ready(function(){
	marquee();
	
});
// JavaScript Document