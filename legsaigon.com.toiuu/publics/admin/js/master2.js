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

function getKey(id, idKey) {
    var value = $("#" + id).val();
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
    value = value.replace(/ |,|@|"|_|!/g, '-');
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
	 value = value.replaceAll('~', '');
    value = value.replaceAll('/', '-');
    $("#" + idKey).val(value);
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
	 value = value.replaceAll(' ~ ', '-');
    return value;
}

$(document).ready(function(){
    $("#navigation").treeview({
	    animated: "normal",
	    collapsed: true,
	    unique: true,
	    persist: "location"
	});
    $("#DetailWebCat").treeview({
	    animated: "fast",
	    persist: "location"
	});
	$("#controlpanel").treeview({
	    animated: "fast",
	    persist: "location"
	});
});
