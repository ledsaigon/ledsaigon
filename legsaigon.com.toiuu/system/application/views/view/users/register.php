<div class="page-content">
<div class="con_main_mhs">
<div class="row">
<div class="col-lg-3"><?php $this->view('view/inc/left'); ?></div>
<div class="col-lg-9">
<div class="title_cackhoa_css text-uppercase">
<strong>Đăng ký thành viên</strong>

</div>  
<div class="bao_khoahoc_css_main">
<form name="frmRegister" id="frm-register" method="post" action="" enctype="multipart/form-data">
    

<div class="p_5">
       <p class="bg-primary p_5"><?php echo lang('note_form_require')?>.</p>
      <?php if(isset($send_mail_success) && !empty($send_mail_success)) echo ' <p class="bg-success">'.$send_mail_success.'</p>'?>
    <dl class="dl-horizontal">
      <dt><?php echo lang('fullname')?> <span>*</span></dt>
      <dd><input class="form-control" type="text" name="fullname" id="fullname" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:''; ?>" /></dd>
       <?php if(isset($error_fullname) && !empty($error_fullname)) echo ' <p class="bg-warning"> '.$error_fullname.'</p>'?>
        <dt><?php echo lang('address')?></dt>
      <dd><input class="form-control" type="text" name="address" id="address" value="<?php  echo isset($_POST['address'])?$_POST['address']:''; ?>" /></dd>
        <dt><?php echo lang('telephone')?></dt>
      <dd><input class="form-control" type="text" name="cell" id="cell" value="<?php  echo isset($_POST['cell'])?$_POST['cell']:''; ?>"/></dd>
        <?php if(isset($error_cell) && !empty($error_cell)) echo ' <p class="bg-warning">'.$error_cell.'</p>'?>
        <dt>Email <span>*</span></dt>
      <dd><input class="form-control" type="text" name="email" id="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>"/></dd>
        <?php if(isset($error_email) && !empty($error_email)) echo '<p class="bg-warning">'.$error_email.'</p>'?>
    <dt>Tên đăng nhập <span>*</span></dt>
      <dd><input class="form-control" type="text" name="username" id="username" value="<?php echo isset($_POST['username'])?$_POST['username']:''; ?>"/></dd>
         <?php if(isset($error_username) && !empty($error_username)) echo '<p class="bg-warning">'.$error_username.'</p>'?>
    <dt>Mật khẩu <span>*</span></dt>
      <dd><input class="form-control" type="password" name="password" id="password" value="<?php echo isset($_POST['password'])?$_POST['password']:''; ?>"/></dd>
         <?php if(isset($error_pass) && !empty($error_pass)) echo '<p class="bg-warning">'.$error_pass.'</p>'?>
     <dt>Nhập lại mật khẩu <span>*</span></dt>
      <dd><input class="form-control" type="password" name="confirm_pass" id="confirm_pass" value="<?php echo isset($_POST['confirm_pass'])?$_POST['confirm_pass']:''; ?>"/></dd>
         <?php if(isset($error_confirm_pass) && !empty($error_confirm_pass)) echo '<p class="bg-warning">'.$error_confirm_pass.'</p>'?>
    <dt><?php echo lang('security')?><span>*</span></dt>
      <dd><input class="form-control pull-left" type="text" style="width:100px; margin-top:0; margin-bottom:10px;  " name="security" /><img class="pull-left" src="<?php echo base_url()?>captcha.php" align="absbottom" alt="" style="padding:0; margin-top:10px; padding-left:10px "/></dd>
         <?php if(isset($error_security) && !empty($error_security)) echo '<p class="bg-warning">'.$error_security.'</p>'?>
    <dd>
    <input type="hidden" name="action" value="send" />
    <button class="btn btn-primary" type="submit" value="<?php echo lang('send')?>" name="send" title="<?php echo lang('send')?>" id="send" /><?php echo lang('send')?></button>
    <button class="btn btn-primary" type="reset" value="<?php echo lang('reset')?>" name="reset" title="<?php echo lang('reset')?>" /><?php echo lang('reset')?></button>
</dd>
    </dl>
     </div>
</form>


</div>
</div>
</div>
</div>
</div>

