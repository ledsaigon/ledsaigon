<div class="page-content"> 
<form action="" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">
    <p><label>Trạng thái</label>
    <select id="cmbStatus" name="cmbStatus" class="text  validate[required]">
    <option value="1"><?php echo lang('display')?> </option>
    <option value="0"><?php echo lang('hide')?></option>
    
    </select>
    </p>
    
    <p><label>Họ Tên </label>
    <input value="" type="text" id="fullname" name="fullname" class="required" />
    </p>
    
   
    
    <p><label>Địa chỉ</label>
    <input value="" type="text" id="address" name="address" />
    </p>  
    
    <p><label>Điện thoại</label>
    <input value="" type="text" id="cell" name="cell" />
    </p>  
    <p><label>Email</label>
    <input value="" type="text" id="email" name="email" class="required" />
    </p>  
    <p class="btn">
    <input type="submit" name="submit" value="Thêm" />
    <input type="button" name="button" value="Hủy bỏ" onclick="location.href='<?php echo $url_cancel?>'" />
    </p>
</form>
</div>
