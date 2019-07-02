<script type="text/javascript">
function checkDieuKhoan(){
	checkDK = document.frmRegister.checkDK;
	//alert(checkDK.value);
	if(!checkDK.checked){
		checkDK.focus();
		return false;
		}
	return true;
	}
</script>
<div class="page-content">
<div class="title"><h1 class="title"> <a href="<?php echo base_url()?>dang-ky-lam-nha-thuoc.html" title="Đăng ký làm nhà  thuốc">Đăng ký làm nhà  thuốc</a><span style="margin-left:15px">Đăng ký làm nhà phân phối</span></h1></div>
<form name="frmRegister" id="frm-register" method="post" action="" enctype="multipart/form-data">
	<div class="note-form">
    	<p class="note"><?php echo lang('note_form_require')?></p>
        
    </div>
	<p>
    <label>Tên nhà phân phối <sup>*</sup>  </label><input type="text" name="company" value="<?php echo isset($_POST['company'])?$_POST['company']:'';?>" id="company"/>
    </p>
    <?php if(isset($error_company)) echo $error_company?>
    <p>
    <label>Người đại diện <sup>*</sup>  </label><input type="text" name="fullname" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:'';?>" id="fullname"/>
    </p>
   <?php if(isset($error_fullname)) echo $error_fullname?>
    
    <p>
    <label>Số điện thoại <sup>*</sup></label><input type="text" name="cell" value="<?php echo isset($_POST['cell'])?$_POST['cell']:'';?>" id="cell"/>
   <p class="ghiChu">(Đây là số điện thoại để ban quản trị webiste liên hệ khi có sự cố)</p>
    </p>
    <?php if(isset($error_cell)) echo $error_cell?>
    <p>
    <label>Số điện thoại 2<sup>*</sup></label><input type="text" name="cell2" value="<?php echo isset($_POST['cell2'])?$_POST['cell2']:'';?>" id="cell2"/>
    <p class="ghiChu">(Đây là số điện thoại để nhà thuốc liên hệ đặt hàng)</p>
    </p>
    <?php if(isset($error_cell2)) echo $error_cell2?>
    <p>
    <label>Địa chỉ nhà phân phối <sup>*</sup></label><input type="text" name="address" value="<?php echo isset($_POST['address'])?$_POST['address']:'';?>" id="address"/>
    </p>
    <?php if(isset($error_address)) echo $error_address?>
    <p>
    <label><?php echo lang('email')?> <sup>*</sup> </label><input type="text" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:'';?>" id="email"/>
    <p class="ghiChu">(Đây là email để ban quản trị webiste liên hệ khi có sự cố)</p>
    </p>
    <?php if(isset($error_email)) echo $error_email?>
    
    <p>
    <label><?php echo lang('email')?> 2<sup>*</sup> </label><input type="text" name="email2" value="<?php echo isset($_POST['email2'])?$_POST['email2']:'';?>" id="email2"/>
    <p class="ghiChu">(Đây là email để nhà thuốc liên hệ đặt hàng)</p>
    </p>
    <?php if(isset($error_email2)) echo $error_email2?>
  
    <p>
    <label>Website </label><input type="text" name="website" value="<?php echo isset($_POST['website'])?$_POST['website']:'';?>" id="website" />
    </p>
    <p>
    <label>Tên đăng nhập <sup>*</sup></label><input type="text" name="username" value="<?php echo isset($_POST['username'])?$_POST['username']:'';?>" id="username"/>
    </p>
    <?php if(isset($error_username)) echo $error_username?>
    <p>
    <label><?php echo lang('password')?> <sup>*</sup> </label><input type="password" name="password" value="<?php echo isset($_POST['password'])?$_POST['password']:'';?>" id="password"/>
    </p>
    <?php if(isset($error_pass)) echo $error_pass?>
    <p>
    <label><?php echo lang('confirm_pass')?> <sup>*</sup> </label><input type="password" name="confirm_pass" value="<?php echo isset($_POST['confirm_pass'])?$_POST['confirm_pass']:'';?>" id="confirm_pass"/>
    </p>
    <?php if(isset($error_confirm_pass)) echo $error_confirm_pass?>
     <p><label>Hình đại diện</label><input type="file" name="avatar"  /></p>
     <p>
    <label><?php echo lang('security')?> <sup>*</sup> </label><input type="text" name="security"  id="security" style="width:160px"/><img src="<?php echo base_url()?>captcha.php" alt='captcha' class="captcha" align="absbottom"/>
    </p>
    <?php if(isset($error_security)) echo $error_security?>
    <p><input type="checkbox" name="checkDK" id="check" value="1" style="width:auto; float:left; margin: 0 5px 0 150px" /> Tôi đã đọc và đồng ý với <span class="dieuKhoan">các điều khoản</span> của <?php echo $_SERVER['HTTP_HOST']?></p>
    <p class="btn-submit">
    	<input type="submit" name="submit" id="submit" class="button" value="<?php echo lang('register')?>" title="<?php echo lang('register')?>" onclick="return checkDieuKhoan()"/>
        <input type="reset" name="reset" class="button" value="<?php echo lang('reset')?>" title="<?php echo lang('reset')?>"/>
    </p>
</form>
</div>
