<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>

<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 

<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>

<script type="text/javascript" src="resource/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="resource/ckfinder/ckfinder.js"></script>

<script type="text/javascript" src="publics/scripts/priceformat.js"></script>





<script type="text/javascript">

$(document).ready(function() {

	//$('#price').priceFormat();

	//$('#price_km').priceFormat();

$("#disable_top_page").css('display','block');

$(".languageList").hide();

$("#cId").val(('<?php echo $cid ?>' == '') ? '' : '<?php echo $cid ?>');

$("#dotHang").val(('<?php echo $dh ?>' == '') ? '' : '<?php echo $dh ?>');

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

// add image

$('#addFile').click(function(){

	//alert(1);

	$('.addFile').append('<p><input type="file" name="files[]"></p>');

	

	});

});









</script>

<?php

 ?>





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

<select id="cboStatus" name="cboStatus"  style="width:150px">

<option value="0"><?php echo lang('s_hide')?></option>

<option value="1"><?php echo lang('s_display')?></option>

<option value="2"><?php echo lang('s_deleted')?></option>

</select>

</td>

</tr>



<tr > 

<td class="border"> 

<?php echo lang('category')?>

</td> 

<td class="border"> 

<select id="cId" name="cId" style="width:250px">

<?php echo $categoryCombo?>

</select>

</td> 

</tr>



<tr>

<td class="border width_display_td">Tên </td>

<td class="border"><input value="<?php echo $vn_name?>" type="text" id="vn_name" name="vn_name" class="text  validate[required]" onblur="return getKey('vn_name','slug');"/></td>

</tr>

<?php if($englishLang){?>

<tr>

                                    	<td class="border width_display_td">Tên  (Tiếng Anh)</td>

                                        <td class="border"><input value="<?php echo $en_name?>" type="text" id="en_name" name="en_name" class="text  validate[required]" /></td>

</tr>

<?php }?>

<tr>

<td class="border"><?php echo lang('slug')?></td>

<td class="border"><input value="<?php echo $slug ?>" type="text" id="slug" name="slug" class="text validate[required]" onblur="return getKey('vn_name','slug');"/></td>

</tr>

 



<tr>

<td class="border"><?php echo lang('price')?>  

</td>

<td class="border"><input value="<?php echo $price ?>" type="text" id="price" name="price" class="text" style="width:200px"/>&nbsp;&nbsp;VNĐ &nbsp; &nbsp; &nbsp; 

</td>

</tr>



<tr>

<td class="border"><?php echo lang('promotion_price')?>  

</td>

<td class="border"><input value="<?php echo $khuyenmai ?>" type="text" id="khuyenmai" name="khuyenmai" class="text" style="width:200px"/>&nbsp;&nbsp;% &nbsp; &nbsp; &nbsp; 

</td>

</tr>



 <tr>

<td class="border">Mã sản phẩm 

</td>

<td class="border" ><input  value="<?php echo $code ?>" type="text" id="code" name="code" class="text" style="width:200px"/>

</td>

</tr>



<!--<tr>

<td class="border">Thương hiệu 

</td>

<td class="border" ><input  value="<?php echo $hang_sx ?>" type="text" id="hang_sx" name="hang_sx" class="text" style="width:200px"/>

</td>

</tr> -->







<tr>

<td class="border"><?php echo lang('position')?></td>

<td class="border">



<input value="<?php echo $position ?>" type="text" id="position" name="position" class="text " style="width:200px"/>

&nbsp; &nbsp; &nbsp; Bán chạy&nbsp;  <input type="checkbox" name="home" value="1"  <?php if($home==1) echo 'checked';?>/>

</td>

</tr>

<tr> 

<td colspan="2" class="titleFCK">Mô tả</td> 

</tr> 

<tr> 

<td colspan="2" class="border">

<textarea style="width:99%;" name="vn_sapo" id="vn_sapo" ><?php echo $vn_sapo ?></textarea>

</td> 

</tr>


<tr> 

