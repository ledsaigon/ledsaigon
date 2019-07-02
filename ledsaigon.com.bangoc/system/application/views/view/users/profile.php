<div class="page-content">
<div class="con_main_mhs">
<div class="row">
<div class="col-lg-3"><?php $this->view('view/inc/left'); ?></div>
<div class="col-lg-9">
<div class="title_cackhoa_css text-uppercase">
<strong>Cập nhật thông tin</strong>

</div>  
<div class="bao_khoahoc_css_main">
<?php
if($object){
    $properties = unserialize($object->properties);
?>
<form name="frmRegister" id="frm-register" method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="date_created" value="<?php echo $properties['date_created']?>">
<?php if(isset($result)) echo ' <p class="bg-success"> '.$result.'</p>'?>

<div class="p_5">
    <dl class="dl-horizontal">
    <dt>Tên đăng nhập</dt>
      <dd><input disabled class="form-control" type="text"  value="<?php echo isset($_POST['username'])?$_POST['username']:$object->username;?>" /></dd>
      <dt><?php echo lang('fullname')?> </dt>
      <dd><input class="form-control" type="text" name="fullname" id="fullname" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:$object->fullname;?>" /></dd>
       <?php if(isset($error_fullname) && !empty($error_fullname)) echo ' <p class="bg-warning"> '.$error_fullname.'</p>'?>
        <dt><?php echo lang('address')?></dt>
      <dd><input class="form-control" type="text" name="address" id="address" value="<?php echo isset($_POST['address'])?$_POST['address']:$object->address;?>" /></dd>
        <dt><?php echo lang('telephone')?></dt>
      <dd><input class="form-control" type="text" name="cell" id="cell" value="<?php  echo isset($_POST['cell'])?$_POST['cell']:$object->cell; ?>"/></dd>
        <?php if(isset($error_cell) && !empty($error_cell)) echo ' <p class="bg-warning">'.$error_cell.'</p>'?>
        <dt>Email </dt>
      <dd><input class="form-control" type="text" name="email" id="email" value="<?php echo isset($_POST['email'])?$_POST['email']:$object->email;?>"/></dd>
        <?php if(isset($error_email) && !empty($error_email)) echo '<p class="bg-warning">'.$error_email.'</p>'?>
    <dd>
    <input type="hidden" name="action" value="send" />
    <button class="btn btn-primary" type="submit" value="Lưu" name="send" title="Lưu" id="send" />Cập nhật</button>
<input class="btn btn-primary " type="button" onclick="location.href='<?php echo base_url(); ?>change-pass.html';" value="Thay mật khẩu" />

</dd>
    </dl>
     </div>
    
</form>
<?php }?>
</div>
</div>
</div>
</div>

</div>
