<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>
<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 
<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#disable_top_page").css('display','block');
        $(".languageList").hide();
		$("#pId").val(('<?php echo $pid ?>' == '') ? '' : '<?php echo $pid ?>');
		$("#cboAccess").val(('<?php echo $status ?>' == '') ? '1' : '<?php echo $status ?>');
		
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
                  <?php $this->load->view('admin/inc/top_toolbar_detail')?>
                    <p>
                   
                    	<form action="" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">
                            <input type="hidden" id="action" name="action" value="action"/>
                            <input type="hidden" id="status" name="status" value="save"/>
                            <input type="hidden" id="txtID" name="txtID" value="<?php echo $id ?>"/>
                            <input type="hidden" id="position" name="position" value="<?php echo $position ?>"/>
                            
                            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>
                           	<div>
                            	<table cellpadding="0" cellspacing="0" border="0" id="table_data_source">
                                	<tr>
                                    	<th colspan="2">Chi tiết</th>
                                    </tr>
                                	<tr>
                                    	<td class="border width_display_td">ID</td>
                                        <td class="border"><b><?php echo $id ?></b></td>
                                    </tr>
                                   <tr>
                                    	<td class="border width_display_td">Tên </td>
                                        <td class="border"><input value="<?php echo $vn_name?>" type="text" id="vn_name" name="vn_name" class="text  validate[required]" <?php if($is_delete ==0){?>onblur="return getKey('vn_name','slug');" <?php }?>/></td>
                                    </tr>
                                                                     
  <?php if($englishLang){?>
                                    <tr>
                                    	<td class="border width_display_td">Tên (Tiếng Anh)</td>
                                        <td class="border"><input value="<?php echo $en_name?>" type="text" id="en_name" name="en_name" class="text  validate[required]" /></td>
                                    </tr>
                                      <?php }?>     
 <?php if($is_delete ==1){?>
                                    <tr>
                                    	<td class="border">Slug </td>
                                        <td class="border"><input value="<?php echo $slug ?>" type="text" id="slug" name="slug" class="text validate[required]" <?php if($usersInfo['u_type'] != 4) echo ' readonly="readonly"'?> /></td>
                                    </tr>
<?php }else{?>
 <tr>
                                    	<td class="border">Slug </td>
                                        <td class="border"><input value="<?php echo $slug ?>" type="text" id="slug" name="slug" class="text validate[required]" onblur="return getKey('vn_name','slug');"/></td>
                                    </tr>
<?php }?>
                                                            
                                   
                                     
                                    <tr>
                                    	<td class="border">Trạng thái</td>
                                        <td class="border">
                                        	<select id="cboAccess" name="cboAccess" class="text  validate[required]">
                                                <option value="1">Hiển thị </option>
                                                <option value="0">Không hiển thị </option>
                                                <!--<option value="2">Đã bị xóa</option>-->
                                            </select>
                                        </td>
                                    </tr>
                                    <tr > 
                                        <td class="border"> 
                                            Danh mục cha
                                        </td> 
                                        <td class="border"> 
                                            <select id="pId" name="pId" class="text  validate[required]">
                                            	<option value="0">Thư mục gốc</option>
                                                <?php echo $listCategory?>
                                            </select>
                                        </td> 
                                    </tr>
                                     <tr> 
                                    <td class="border"><?php echo lang('position')?></td>
                                     <td class="border">
<input value="<?php echo $position ?>" type="text" id="position" name="position" 
                                        class="text" style="width:100px" /> 
                                         &nbsp; &nbsp; &nbsp; Hiển thị trạng chủ&nbsp;  <input type="checkbox" name="home" value="1"  <?php if($home==1) echo 'checked';?>/>
                                         <?php if($usersInfo['u_type'] ==4){?> &nbsp; Không được phép xóa: <input type="checkbox" name="is_delete" value="1" <?php if($is_delete ==1) echo 'checked'?> /><?php } else {?>
										<input type="hidden" value="<?php echo $is_delete?>" name="is_delete" />
										<?php }?>                                     </td> 
                                    </tr>
                                    <?php if($seoWeb){?><tr> 
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
                                    <td class="border">Meta Description </td>
                                        <td  class="border">
                                            <textarea name="vn_description" id="vn_description" class="text"><?php echo $vn_description ?></textarea>
                                        </td> 
                                    </tr>
                                    <?php if($englishLang){?>
                                    <tr> 
                                    <td class="border">Meta Description (Tiếng Anh) </td>
                                        <td  class="border">
                                            <textarea name="en_description" id="en_description" class="text"><?php echo $en_description ?></textarea>
                                        </td> 
                                    </tr>
                                    <?php }?>
                                   <?php }?>
                               
                                <!-- <tr> 
                                    <td class="border"><?php echo ('Tóm tắt')?></td>
                                        <td  class="border">
                                            <textarea style="width:99%; height:80px" name="vn_sapo" id="vn_sapo" ><?php echo $vn_sapo ?></textarea>
                                        </td> 
                                    </tr>-->
                                    <?php if($englishLang){?>
                                      <!--<tr> 
                                    <td class="border"><?php echo ('Tóm tắt')?> (Tiếng Anh)</td>
                                        <td  class="border">
                                            <textarea style="width:99%; height:80px" name="en_sapo" id="en_sapo" ><?php echo $en_sapo ?></textarea>
                                        </td> 
                                    </tr>-->
                                    <?php }?>
                                     
                                    <!-- <tr> 
                                        <td colspan="2" class="titleFCK"><?php echo lang('detail_content') ?></td> 
                                    </tr> 
                                    <tr> 
                                        <td colspan="2" class="border">
                                            <textarea style="width:99%;" name="vn_detail" id="vn_detail" ><?php echo $vn_detail ?></textarea>
                                        </td> 
                                    </tr>-->
                                    
                                       <?php if($englishLang){?>
                                      <!-- <tr> 
                                        <td colspan="2" class="titleFCK"><?php echo lang('detail_content') ?> (Tiếng Anh) </td> 
                                    </tr> 
                                    <tr> 
                                        <td colspan="2" class="border">
                                            <textarea style="width:99%;" name="en_detail" id="en_detail" ><?php echo $en_detail ?></textarea>
                                        </td> 
                                    </tr>-->
                                     
                                   <?php }?>
                               

<tr>
<td class="border"><?php echo lang('avatar')?></td>
<td class="border">
<?php if(isset($avatar) && !empty($avatar)){?>
<img style="height: 100px" src="uploads/news/<?php echo $avatar?>"  /><br />
<input type="hidden" name="old_avatar" id="old_avatar" value="<?php echo $avatar?>" />
<?php }?>
<input type="file" name="avatar" id="avatar" />
</td>
</tr>



                                 
                                </table>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </p>
                   <?php $this->load->view('admin/inc/bottom_toolbar_detail')?>
				</div>
<script type="text/javascript" src="resource/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="resource/ckfinder/ckfinder.js"></script>
                
<script type="text/javascript">
//<![CDATA[
/*var editor = CKEDITOR.replace( 'vn_sapo' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, 'resource/ckfinder/' ) ;*/
var editor = CKEDITOR.replace( 'vn_detail' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, 'resource/ckfinder/' ) ;
//]]>
</script>
<?php if($englishLang){?>
<script type="text/javascript">
//<![CDATA[
var editor = CKEDITOR.replace( 'en_detail' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, 'resource/ckfinder/' ) ;
var editor = CKEDITOR.replace( 'en_sapo' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, 'resource/ckfinder/' ) ;
//]]>
</script>
<?php }?>