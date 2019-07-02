<div class="page-content">
<div class="con_main_mhs">
<div class="row">
<div class="col-lg-3"><?php $this->view('view/inc/left'); ?></div>
<div class="col-lg-9">
<div class="title_cackhoa_css text-uppercase">
<strong>Thay đổi mật khẩu</strong>

</div>  
<div class="bao_khoahoc_css_main">
<form name="frm-change-pass" id="frm-change-pass" method="post" action="">
<fieldset id="fld-change-pass">
<?php if(isset($changePassOk) && !empty($changePassOk)) echo ' <p class="bg-success">'.$changePassOk.'</p>'?>
<dl class="dl-horizontal">
<dt>Mật khẩu củ</dt>
<dd><input autofocus class="form-control" type="password" name="oldPass" id="oldPass" value="<?php echo isset($_POST['oldPass'])?$_POST['oldPass']:''; ?>" /></dd>
<?php if(isset($errorOldPass) && !empty($errorOldPass)) echo ' <p class="bg-warning"> '.$errorOldPass.'</p>'?>

<dt>Mật khẩu mới</dt>
<dd><input class="form-control" type="password" name="newPass" id="newPass" value="<?php echo isset($_POST['newPass'])?$_POST['newPass']:''; ?>" /></dd>
<?php if(isset($errorNewPass) && !empty($errorNewPass)) echo ' <p class="bg-warning"> '.$errorNewPass.'</p>'?>

<dt>Xác nhận mật khẩu</dt>
<dd><input class="form-control" type="password" name="confirmPass" id="confirmPass" value="<?php echo isset($_POST['confirmPass'])?$_POST['confirmPass']:''; ?>" /></dd>
<?php if(isset($errorConfirmPass) && !empty($errorConfirmPass)) echo ' <p class="bg-warning"> '.$errorConfirmPass.'</p>'?>
<dd>
    <button class="btn btn-primary" type="submit" value="Lưu" name="send" title="Gửi" id="send" />Gửi</button>
<input class="btn btn-primary " type="button" onclick="location.href='<?php echo base_url(); ?>';" value="Hủy" />

</dd>
</dl>
</fieldset>
</form>
</div>
</div>
</div>
</div>

</div>