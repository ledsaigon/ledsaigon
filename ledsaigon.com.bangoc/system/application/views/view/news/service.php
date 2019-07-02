<div class="page-content">
<div class="title"><h1 class="title"><?php if($serviceObject) echo $serviceObject['vn_name']?></h1></div>

<div style="overflow:hidden; text-align:justify; line-height:25px"><?php if($serviceObject) echo $serviceObject['vn_detail']?></div>
<div class="title"><h3 class="title">Dịch vụ sửa chửa máy công nghiệp</h3></div>
<?php
 if($category){
			
			$i = 1;
			include_once (APPPATH.'controllers/class/function.php');
			foreach($category as $item){
			echo '<div class="categoryHome">';
			$url = base_url().$item['slug'].'.html';
			echo'<a  href="'.$url.'" title="'.$item['vn_name'].'"><img src="uploads/news/'.$item['avatar'].'" width="120" height="80"/></a>';
			echo'<h4><a  href="'.$url.'" title="'.$item['vn_name'].'">'.$item['vn_name'].'</a></h4>';
			echo '<p>'.cutStr(strip_tags($item['vn_detail']),80).'</p>';
			echo '</div>';
			if($i%2==0) echo '<p style="height:15px;clear:both"></p>';
			$i++;
			}
			
			}
?>
</div>