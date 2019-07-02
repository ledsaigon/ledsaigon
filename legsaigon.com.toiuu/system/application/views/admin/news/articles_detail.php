<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>
<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 
<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>
<script type="text/javascript" src="resource/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="resource/ckfinder/ckfinder.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#disable_top_page").css('display','block');
        $(".languageList").hide();
		$("#cId").val(('<?php echo $cid ?>' == '') ? '' : '<?php echo $cid ?>');
		$("#cboStatus").val(('<?php echo $status ?>' == '') ? '1' : '<?php echo $status ?>');
	;
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
                                        	<select id="cboStatus" name="cboStatus" class="text  validate[required]" style="width:150px">
                                            	<option value="0"><?php echo lang('s_hide')?></option>
                                                <option value="1"><?php echo lang('s_display')?></option>
                                                <option value="2"><?php echo lang('s_deleted')?></option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php if(isset($categoryCombo) && !empty($categoryCombo)){?>
                                    <tr > 
                                        <td class="border"> 
                                            Chuyên mục
                                        </td> 
                                        <td class="border"> 
                                            <select id="cId" name="cId" class="text  validate[required]" style="width:250px">
                                            <?php echo $categoryCombo?>
                                            </select>
                                        </td> 
                                    </tr>
                                    <?php }?>
                                     
                                    <tr>
                                    	<td class="border width_display_td"><?php echo lang('title')?></td>
                                        <td class="border"><input value="<?php echo $vn_title?>" type="text" id="vn_title" name="vn_title" class="text  validate[required]" onblur="return getKey('vn_title','slug');"/></td>
                                    </tr>
                                    <?php if($englishLang){?>
                                        <tr>
                                    	<td class="border width_display_td"><?php echo lang('title')?> (Tiếng Anh)</td>
                                        <td class="border"><input value="<?php echo $en_title?>" type="text" id="en_title" name="en_title" class="text  validate[required]" /></td>
                                    </tr>
                                    <?php }?>
                                  
                                    <tr>
                                    	<td class="border"><?php echo lang('slug')?></td>
                                        <td class="border"><input value="<?php echo $slug ?>" type="text" id="slug" name="slug" class="text validate[required]" onblur="return getKey('vn_title','slug');"/></td>
                                    </tr>
                                      
                                   <tr>
                                    	<td class="border"><?php echo lang('position')?></td>
                                        <td class="border"><input value="<?php echo $position ?>" type="text" id="position" name="position" class="text " style="width:150px"/>
                                      &nbsp; &nbsp; &nbsp; Hiển thị trạng chủ&nbsp;  <input type="checkbox" name="home" value="1"  <?php if($home==1) echo 'checked';?>/></td>
                                    </tr>
                                    <?php if($seoWeb){?>
                                    <tr>
                                     <td class="border">Meta Title</td>
                                     <td class="border">
<input value="<?php echo $vn_title_site ?>" type="text" id="vn_title_site" name="vn_title_site" class="text"/>               
			                         </td> 
                                    </tr>
                                    <?php if($englishLang){?>
                                     <tr>
                                     <td class="border">Meta Title (Tiếng Anh)</td>
                                     <td class="border">
<input value="<?php echo $en_title_site ?>" type="text" id="en_title_site" name="en_title_site" class="text"/>               
			                         </td> 
                                    </tr>
                                    <?php }?>
                                     <tr>
                                     <td class="border">Meta Keyword</td>
                                     <td class="border">
<input value="<?php echo $vn_keyword ?>" type="text" id="vn_keyword" name="vn_keyword" class="text"/>               
			                         </td> 
                                    </tr>
                                    <!-- <tr>
                                     <td class="border">Meta Keyword (Tiếng Anh)</td>
                                     <td class="border">
<input value="<?php echo $en_keyword ?>" type="text" id="en_keyword" name="en_keyword" class="text"/>               
			                         </td> 
                                    </tr>-->
                                    <tr>
                                     <td class="border">Meta Description</td>
                                     <td class="border">
<textarea  id="vn_description" name="vn_description" ><?php echo $vn_description?></textarea>             
			                         </td> 
                                    </tr>
                                    <?php if($englishLang){?>
                                    <tr>
                                     <td class="border">Meta Description (Tiếng Anh)</td>
                                     <td class="border">
<textarea  id="en_description" name="en_description" ><?php echo $en_description?></textarea>             
			                         </td> 
                                    </tr>
                                    <?php }?>
                                    <?php }?>
                                     
                                    <tr> 
                                    <td class="border"><?php echo ('Tóm tắt')?></td>
                                        <td  class="border">
                                            <textarea style="width:99%; height:80px" name="vn_sapo" id="vn_sapo" class="text"><?php echo $vn_sapo ?></textarea>
                                        </td> 
                                    </tr>
                                    <!-- <?php if($englishLang){?>
                                      <tr> 
                                    <td class="border"><?php echo ('Tóm tắt')?> (Tiếng Anh)</td>
                                        <td  class="border">
                                            <textarea style="width:99%; height:80px" name="en_sapo" id="en_sapo" class="text  validate[required]"><?php echo $en_sapo ?></textarea>
                                        </td> 
                                    </tr>
                                    <?php }?> -->
                                     
                                     <tr> 
                                        <td colspan="2" class="titleFCK"><?php echo lang('detail_content') ?></td> 
                                    </tr> 
                                    <tr> 
                                        <td colspan="2" class="border">
                                            <textarea style="width:99%;" name="vn_detail" id="vn_detail" ><?php echo $vn_detail ?></textarea>
                                        </td> 
                                    </tr>
                                    
                                       <?php if($englishLang){?>
                                       <tr> 
                                        <td colspan="2" class="titleFCK"><?php echo lang('detail_content') ?> (Tiếng Anh) </td> 
                                    </tr> 
                                    <tr> 
                                        <td colspan="2" class="border">
                                            <textarea style="width:99%;" name="en_detail" id="en_detail" ><?php echo $en_detail ?></textarea>
                                        </td> 
                                    </tr>
                                     
                                   <?php }?>
                                      <tr>
                                    	<td class="border"><?php echo lang('avatar')?></td>
                                        <td class="border">
                                        <?php if($avatar){?>
                                        <img src="uploads/news/a_<?php echo $avatar?>" width="150" /><br />
                                        <input type="hidden" name="old_avatar" id="old_avatar" value="<?php echo $avatar?>" />
                                        <?php }?>
                                        	<input type="file" name="avatar" id="avatar" />
                                        </td>
                                    </tr>

