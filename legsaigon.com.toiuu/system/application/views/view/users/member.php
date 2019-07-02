<style type="text/css">
.thong-ke{ overflow:hidden; line-height:30px;  color:#056b15; font-weight:bold}
</style>
<div class="page-content">
<div class="title"><h3 class="title">Thành viên > <?php echo lang('user_type'.$type)?></h3></div>
<p class="thong-ke">Tổng số thành viên: Nhà thuốc (<?php echo $countNT?>), nhà phân phối (<?php echo $countNPP?>)</p>
<div class="list-member">
<?php
if($listMember){
	$i=1;
	foreach($listMember as $item){
		$properties = unserialize($item->properties);
		if($properties['avatar'])
		$img_path = 'uploads/account/a_'.$properties['avatar'];
		else
		$img_path = base_url().'publics/images/avatar-user.jpg';
		$url_product = base_url().'san-pham/nha-phan-phoi-'.$item->id.'.html';
		?>
        <div class="item <?php if($i%2==0) echo 'last'?>">
        <h4><?php if($item->tid==2) echo'Nhà phân phối: <a href="'.$url_product.'" title=""><span>'.$item->company.'</span></a>';else echo 'Nhà thuốc: <span>'.$item->company.'</span>'?></h4>
        <img src="<?php echo $img_path?>" width="85">
        <p class="fullname">Người đại diện: <span><?php echo $item->fullname?></span></p>
        <p>Địa chỉ: <?php echo $item->address?></p>
        <?php if($item->tid==2){
			$promotion = $this->articles_m->getItemOfUser($item->id);
			echo '<p>';
			echo '<a href="'.$url_product.'" title="Sản phẩm">Sản phẩm</a>';
			if($promotion)
			echo ' | <a style="color:#056b15" href="'.base_url().$promotion->slug.'-a'.$promotion->id.'.html" title="'.$promotion->vn_title.'">Khuyến mãi</a>';
			echo '</p>';
		}?>
        <?php if($userInfo)echo '<p>Điện thoại: '.$item->cell2.'</p>'?>
        <p>Email: <?php if($type ==1) echo $item->email;else echo $properties['email2']?></p>
        <p><?php if($properties['facebook'])echo 'Facebook:'.$properties['facebook'];elseif($properties['website']) echo 'Website:'.$properties['website']?></p>
        
        </div>
        <?php
		if($i%2==0) echo '</div><div class="list-member">';
		$i++;
		}
	}
?>
</div>
</div>