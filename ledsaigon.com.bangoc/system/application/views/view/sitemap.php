<style type="text/css">

.content_sitemap h4{ font-size:14px; font-weight:bold}

.content_sitemap{ width:500px;  float:left; margin:10px 0 0 15px}

.content_sitemap li { padding:0 0 0 35px; line-height:30px; background:url(publics/images/icon/ico_site.gif) left 7px no-repeat}

.content_sitemap li a{  font-size:13px;}

.listmenu li{ font-weight:bold}

.sub{ margin-left:30px}

.category_con{ font-weight:normal !important}

</style>

<div class="page-content">

    	<div class="title"><h1 class="title"><?php echo lang('sitemap')?></h1></div>

        <div class="content_sitemap">

<ul>

            	<?php
			if(isset($active_menu))
				$active = $active_menu;
			else
				$active = 0;
			if($menuTop){
				$i = 1;
				foreach($menuTop as $menu){
					echo '<li><a href="'.base_url().$menu['url'].'" title="'.$menu['solan_title'].'" >'.$menu[$lang.'_name'].'</a>';
					if($menu['id']==17){
						?>
                        <ul>
            <?php
            if($category){
                foreach($category as $cate){
                    $url = base_url().$cate['slug'].'.html';
					echo '<li><a href="'.$url.'" title="'.$cate['solan_title'].'">'.$cate[$lang.'_name'].'</a>';
					 }
                }
            ?>                    
            </ul>
                        <?php
						}
					
					echo '</li>';
					$i++;
					}
				
				}
            ?> 
           

 </ul>
</div>

</div><!-- end title_conten-->

