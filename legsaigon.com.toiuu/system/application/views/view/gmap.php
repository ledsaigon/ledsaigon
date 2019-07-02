<div id="dgmap201211884131">
	<img height="450" id="gmap201211884131" src="//maps.googleapis.com/maps/api/staticmap?center=10.79558,106.71113&amp;zoom=16&amp;size=640x450&amp;maptype=roadmap&amp;markers=color:green|21.02727,105.85545&amp;markers=color:green|10.78728,106.67731&amp;markers=color:green|10.79554,106.71005&amp;sensor=false" width="700" />
<script type="text/javascript">
/*<![CDATA[*/
/* CK googlemaps v3.2 */
var imgMap = document.getElementById("gmap201211884131"),
	dMap = document.createElement("div");
imgMap.parentNode.insertBefore( dMap, imgMap);
dMap.appendChild(imgMap);
dMap.style.width = "700px";
dMap.style.height = "450px";
/*generatedType = 3;*/
function CreateGMapgmap201211884131() {
	var dMap = document.getElementById("gmap201211884131").parentNode;
	dMap.onclick = null;
	var mapOptions = {
		zoom: 16,
		center: [10.79558,106.71113],
		mapType: 0,
		navigationControl: "Default",
		mapsControl: "Default",
		overviewMapControl: false,
		overviewMapControlOptions: {opened:true},
		scaleControl: false,
		weather: false,
		traffic: false,
		googleBar: false
	};
	var myMap = new CKEMap(dMap, mapOptions);
	myMap.AddMarkers( [{lat:21.02727, lon:105.85545, text:"Quận hoàn kiếm , Hà nội",color:"green", title:"Title", maxWidth:200},
{lat:10.78728, lon:106.67731, text:"<p>\n	&nbsp;<\/p>\n<p>\n	C&ocirc;ng Ty Cổ Phần Nam Gia Hưng<\/p>\n<p>\n	ĐC:&nbsp;<span style=\"color: rgb(0, 0, 0); font-family: Tahoma, Geneva, sans-serif; line-height: 20px; text-align: right;\">386/77A L&ecirc; Văn Sỹ, Phường 14, Q.3. TP- HCM<\/span><\/p>\n",color:"green", title:"Công Ty Cổ Phần Nam Gia Hưng", maxWidth:200},
{lat:10.79554, lon:106.71005, text:"<p>\n	&nbsp;<\/p>\n<div style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 23px;\">\n	C&Ocirc;NG TY TNHH TM - dv - sx &nbsp;royal family ph&aacute;t<br style=\"margin: 0px; padding: 0px;\" />\n	ĐC: 66/110 XVNT, F 21, Q B&igrave;nh Thạnh, TP.HCM<\/div>\n<div style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 23px;\">\n	Hotline: 0932 221 311<\/div>\n<div style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 23px;\">\n	ĐT: 08.3840 2594<\/div>\n",color:"green", title:"CÔNG TY TNHH TM - dv - sx  royal family phát", maxWidth:200}] );
}

if (!window.gmapsLoaders) window.gmapsLoaders = [];
window.gmapsLoaders.push(CreateGMapgmap201211884131);
window.gmapsAutoload=true;
/*]]>*/
</script></div>

<script type="text/javascript" src="<?php echo base_url()?>resource/ckeditor/plugins/googlemaps/scripts/cke_gmaps_end.js">/* CK googlemapsEnd v3.2 */</script>