<style type="text/css">
.infoOrder{ overflow:hidden;width:320px; float:left; line-height:20px}
.infoOrder h4{ font-size:14px;}
.infoOrder label{ float:left;width:140px}
.infoOrderItem { overflow:hidden; width:642px; float:right}
.infoOrderItem table{ background:#CCC}
.infoOrderItem table td, .infoOrderItem table th{ background:#FFF; line-height:22px; text-align:center; padding:3px 0 3px 0}
</style>
<div class="ui-widget-content ui-corner-all" style="padding:20px; overflow:hidden"> 
<h3 style="text-align:left; color:black">Thông tin chi tiết đơn hàng</h3>
<?php if($orderObject){?>
<div class="infoOrder">
<h4>Thông tin đơn hàng</h4>
<p><label>Mã ĐH</label>: <?php echo $orderObject->id?></p>
<p><label>Trạng thái</label>: <?php echo lang('s_order'.$orderObject->status)?></p>
<p><label>Họ tên</label>: <?php echo $orderObject->fullname?></p>
<p><label>Điện thoại</label>: <?php echo $properties['cell']?></p>
<p><label>Email</label>: <?php echo $properties['email']?></p>
<p><label>Địa chỉ</label>: <?php echo $properties['address']?></p>

<h4>Thông tin giao hàng</h4>
<p><label>Ngày giao hàng</label>: <?php echo $properties['date_deliver']?></p>
<p><label>Phương thức thanh toán</label>: <?php echo $properties['ptThanhToan']?></p>
<p><label>Phương thức giao hàng</label>: <?php echo $properties['ptGiaoHang']?></p>
<p><label>Ghi chú</label>: <?php echo $properties['messages']?></p>


</div>
<div class="infoOrderItem">
<h4>Thông tin sản phẩm</h4>
<table border="0" cellpadding="0" cellspacing="1" width="640">
<tr>
<th width="50">Số TT</th>
<th width="100">Tên sản phẩm</th>
<th width="100">Hình đại diện</th>
<th width="100">Giá (vnđ)</th>
<th width="70">Số lượng</th>
<th width="120">Thành tiền (vnđ)</th>
</tr>

<?php
if($listOrderItem){
	$i = 0;
	$total = 0;
	$quantity = 0;
	foreach($listOrderItem as $item){
		$i++;
		$properties = unserialize($item->properties);
		 $avatar = $this->products_m->getField('avatar',$item->pro_id);
		  $name_sp = $this->products_m->getField('vn_name',$item->pro_id);
		 $total += $properties['pro_price']*$properties['quantity'];
		  $quantity += $properties['quantity'];
		?>
        <tr>
        <td><?php echo $i?></td>
         <td><?php echo $name_sp?></td>
         <td><img src="uploads/products/a_<?php echo $avatar?>" width= "100"/></td>
         <td><?php echo (!empty($properties['pro_price']))?number_format($properties['pro_price']):'Liên hệ'?></td>
         <td><?php echo $properties['quantity']?></td>
         <td><?php echo number_format($properties['total'])?></td>
        </tr>
        <?php 
		}
	}
?>
<tr style="font-weight:bold; color:red">
<td colspan="4">Tổng cộng</td>
<td> <?php echo $quantity; ?> </td>
<td> <?php echo number_format($total)?> Vnđ</td>
</tr>
</table>

</div>
<?php }?>
<p style="clear:both"><a href="<?php echo base_url()?>AdminCP/orders/main" class="back" title="Trở về">Trở về</a></p>
</div>