// JavaScript Document
$(document).ready(function(){
	/*$("a[rel^='prettyPhoto']").prettyPhoto({
		theme:'facebook',
		animationSpeed: 'normal'
	});
	$("a").easyTooltip();*/
	
	$(".btnSubmit").hide();
	$(".button_ui").button();
	/*$.datepicker.setDefaults( $.datepicker.regional[globalLangKey] );*/
    $( "input.date" ).datepicker({
		dateFormat: "dd/mm/yy",
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true
	});
	
	$("#btnValidate").click(function(){
		var flag = true;
		$("#frmOrder ul:first li input[type=text],#frmOrder ul:first li select").each(function(){
			if($(this).val() == '')
			{
				flag = false;
				$.validationEngine.buildPrompt("#" + $(this).attr('id') ,globalRequried,"error");
			}
			else
			{
				//jQuery("#" + $(this).attr('id')).validationEngine('hideAll');
			}
		});
		if(flag)
		{
			$(".btnValidate").remove();
			$(".btnSubmit").show('slow');
			$.scrollTo( '.btnSubmit', 1000);
		}
	});
	
	$("#frmService").validationEngine();
	$("#frmOrder").validationEngine({    /* create the form validation */
        inlineValidation: true,
        promptPosition: "centerLeft",
        success :  function(){
			$.ajax({
   				type: "POST",
				url: globalBase_url + "order_room",
				data: ({
					dateStart: $("#dateStart").val(),
					dateEnd: $("#dateEnd").val(),
					typeRoom: $("#typeRoom").val(),
					qtyRoom: $("#qtyRoom").val(),
					qtyAdult: $("#qtyAdult").val(),
					qtyChild: $("#qtyChild").val(),
					orFullName: $("#orFullName").val(),
					orPhone: $("#orPhone").val(),
					orNoID: $("#orNoID").val(),
				}),
				success: function(msg){
					$("#order_room #center").html('<span class="msg_order">'+globalOrderSuccess+'</span>');
				}
			 });
//			$("#order_room #center").html('<img src="'+globalResource+'/images/ajax-loader.gif"/><br/>'+globalPrcessOrder);
			$.scrollTo( '#order_room', 800);
			//window.location.href = window.location.href+'#order_room';
		},    /* if everything is OK enable AJAX */
        failure : function(){}    /* in case of validation failure disable AJAX */
     });
	$("#frmService").validationEngine({    /* create the form validation */
        success :  function(){
			$.ajax({
   				type: "POST",
				url: globalBase_url + "order_service_get",
				data: ({
					osFullName: $("#osFullName").val(),
					osPhone: $("#osPhone").val(),
					osEmail: $("#osEmail").val(),
					osSubject: $("#osSubject").val(),
					osDate: $("#osDate").val(),
					osContent: $("#osContent").val()
				}),
				success: function(msg){
					$(".box_service").html('<span class="msg_order">'+globalOrderServiceSuccess+'</span>');
				}
			 });
//			$("#order_room #center").html('<img src="'+globalResource+'/images/ajax-loader.gif"/><br/>'+globalPrcessOrder);
			$.scrollTo( '.box_service', 800);
			//window.location.href = window.location.href+'#order_room';
		},    /* if everything is OK enable AJAX */
        failure : function(){}    /* in case of validation failure disable AJAX */
     });
});

function add_cart(value)
{}
function ads_dcth(value){}
function detail(value){}

function Send2Friend()
{
    location.href = 'mailto:?subject=XEM TRANG NÀY NHÉ&body='+location.href;
}

function initializeVIEPortalDesktop(){
	document.getElementById('vieAdditional').style.display='none';
}
/*
// NO RIGHT CLICK
var message="";
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")

if (window!=top){top.location.href=location.href;}
// NO COPY TEXT
var omitformtags=["input", "textarea", "select"]
omitformtags=omitformtags.join("|")
function disableselect(e){
if (omitformtags.indexOf(e.target.tagName.toLowerCase ())==-1)
return false
}
function reEnable(){
return true
}
if (typeof document.onselectstart!="undefined")
document.onselectstart=new Function ("return false")
else{
document.onmousedown=disableselect
document.onmouseup=reEnable
}*/

String.prototype.replaceAll = function(
strTarget, // The substring you want to replace
strSubString // The string you want to replace in.
) {
    var strText = this;
    var intIndexOfMatch = strText.indexOf(strTarget);

    // Keep looping while an instance of the target string
    // still exists in the string.
    while (intIndexOfMatch != -1) {
        // Relace out the current instance.
        strText = strText.replace(strTarget, strSubString)

        // Get the index of any next matching substring.
        intIndexOfMatch = strText.indexOf(strTarget);
    }

    // Return the updated string with ALL the target strings
    // replaced out with the new substring.
    return (strText);
}

function echeck(str) {
    var at = "@"
    var dot = "."
    var lat = str.indexOf(at)
    var lstr = str.length
    var ldot = str.indexOf(dot)
    if (str.indexOf(at) == -1) {
        return false
    }

    if (str.indexOf(at) == -1 || str.indexOf(at) == 0 || str.indexOf(at) == lstr) {
        return false
    }

    if (str.indexOf(dot) == -1 || str.indexOf(dot) == 0 || str.indexOf(dot) == lstr) {
        return false
    }

    if (str.indexOf(at, (lat + 1)) != -1) {
        return false
    }
    if (str.substring(lat - 1, lat) == dot || str.substring(lat + 1, lat + 2) == dot) {
        return false
    }
    if (str.indexOf(dot, (lat + 2)) == -1) {
        return false
    }
    if (str.indexOf(" ") != -1) { ;
        return false;
    }
    return true;
}

function returnKey_master(value) {
    value = value.replace(/à|á|ả|ã|ạ|â|ấ|ầ|ẩ|ẫ|ậ|ă|ắ|ằ|ẳ|ẵ|ặ/g, 'a');
    value = value.replace(/è|é|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/g, 'e');
    value = value.replace(/ì|í|ỉ|ĩ|ị/g, 'i');
    value = value.replace(/ò|ó|ỏ|õ|ọ|ô|ồ|ố|ổ|ỗ|ộ|ơ|ờ|ớ|ở|ỡ|ợ/g, 'o');
    value = value.replace(/ù|ú|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/g, 'u');
    value = value.replace(/ỳ|ý|ỷ|ỹ|ỵ/g, 'y');
    value = value.replace(/đ/g, 'd');

    value = value.replace(/À|Á|Ả|Ã|Ạ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ/g, 'A');
    value = value.replace(/È|É|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ/g, 'E');
    value = value.replace(/Ì|Í|Ỉ|Ĩ|Ị/g, 'I');
    value = value.replace(/Ò|Ó|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ/g, 'O');
    value = value.replace(/Ù|Ú|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự/g, 'U');
    value = value.replace(/Ỳ|Ý|Ỷ|Ỹ|Ỵ/g, 'Y');
    value = value.replace(/Đ/g, 'D');
    value = value.replace(/'|%|&/g, '');
    value = value.replace(/ /g, '-');
    value = value.replaceAll('"', '');
    value = value.replaceAll('#', '');
    value = value.replaceAll('<', '');
    value = value.replaceAll('>', '');
    value = value.replaceAll('*', '');
    value = value.replaceAll(',', '');
    return value;
}


