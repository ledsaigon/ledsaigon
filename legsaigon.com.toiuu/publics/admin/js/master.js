// JavaScript Document
$(document).ready(function() {	

	
	$("#txtPath").blur(function(){
		if($(this).val() == '')
			SetFileField($resource + "/admin/images/noimage.png");
		else SetFileField($(this).val());
	});

	
	$width_left = $("#center_page div.left").width();
	$(".hide_left").click(function(){
		if($(this).html() == 'Hide Menu')
		{
			$("body").css({
				"background" : "#52575D"
			});
			$("#center_page div.left").animate({
				width: 0
			  },500,function(){
				$(this).hide();
				$("#center_page .right").width($(window).width());	  	
			});
			$(this).html('Show Menu').attr('class','hide_left hide_left_show');	 
		}
		else{
			$(this).show();
			resize();  	
			$("#center_page div.left").animate({
				width: $width_left
			  },500,function(){
				$("body").css({
					"background" : "#52575D url(<?php echo base_url(); ?>resource/admin/images/bg.jpg) repeat-y left"
				});	 
			});
			$(this).html('Hide Menu').attr('class','hide_left');	 
		}
	});
	
	$(".button").button();
	$("#disable_top_page").hide();	
/*	$font_size = ($.cookie('fontsize') == 'undefined') ? 12 : ($.cookie('fontsize') == null) ? 12 : $.cookie('fontsize');
	$(".minus").click(function(){
		$("html").css('font-size',--$font_size);
		$(".fontsize .font").html($font_size);
		$.cookie('fontsize', $font_size, { expires: 1 });
	});	
	$(".plus").click(function(){
		$("html").css('font-size',++$font_size);
		$(".fontsize .font").html($font_size);
		$.cookie('fontsize', $font_size, { expires: 1 });
	});	
	$(".equal").click(function(){
		$font_size = 12;
		$.cookie('fontsize', 12);
		$("html").css('font-size',$font_size);
		$(".fontsize .font").html($font_size);
	});	*/
	
	$("#navigation").treeview({
		persist: "location",
		collapsed: true,
		unique: true,
		animated: "fast"
	});
	
	$("#navigation li span").hover(function(){
		$(this).animate({
			'paddingRight' : '20'
		},'fast');
	},function(){
		$(this).animate({
			'paddingRight' : '10'
		},'fast');
	});

	
	$("#btnChangePass").click(function(){
		if($("#txtPassOld").val() == '')
		{
			alert('Hãy nhập mật khẩu cũ');
			$("#txtPassOld").focus();
			return false;
		}
		else
		{
			if($("#txtPassOld").val().length < 5 || $("#txtPassOld").val().length > 30)
			{
				alert('Mật khẩu phải nhập từ 5 đến 30 ký tự');
				$("#txtPassOld").focus();
				return false;
			}
		}
		
		if($("#txtPassNew").val() == '')
		{
			alert('Hãy nhập mật khẩu mới');
			$("#txtPassNew").focus();
			return false;
		}
		else
		{
			if($("#txtPassNew").val().length < 5 || $("#txtPassNew").val().length > 30)
			{
				alert('Mật khẩu phải nhập từ 5 đến 30 ký tự');
				$("#txtPassNew").focus();
				return false;
			}
		}
		
		if($("#txtPassNewConfirm").val() == '')
		{
			alert('Xác nhận lại mật khẩu mới');
			$("#txtPassNewConfirm").focus();
			return false;
		}
		else
		{
			if($("#txtPassNewConfirm").val().length < 5 || $("#txtPassNewConfirm").val().length > 30)
			{
				alert('Mật khẩu phải nhập từ 5 đến 30 ký tự');
				$("#txtPassNewConfirm").focus();
				return false;
			}
			else
			{
				if($("#txtPassNew").val() != $("#txtPassNewConfirm").val())
				{
					alert('Mật khẩu xác nhận không đúng');
					$("#txtPassNewConfirm").val('').focus();
					return false;
				}
			}
		}
		
		
		if($("#txtCodeSecurity").val() == '')
		{
			alert('Hãy nhập mã bảo mật');
			$("#txtCodeSecurity").focus();
			return false;
		}
		
		$.ajax({
			url: base_url + "AdminCP/login/changepass/" + Math.random(),
			type: "POST",
			data: ({pass_old: $("#txtPassOld").val(),
					pass_new: $("#txtPassNew").val(),
					code_security: $("#txtCodeSecurity").val()}),
			cache: false,
			success: function(msg){
				if(msg == 'success')
				{
					$("#box_changepass").html('Đổi mật khẩu thành công.<br/>Click vào x để đóng dialog').css({
						'text-align':'center',
						'font-size': '14pt'
					});
				}
				else
				{
					alert('Mật khẩu hoặc mã xác nhận không chính xác!');
					$("#txtPassOld").focus();
				}
			}
		});
	});
	
});

