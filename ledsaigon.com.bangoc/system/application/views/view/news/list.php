<?php
if(isset($listNews) && $listNews==TRUE){
					
		foreach ($listNews as $item){
			$url =  base_url().$item['slug'].'-a'.$item['id'].'.html';
			$properties = unserialize($item['properties']);
			?>
			<div class="news-item">
            
            <a href="<?php echo $url?>" title="<?php echo $properties['img_title']?>"><img src="<?php echo base_url().'uploads/news/a_'.$item['avatar'];?>" width="150" alt="<?php echo $properties['img_alt']?>"  /></a>
            <h4><a href="<?php echo $url?>" title="<?php echo $item[$lang.'_title']?>"><?php echo $item[$lang.'_title']?></a></h4>
            <p class="sapo"><?php echo $item[$lang.'_sapo']?></p>
            
            </div><!--end list-new-->
			
			<?php
			//if($i%2==0) echo '<p style="clear:both;height:10px"></p>';
			//$i++;			
			}
			echo '<div class="paging">'.$listPages.'</div>';
			
		}
		?>