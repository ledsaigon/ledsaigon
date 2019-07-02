
<div class="page-content">
<div class="title"><h1 class="title"> Cập nhật thông tin cá nhân</h1></div>
<?php
if($object){
	$properties = unserialize($object->properties);
?>
<?php if(isset($result)) echo '<p style="line-height:30px; color:green">'.$result.'</p>';?>
<form name="frmRegister" id="frm-register" method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="date_created" value="<?php echo $properties['date_created']?>">
	<p>
    <label>Tên nhà phân phối <sup>*</sup>  </label><input type="text" name="company" value="<?php echo isset($_POST['company'])?$_POST['company']:$object->company;?>" id="company"/>
    </p>
    <?php if(isset($error_company)) echo $error_company?>
    <p>
    <label>Người đại diện <sup>*</sup>  </label><input type="text" name="fullname" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:$object->fullname;?>" id="fullname"/>
    </p>
   <?php if(isset($error_fullname)) echo $error_fullname?>
    
    <p>
    <label>Số điện thoại <sup>*</sup></label><input type="text" name="cell" value="<?php echo isset($_POST['cell'])?$_POST['cell']:$object->cell;?>" id="cell"/>
   <p class="ghiChu">(Đây là số điện thoại để ban quản trị webiste liên hệ khi có sự cố)</p>
    </p>
    <?php if(isset($error_cell)) echo $error_cell?>
    <p>
    <label>Số điện thoại 2<sup>*</sup></label><input type="text" name="cell2" value="<?php echo isset($_POST['cell2'])?$_POST['cell2']:$object->cell2;?>" id="cell2"/>
    <p class="ghiChu">(Đây là số điện thoại để nhà thuốc liên hệ đặt hàng)</p>
    </p>
    <?php if(isset($error_cell2)) echo $error_cell2?>
    <p>
    <label>Địa chỉ nhà phân phối <sup>*</sup></label><input type="text" name="address" value="<?php echo isset($_POST['address'])?$_POST['address']:$object->address;?>" id="address"/>
    </p>
    <?php if(isset($error_address)) echo $error_address?>
    <p>
    <label><?php echo lang('email')?> <sup>*</sup> </label><input type="text" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:$object->email;?>" id="email"/>
    <p class="ghiChu">(Đây là email để ban quản trị webiste liên hệ khi có sự cố)</p>
    </p>
    <?php if(isset($error_email)) echo $error_email?>
    
    <p>
    <label><?php echo lang('email')?> 2<sup>*</sup> </label><input type="text" name="email2" value="<?php echo isset($_POST['email2'])?$_POST['email2']:$properties['email2'];?>" id="email2"/>
    <p class="ghiChu">(Đây là email để nhà thuốc liên hệ đặt hàng)</p>
    </p>
    <?php if(isset($error_email2)) echo $error_email2?>
  
    <p>
    <label>Website </label><input type="text" name="website" value="<?php echo isset($_POST['website'])?$_POST['website']:$properties['website']?>" id="website" />
    </p>

     <p><label>Hình đại diện</label><input type="file" name="avatar"  /><br>
     <?php
	 if($properties['avatar']){
		 echo '<img src="uploads/account/a_'.$properties['avatar'].'" style="margin-left:150px"/>';
		 echo '<input type="hidden" name="old_avatar" value="'.$properties['avatar'].'">';
		 }?>
     </p>
   
    <p class="btn-submit">
    	<input type="submit" name="submit" id="submit" class="button" value="Lưu" title="" />
    </p>
</form>
<?php }?>
</div>
