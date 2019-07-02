<div class="wrap_slider none_420 hidden-xs">
	<?php if(isset($listSlide) && !empty($listSlide)){?>
	<div id="wowslider-container1" >
		<div class="ws_images">
			<ul>
					<?php foreach ($listSlide as $key => $value) {?>
						<li>
							<a href="<?php echo $value['link'] ?>">
								<img width="1319" height="400" class="lazy" data-original="uploads/ads/<?php echo $value['avatar'] ?>" alt="jquery slider" title="<?php echo  $value[$lang.'_name'] ?>" id="wows1_0"/>
							</a>
						</li>
					<?php }?>
			</ul>
		</div>	
	</div>
	<?php }?>
	<div class="company_name" style="">
		<h1 class="text-uppercase"><?php echo $vn_company; ?></h1>
		<p><?php echo ($generalConfigs[$lang.'_introduction_1']!='')? $generalConfigs[$lang.'_introduction_1']:"" ?></p>
		<p><?php echo ($generalConfigs[$lang.'_introduction_2']!='')? $generalConfigs[$lang.'_introduction_2']:"" ?></p>
		<p><?php echo ($generalConfigs[$lang.'_introduction_3']!='')? $generalConfigs[$lang.'_introduction_3']:"" ?></p>
	</div>
</div>