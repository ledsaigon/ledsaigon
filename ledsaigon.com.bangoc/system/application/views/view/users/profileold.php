<style type="text/css">
#frm-register{ margin:15px 0 20px 0; overflow:hidden;}
#frm-register .note-form{ margin:15px 0 15px 0}
#frm-register p {overflow:hidden; margin:10px 0 10px 0;}
#frm-register p label{width:150px; float:left; font-weight:bold}
#frm-register p label span{ color:red}
#frm-register p.note{ font-weight:bold}
#frm-register img.captcha{ margin:0px 0 0 0;  text-align:center; line-height:25px; height:25px}
#frm-register p.error{ margin-left:150px; color:red; background:url(<?php echo base_url()?>publics/images/icon/error.png) left center no-repeat; padding-left:20px}
#frm-register p input {width:250px; border:1px solid #d5d5d5; padding:4px}
#frm-register p.btn-submit { margin-left:150px;}
</style>
<div class="page-content">
<div class="title"><h3 class="title"><?php echo lang('profile')?></h3></div>
<form name="frm-register" id="frm-register" method="post" action="">
	<?php if(isset($update_profile)) echo '<span style="color:green">'.$update_profile.'</span>'?>
    <p>Thành viên có thể thay đổi thông tin cá nhân như tên, địa chỉ.</p>
    
    <p>Để trống phần mật khẩu nếu như không muốn thay đổi. </p>
	<p>
    <label><?php echo lang('username')?> : </label><b><?php if($userInfo) echo $userInfo->username;?></b>
    </p>
    <p>
    <label><?php echo lang('fullname')?> <sup>(<span>*</span>)</sup> : </label><input type="text" name="fullname" value="<?php  echo isset($_POST['fullname'])?$_POST['fullname']:$userInfo->fullname;?>" id="fullname"/>
    </p>
    <?php if(isset($error_fullname)) echo $error_fullname?>
    <p>
    <label>Mật khẩu mới:</label><input type="password" name="newPass" value="" id="newPass"/>
    </p>
    <?php if(isset($error_newPass)) echo $error_newPass?>
    <p>
    <label>Xác nhận mật khẩu:</label><input type="password" name="confirm" value="" id="confirm"/>
    </p>
    <?php if(isset($error_confirm)) echo $error_confirm?>
    <p>
    <label><?php echo lang('address')?>:</label><input type="text" name="address" value="<?php  echo isset($_POST['address'])?$_POST['address']:$userInfo->address;?>" id="address"/>
    </p>
    <p>
    <label><?php echo lang('telephone')?>:</label><input type="text" name="telephone" value="<?php echo isset($_POST['telephone'])?$_POST['telephone']:$userInfo->cell;?>" id="telephone"/>
    </p>
    <?php if(isset($error_tel)) echo $error_tel?>
    <p>
    <label><?php echo lang('email')?> <sup>(<span>*</span>)</sup> :</label><input type="text" name="email" value="<?php  echo isset($_POST['email'])?$_POST['email']:$userInfo->email;?>" id="email"/>
    </p>
    <?php if(isset($error_email)) echo $error_email?>
   
  
    <p class="btn-submit">
    	<input type="submit" name="submit" class="button" value="<?php echo lang('update')?>" title="<?php echo lang('update')?>"/>
        <input type="button" name="button" class="button" value="<?php echo lang('cancel')?>" title="<?php echo lang('cancel')?>" onclick="location.href='<?php echo base_url()?>index.html'"/>
    </p>
</form>
</div>

