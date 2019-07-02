$(document).ready(function() { 
$(".menuTop li").hover(function(){ 
        $(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400); 
        },function(){ 
        $(this).find('ul:first').css({visibility: "hidden"}); 

        }); 
}); 
