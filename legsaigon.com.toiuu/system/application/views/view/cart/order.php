<div class="wrap_pro">
<style type="text/css">
#frmContact { margin:20px 0 0 20px}
#frmContact span{ color:red}
#frmContact p { overflow:hidden; margin:10px 0 5px 0;}
#frmContact p label { float:left; width:150px; font-weight:bold; font-size:12px}
#frmContact p input[type = 'text'] {width:300px; border:1px solid #b0b0b0;}
#frmContact textarea{ width:300px; height:120px;border:1px solid #b0b0b0;}
.content_page .note{ font-weight:bold; font-size:12px; }
 .error{ color:red !important; font-size:12px; padding-left:150px}
  .tbOrder{ width:700px; background:#cbcaca; margin:auto; text-align:center; font-size:12px}
  .tbOrder tr{ background:#FFF}
  .tbOrder th{ height:30px; background:#cbcaca}
  .tbOrder .total{ float:left; margin-left:80px; font-weight:bold}
  .tbOrder .total span{ color:red; margin:3px}
  .btn-order{ float:right; margin:15px 5px 0 0}
</style>
<div class="content_page">
<div class="title_con_congtrinh text-uppercase">
          <h5><strong>
           Đặt hàng
          </strong></h5>
          </div>

    
    <p>Thông tin sản phẩm</p>
    <?php if(isset($arrCart)&& count($arrCart)>0){?>
  <table class="tbOrder" cellpadding="0" cellspacing="1">
  
          <tr>
            <th>Hình</th>
            <th>Tên </th>
            <th>Giá ( vnđ )</th>
            <th>Số lượng</th>
            <th>Xóa</th>
          </tr>
          <?php
        $tongtien = 0;
        for ($i = 0; $i < count($arrCart); $i++)
      {
        $id = $arrCart[$i]['productid'];
        $quantity = $arrCart[$i]['qty'];
        $products = $this->mod_home->getProductFromId($id);
        if($products){
        ?>
                <tr>
                        <td><img src="<?php echo base_url().'uploads/products/avatar/'.$products->avatar; ?>" alt=""  /></td>
                        <td><?php echo $products->name; ?></td>
                        <td><?php echo number_format($products->price);?> </td>
                      <td><form name="frmSoluong"  id="frmSoluong" method="post" action="<?php echo base_url()?>shopping/update">
                  <input type="text" name="quantity" id="quantity" value="<?php echo $quantity ?>" style="width:20px"/>
                  <input type="hidden" name="id_update" value="<?php echo $products->id; ?>" />
                  <input type="submit" name="update" value="" title="Cập nhật" />
                  </form>
                  </td>
                  <td>
                  <form name="frmDelete" id="frmDelete" method="post" action="<?php echo base_url().'shopping/remove/'.$products->id;?>">
                  <input type="hidden" name="del_id" value="<?php echo $products->id; ?>" />
                  <input type="submit" value="" name="delete"  title="Xóa"/>
                 </form>
                      </tr>      
                <?php
        $price = $products->price;
        $tongtien += $price*$quantity;
      }
      }
      ?>
          <tr style="background:none; ">
          <td colspan="5" style="height:30px !important"><p class="total">Tổng tiền: <span><?php echo number_format($tongtien); ?></span> vnđ </p>
          
          <div class="btn-order"><a href="<?php echo base_url()?>san-pham.html" title="Tiếp tục mua hàng"><span>Tiếp tục mua hàng</span></a>
            
       <a href="<?php echo base_url()?>order.html" title="Đặt hàng" ><span>Đặt hàng</span></a>
       </div>
            </td>
          </tr>
        </table>
         <p>Thông tin khách hàng</p>
    <form name="frmContact" id="frmContact" method="post" action="">
    <p class="note">Quý khách vui lòng điền đầy đủ thông tin vào form bên dưới <span>*</span> là thông tin bắt buộc.</p>
    <p><label>Họ tên <span>*</span></label> <input type="text" name="fullname" id="fullname" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:''; ?>" /></p>
    <?php if(isset($error_fullname)) echo '<div class="error">'.$error_fullname.'</div>'?>
    <p><label>Địa chỉ<span>*</span></label> <input type="text" name="address" id="address" value="<?php echo isset($_POST['address'])?$_POST['address']:''; ?>"/></p>
    <p><label>Số điện thoại<span>*</span></label> <input type="text" name="cell" id="cell" value="<?php echo isset($_POST['cell'])?$_POST['cell']:''; ?>"/></p>
    <?php if(isset($error_cell)) echo '<div class="error">'.$error_cell.'</div>'?>
    <p><label>Email <span>*</span></label> <input type="text" name="email" id="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>"/></p>
     <?php if(isset($error_email)) echo '<div class="error">'.$error_email.'</div>'?>
    <p><label>Lời nhắn đính kèm</label> <textarea  name="content" id=""><?php echo isset($_POST['content'])?$_POST['content']:''; ?></textarea></p>
     <?php if(isset($error_content)) echo '<div class="error">'.$error_content.'</div>'?>
     <p ><label>Mã bão vệ<span>*</span></label><input type="text" style="width:100px; margin-top:0;  " name="security" /><img src="<?php echo base_url()?>captcha.php" align="bottom" alt="" style="padding:0; margin-top:0px; float:left"/></p>
     <?php if(isset($error_security)) echo '<div class="error">'.$error_security.'</div>'?>
    <p class="btn">
    <input type="hidden" name="action" value="send" />
      <input type="submit" value="Gửi đi" name="send" title="Gửi đi" id="send" />
        <input type="reset" value="Nhập lại" name="reset" title="Nhập lại" />
    </p>
    </form>
    <p>Thông tin khách hàng</p>
    <form name="frmContact" id="frmContact" method="post" action="">
    <p class="note">Quý khách vui lòng điền đầy đủ thông tin vào form bên dưới <span>*</span> là thông tin bắt buộc.</p>
    <p><label>Họ tên <span>*</span></label> <input type="text" name="fullname" id="fullname" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:''; ?>" /></p>
    <?php if(isset($error_fullname)) echo '<div class="error">'.$error_fullname.'</div>'?>
    <p><label>Địa chỉ<span>*</span></label> <input type="text" name="address" id="address" value="<?php echo isset($_POST['address'])?$_POST['address']:''; ?>"/></p>
    <p><label>Số điện thoại<span>*</span></label> <input type="text" name="cell" id="cell" value="<?php echo isset($_POST['cell'])?$_POST['cell']:''; ?>"/></p>
    <?php if(isset($error_cell)) echo '<div class="error">'.$error_cell.'</div>'?>
    <p><label>Email <span>*</span></label> <input type="text" name="email" id="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>"/></p>
     <?php if(isset($error_email)) echo '<div class="error">'.$error_email.'</div>'?>
    <p><label>Lời nhắn đính kèm</label> <textarea  name="content" id=""><?php echo isset($_POST['content'])?$_POST['content']:''; ?></textarea></p>
     <?php if(isset($error_content)) echo '<div class="error">'.$error_content.'</div>'?>
    <p class="btn">
    <input type="hidden" name="action" value="send" />
      <input type="submit" value="Gửi đi" name="send" title="Gửi đi" id="send" />
        <input type="reset" value="Nhập lại" name="reset" title="Nhập lại" />
    </p>
    </form>
</div><!-- end title_conten-->
<?php }else {?>
<p style="padding:10px; font-size:12px">Không có sản phẩm nào trong giỏ hàng</p>
<?php }?>

</td>