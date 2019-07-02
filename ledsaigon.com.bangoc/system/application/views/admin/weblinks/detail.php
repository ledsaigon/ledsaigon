<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>
<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 
<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#disable_top_page").css('display','block');
        $(".languageList").hide();
		$("#cboStatus").val(('<?php echo $status ?>' == '') ? '1' : '<?php echo $status ?>');
		
		$("#frmAction").validationEngine();

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
		$(".button_save_new").click(function(){
			$("#status").val('new');
			$("#frmAction").submit();
			return false;
		});
	});
</script>

<div class="ui-widget-content ui-corner-all"> 
                    <h3 class="ui-widget-header ui-corner-all">
						<span>
							<?php echo $title_site ?>
                        </span>
						<div class="function_button">
                        	<a href="javascript:save();" class="button_save">Save</a>
                            <a href="javascript:save_close();" class="button_save_close">Save & Close</a>
                            <a href="javascript:save_new();" class="button_save_new">Save & New</a>
                            <span class="line"></span>
                            <a href="AdminCP/weblinks/main" class="button_cancel">Calcel</a>
                            
                        </div>
                        <div class="clear"></div>
                    </h3> 
                    <p>
                   
                    	<form action="" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">
                            <input type="hidden" id="action" name="action" value="action"/>
                            <input type="hidden" id="status" name="status" value="save"/>
                            <input type="hidden" id="txtID" name="txtID" value="<?php echo $id ?>"/>
                            
                            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>
                           	<div>
                            	<table cellpadding="0" cellspacing="0" border="0" id="table_data_source">
                                	<tr>
                                    	<th colspan="2"><?php echo lang('detail')?></th>
                                    </tr>
                                	<tr>
                                    	<td class="border width_display_td">ID</td>
                                        <td class="border"><b><?php echo $id ?></b></td>
                                    </tr>
                                     <tr>
                                    	<td class="border"><?php echo lang('status')?></td>
                                        <td class="border">
                                        	<select id="cboStatus" name="cboStatus" class="text  validate[required]">
                                                <option value="1"><?php echo lang('display')?> </option>
                                                <option value="0"><?php echo lang('hide')?></option>
                                                <option value="2"><?php echo lang('deleted')?></option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td class="border width_display_td"><?php echo lang('name')?></td>
                                        <td class="border"><input value="<?php echo $vn_name?>" type="text" id="vn_name" name="vn_name" class="text  validate[required]"/></td>
                                    </tr>
                                  <?php if($englishLang){?> 
                                    <tr>
                                    	<td class="border"><?php echo lang('en_name')?></td>
                                        <td class="border"><input value="<?php echo $en_name ?>" type="text" id="en_name" name="en_name" class="text validate[required]"/></td>
                                    </tr>
                                    <?php }?>
                                    <tr>
                                    	<td class="border">Link</td>
                                        <td class="border"><input value="<?php echo $link ?>" type="text" id="link" name="link" class="text validate[required]"/></td>
                                    </tr>
                                    
                                
                                    
                                   
                                </table>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </p>
                    <h3 class="ui-widget-header ui-corner-all">
                    	<div class="function_button">
                        	<a href="" class="button_save">Save</a>
                            <a href="" class="button_save_close">Save & Close</a>
                            <a href="" class="button_save_new">Save & New</a>
                            <span class="line"></span>
                            <a href="AdminCP/weblinks/main/" class="button_cancel">Calcel</a>
                          
                        </div>
                        <div class="clear"></div>
                    </h3> 
				</div>
<script type="text/javascript">
//<![CDATA[
var editor = CKEDITOR.replace( 'details' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, 'resource/ckfinder/' ) ;
//]]>
</script>