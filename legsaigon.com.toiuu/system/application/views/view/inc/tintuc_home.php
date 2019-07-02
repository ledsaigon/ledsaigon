
<?php if(isset($tintuc_home) && !empty($tintuc_home)){?>

<div class="wrap_spbanchay">

<div class="title_giaychungnhan text-uppercase">

	<h5><strong><?php echo lang('news') ?></strong></h5>

</div>

<div class="wrap_sanpham_banchay">

  <div class="tintuc_home">   

  <?php foreach ($tintuc_home as $key => $value) {

    $url= $value['slug'].'-p'.$value['id'].'.html';

    ?>

    <div class="con_tintuc_home">

    <a href="<?php echo $url ?>" title="<?php echo $value[$lang.'_title'] ?>">
      <img class="lazy img-responsive" width="430" height="240" data-original="<?php echo base_url() ?>uploads/news/<?php echo $value['avatar'] ?>" alt="<?php echo $value[$lang.'_title'] ?>" title="<?php echo $value[$lang.'_title'] ?>">
    </a>

      <?php $ngaythang= $value['date_created'];

        $ngaythang= explode('-', $ngaythang);

        $ngaythang= $ngaythang[2].'/'.$ngaythang[1];

      ?>

      <div class="wrap_mta_tintuc">

      <div class="row">

      <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 pad_r_none">

        <div class="wrap_ngaythang">

        <strong><?php echo (isset($ngaythang) && !empty($ngaythang))?$ngaythang:''?></strong>

        </div>



        <div class="wrap_comment_css">

        <i class="fa fa-comments-o"></i> 3

        </div>

      </div>

      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9 pad_l_none_1199">

        <div class="r_mota_tintuc_home ">

          <div class="title_tintuc_home text-uppercase">

          <h5><strong>

          <a href="<?php echo $url ?>" title="<?php echo $value[$lang.'_title'] ?>">

            <?php echo $value[$lang.'_title'] ?>

            </a>

          </strong></h5>

          </div>

          <div class="mota_tintuc_home_css">

            <?php echo word_limiter($value[$lang.'_sapo'], 22) ?>

          </div>

        </div>

      </div>

      </div>

      </div>

    </div>

  <?php } ?>

  </div>

</div>

</div>



<script type="text/javascript">

    $(document).ready(function(){

      $('.tintuc_home').slick({

  		dots: false,

  		infinite: false,

  		speed: 300,

  		slidesToShow: 3,

      slidesToScroll: 1,

      responsive: [

    {

      breakpoint: 991,

      settings: {

        slidesToShow: 2

      }

    },

    {

      breakpoint: 610,

      settings: {

        slidesToShow: 1

      }

    }

  ]

	});

    });

  </script>



<?php }?>