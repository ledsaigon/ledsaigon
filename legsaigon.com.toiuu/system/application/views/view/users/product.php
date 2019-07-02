<style type="text/css">
.tbl-product{width:100%; background:#CCC; font-size:12px; text-align:center}
.tbl-product td, .tbl-product th{ line-height:25px; padding:5px}
.tbl-product tr{ background:#FFF}
.tbl-product span{ float:left;width:80px; font-weight:bold}
.tbl-product p{ border-bottom:1px solid #eaeaea; float:left; clear:left}
.title span{ float:right; margin-right:5px; color:white; text-decoration:underline}
p.result{ color:#090; line-height:25px}
</style>
<div class="page-content">
<div class="title"><h3 class="title">Danh sách sản phẩm <a href="<?php echo base_url()?>nha-phan-phoi/them-san-pham.html"><span>Thêm sản phẩm</span></a></h3></div>
<?php
if(isset($result)) echo '<p class="result">'.$result.'</p>';
if($listProduct){?>
<table class="tbl-product" cellpadding="0" cellspacing="1" border="0">
<tr>
<th width="50">STT</th>
<th width="100">Hình</th>
<th>Thông tin</th>
<th width="100">Giá (VND)</th>
<th width="70">Hành động</th>
</tr>
<?php
	$i=1;
	foreach($listProduct as $product){
		$properties = unserialize($product['properties']);
		?>
        <tr>
        <td><?php echo $i?></td>
        <td><img src="uploads/products/a_<?php echo $product['avatar']?>" width="90" height="90"/></td>
        <td align="left"><p><span>Tên SP:</span> <?php echo $product['vn_name']?></p>
        <p><span>Nhóm:</span> <?php echo $this->productcategories_m->getField('vn_name',$product['cid'])?></p>
        <p><span>Trạng thái:</span> <?php echo lang('status_p'.$product['status'])?></p>
        </td>
        <td><?php echo @number_format($product['price']).'/'.$properties['unit']?></td>
        <td><a href="<?php echo base_url().'nha-phan-phoi/chinh-san-pham-id'.$product['id']?>.html" title="Chỉnh sửa" class="edit">&nbsp;</a>
        <span class="delete" id="<?php echo $product['id']?>" title="Xóa" >&nbsp;</span>
        </td>
        </tr>
        <?php		
		$i++;
		}
?>
</table>
<div class="paging"><?php echo $listPages?></div>
<?php }
?>
</div>
<form name="frmHidden" method="post">
<input type="hidden" name="id_pro" id="id_pro" value="" /></form>
<script type="text/javascript">
$(function(){
	$('.delete').click(function(){
		if(confirm('Bạn chắc chắn muốn xóa?')){
			id_pro = this.id;
			$('#id_pro').val(id_pro);
			frmHidden.submit();
			}
		
		});
	})
</script>
</form>