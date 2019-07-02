<div class="page-content">
<div class="title"><h3 class="title">Exhibition</h3></div>

<div class="list-product">
<?php
if($listItem){
	$i=1;
	foreach($listItem as $item){?>
		<div <?php if($i%4==0) echo 'class="product-item-last-2"';else echo 'class="product-item-2"'?>>
        <div class="image">
        	<a href="<?php echo base_url().'exhibition/'.$item->slug?>.html" title="<?php echo $item->name?>"><img src="uploads/exhibitors/<?php echo $item->avatar?>"/></a>
        </div>
        <p><a href="<?php echo base_url().'exhibition/'.$item->slug?>.html" title="<?php echo $item->name?>"><?php echo $item->name?></a></p>
        </div>
		<?php }
		if($i%4==0) echo '</div><div class="list-product">';
		$i++;
	}
?>
</div>
<div class="paging"><?php echo $listPages?></div>
</div>