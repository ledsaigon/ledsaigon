(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = 	{"required":{    			// Add your regex rules here, you can take telephone as an example
						"regex":"none",
						"alertText":"* Không được để trống",
						"alertTextCheckboxMultiple":"* Please select an option",
						"alertTextCheckboxe":"* This checkbox is required"},
					"length":{
						"regex":"none",
						"alertText":"* Phải nhập từ ",
						"alertText2":" đến ",
						"alertText3": " ký tự"},
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
						"alertText":"* Số điện thoại không đúng định dạng!"},	
					"email":{
						"regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
						"alertText":"* Địa chỉ email không đúng định dạng!"},	
					"date":{
                         "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                         "alertText":"* Invalid date, must be in YYYY-MM-DD format"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* Chỉ nhập số"},	
					"noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z-]+$/",
						"alertText":"* Không được nhập các ký tự đặc biệt. [0-9, a-z, A-Z, -]"},	
					"ajaxUser":{
						"file":"/vpccdongthap/account/validateUser",
						"extraData":"name=eric",
						"alertTextOk":"* Có thể sử dụng",	
						"alertTextLoad":"* Đang kiểm tra, hãy đợi...",
						"alertText":"* Đã tồn tại"},	
					"ajaxName":{
						"file":"/vpccdongthap/account/validateEmail",
						"alertText":"* Email không tồn tại",
						"alertTextOk":"* Email hợp lệ",	
						"alertTextLoad":"* Đang kiểm tra, hãy đợi..."},
					"checkEmail":{
						"file":"/vpccdongthap/account/checkEmail",
						"alertText":"* Email đã tồn tại",
						"alertTextOk":"* Có thể sử dụng",	
						"alertTextLoad":"* Đang kiểm tra, hãy đợi..."},
					"checkQuestion":{
						"file":"/vpccdongthap/faq/checkQuestion",
						"alertText":"* Câu hỏi này đã tồn tại.",
						"alertTextOk":"* Có thể hỏi",	
						"alertTextLoad":"* Đang kiểm tra, hãy đợi..."},
					"ajaxCode":{
						"file":"/vpccdongthap/account/validateCode",
						"alertText":"* Mã xác nhận không hợp lệ",
						"alertTextOk":"* Mã xác nhận hợp lệ",	
						"alertTextLoad":"* Đang kiểm tra, hãy đợi..."},		
					"onlyLetter":{
						"regex":"/^[a-zA-Z\ \']+$/",
						"alertText":"* Chỉ nhập ký tự"},
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