<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>
<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 
<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>
<script type="text/javascript" src="resource/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="resource/ckfinder/ckfinder.js"></script>
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
    <?php echo $title_page ?>
</span>
<div class="function_button">
    <a href="javascript:save();" class="button_save">Save</a>
    <span class="line"></span>
    <a href="javascript:save_close();" class="button_save_close">Save & Close</a>
    <span class="line"></span>
   
    <a href="<?php echo $url_cancel;?>" class="button_cancel">Calcel</a>
</div>
<div class="clear"></div>
</h3>
                    <p>
                   
                    	<form action="" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">
                            <input type="hidden" id="action" name="action" value="action"/>
                            <input type="hidden" id="status" name="status" value="save"/>
                            <input type="hidden" id="txtID" name="txtID" value="<?php echo $id ?>"/>
                            
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
                                        	<select id="cboStatus" name="cboStatus" style="width:200px">
                                                <option value="1"><?php echo lang('display')?> </option>
                                                <option value="0"><?php echo lang('hide')?></option>
                                                <!--<option value="2"><?php echo lang('deleted')?></option>-->
                                                <?php if($usersInfo['u_type']==4) echo '<option value="4">---</option>';?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td class="border width_display_td">Câu hỏi </td>
                                        <td class="border"><input value="<?php echo $vn_title?>" type="text" id="vn_title" name="vn_title" class="text  validate[required]"/></td>
                                    </tr>
                                    <?php if($englishLang ){ ?>
                                     <tr>
                                    	<td class="border width_display_td">Câu hỏi (Tiếng Anh)</td>
                                        <td class="border"><input value="<?php echo $en_title?>" type="text" id="en_title" name="en_title" class="text  validate[required]" /></td>
                                    </tr>
                                   <?php }?>
								
                                   <?php if($seoWeb){?>
                                   <tr> 
                                    <td class="border">Meta Title</td>
                                     <td class="border">
<input value="<?php echo $vn_title_site ?>" type="text" id="vn_title_site" name="vn_title_site" 
                                        class="text" />                                        </td> 
                                    </tr>
                                    <?php if($englishLang){?>
                                     <tr> 
                                    <td class="border">Meta Title (Tiếng Anh)</td>
                                     <td class="border">
<input value="<?php echo $en_title_site ?>" type="text" id="en_title_site" name="en_title_site" 
                                        class="text" />                                        </td> 
                                    </tr>
                                    <?php }?>
                                     <tr> 
                                    <td class="border">Meta Keyword</td>
                                     <td class="border">
<input value="<?php echo $vn_keyword ?>" type="text" id="vn_keyword" name="vn_keyword" 
                                        class="text" />                                        </td> 
                                    </tr>
                                    <?php if($englishLang){?>
                                    <tr>
                                     <td class="border">Meta Keyword (Tiếng Anh)</td>
                                     <td class="border">
<input value="<?php echo $en_keyword ?>" type="text" id="en_keyword" name="en_keyword" 
                                        class="text" />                                        </td> 
                                    </tr>
                                   <?php }?>
                                    <tr> 
                                    <td class="border">Meta Description</td>
                                        <td  class="border">
                                            <textarea  name="vn_description" id="vn_description" class="text"><?php echo $vn_description ?></textarea>
                                        </td> 
                                    </tr>
<?php if($englishLang){?>
                                     <tr> 
                                    <td class="border">Meta Description (Tiếng Anh)</td>
                                        <td  class="border">
                                            <textarea name="en_description" id="en_description" class="text"><?php echo $en_description ?></textarea>
                                        </td> 
                                    </tr>
                                    <?php }?>
                                    <?php } //end seo?>
                                    <tr> 
                                        <td colspan="2" class="titleFCK">Trả lời </td> 
                                    </tr> 
                                    <tr> 
                                        <td colspan="2" class="border">
                                            <textarea style="width:99%; height:440px;" name="vn_sapo" id="vn_sapo" ><?php echo $vn_sapo ?></textarea>
                                        </td> 
                                    </tr>
 <?php if($englishLang ){ ?>
                                    <tr> 
                                        <td colspan="2" class="titleFCK">Trả lời (Tiếng Anh)</td> 
                                    </tr> 
                                    <tr> 
                                        <td colspan="2" class="border">
                                            <textarea style="width:99%; height:440px;" name="en_sapo" id="en_sapo" ><?php echo $en_sapo ?></textarea>
                                        </td> 
                                    </tr>

                                    <?php }?>

                                </table>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </p>
                    <h3 class="ui-widget-header ui-corner-all">
                    	<div class="function_button">
                        	<a href="" class="button_save">Save</a>
                            <span class="line"></span>
                            <a href="" class="button_save_close">Save & Close</a>
                            <span class="line"></span>
                            <a href="AdminCP/staticpages/main/" class="button_cancel">Calcel</a>
                           
                        </div>
                        <div class="clear"></div>
                    </h3> 
				</div>
<script type="text/javascript">
//<![CDATA[
/*var editor = CKEDITOR.replace( 'vn_sapo' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, 'resource/ckfinder/' ) ;*/
var editor = CKEDITOR.replace( 'vn_sapo' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;
//]]>
</script>
<?php if($englishLang ){?>
<script type="text/javascript">
//<![CDATA[

var editor = CKEDITOR.replace( 'vn_sapo' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;

var editor = CKEDITOR.replace( 'en_sapo' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;
//]]>
</script>
<?php }?>