// JavaScript Document
$(document).ready(function() {
	$("#username").val('').focus();
	/// trang thai login
	$flag = false;
	$setFocus = false;
	/// an thong bao error
	$("#frmAction").children('span').hide();
	/// submit trang
	$("#frmAction").submit(function(){
		/// an thong bao error
		$("#frmAction").children('span').fadeOut(500);
		
		/// kiem tra du lieu
		$("input").each(function(){
			if($(this).val() == '')
			{
				if($setFocus == false)
				{
					$(this).focus();
					$setFocus = true;
				}
				$(this).css('background-color','#FF0').next('span').remove();
				$(this).after('<span class="empty">Không được để trống</span>');
			}
			else $(this).css('background-color','#FFF')
		});
		
		/// kiem tra trang thai login & submit
		if(!$setFocus)
		{
			$_url = $("#frmAction").attr('action') + '/' + Math.random();
			$.ajax({
				type: "POST",
				url: $_url,
				data: ({
					username: $("#username").val(),
					password: $("#password").val(),
					code: $("#code").val()
				}),
				success: function(msg){
					if(msg == "success")
					{
						location.href = $base_url + 'AdminCP';
					}
					else 
					{
						$("#username").val('').focus();
						$("#password").val('');
						$("#code").val('');
						$("#frmAction").children('span').fadeIn(1000).fadeOut(5000);
					}
				}
			});
		}
		$flag = false;
		$setFocus = false;
		return false;
	});
	/////////
	$("input").each(function(){
		$(this).blur(function(){
			if($(this).val() == '')
			{
				$(this).css('background-color','#FF0').next('span').remove();
				$(this).after('<span class="empty">Không được để trống</span>');
			}
			else $(this).css('background-color','#FFF').next('span').remove();
		}).keypress(function(){
			if($(this).val() == '')
			{
				$(this).css('background-color','#FF0').next('span').remove();
				$(this).after('<span class="empty">Không được để trống</span>');
			}
			else $(this).css('background-color','#FFF').next('span').remove();
		});
	});
});

///
function login(){$('#frmAction').submit();}