<div class="wrap_icon">
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<div class="title_copyright">
		<h5>
		Copyright © 2016 - All rights reserved. Design by: <a href="http://triviet.com" title="Thiết kế website Trí Việt">Trí Việt</a>
		</h5>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
		<?php if(isset($icon_dex) && !empty($icon_dex)){?>
		<ul class="nav_icon_bottom list-inline">
		<?php foreach ($icon_dex as $key => $value) {?>
			<li><a target="_blank" href="<?php echo $value['link'] ?>" title="<?php echo $value['vn_name'] ?>">
			<img src="uploads/ads/<?php echo $value['avatar'] ?>" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>">
			</li>
		<?php }?>
		</ul>
		<?php }?>
	</div>
	<div class="clear"></div>
	</div>
</div>