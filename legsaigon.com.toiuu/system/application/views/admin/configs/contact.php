<style type="text/css">
#frm-contact{width:600px; margin:50px auto;}
#frm-contact p label{width:100px; float:left; font-weight:bold; text-align:right; margin-right:20px}
#frm-contact p{ overflow:hidden; line-height:30px}
#frm-contact h3{ color:black}
#frm-contact input{ width:300px}
#frm-contact  p.btn{ margin-left:170px; }
#frm-contact  p.btn input{ width:auto}
#frm-contact  p.error{ color:red; margin-left:120px; line-height:20px}
</style>
<div class="ui-widget-content ui-corner-all"> 

<form name="frm-contact" id="frm-contact" method="post" action="">
<h3> Cấu hình tài khoản email</h3>
<?php if(isset($update_succes)) echo '<p style="color:green; text-indent:50px">'.$update_succes.'!<p>'?>
<p><label>Host mail:</label><input type="text" name="hostmail" value="<?php echo $hostmail?>" /></p>
<?php if(isset($error_host)) echo $error_host?>
<p><label>Username:</label><input type="text" name="username" value="<?php echo $username?>" /></p>
<?php if(isset($error_user)) echo $error_user?>
<p><label>Password:</label><input type="text" name="password" value="<?php echo $password?>" /></p>
<?php if(isset($error_pass)) echo $error_pass?>
<p class="btn">
	<input type="submit" name="submit" value="Cập nhật" title="Cập nhật" />
    <input type="reset" name="reset" value="Nhập lại" title="Nhập lại" />
</p>
</form>
</div>