<tr class="border">
                                <td class="border">Hình ảnh đính kèm</td>
                                <td class="border">
<?php if(isset($properties['photos'])&& count($properties['photos'])> 0){
    foreach($properties['photos'] as $photo){?>
        <div class="avatar" style="clear:both; margin-bottom:5px">
        <img src="<?php echo base_url().'uploads/news/a_'.$photo?>" width="100" />
        <a href="<?php echo base_url().'AdminCP/articles/deleteFile/'.$id.'/'.$photo?>" title="Xóa file này"><span class="deleteAvatar">Xóa</span></a>
        </div>
        <?php }
    }?>
                                <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#addFile').click(function(){
                                        $('#files').append('<input type="file" name="files[]"/><br>');
                                        });
                                    });
                                </script>
                                <p style="clear:both">
                                <input type="button" id="addFile" value="Thêm hình Ảnh đính kèm" /><br />
                                <input type="file" name="files[]" />
                                </p>
                                <p id="files"></p>
                                
                                </td>
                                </tr> 


<!--
                                   <tr>
                                        <td class="border">Link download</td>
                                        <td class="border">
                                        <?php if(isset($link_download) && !empty($link_download)){?>
                                        <a href="uploads/news/<?php echo $link_download ?>" download><?php echo $link_download ?></a><br /><br />
                                        <input type="hidden" name="old_file_download" id="old_file_download" value="<?php echo $link_download;?>" />
                                        <?php }?>
                                            <input type="file" name="file_download" id="file_download" />
                                        </td>
                                    </tr> -->
                                     <?php if($seoWeb){?>
<!--                                    <tr>
<td class="border">Title của hình ảnh (Thẻ title)</td>
<td class="border"><input type="text" name="vn_img_title" id="vn_img_title" value="<?php if(isset($properties['vn_img_title'])) echo $properties['vn_img_title']?>" class="text" /></td>
</tr>
<tr>
<td class="border">Title của hình ảnh (Thẻ title) - Tiếng Anh</td>
<td class="border"><input type="text" name="en_img_title" id="en_img_title" value="<?php if(isset($properties['en_img_title'])) echo $properties['en_img_title']?>" class="text" /></td>
</tr>
<tr>
<td class="border">Ghi chú cho hình ảnh (Thẻ alt)</td>
<td class="border"><input type="text" name="vn_img_alt" id="vn_img_alt" value="<?php if(isset($properties['vn_img_alt'])) echo $properties['vn_img_alt']?>" class="text" /></td>
</tr>
<tr>
<td class="border">Ghi chú cho hình ảnh (Thẻ alt)- Tiếng Anh</td>
<td class="border"><input type="text" name="en_img_alt" id="en_img_alt" value="<?php if(isset($properties['en_img_alt'])) echo $properties['en_img_alt']?>" class="text" /></td>
</tr>-->
<?php }?>
                                   
                                </table>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </p>
             		<?php $this->load->view('admin/inc/bottom_toolbar_detail')?>
				</div>
<script type="text/javascript">
//<![CDATA[
var editor = CKEDITOR.replace( 'vn_detail' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;
//]]>
</script>
<?php if($englishLang){?>
<script type="text/javascript">
//<![CDATA[
var editor = CKEDITOR.replace( 'en_detail' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;
//]]>
</script>
<?php }?>