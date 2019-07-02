<style type="text/css">
.newsSearch{ overflow:hidden}
.newsSearch p{ line-height:25px; background:url(publics/images/icon-news.png) left center no-repeat; padding-left:25px}
</style>
<div class="page-content">
<div class="title"><h3 class="title">Tìm kiếm</h3></div>
<?php if($listItem){
	
	echo '<div class="newsSearch">';
	foreach($listItem as $news){
		echo '<p><a href="'.base_url().'news-detail/'.$news['slug'].'.html" title="'.$news['vn_title'].'">'.$news['vn_title'].'</a></p>';
		}
	echo '</div>';
	}?>

</div>