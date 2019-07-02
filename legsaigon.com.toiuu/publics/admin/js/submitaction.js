// JavaScript Document
// jquery paging
	$(document).ready(function() {		
		$( ".button" ).button();
		oTable = $('#table_data').dataTable({
			"bJQueryUI": true,
			"aaSorting": [[ 6, "desc" ]],
			"sPaginationType": "full_numbers",
			"iDisplayLength": 25,
			"oLanguage": {
				"sLengthMenu": "Hiển thị _MENU_ mẫu tin",
				"sZeroRecords": "Không có dữ liệu",
				"sInfo": "Hiển thị từ _START_ đến _END_ của _TOTAL_ mẫu tin",
				"sInfoEmpty": "Hiển thị từ 0 đến 0",
				"sInfoFiltered": "(Lọc từ _MAX_ mẫu tin)"
			}
		});
	} );
// jquery submit
$(document).ready(function() {
		$("#status_error").fadeOut(5000);
		$("#chkCheckAll").click(function() {
			$(".chkCheck").each(function() {
                $(this).attr('checked', $("#chkCheckAll").attr('checked'));
            });
        });
		$(".button_save").click(function(){
			$("#status").val('save');
			$("#frmAction").submit();
			return false;
		});
		$(".button_save_close").click(function(){
			$("#status").val('close');
			$("#frmAction").submit();
			return false;
		});
		
		$(".button_new").click(function(){

		});		
		
		$(".button_edit").click(function(){
			$flag = false;
			$(".chkCheck").each(function() {
                if($(this).attr('checked') == true)
				{
					location.href = '<?php echo base_url() ?>AdminCP/staticpages/detail/' + $(this).val();
					$flag = true;
				}
            });
			
			if(!$flag)	alert('Không có mẩu tin nào được chọn');
			
			return false;
		});
		// delete many item
		$(".button_delete").click(function(){
			
			$flag = false;
			
			$(".chkCheck").each(function() {
                if($(this).attr('checked') == true)
				 $flag = true;
            });
			if($flag)
			{
				$("#action").val('delete_all');
				$("#frmAction").submit();
			}
			else alert('Không có mẩu tin nào được chọn');
			return false;
		});	
		
		// enable many item
		$(".button_enable").click(function(){
			
			$flag = false;
			
			$(".chkCheck").each(function() {
                if($(this).attr('checked') == true)
				 $flag = true;
            });
			if($flag)
			{
				$("#action").val('enable_all');
				$("#frmAction").submit();
			}
			else alert('Không có mẩu tin nào được chọn');
			return false;
		});	
		
		// disable many item
		$(".button_disable").click(function(){
			
			$flag = false;
			
			$(".chkCheck").each(function() {
                if($(this).attr('checked') == true)
				 $flag = true;
            });
			if($flag)
			{
				$("#action").val('disable_all');
				$("#frmAction").submit();
			}
			else alert('Không có mẩu tin nào được chọn');
			return false;
		});	
		
		/*$(".delete_item").click(function(){
			$("#action").val('delete');
			$("#txtArrayID").val($(this).attr('rel'));
			$("#frmAction").submit();
			return false;
		});	
		$(".enable_item").click(function(){
			$("#action").val('enable');
			$("#txtArrayID").val($(this).attr('rel'));
			$("#frmAction").submit();
			return false;
		});	
		$(".disable_item").click(function(){
			$("#action").val('disable');
			$("#txtArrayID").val($(this).attr('rel'));
			$("#frmAction").submit();
			return false;
		});	
		$(".enable_home").click(function(){
			$("#action").val('enable_home');
			$("#txtArrayID").val($(this).attr('rel'));
			$("#frmAction").submit();
			return false;
		});	
		$(".delete_home").click(function(){
			$("#action").val('delete_home');
			$("#txtArrayID").val($(this).attr('rel'));
			$("#frmAction").submit();
			return false;
		});	*/	
		$(".button_save_order").click(function(){
			$("#action").val('sort');
			$("#frmAction").submit();
			return false;
		});
		$(".button_clean_trash").click(function(){
			$("#action").val('clean_trash');
			$("#frmAction").submit();
			return false;
		});	
	});
	function formSubmit(form,vact, vid)
{
	//alert('hi');
	f = document.getElementById(form);
	f.action.value = vact;
	f.txtArrayID.value = vid;
	f.submit();
}