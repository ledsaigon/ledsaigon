
/***********************************************
* VietAd (www.vietad.vn) Ajax ToolTip
***********************************************/

var offsetxpoint = -60; //Customize x offset of tooltip
var offsetypoint = 20; //Customize y offset of tooltip
var ie = document.all;
var ns6 = document.getElementById && !document.all;
var enabletip = false;

var tipobj;

function ietruebody()
{
	return (document.compatMode && document.compatMode != "BackCompat")? document.documentElement : document.body;
}

// Ajax Show Tooltip


function ShowTooltipGallery(id,gh,ext)
{
	if((document.readyState == "complete") || (!ie))
	{
		if(!document.getElementById('AdTooltip'))
		{
			try
			{		
				/* Create tooltip content div */
				tipobj = document.createElement('DIV'); 
				tipobj.className = 'AdTooltip';
				tipobj.id = 'AdTooltip';		
				tipobj.style.position = 'absolute';
				tipobj.style.top= '-1000px';

				document.body.appendChild(tipobj);
			}
			catch(e)
			{	
				return;		
			}
		}		
		
	}
	
	LoadXmlDoc('xml/gianhang_gallery/tooltip.php?id='+id+'&gh='+gh,'AdTooltip')
	
}
function ShowTooltip(id,gh,ext,pic,thuoctinhhtml,thuoctinhoption)
{
	if((document.readyState == "complete") || (!ie))
	{
		if(!document.getElementById('AdTooltip'))
		{
			try
			{		
				/* Create tooltip content div */
				tipobj = document.createElement('DIV'); 
				tipobj.className = 'AdTooltip';
				tipobj.id = 'AdTooltip';		
				tipobj.style.position = 'absolute';
				tipobj.style.top= '-1000px';

				document.body.appendChild(tipobj);
			}
			catch(e)
			{	
				return;		
			}
		}		
		
	}
	
	LoadXmlDoc('xml/gianhang_sanpham/tooltip.php?id='+id+'&gh='+gh+'&ext='+ext+'&pic='+pic+'&thuoctinhhtml='+thuoctinhhtml+'&thuoctinhoption='+thuoctinhoption,'AdTooltip')
}
function ShowTooltipReady(id)
{	
}

