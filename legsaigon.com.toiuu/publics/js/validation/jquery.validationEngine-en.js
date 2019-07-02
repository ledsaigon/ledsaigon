(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = 	{"required":{    			// Add your regex rules here, you can take telephone as an example
						"regex":"none",
						"alertText":"* This field is required",
						"alertTextCheckboxMultiple":"* Please select an option",
						"alertTextCheckboxe":"* This checkbox is required"},
					"length":{
						"regex":"none",
						"alertText":"*Between ",
						"alertText2":" and ",
						"alertText3": " characters allowed"},
					"content":{
						"regex":"none",
						"alertText":"* "},
					"maxCheckbox":{
						"regex":"none",
						"alertText":"* Checks allowed Exceeded"},	
					"minCheckbox":{
						"regex":"none",
						"alertText":"* Please select ",
						"alertText2":" options"},	
					"confirm":{
						"regex":"none",
						"alertText":"* Your field is not matching"},		
					"telephone":{
						"regex":"/^[0-9\-\(\)\ ]+$/",
						"alertText":"* Invalid phone number"},	
					"email":{
						"regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
						"alertText":"* Invalid email address"},	
					"date":{
                         "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                         "alertText":"* Invalid date, must be in YYYY-MM-DD format"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* Numbers only"},	
					"noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z-]+$/",
						"alertText":"* No special characters allowed"},
					"ajaxUser":{
						"file":"http://localhost:81/binhminh/account/validateUser",
						"extraData":"name=eric",
						"alertTextOk":"* This user is available",	
						"alertTextLoad":"* Loading, please wait",
						"alertText":"* This user is already taken"},	
					"ajaxName":{
						"file":"http://localhost:81/binhminh/account/validateEmail",
						"alertText":"* This email is already taken",
						"alertTextOk":"* This email is available",	
						"alertTextLoad":"* Loading, please wait"},	
					"checkEmail":{
						"file":"http://giongcaytrongbinhminh.com//binhminh/account/checkEmail",
						"alertText":"* This email is already taken",
						"alertTextOk":"* This email is available",	
						"alertTextLoad":"* Loading, please wait"},	
					"checkQuestion":{
						"file":"http://giongcaytrongbinhminh.com//binhminh/faq/checkQuestion",
						"alertText":"* This question is already taken",
						"alertTextOk":"* This question is available",	
						"alertTextLoad":"* Loading, please wait"},	
					"ajaxCode":{
						"file":"http://giongcaytrongbinhminh.com//binhminh/account/validateCode",
						"alertText":"* Code security is correct",
						"alertTextOk":"* Code security is available",	
						"alertTextLoad":"* Loading, please wait"},	
					"onlyLetter":{
						"regex":"/^[a-zA-Z-\ \']+$/",
						"alertText":"* Letters only"},
					"validate2fields":{
    					"nname":"validate2fields",
    					"alertText":"* You must have a firstname and a lastname"}	
					}	
					
		}
	}
})(jQuery);

$(document).ready(function() {	
	$.validationEngineLanguage.newLang()
});