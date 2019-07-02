<div class="page-content">
<div class="title"><h1 class="title"><?php if($cateObject) echo $cateObject['vn_name']?></h1></div>

<div style="overflow:hidden; text-align:justify; line-height:25px"><?php if($cateObject) echo $cateObject['vn_detail']?></div>

<?php
 if(isset($listItem)&& $listItem== true){
			echo '<div class="title"><h3 class="title">Danh sách bài viết</h3></div>';
			$i = 1;
			include_once (APPPATH.'controllers/class/function.php');
			foreach($listItem as $item){
			echo '<div class="categoryHome">';
			$url = base_url().'news-detail/'.$item['slug'].'.html';
			echo'<a  href="'.$url.'" title="'.$item['vn_title'].'"><img src="uploads/news/'.$item['avatar'].'" width="120" height="80"/></a>';
			echo'<h4><a  href="'.$url.'" title="'.$item['vn_title'].'">'.$item['vn_title'].'</a></h4>';
			echo '<p>'.cutStr(strip_tags($item['vn_sapo']),80).'</p>';
			echo '</div>';
			if($i%2==0) echo '<p style="height:15px;clear:both"></p>';
			$i++;
			}
			
			}
?>
</div>