function BrowseServer() {
	var finder = new CKFinder();
	finder.basePath =  base_url + 'resource/admin/tool/ckfinder';
	finder.selectActionFunction = SetFileField
	finder.popup();
}

function SetFileField(fileUrl) {
	$("#txtPath").val(fileUrl);
	$("#imagePath").attr('src',fileUrl);
}

function BrowseServer_2() {
var finder = new CKFinder();
finder.basePath =  base_url + 'resource/admin/tool/ckfinder';
finder.selectActionFunction = SetFileField_2
finder.popup();
}

function SetFileField_2(fileUrl) {
$("#txtHeadline").val(fileUrl);
}

function BrowseServer_3() {
var finder = new CKFinder();
finder.basePath =  base_url + 'resource/admin/tool/ckfinder';
finder.selectActionFunction = SetFileField_3
finder.popup();
}

function SetFileField_3(fileUrl) {
$("#txtProDes").val(fileUrl);
}


function resize()
{
	$("#center_page").height($(window).height() - 80);
	if($(window).width() <= 1024)
		$("#center_page .right").width('1000' - 10 - $width_left);
	else
		$("#center_page .right").width($(window).width() - 25 - $width_left);
}

function onload()
{
	document.getElementById('loading_page').style.display='none';
}

function onunload()
{
	document.getElementById('loading_page').style.display='block';
}

function echeck(str) {
	var at="@"
	var dot="."
	var lat=str.indexOf(at)
	var lstr=str.length
	var ldot=str.indexOf(dot)
	if (str.indexOf(at)==-1){
		alert('Địa chỉ email không đúng định dạng');
		return false
	}

	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
	   alert('Địa chỉ email không đúng định dạng');
	   return false
	}

	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		alert('Địa chỉ email không đúng định dạng');
		return false
	}

	 if (str.indexOf(at,(lat+1))!=-1){
		alert('Địa chỉ email không đúng định dạng');
		return false
	 }
	 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		alert('Địa chỉ email không đúng định dạng');
		return false
	 }
	 if (str.indexOf(dot,(lat+2))==-1){
		alert('Địa chỉ email không đúng định dạng');
		return false
	 }
	 if (str.indexOf(" ")!=-1){
		alert('Địa chỉ email không đúng định dạng');;
		return false;
	 }	
	 return true;
}

function keypress(e){
	var keypressed = null;
	if (window.event)
	{
		keypressed = window.event.keyCode; //IE
	}
	else {
		keypressed = e.which; //NON-IE, Standard
	}
	if (keypressed < 48 || keypressed > 57)
	{ 
		if (keypressed == 8 || keypressed == 127)
		{
			return;
		}
		return false;
	}
}


// JavaScript Document
// Replaces all instances of the given substring.
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

function getKey(id, idKey) {
	
    var value = $("#" + id).val();
	
	var array = value.split(" ");
	
	value = '';
	for( i = 0; i <= array.length - 1 ; i++)
	{
		if(array[i] != '')
			value += array[i] + " ";
	}
	
	value = value.substr(0,value.length - 1)
	
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
    value = value.replace(/,|@|"|-|_|!/g, '');
	value = value.replace(/ /g, '-');
	value = value.replace(/--/g, '-');
    value = value.replaceAll('#', '');
    value = value.replaceAll('<', '');
    value = value.replaceAll('>', '');
    value = value.replaceAll('*', '');
    value = value.replaceAll('$', '');
	value = value.replaceAll('(', '');
	value = value.replaceAll(')', '');
    value = value.replaceAll('^', '');
    value = value.replaceAll('?', '');
    value = value.replaceAll(',', '');
    value = value.replaceAll('.', '');
    value = value.replaceAll('/', '');
    $("#" + idKey).val(value.toLowerCase());
}


function returnKey(value) {
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
