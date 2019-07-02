<script language="javascript" src="<?php echo base_url()?>publics/scripts/js.slide.js"></script>
<script type="text/javascript">
$(function() {
	$(".collection").jCarouselLite({
		vertical: false,
		hoverPause:true,
		visible: 1,
		auto:50000,
		speed:500,
		btnNext: ".btn-next",
        btnPrev: ".btn-pre",
	});
});
</script>

<div class="page-content">

<div class="bg-collection">
<p class="albumName"><?php if($album) echo $album['vn_name']?></p>

<div class="collection">
<?php
if(isset($listItem)&&$listItem==true){
	echo '<ul id="collection">';
	foreach($listItem as $item){
	?>
	<li>
    <img src="uploads/galleries/<?php echo $item['avatar']?>"/>
    <div  style="line-height:25px; text-align:justify; padding:5px; color:#808080">
    <p class="name"><?php echo $item['vn_name']?></p>
	<?php echo $item['detail']?>
    </div>
    </li>
	<?php }
	echo '</ul>';
	}
?>
</div>
<div class="icon">
<p class="btn-pre" title="Pre page"> Pre page</p>
<p class="btn-next" title="Next page"> Next page</p>
</div>
</div><!--end bg-collection-->
</div>