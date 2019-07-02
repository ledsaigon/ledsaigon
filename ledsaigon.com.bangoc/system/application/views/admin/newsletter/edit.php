<div class="page-content"> 
<?php if($item){?>
<form action="" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">
    <p><label>Trạng thái</label>
    <select id="cmbStatus" name="cmbStatus" class="text  validate[required]">
    <option value="1" <?php if($item->status == 1) echo 'selected';?>><?php echo lang('display')?> </option>
    <option value="0"  <?php if($item->status == 0) echo 'selected';?>><?php echo lang('hide')?></option>
    
    </select>
    </p>
    
    <p><label>Họ Tên </label>
    <input value="<?php echo $item->fullname?>" type="text" id="fullname" name="fullname" />
    </p>
    
   
    
    <p><label>Địa chỉ</label>
    <input value="<?php echo $item->address?>" type="text" id="address" name="address" />
    </p>  
    <p><label>Địên thoại</label>
    <input value="<?php echo $item->cell?>" type="text" id="cell" name="cell" />
    </p>
    <p><label>Email</label>
    <input value="<?php echo $item->email?>" type="text" id="email" name="email" class="required"/>
    </p>
    
    
    <p class="btn">
    <input type="submit" name="submit" value="Cập nhật" />
    <input type="button" name="button" value="Hủy bỏ" onclick="location.href='<?php echo $url_cancel?>'" />
    </p>
</form>
<?php }else echo 'ID không hợp lệ'?>
</div>
