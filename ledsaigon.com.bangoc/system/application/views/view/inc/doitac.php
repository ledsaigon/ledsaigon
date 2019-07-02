
<?php if(isset($hinh_anh_cong_trinh) && !empty($hinh_anh_cong_trinh)){?>
<div class="wrap_giaychungnhan">
<div class="title_giaychungnhan   text-uppercase">
	<h5><strong><?php echo lang('project') ?></strong></h5>

</div>
<div class="hinhanh_congtrinh_css container">
<div class="row" id="">
<?php foreach ($hinh_anh_cong_trinh as $key => $value) :?>
			<div class="item col-lg-3 col-xs-6">
						<div class="sub_item">
								<a href="uploads/news/<?php echo $value['avatar'] ?>" data-lightbox="hinhanhcongtrinh" title="<?php echo $value[$lang.'_title'] ?>">
								<img width="299" height="168" data-original="<?php echo base_url() ?>uploads/news/<?php echo $value['avatar'] ?>" class="lazy img-responsive" alt="<?php echo $value[$lang.'_title'] ?>" title="<?php echo $value[$lang.'_title'] ?>">
								</a>

								<div class="title_giay_chung_nhan title_du_an text-uppercase text-center">
									<h5>
										<a  title="<?php echo $value[$lang.'_title'] ?>">
										<?php echo $value[$lang.'_title'] ?>
										</a>
									</h5>
								</div>

						</div> <!-- .sub_item -->
		 </div> <!-- .item -->
<?php endforeach; ?>
</div> <!-- .owl-carousel -->
</div>
<div class="clearfix"></div>
</div>

<?php }?>

<script type="text/javascript">

	$(document).ready(function() {

		$('#hinh_anh_cong_trinh').owlCarousel({

	    loop:false,

	    margin:40,

	    nav:false,

	    dots:false,

	    responsive:{

	        0:{

	            items:1

	        },

	        400:{

	            items:2

	        },

	        600:{

	            items:3

	        },

	        1000:{

	            items:4

	        }

	    }

	})

	});

</script>