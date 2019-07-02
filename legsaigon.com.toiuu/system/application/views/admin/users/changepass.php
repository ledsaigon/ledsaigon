<style type="text/css">
#frm-change-pass {width:600px; margin:100px auto}
#frm-change-pass p { overflow:hidden;height:30px; clear:both}
#frm-change-pass p label{width:150px; float:left; text-align:right; margin-right:50px; font-weight:bold; clear:left}
#frm-change-pass p  input{width:200px; border:1px solid #d5d5d5; padding:2px;}
#fld-change-pass{ border:1px solid #d5d5d5; -webkit-border-radius:5px; padding:20px; -moz-border-radius:5px}
#fld-change-pass p.btn{ margin-left:200px; clear:both}
#fld-change-pass p.btn input{width:80px; margin-right:10px; border:none; background:#52575d; color:white; font-weight:bold; cursor:pointer}
#fld-change-pass .error{color:red; float:left; margin:0 0 0 200px;  overflow:hidden; clear:right; padding:0; max-height:30px}
#fld-change-pass legend{ margin:5px; font-weight:bold; font-size:14px;}
p.ok{ color:#090; padding-left:150px}
</style>
<div class="ui-widget-content ui-corner-all" style="min-height:600px"> 
<form name="frm-change-pass" id="frm-change-pass" method="post" action="">
<fieldset id="fld-change-pass">
	<legend>Đổi mật khẩu</legend>
    <?php if(isset($changePassOk)) echo '<p class="ok">'.$changePassOk.'</p>';?>
	<p><label>Mật khẩu củ:</label><input type="password" name="oldPass" id="oldPass" /></p>
    <?php
    	if(isset($errorOldPass)) echo '<div class="error">'.$errorOldPass.'</div>';
	?>
    <p><label>Mật khẩu mới:</label><input type="password" name="newPass" id="newPass" /></p>
    <?php
    	if(isset($errorNewPass)) echo '<div class="error">'.$errorNewPass.'</div>';
	?>
    <p><label>Xác nhận mật khẩu:</label><input type="password" name="confirmPass" id="confirmPass" /></p>
    <?php
    	if(isset($errorConfirmPass)) echo '<div class="error" >'.$errorConfirmPass.'</div>';
	?>
    <p class="btn">
    	<input type="submit" name="submit" value="Cập nhật" title="Cập nhật" />
        <input type="button" name="cancel" value="Hũy bỏ"  onclick="location.href='<?php echo base_url()?>/admincp';" title="Hũy bỏ" />
    </p>
</fieldset>
</form>
</div>