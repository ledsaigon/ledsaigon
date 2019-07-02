// JavaScript Document
$(function(){
	$(".btnCartClear").click(function(){
		$url = base_url+'cart/ClearCart/'+Math.random();
		$.get($url,function(data){
			alert(data);
			$html = "Sản phẩm: 0";
			$html += "<br/>Số lượng: 0";
			$(".cartItem").html($html);
			$(".cartList").html("$0");
		});
		return false;
	});
	
	$(".btnAdd,.btnAddCart").each(function(){
		$(this).click(function(){
			$id = $(this).attr('rel');
			$qty = ($(this).attr('class').indexOf("btnAddCart") > -1) ? (($("#txtQty").val() == 0) ? 1 : $("#txtQty").val()) : 1;
			$('.product_id_'+$id).hide();
			$html = "<span class='progress'><img src='"+base_url+"publics/images/loading.gif' height='15' width='15'  style='float:right;'/></span>";
			$(this).next('span').remove()
			$(this).after($html);						

			$url = base_url+'cart/AddCart/'+$id+'/'+$qty+"/"+Math.random();
			$.ajax({
				url: $url,
				type: "POST",
				cache: false,
				dataType: "json",
				success: function(data){
					$html = "Sản phẩm: " + data.totalItems;
					$html += "<br/>Số lượng: " + data.totalQty;
					$("#total_items").html(data.totalItems);
					$("#total_qty").html(data.totalQty);
					$("#total_price").html(data.totalAmout);
					alert(add_success);
				},
				error: function(){
					alert(add_error);
				},
				complete: function(){
					$('.product_id_'+$id).next('span').remove();
					$('.product_id_'+$id).show();					
				},
				statusCode: {
					404: function() {
						alert('page not found');
					}
				}
			});
			return false;
		});	
	});

});