// Positioning Tooltip
function PositionTooltip(e)
{
	if (enabletip)
	{
		try{var tipel = e.target || e.srcElement;}catch(e){}
		try{var tipel = event.target || event.srcElement;}catch(e){}
		
		try{document.getElementById('fixloi').innerHTML=tipel.src;}catch(e){}

		try{
			if(document.getElementById('fixloi').innerHTML=='undefined')
			{
				HideTooltip();
				return;
			}
		}catch(e){}

		try{offsetH=tipobj.offsetHeight}catch(e){offsetH=0;}
		if(offsetH>300)
		{
			
		
		
			var curX = (ns6) ? e.pageX : event.clientX+ietruebody().scrollLeft;
			var curY = (ns6) ? e.pageY : event.clientY+ietruebody().scrollTop;
			
			//Find out how close the mouse is to the corner of the window
			var rightedge  = ie&&!window.opera ? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20;
			var bottomedge = ie&&!window.opera ? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20;
	
			var leftedge = (offsetxpoint<0) ? offsetxpoint*(-1) : -1000;
	
			//if the horizontal distance isn't enough to accomodate the width of the context menu
			if (rightedge < tipobj.offsetWidth)
			{
				//move the horizontal position of the menu to the left by it's width
				//tipobj.style.left = ie ? ietruebody().scrollLeft + event.clientX-tipobj.offsetWidth + "px" : window.pageXOffset + e.clientX - tipobj.offsetWidth + "px";
			}
			else if (curX < leftedge)
			{
				//tipobj.style.left = "5px";
			}
			else
			{
				//position the horizontal position of the menu where the mouse is positioned
				//tipobj.style.left = curX + offsetxpoint + "px";
			}
	
			//same concept with the vertical position
			if (bottomedge < tipobj.offsetHeight)
			{
				//tipobj.style.top = ie ? ietruebody().scrollTop + event.clientY-tipobj.offsetHeight - offsetypoint + "px" : window.pageYOffset + e.clientY - tipobj.offsetHeight - offsetypoint + "px";
			}
			else
			{
				//tipobj.style.top = curY + offsetypoint + "px";
			}
				//alert(tipobj.offsetHeight)
				
			if (parseInt(navigator.appVersion)>3) {
			 if (navigator.appName=="Netscape") {
			  winW = window.innerWidth-16;
			  winH = window.innerHeight-16;
			 }else
			 {
			  winW = document.documentElement.clientWidth-20;
			  winH =  document.documentElement.clientHeight-20;
			 }
			}
			if(ie)
			{
				
				//(winH-tipobj.offsetHeight)/2+window.pageYOffset+'px';
				tipobj.style.top=(winH-tipobj.offsetHeight)/2 +ietruebody().scrollTop+ "px"


				cachtrai=curX + offsetxpoint;
				
				
				if(cachtrai<winW/2)
				{
					tipobj.style.left=event.clientX +20+'px';
				}else
				{
					tipobj.style.left=event.clientX -tipobj.offsetWidth-20+'px';
				}
				//document.getElementById('test').innerHTML=cachtrai;
				
			}else
			{
				tipobj.style.top=(winH-tipobj.offsetHeight)/2+window.pageYOffset+'px';
				cachtrai=window.pageXOffset + e.clientX;
				if(cachtrai<winW/2)
				{
					tipobj.style.left=window.pageXOffset + e.clientX+20+'px';
				}else
				{
					tipobj.style.left=window.pageXOffset + e.clientX-tipobj.offsetWidth-20+'px';
				}
				//document.getElementById('test').innerHTML=window.pageXOffset + e.clientX;
			}
			
	
				
			tipobj.style.visibility = "visible";
		}else
		{
			
			
			var curX = (ns6) ? e.pageX : event.clientX+ietruebody().scrollLeft;
			var curY = (ns6) ? e.pageY : event.clientY+ietruebody().scrollTop;
			
			//Find out how close the mouse is to the corner of the window
			var rightedge  = ie&&!window.opera ? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20;
			var bottomedge = ie&&!window.opera ? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20;
	
			var leftedge = (offsetxpoint<0) ? offsetxpoint*(-1) : -1000;
	
			//if the horizontal distance isn't enough to accomodate the width of the context menu		
			var check_offset_width=0;
			try{check_offset_width=tipobj.offsetWidth}catch(e){}
			
			if(check_offset_width)
			{
				
				if (rightedge < tipobj.offsetWidth)
				{
					//move the horizontal position of the menu to the left by it's width
					tipobj.style.left = ie ? ietruebody().scrollLeft + event.clientX-tipobj.offsetWidth + "px" : window.pageXOffset + e.clientX - tipobj.offsetWidth + "px";
				}
				else if (curX < leftedge)
				{
					tipobj.style.left = "5px";
				}
				else
				{
					//position the horizontal position of the menu where the mouse is positioned
					tipobj.style.left = curX + offsetxpoint + "px";
				}
		
				//same concept with the vertical position
				if (bottomedge < tipobj.offsetHeight)
				{
					tipobj.style.top = ie ? ietruebody().scrollTop + event.clientY-tipobj.offsetHeight - offsetypoint + "px" : window.pageYOffset + e.clientY - tipobj.offsetHeight - offsetypoint + "px";
				}
				else
				{
					tipobj.style.top = curY + offsetypoint + "px";
				}
				tipobj.style.visibility = "visible";
			}
			
		}
	}
}

// Hide Tooltip
function HideTooltip()
{
	if ((ns6||ie) && (tipobj))
	{
		enabletip = false;
		
		tipobj.style.visibility = "hidden";
		tipobj.style.left = "-1000px";
		tipobj.style.backgroundColor = '';
		tipobj.style.width = '';
	}
}

document.onmousemove = PositionTooltip;
