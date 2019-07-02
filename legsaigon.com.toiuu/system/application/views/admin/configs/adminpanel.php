<style type="text/css">

#frm-contact .manage-menu{ overflow:hidden; border:1px solid;width:400px; float:left}
#frm-contact p { overflow:hidden; margin:5px}
#frm-contact p label{ width:200px; float:left; text-align:right; margin-right:10px; }
#frm-contact p.btn{ margin-left:200px}

</style>
<div class="ui-widget-content ui-corner-all" style="overflow:hidden; padding:20px"> 

<form name="frm-contact" id="frm-contact" method="post" action="">
<h3> Cấu hình Admin Control Panel</h3>
<h3>1. Menu Quản Lý</h3>
<p><label>Quản lý trang tĩnh</label><input type="checkbox" name="menu_static" value="1" <?php if($admincp['menu_static'] ==1) echo 'checked'?>/> </p>
<p><label>Quản lý sản phẩm</label><input type="checkbox" name="menu_product" value="1" <?php if($admincp['menu_product'] ==1) echo 'checked'?>/> </p>
<p><label>Quản lý bài viết</label><input type="checkbox" name="menu_articles" value="1" <?php if($admincp['menu_articles'] ==1) echo 'checked'?>/> </p>
<p><label>Quản lý Banner</label><input type="checkbox" name="menu_ads" value="1" <?php if($admincp['menu_ads'] ==1) echo 'checked'?>/> </p>
<p><label>Quản lý hỗ trợ</label><input type="checkbox" name="menu_support" value="1" <?php if($admincp['menu_support'] ==1) echo 'checked'?>/> </p>
<p><label>Ý kiến phản hồi</label><input type="checkbox" name="menu_comment" value="1" <?php if($admincp['menu_comment'] ==1) echo 'checked'?>/> </p>
<p><label>Quản lý liên kết</label><input type="checkbox" name="menu_weblink" value="1" <?php if($admincp['menu_weblink'] ==1) echo 'checked'?>/> </p>
<p><label>Quản lý đối tác</label><input type="checkbox" name="menu_partner" value="1" <?php if($admincp['menu_partner'] ==1) echo 'checked'?>/> </p>
<p><label>Quản lý thư viện</label><input type="checkbox" name="menu_gallery" value="1" <?php if($admincp['menu_gallery'] ==1) echo 'checked'?>/> </p>
<p><label>Quản lý đơn hàng</label><input type="checkbox" name="menu_orders" value="1" <?php if($admincp['menu_orders'] ==1) echo 'checked'?>/> </p>

<h3>2: Cấu hình khác</h3>

<p><label>Seo web</label><input type="checkbox" name="seo_web" value="1"  <?php if($admincp['seo_web']==1) echo 'checked="checked"'?>/>
</p>
<p><label>Ngôn ngữ website:</label>
                     <input type="radio" name="language" value="1" <?php if($admincp['language']==1) echo 'checked="checked"'?>/>Tiếng Việt &nbsp; 
                     <input type="radio" name="language" value="2" <?php if($admincp['language']==2) echo 'checked="checked"'?>/> Tiếng Việt - Tiếng Anh
			
</p>

<p class="btn">
	<input type="submit" name="submit" value="Cập nhật" title="Cập nhật" />
    <input type="reset" name="reset" value="Nhập lại" title="Nhập lại" />
</p>
</form>
</div>