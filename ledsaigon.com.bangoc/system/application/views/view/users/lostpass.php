<div class="page-content">
<div class="con_main_mhs">
<div class="row">
<div class="col-lg-3"><?php $this->view('view/inc/left'); ?></div>
<div class="col-lg-9">
<div class="title_cackhoa_css text-uppercase">
<strong>Quên mật khẩu</strong>

</div>  
<div class="bao_khoahoc_css_main">
<form name="frmLogin" id="frmLogin" method="post" action="">
<fieldset  id="fldLogin">
<p class="bg-primary">Nhập email lúc đăng ký để lấy lại mật khẩu</p>
<?php if(isset($error) && !empty($error)) echo ' <p class="bg-warning"> '.$error.'</p>'?>
 <dl class="dl-horizontal">
      <dt><?php echo lang('email')?> </dt>
      <dd><input class="form-control" required type="email" name="email" autofocus="autofocus" id="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>" /></dd>
  <?php if(isset($error_email) && !empty($error_email)) echo '<p class="bg-warning">'.$error_email.'</p>'?>
      <dt><?php echo lang('security')?><span>*</span></dt>
      <dd><input required class="form-control pull-left" type="text" style="width:100px; margin-top:0; margin-bottom:10px;  " name="code" />
      <img class="pull-left" src="<?php echo base_url()?>captcha.php" align="absbottom" alt="" style="padding:0; margin-top:10px; padding-left:10px "/></dd>
         <?php if(isset($error_code) && !empty($error_code)) echo '<p class="bg-warning">'.$error_code.'</p>'?>
	<dd>
  		<button class="btn btn-primary" type="submit" value="Gửi đi" name="send" title="Gửi đi" id="send" />Gửi đi</button>
  	</dd>
  </dl>	
   </fieldset>
</form>
</div>
</div>
</div>
</div>

</div>