<td colspan="2" class="titleFCK">Mô tả tiếng anh</td> 

</tr> 

<tr> 

<td colspan="2" class="border">

<textarea style="width:99%;" name="en_sapo" id="en_sapo" ><?php echo $en_sapo ?></textarea>

</td> 

</tr>



 <?php if($seoWeb){?> 
 
                                     <tr> 

                                    <td class="border">Keywords </td>

                                     <td class="border">

<input value="<?php echo $vn_keyword ?>" type="text" id="vn_keyword" name="vn_keyword" class="text" />                                        </td> 

                                    </tr>


                                  <tr> 

                                    <td class="border">Title </td>

                                     <td class="border">

<input value="<?php echo $vn_title_site ?>" type="text" id="vn_title_site" name="vn_title_site"  class="text" />                                        </td> 

                                    </tr>

                                    <?php if($englishLang){?>

                                      <tr> 

                                    <td class="border">Title (Tiếng Anh)</td>

                                     <td class="border">

<input value="<?php echo (isset($en_title_site)&&!empty($en_title_site))? $en_title_site:'' ?>" type="text" id="en_title_site" name="en_title_site"  class="text" />                                        </td> 

                                    </tr>

                                    <?php }?>


                                    <tr> 

                                    <td class="border">Description</td>

                                        <td  class="border">

                                            <textarea style="width:99%; height:80px" name="vn_description" id="vn_description" class="text"><?php echo $vn_description ?></textarea>

                                        </td> 

                                    </tr>

                                     <?php if($englishLang){?>

                                          <tr> 

                                    <td class="border">Description (Tiếng Anh)</td>

                                        <td  class="border">

                                            <textarea style="width:99%; height:80px" name="en_description" id="en_description" class="text"><?php echo $en_description ?></textarea>

                                        </td> 

                                    </tr>

                                     <?php }?>

<?php }?>

<tr> 

<td colspan="2" class="titleFCK">Chi tiết sản phẩm </td> 

</tr> 

<tr> 

<td colspan="2" class="border">

<textarea style="width:99%;" name="vn_detail" id="vn_detail" ><?php echo $vn_detail ?></textarea>

</td> 

</tr>





<?php if($englishLang){?>

<tr> 

<td colspan="2" class="titleFCK"><?php echo lang('detail_content') ?>  (Tiếng Anh)</td> 

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

<?php if(isset($avatar) && !empty($avatar)){?>

<img src="uploads/products/a_<?php echo $avatar?>"  /><br />

<input type="hidden" name="old_avatar" id="old_avatar" value="<?php echo $avatar?>" />

<?php }?>

<input type="file" name="avatar" id="avatar" />

</td>

</tr>

<?php if($seoWeb){?>

<!--<td class="border">Title của hình ảnh (Thẻ title)</td>

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

<tr class="border">

                                <td class="border">Hình ảnh đính kèm</td>

                                <td class="border">

<?php if(isset($properties['photos'])&& count($properties['photos'])> 0){

	foreach($properties['photos'] as $photo){?>

		<div class="avatar" style="clear:both; margin-bottom:5px">

		<img src="<?php echo base_url().'uploads/products/a_'.$photo?>" width="100" />

		<a href="<?php echo base_url().'AdminCP/products/deleteFile/'.$id.'/'.$photo?>" title="Xóa file này"><span class="deleteAvatar">Xóa</span></a>

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

</table>

</div>

<div class="clear"></div>

</form>

</p>

<?php $this->load->view('admin/inc/bottom_toolbar_detail')?>

</div>



<script type="text/javascript">



var editor = CKEDITOR.replace( 'vn_sapo' , {height:'150',language: 'vi'} );

CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;

var editor = CKEDITOR.replace( 'en_sapo' , {height:'150',language: 'en'} );

CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;
//]]>

var editor = CKEDITOR.replace( 'vn_detail' , {height:'150',language: 'vi'} );

CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;

var editor = CKEDITOR.replace( 'en_detail' , {height:'150',language: 'en'} );

CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;

</script>

