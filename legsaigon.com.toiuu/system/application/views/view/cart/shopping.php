<div class="wrap_pro">
<style type="text/css">
#frmDelete input{width:30px; border:none; background:url(publics/images/icon/cart_delete_icon.png) no-repeat; cursor:pointer}

#frmSoluong input.update{width:30px; border:none; background:url(publics/images/icon/update.png) no-repeat; cursor:pointer}
#frmContact { margin:20px 0 0 0px}
#frmContact span{ color:red}
#frmContact p { overflow:hidden; margin:10px 0 5px 0;}
#frmContact p label { float:left; width:150px; font-weight:bold; font-size:12px}
#frmContact p input[type = 'text'] {width:300px; border:1px solid #b0b0b0; }
#frmContact p input[type = 'radio']{width:auto}
#frmContact textarea{ width:300px; height:120px;border:1px solid #b0b0b0;}
#frmContact p.btn { margin-left:20px} 
.page-content .note{ font-weight:bold; font-size:12px; }
 .error{ color:red !important; font-size:12px; padding-left:150px}
  .tbOrder{ background:#cbcaca; margin:auto; text-align:center; font-size:12px}
  .tbOrder tr{ background:#FFF}
  .tbOrder th{ height:30px; line-height: 30px; background:#cbcaca;text-align: center;}
  .tbOrder td{ padding:2px}
  .tbOrder .total{ float:right; margin:5px 5px 5px 80px; font-weight:bold}
  .tbOrder .total span{ color:red; margin:3px}
  .btn-order{ float:left; margin:5px 5px; background:#eb3b7e; height:23px; line-height:23px; padding:0 10px 0 10px ; font-weight:bold; color:white}
  .btn-order a{ color:white}
  .delete_all{ margin:5px 5px; background:#eb3b7e; height:23px; line-height:23px; border:none;background:#eb3b7e; color:white; cursor:pointer; padding:0 15px 0 15px; font-weight:bold}
  p.info{ font-size:14px; font-weight:bold;  margin:10px 0 10px 0}
</style>
<div class="page-content">

<div class="title_con_congtrinh text-uppercase">
    <h5><strong>
  Giỏ hàng
    </strong></h5>
    </div>
<div class="con_main_mhs bao_sp_moi_main">
<div class="clear"></div>
  
    <?php if(isset($arrCart)&& count($arrCart)>0){?>
      <p class="info"><?php echo lang('product_info')?></p>
  <table class="tbOrder" cellpadding="0" cellspacing="1" width="100%">
  
          <tr>
            <th width="150"><?php echo lang('image')?></th>
            <th><?php echo lang('name')?></th>
            <th width="100"><?php echo lang('price')?></th>
            <th width="100"><?php echo lang('quantity')?></th>
            <th  width="100"><?php echo lang('total')?></th>
            <th width="50"><?php echo lang('delete')?></th>
          </tr>
          <?php
        $tongtien = 0;
        for ($i = 0; $i < count($arrCart); $i++)
      {
        $id = $arrCart[$i]['productid'];
        $quantity = $arrCart[$i]['qty'];
        $products = $this->products_m->getObject('id',$id);
        if($products){
        ?>
                <tr>
                        <td><img src="<?php echo base_url().'uploads/products/a_'.$products['avatar']; ?>" alt="" width="130"  /></td>
                        <td><?php echo $products[$lang.'_name']; ?>
                        </td>
                        <?php if($products['khuyenmai']>0){
                          $khuyenmai= $products['price']- ($products['price'] * $products['khuyenmai'])/100;
                          ?>
                         <td><?php echo number_format($khuyenmai);?> VNĐ </td>
                        <?php }else{?>
                        <td><?php echo (!empty($products['price']))? number_format($products['price'])." VNĐ":"Liên hệ";
                      ?>  </td>
                        <?php }?>
                        
                      <td><form name="frmSoluong"  id="frmSoluong" method="post" action="<?php echo base_url()?>shopping/update">
                  <input type="text" name="quantity" id="quantity" value="<?php echo $quantity ?>" style="width:30px" maxlength="3"/>
                  <input type="hidden" name="id_update" value="<?php echo $products['id']; ?>" />
                  <input type="submit" name="update" value="" title="<?php echo lang('update')?>" class="update" />
                  </form>
                  </td>
                   <?php if($products['khuyenmai']>0){
                          $khuyenmai= $products['price']- ($products['price'] * $products['khuyenmai'])/100;
                          ?>
                    <td><?php echo number_format(($khuyenmai)*$quantity);?> VNĐ </td>
                    <td>
                    <?php }else{?>
                    <td><?php echo (!empty($products['price']))?number_format(($products['price'])*$quantity).' VNĐ':'Liên hệ';?>  </td>
                    <td>
                    <?php }?>
                  
                  <form name="frmDelete" id="frmDelete" method="post" action="<?php echo base_url().'shopping/remove/'.$products['id'];?>">
                  <input type="hidden" name="del_id" value="<?php echo $products['id']; ?>" />
                  <input type="submit" value="" name="delete"  title="<?php echo lang('delete')?>"/>
                 </form>
                      </tr>      
                <?php
               if($products['khuyenmai']>0){
                          $khuyenmai= $products['price']- ($products['price'] * $products['khuyenmai'])/100;
                          $price = $khuyenmai;
                          }else{
                            $price = $products['price'];
                          }
        
        $tongtien += $price*$quantity;
      }
      }
      ?>
          <tr style="background:none; ">
          <td colspan="5" style="height:30px !important"><p class="total"><?php echo lang('total_money')?>: <span><?php echo number_format($tongtien); ?></span> VNĐ </p>
          
          <div class="btn-order"><a href="<?php echo base_url()?>" title="<?php echo lang('continue_buy')?>"><span><?php echo lang('continue_buy')?></span></a>
     
       </div>
        <form name="delete_all" id="delete_all" method="post" action="<?php echo base_url()?>shopping/deleteAll" >
      <input type="submit" name="delete_all" value="<?php echo lang('remove_cart')?>" class="delete_all">
       </form></td>
           
          </tr>
        </table>
         <p class="info"><?php echo lang('infomation_customer')?></p>
    <form name="frmContact" id="frmContact" method="post" action="<?php echo base_url()?>order.html">
    <p class="note"><?php echo lang('note_form_require')?></p>
    <p><label><?php echo lang('fullname')?> <span>*</span></label> <input type="text" name="fullname" id="fullname" value="<?php if($userInfo) echo $userInfo->fullname; else echo isset($_POST['fullname'])?$_POST['fullname']:''; ?>" /></p>
    <?php if(isset($error_fullname)) echo '<div class="error">'.$error_fullname.'</div>'?>
    
    <p><label><?php echo lang('address')?><span>*</span></label> <input type="text" name="address" id="address" value="<?php if($userInfo) echo $userInfo->address; else echo isset($_POST['address'])?$_POST['address']:''; ?>"/></p>
     <?php if(isset($error_address)) echo '<div class="error">'.$error_address.'</div>'?>
    <p><label><?php echo lang('telephone')?><span>*</span></label> <input type="text" name="cell" id="cell" value="<?php if($userInfo) echo $userInfo->cell; else  echo isset($_POST['cell'])?$_POST['cell']:''; ?>"/></p>
    <?php if(isset($error_cell)) echo '<div class="error">'.$error_cell.'</div>'?>
    <p><label>Email <span>*</span></label> <input type="text" name="email" id="email" value="<?php if($userInfo) echo $userInfo->email; else echo isset($_POST['email'])?$_POST['email']:''; ?>"/></p>
     <?php if(isset($error_email)) echo '<div class="error">'.$error_email.'</div>'?>
     <p><label><?php echo lang('date_delivery')?></label>
      <select name="day">
          <?php for($i=1;$i<=31;$i++){?>
          <option value="<?php echo $i?>" <?php if(date('d')==$i) echo 'selected';?>><?php echo $i?></option>
            <?php }?>
        </select>
      <select name="month">
          <?php for($i=1;$i<=12;$i++){?>
          <option value="<?php echo $i?>" <?php if(date('m')==$i) echo 'selected';?>><?php echo $i?></option>
            <?php }?>
        </select>
      <select name="year">
          <option value="<?php echo date('Y')?>"><?php echo date('Y')?></option>
        </select>
     </p>
     <p><label>Phương thức thanh toán</label><input type="radio" name="ptThanhToan" value="Thanh toán bằng tiền mặt" checked="checked" /> Thanh toán bằng tiền mặt &nbsp; <input type="radio" name="ptThanhToan" value="Thanh toán bằng chuyển khoản" /> Thanh toán bằng chuyển khoản </p>
     
     <p><label>Phương thức giao hàng</label><input type="radio" name="ptGiaoHang" value="Khách đến nhận hàng" checked="checked" /> Khách đến nhận hàng &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="ptGiaoHang" value="Giao hàng tại nhà" /> Giao hàng tại nhà</p>
     
     
    <p><label><?php echo lang('message_attachments')?></label> <textarea placeholder=".."  name="content" id=""><?php echo isset($_POST['content'])?$_POST['content']:''; ?></textarea></p>
     <p ><label><?php echo lang('security')?><span>*</span></label>
     <input type="text" class="security_pro" name="security" /><img src="<?php echo base_url()?>captcha.php" align="bottom" alt="" style="padding:0; margin-top:0px;"/></p>
     <?php if(isset($error_security)) echo '<div class="error">'.$error_security.'</div>'?>
    <p class="btn">
    <input type="hidden" name="action" value="send" />
      <button class="btn btn-primary" type="submit" value="<?php echo lang('send')?>" name="send" title="<?php echo lang('send')?>" id="send" /><?php echo lang('send')?></button>
    <button class="btn btn-primary" type="reset" value="<?php echo lang('reset')?>" name="reset" title="<?php echo lang('reset')?>" /><?php echo lang('reset')?></button>
</p>
    </form>
    
<?php }else {?>
<p style="padding:10px; font-size:12px">Không có sản phẩm nào trong giỏ hàng</p>
<?php }?>
</div>
</div><!-- end title_conten-->
</td>