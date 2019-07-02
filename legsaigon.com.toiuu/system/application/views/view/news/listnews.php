<div class="wrap_pro">

<div class="row">

    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right">

        <div class="wrap_right_pro">

        <div class="wrap_right_products_css">

        <?php if(isset($listNews) && !empty($listNews)){?>

        <?php foreach ($listNews as $key => $value) {?>

        	<div class="con_right_pro_css">

        	<div class="title_con_congtrinh text-uppercase">
        	<?php if($slug=='du-an') : ?>

        	<p><h5><strong>

        		<?php echo $value[$lang.'_title']?>

        	</strong></h5></p>
        	<?php else: ?>

        		<a href="<?php echo base_url().$value['slug'].'-p'.$value['id'].'.html' ?>"><h5><strong>

        		<?php echo $value[$lang.'_title']?>

        	</strong></h5></a>

        	<?php endif; ?>

        	</div>

        	<div class="wrap_chuyenmuc_css">

        	<ul class="list-inline">

        		<li><i class="fa fa-folder-open-o"></i> <strong><?php echo lang('category') ?>:</strong> <?php echo (isset($cateName) && !empty($cateName))?$cateName:'' ?></li>

        		<li><!-- <i class="fa fa-calendar-o"></i> --> <strong><?php

                $ngaytao= explode('-', $value['date_created']);

                $ngaytao= $ngaytao[2].'-'.$ngaytao[1].'-'.$ngaytao[0];

                 // echo $ngaytao ?></strong></li>

        	</ul>

        	</div>

        	<div class="clear"></div>


<?php if($slug=='du-an'){ ?>
        <div class="wrap_congtrinh_css_chuyenmuc">

        <?php

        $properties= unserialize($value['properties']);?>

 <div class="bao_fotorama wrap_fotorama_css">

    <div class="fotorama" data-nav="false" data-fit="contain" data-loop="true" data-arrows="true" data-click="true" data-swipe="true">

        <a href="<?php echo base_url()?>uploads/news/<?php echo $value['avatar']; ?>">

        <img class="img-responsive" alt="" title="" src="<?php echo base_url() ?>uploads/news/<?php echo $value['avatar']; ?>" />

        </a>

        <?php if(isset($properties['photos']) && !empty($properties['photos'])){?> 

        <?php foreach($properties['photos'] as $photo) {?>

        <a href="uploads/news/<?php echo $photo;?>">

        <img class="img-responsive" alt="" title="" src="timthumb.php?src=uploads/news/<?php echo $photo;?>&w=848&h=465&zc=2" alt="" />

        </a>

    <?php }} ?>

    </div> <!-- .fotorama -->

</div> <!-- .bao_fotorama -->
</div> <!-- .wrap_congtrinh_css_chuyenmuc -->
<?php }else{ ?>
		<div class="wrap_congtrinh_css_chuyenmuc row">
			<div class="col-lg-6 news_img">
				 <a href="<?php echo base_url().$value['slug'].'-p'.$value['id'].'.html' ?>">

			<img class="img-responsive" alt="" title="" src="uploads/news/<?php echo $value['avatar']; ?>" />

			</a>

			</div>
			<div class="col-lg-6 news_sapo">
			   <p><?php echo $value[$lang.'_sapo'] ?></p>
			   <p><a href="<?php echo base_url().$value['slug'].'-p'.$value['id'].'.html' ?>"><?php echo lang('see_more') ?></a></p>
			</div>

		</div> <!-- .wrap_congtrinh_css_chuyenmuc -->
<?php } ?>




        
        	</div> <!-- .con_right_pro_css -->



        	



        <?php }?>

        <div class="clear"></div>

        <?php echo (isset($listPages) && !empty($listPages))?$listPages:'' ?>

        <?php }?>

        </div>



        </div>

    </div>










     <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-left">

        <?php $this->view('view/inc/left') ?>

    </div>

    <script type="text/javascript">

    	

    </script>

</div>

</div>