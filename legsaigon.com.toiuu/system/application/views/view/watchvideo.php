<style type="text/css">
.listVideo{ overflow:hidden;width:750px; margin:auto;}
.listVideo h3{ text-transform:none; border-bottom:1px dotted #CCC; margin:25px 0 10px 0}
.listVideo ul { overflow:hidden; margin:20px 20px 0 0; padding:0}
.listVideo li{ overflow:hidden; display:block; margin-bottom:15px; padding:0}
.listVideo li .item{width:120px; float:left; margin-left:25px; text-align:center; line-height:10px; overflow:hidden; color:#aba7a6; }
.listVideo li .item p{ line-height:20px}
.listVideo li .item p a{ color:#5d5c55; font-weight:bold}
</style>
<div class="page-content">
<h1>KUDOS Video</h1>
<div style="width:650px; margin:auto; overflow:hidden">
<embed width="650" height="400" type="application/x-shockwave-flash" src="<?php echo base_url()?>publics/player.swf" flashvars="file=<?php if($videoItem) echo $videoItem->url_video?>&amp;smoothing=1&amp;autoplay=true" allowfullscreen="true">

</embed>

</div>
<div class="listVideo" >
<h3>Charming Viet Nam</h3>
<ul>
<li>
<?php
if($listVideo){
	$i = 1;
	foreach($listVideo as $video){
		echo '<div class="item" '.($i%5==0?"style='float:right;margin-right:0'":"").'>';
		echo '<a href="'.base_url().'video/watch-'.$video['id'].'.html" title="'.$video['vn_name'].'"><img src="'.base_url().'uploads/galleries/'.$video['avatar'].'" height="80" width="120"/></a>';
		echo '<p><a href="'.base_url().'video/watch-'.$video['id'].'.html" title="'.$video['vn_name'].'">'.$video['vn_name'].'</a><br>
		('.$video['date_created'].')
		</p>';
		echo'</div>';
		if($i%5==0) echo '</li><li>';
		
		$i++;
		}
	}
?>
</li>
</ul>
</div>

</div>