<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>
<script type="text/javascript" src="resource/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="resource/ckfinder/ckfinder.js"></script>
<div class="ui-widget-content ui-corner-all"> 
<p>

<form action="" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">
<input type="hidden" id="action" name="action" value="action"/>
<input type="hidden" id="status" name="status" value="save"/>
<center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>
<div>
<table cellpadding="0" cellspacing="0" border="0" id="table_data_source">
<tr>
<td class="border" width="150"><?php echo lang('status')?></td>
<td class="border">
<?php if($status==1) echo '<span style="color:green">Đang hiển thị</span>';else {
					
			echo '<span style="color:red">Chưa duyệt </span>&nbsp; &nbsp;';
			echo '<input type="submit" name="btnActive" value="Duyệt sản phẩm này">';
				}?>
</td>
</tr>
<tr>

<td class="border"> 
<?php echo lang('category')?>
</td> 
<td class="border"> <?php echo $this->productcategories_m->getField('vn_name',$cid)?></td> 

</tr>

<tr>
<td class="border width_display_td">Tên </td>

<td class="border"><?php echo $vn_name?></td>

</tr>

<tr>
<td class="border">Liên kết</td>
<td class="border"><?php echo @$properties['link'] ?></td>

</tr>
<tr>
<td class="border"><?php echo lang('price')?>
</td>
<td class="border"><?php echo $price .'/'.@$properties['unit']?>
</td>
</tr>

<tr>

<tr> 
<td class="border">Ghi chú</td> 

<td  class="border">
<?php echo htmlspecialchars_decode(@$properties['note']) ?></td> 
</tr>
<tr> 
<td class="border"><?php echo lang('detail_content') ?> </td> 

<td  class="border">
<?php echo htmlspecialchars_decode($vn_detail) ?></td> 
</tr>
<tr>

<td class="border"><?php echo lang('avatar')?></td>

<td class="border">
<?php if($avatar){?>
<img src="uploads/products/a_<?php echo $avatar?>"  /><br />
<input type="hidden" name="old_avatar" id="old_avatar" value="<?php echo $avatar?>" />
<?php }?>

</td>
</tr>
<tr>
<td class="border"></td>
<td class="border"> <h4>Gửi mail thông báo  đăng sản phẩm không hợp lệ</h4>
				<p>Tiêu đề<br /> <input type="text" name="title" class="text" value="Sản phẩm  không hợp lệ [<?php echo $vn_name?>]"  /></p>
                <p>Nội dung<br /> <textarea name="message" id="message">
                Xin chào nhà phân phối: <strong><?php echo $this->users_m->getField('company',$user_id) ?></strong>
                <p>Sản phẩm<strong>"<?php echo $vn_name?>"</strong> bị từ chối vì lý do:</p>
                <p>[Viết rỏ lý do]</p>
                
                <p>Email này được gửi tự động, vui lòng không trả lời  email này, mọi thắc mắc xin liên hệ với ban quản trị webiste. </p>
                <p>Trân trọng cảm ơn</p>
                <p><strong><?php echo $_SERVER['HTTP_HOST']?></strong></p>
                </textarea> </p>
                <p><input type="submit" name="btnSend" value="Gửi mail và ẩn tin này" /></p>
                 <p><a href="<?php echo $url_cancel?>">Quay lại</a></p></td>
</tr>

</table>
</div>
<div class="clear"></div>
</form>

</p>

</div>
<script type="text/javascript">

//<![CDATA[
var editor = CKEDITOR.replace( 'message' , {height:'150',language: 'vi'} );
CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;
//]]>
</script>