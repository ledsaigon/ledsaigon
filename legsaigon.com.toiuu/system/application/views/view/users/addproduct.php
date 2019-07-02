
<div class="page-content">
<div class="title"><h3 class="title">Thêm sản phẩm </h3></div>
<form name="frmProduct" id="frmProduct" method="post" enctype="multipart/form-data">
<p><label>Tên sản phẩm <sup>*</sup></label>
<input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']?>" />
</p>
<?php if(isset($error_name)) echo $error_name?>
<p><label>Nhóm <sup>*</sup></label>
<select name="cId">
<option value="">--- Chọn nhóm ---</option>
<?php if($category){
	foreach($category as $cate){
		echo '<option value="'.$cate['id'].'" '.(isset($_POST['cId'])&&$_POST['cId']==$cate['id']?"selected":"").'>'.$cate['vn_name'].'</option>';
		}
	}?>
</select>
</p>
<?php if(isset($error_cId)) echo $error_cId?>
<p><label>Giá <sup>*</sup></label>
<input type="text" name="price" value="<?php if(isset($_POST['price'])) echo $_POST['price']?>" style="width:150px" />
VNĐ. <strong>Đơn vị tính</strong> <sup>*</sup>  
<select name="unit" id="unit" style="width:110px">
<option value="">--- Chọn ---</option>
<option value="Vỉ" <?php if(isset($_POST['unit'])&& $_POST['unit']=='Vỉ') echo 'selected' ?>>Vỉ</option>
<option value="Viên" <?php if(isset($_POST['unit'])&& $_POST['unit']=='Viên') echo 'selected' ?>>Viên</option>
<option value="Hộp" <?php if(isset($_POST['unit'])&& $_POST['unit']=='Hộp') echo 'selected' ?>>Hộp</option>
<option value="Chai" <?php if(isset($_POST['unit'])&& $_POST['unit']=='Chai') echo 'selected' ?>>Chai</option>
<option value="Lọ" <?php if(isset($_POST['unit'])&& $_POST['unit']=='Lọ') echo 'selected' ?>>Lọ</option>
<option value="Bịch" <?php if(isset($_POST['unit'])&& $_POST['unit']=='Bịch') echo 'selected' ?>>Bịch</option>
<option value="Gói" <?php if(isset($_POST['unit'])&& $_POST['unit']=='Gói') echo 'selected' ?>>Gói</option>
<option value="100 Gram" <?php if(isset($_POST['unit'])&& $_POST['unit']=='100 Gram') echo 'selected' ?>>100 Gram</option>

</select>
</p>
<?php if(isset($error_price)) echo $error_price?>
<?php if(isset($error_unit)) echo $error_unit?>
<p><label>Hình sản phẩm <sup>*</sup></label>
<input type="file" name="avatar"   style="width:200px"/>
</p>
<?php if(isset($error_avatar)) echo $error_avatar?>
<p><label>Liên kết sản phẩm</label>
<input type="text" name="link" placeholder="Đường link tới webiste của bạn khi click vào sản phẩm" value="<?php if(isset($_POST['link'])) echo $_POST['link'];?>"/>
</p>
<div class="ckedtior">
<p style="float:left;width:120px"><label>Mô tả sản phẩm <sup>*</sup></label>
<div>
<textarea name="detail" cols="50" ><?php if(isset($_POST['detail'])) echo $_POST['detail']?></textarea>
</div>
</p>
</div>

<?php if(isset($error_detail)) echo $error_detail?>
<div class="ckedtior">
<p style="float:left;width:120px">
<label>Ghi chú</label></p>
<div>
<textarea name="note" ><?php if(isset($_POST['note'])) echo $_POST['note']?></textarea>
</div>
</div>

<?php if(isset($error_note)) echo $error_note?>

<p class="btn"><input type="submit" name="submit" value="Thêm" class="button">
<input type="reset" name="reset" value="Nhập lại" class="button">
<input type="button" name="button" value="Hủy bỏ" onclick="location.href='<?php echo base_url()?>nha-phan-phoi/quan-ly-san-pham.html'" class="button">

</p>
</form>
</div>
<script type="text/javascript" src="publics/ckeditor-basic/ckeditor.js"></script>
<script type="text/javascript">
//<![CDATA[
var editor = CKEDITOR.replace( 'detail' , {height:'150',language: 'vi'} );
var editor = CKEDITOR.replace( 'note' , {height:'80',language: 'vi'} );
//]]>
</script>