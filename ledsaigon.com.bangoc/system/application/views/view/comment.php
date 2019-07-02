<style type="text/css">
#frm-comment{ overflow:hidden; clear:both; background:url(<?php echo base_url()?>publics/images/bg-form.png) top repeat-x;padding:10px; margin-top:5px; -webkit-border-radius:5px;-moz-border-radius:5px}
#frm-comment p{ overflow:hidden; margin:5px 0 10px 0}
#frm-comment p label{float:left;width:120px; font-weight:bold}
#frm-comment p label span{color:red}
#frm-comment p input{width:250px; border:1px solid #999; padding:3px}
#frm-comment p textarea{width:500px; height:120px; border: 1px solid #999; padding:3px}
#frm-comment p.btn{margin-left:120px}
#frm-comment .error{ color:red !important; font-size:12px; padding-left:120px}
#frm-comment p.note{font-weight:bold}
#frm-comment p.btn input{width:auto; border:none; background:<?php echo $main_color?>; padding:3px 15px 3px 15px; font-weight:bold;cursor:pointer}
.comment-item{ line-height:30px; overflow:hidden; border-bottom:1px dotted #bccbd8; margin-bottom:10px; padding-bottom:10px}
.comment-item .fullname{font-weight:bold; color:#216c9c}
.comment-item .address{margin:0 10px 0 10px; font-style:italic}
.comment-item .date{ font-style:italic}
</style>
<div class="page-content">
<h3>Ý kiến phản hồi</h3>
<?php
if($listComment){
	foreach($listComment as $item){?> 
	<div class="comment-item">
    <p><span class="fullname"><?php echo $item->fullname?></span><span class="address">(<?php echo $item->address?>).</span><span class="date">Vào lúc: <?php echo $item->date_created?> đã viết</span></p>
    <p style="line-height:20px; font-style:italic"><?php echo $item->comment?></p>
    </div>
	
	<?php }
	}
	echo '<div class="paging" style="margin-bottom:5px">'.$listPages.'</div>';
?>
<form name="frm-comment" id="frm-comment" action="" method="post">
<p class="note"><?php echo lang('note_form_require')?>.</p>
<?php if(isset($send_comment_success)) echo '<p style="color:green">'.$send_comment_success.'</p>'?>
<p><label>Họ và tên <sup>(<span>*</span>)</sup></label><input type="text" name="fullname" id="fullname" value="<?php if(isset($fullname)) echo $fullname?>" /></p>
<?php if(isset($error_fullname)) echo $error_fullname?>
<p><label>Địa chỉ <sup>(<span>*</span>)</sup></label><input type="text" name="address" id="address" value="<?php if(isset($address)) echo $address?>" /></p>
<?php if(isset($error_address)) echo $error_address?>
<p><label>Email  <sup>(<span>*</span>)</sup></label><input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email?>" /></p>
<?php if(isset($error_email)) echo $error_email?>
<p><label>Ý kiến  <sup>(<span>*</span>)</sup></label><textarea name="comment" id="comment" ><?php if(isset($comment)) echo $comment?></textarea></p><?php if(isset($error_comment)) echo $error_comment?>
<p><label>Mã bão vệ  <sup>(<span>*</span>)</sup></label><input type="text" name="security" style="width:200px; padding:1px" ><img src="<?php echo base_url()?>captcha.php" align="absbottom" /></p>
<?php if(isset($error_code)) echo $error_code?>
<p class="btn"><input type="submit" name="submit" value="Gửi " title="Gửi"/>
<input type="reset" name="reset" value="Nhập Lại " title="Nhập Lại"/>
</p>
</form>
</div>