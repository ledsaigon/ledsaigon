
<div class="page-content">
<div class="title"><h3 class="title">Cập nhật bài viết </h3></div>
<?php if($object){?>
<form name="frmProduct" id="frmProduct" method="post" enctype="multipart/form-data">
<p><label>Tiêu đề <sup>*</sup></label>
<input type="text" name="title" value="<?php if(isset($_POST['title'])) echo $_POST['title'];else echo $object->vn_title?>" />
</p>
<?php if(isset($error_title)) echo $error_title?>



<p><label>Mô tả  <sup>*</sup></label>
<textarea name="sapo" cols="50" rows="10" style="height:90px" ><?php if(isset($_POST['sapo'])) echo $_POST['sapo'];else echo $object->vn_sapo?></textarea>
</p>
<?php if(isset($error_sapo)) echo $error_sapo?>
<div class="ckedtior">
<p style="float:left;width:120px">
<label>Nội dung</label></p>
<div>
<textarea name="detail" ><?php if(isset($_POST['detail'])) echo $_POST['detail'];else echo htmlspecialchars_decode($object->vn_detail)?></textarea>
</div>
</div>
<?php if(isset($error_detail)) echo $error_detail?>
<p><label>Hình đại diện</label>
<input type="file" name="avatar"   style="width:200px"/>
<?php if($object->avatar){
echo '<img src="uploads/news/a_'.$object->avatar.'" style="float:left"/>';
echo '<input type="hidden" name="old_avatar" value="'.$object->avatar.'"/>';
}
?>
</p>
<p class="btn"><input type="submit" name="submit" value="Cập nhật" class="button">
<input type="button" name="button" value="Hủy bỏ" onclick="location.href='<?php echo base_url()?>nha-phan-phoi/khuyen-mai.html'" class="button">

</p>
</form>
<?php }?>
</div>
<script type="text/javascript" src="publics/ckeditor-standard/ckeditor.js"></script>
<script type="text/javascript">
//<![CDATA[
var editor = CKEDITOR.replace( 'detail' , {height:'250',language: 'vi'} );
//]]>
</script>