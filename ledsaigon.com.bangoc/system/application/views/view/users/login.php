<div class="page-content">
<div class="con_main_mhs">
<div class="row">
<div class="col-lg-3"><?php $this->view('view/inc/left'); ?></div>
<div class="col-lg-9">
<div class="title_cackhoa_css text-uppercase">
<strong>Đăng nhập</strong>

</div>  
<div class="bao_khoahoc_css_main">
<?php
if(isset($_SESSION['fullname'])){
	echo '<div class="register-info">';
	echo '<p>Xin chào: <b>'.$_SESSION['fullname'].'!</b> Tài khoản của bạn đã được đăng ký thành công.</p>';
	echo '<p>Cảm ơn bạn đã đăng ký thành viên tại website của chúng tôi. Hãy đăng nhập vào hệ thống để chỉnh sửa thông tin của bạn.</p>';
	echo '</div>';
	unset($_SESSION['fullname']);
	}
?>

<?php
if(isset($_SESSION['changepass'])){
  echo '<div class="register-info">';
  echo '<p>Mật khẩu vừa thay đổi thành công.</p>';
  echo '<p>Hãy đăng nhập để tiếp tục.</p>';
  echo '</div>';
  unset($_SESSION['changepass']);
  }
?>


<form class="form-horizontal" name="frmLogin" id="frmLogin" method="post" action="">
  <fieldset id="fldLogin">
<?php if(isset($error_login) && !empty($error_login)) echo ' <p class="bg-warning"> '.$error_login.'</p>'?>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo lang('username')?></label>
    <div class="col-sm-10">
      <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="<?php echo lang('username')?>">
    </div>
    <?php if(isset($error_login_user) && !empty($error_login_user)) echo ' <p class="bg-warning"> '.$error_login_user.'</p>'?>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
    <?php if(isset($error_login_pass) && !empty($error_login_pass)) echo ' <p class="bg-warning"> '.$error_login_pass.'</p>'?>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Đăng nhập</button>
      <input class="btn btn-primary " type="button" onclick="location.href='<?php echo base_url(); ?>quen-mat-khau.html';" value="Quên mật khẩu" />
    </div>
  </div>
  </fieldset>
</form>
</div>
</div>
</div>
</div>

</div>