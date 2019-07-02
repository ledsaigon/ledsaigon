<div class="container">
<?php if(isset($dm_spham) && !empty($dm_spham)){?>
		<div class="wrap_dm_spham">
				<div class="row ">
						<?php foreach ($dm_spham as $key => $value) :?>
							<div class="col-md-4 col-lg-12 each_dm">
								<div class="text-center img_danhmuc"><p><a href="<?php echo $value['slug'] ?>.html">
								<img src="<?php echo base_url().'publics/images/icon_category_'.$value['id'].'.png' ?>"></a></p></div>
								<div class="text-center text-uppercase name_danhmuc"><h3><a href="<?php echo $value['slug'] ?>.html"><?php echo $value[$lang.'_name'] ?></a></h3></div>
								<div class="sapo_danhmuc">
									<p class="text-center"><?php echo $value[$lang.'_sapo']?></p>
								</div>
								<div class="text-center see_more">
									<p><a href="<?php echo $value['slug'] ?>.html"><?php echo lang('see_more') ?></a></p>
								</div>
							</div>
						<?php endforeach;?>
				</div>
		</div>
<?php }?>
</div>