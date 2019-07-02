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
<div class="title"><h3 class="title">Chương trình khuyến mãi<a href="<?php echo base_url()?>nha-phan-phoi/dang-tin.html"><span>Thêm mới</span></a></h3></div>
<?php
if(isset($result)) echo '<p class="result">'.$result.'</p>';
if($listItem){?>
<table class="tbl-product" cellpadding="0" cellspacing="1" border="0">
<tr>
<th width="50">STT</th>
<th>Tiêu đề</th>
<th width="100">Ngày đăng</th>
<th width="100">Trạng thái</th>
<th width="70">Hành động</th>
</tr>
<?php
	$i=1;
	foreach($listItem as $item){
		//$properties = unserialize($item['properties']);
		?>
        <tr>
        <td><?php echo $i?></td>
        <td align="left"><?php echo $item['vn_title']?></td>
        <td ><?php echo $item['date_created']?>
        </td>
        <td><?php echo lang('status_p'.$item['status'])?></td>
        <td><a href="<?php echo base_url().'nha-phan-phoi/chinh-sua-tin-id'.$item['id']?>.html" title="Chỉnh sửa" class="edit">&nbsp;</a>
        <span class="delete" id="<?php echo $item['id']?>" title="Xóa" >&nbsp;</span>
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
<input type="hidden" name="id_item" id="id_item" value="" /></form>
<script type="text/javascript">
$(function(){
	$('.delete').click(function(){
		if(confirm('Bạn chắc chắn muốn xóa?')){
			id_item = this.id;
			$('#id_item').val(id_item);
			frmHidden.submit();
			}
		
		});
	})
</script>
</form>