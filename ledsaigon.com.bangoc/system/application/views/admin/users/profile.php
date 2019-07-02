<style type="text/css">
#frm-user{width:600px; margin:auto}
#frm-user p{overflow:hidden; overflow:hidden; margin:10px 0 10px 0}
#frm-user p label{width:150px; float:left; font-weight:bold; text-align:right; margin-right:50px}
#frm-user input{ width:250px}
#frm-user p.btn{ margin-left:200px}
#frm-user p.btn input{ width:100px}
</style>
<div class="ui-widget-content ui-corner-all" style="min-height:500px"> 
<h3>Thông tin tài khoản</h3>
<form name="frm-user" id="frm-user" method="post" action="">
<p>
	<label>Tên đăng nhập:</label>
    <input type="text" name="username" id="username" value="">
</p>
<p>
	<label>Họ tên:</label>
    <input type="text" name="fullname" id="fullname" value="">
</p>

<p>
	<label>Địa chỉ:</label>
    <input type="text" name="address" id="address" value="">
</p>

<p>
	<label>Email:</label>
    <input type="text" name="email" id="email" value="">
</p>

<p>
	<label>Số điện thoại:</label>
    <input type="text" name="telephone" id="telephone" value="">
</p>
<p class="btn">
		<input type="submit" name="submit" id="submit" value="Cập nhật" title="Cập nhật">
        <input type="button" name="cancel" title="Hũy bỏ" value="Hũy bỏ">

</p>

</form>

</div>