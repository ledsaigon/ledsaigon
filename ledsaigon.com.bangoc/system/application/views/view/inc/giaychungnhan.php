<?php if(isset($giay_chung_nhan) && !empty($giay_chung_nhan)){?>

<div class="wrap_giaychungnhan">

<div class="title_giaychungnhan text-uppercase">

	<h5><strong><?php echo lang('certificate') ?></strong></h5>

</div>

<div class="giay_chungnhan_css">

<div class="owl-carousel owl-theme" id="giay_chung_nhan">

<?php foreach ($giay_chung_nhan as $key => $value) {?>

	<div class="item">

	<a href="uploads/ads/<?php echo $value['avatar'] ?>" data-lightbox="giaychungnhan" title="<?php echo $value[$lang.'_name'] ?>">
	<img src="<?php echo base_url() ?>uploads/ads/<?php echo $value['avatar'] ?>" class="img-responsive" alt="<?php echo $value[$lang.'_name'] ?>" title="<?php echo $value[$lang.'_name'] ?>">
	</a>

	<div class="title_giay_chung_nhan text-uppercase text-center">

	<h5>

		<a href="<?php echo $value['link'] ?>" title="<?php echo $value[$lang.'_name'] ?>">

			<?php echo $value[$lang.'_name'] ?>

		</a>

	</h5>

	</div>

	</div>

<?php }?>

    

</div>

</div>

</div>

<?php }?>

<script type="text/javascript">

	$(document).ready(function() {

		$('#giay_chung_nhan').owlCarousel({

	    loop:false,

	    margin:40,

	    nav:true,

	    navText: [

      "<i class='fa fa-angle-left'></i>",

      "<i class='fa fa-angle-right'></i>"

      ],

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

	            items:5

	        }

	    }

	})

	});

</script>