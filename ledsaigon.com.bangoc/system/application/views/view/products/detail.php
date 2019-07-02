<div class="wrap_pro">
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right">
        <div class="wrap_right_pro">
        <div class="title_right_pro text-uppercase">
            <h4><strong>
                <?php echo lang('product_detail') ?>
            </strong></h4>
        </div>
        <div class="wrap_right_products_css">
        <div class="row">
<div class="col-lg-5 col-md-5 col-sm-5 mar_b_img_detail">
      <div class="bao_fotorama">
    <div class="fotorama" data-nav="thumbs" data-fit="contain" data-loop="true" data-arrows="true" data-click="true" data-swipe="true">

  <a href="<?php echo base_url()?>uploads/products/<?php echo $productObject['avatar']; ?>">

            <img class="img-thumbnail" alt="<?php echo $productObject[$lang.'_name'] ?>" title="<?php echo $productObject[$lang.'_name'] ?>" src="uploads/products/<?php echo $productObject['avatar']; ?>" />

            </a>

 <?php if(isset($properties['photos']) && !empty($properties['photos'])){?> 

          <?php foreach($properties['photos'] as $photo) {?>

          <a href="uploads/products/<?php echo $photo;?>">

            <img class="img-thumbnail" alt="<?php echo $productObject[$lang.'_name'] ?>" title="<?php echo $productObject[$lang.'_name'] ?>" src="timthumb.php?src=uploads/products/<?php echo $photo;?>&w=500&h=370&zc=2" alt="" />

          </a>

          <?php }} ?>

</div>

    </div>

</div>

<div class="col-lg-7 col-md-7 col-sm-7">

  <div class="bao_r_chitiet_sp">

  <div class="title_spham_chitet text-uppercase"><strong>

    <?php echo $productObject[$lang.'_name'] ?>

  </strong></div>
<ul class="nav_detail_sp_main">

<?php if(!empty($productObject['hang_sx'])){?>

<li><strong>Thương hiệu:</strong> <span><?php echo $productObject['hang_sx']; ?></span></li>

<?php }?>

<?php if(!empty($productObject['code'])){?>

<li><strong><?php echo lang('product_code') ?>:</strong> <span><?php echo $productObject['code']; ?></span></li>

<?php }?>



<li><strong><?php echo lang('view') ?>:</strong> <span><?php echo ($productObject['view']!=0 && !empty($productObject['view']))?$productObject['view']:'1'; ?></span></li>

<li><strong><?php echo lang('price') ?>:</strong> <span class="color_red">

<strong>

 <?php if($productObject['price']!=''){

  echo number_format(intval($productObject['price']), 0, ',', ',').' <span class="red_color">'.lang('currency').'</span>';

}else{

echo ' <span class="red_color">'.lang('contact').'</span>';

  }?>

</strong>

</span></li>

</ul>



<!-- Go to www.addthis.com/dashboard to customize your tools -->

<div class="addthis_native_toolbox"></div>

<div class="clear"></div>

<?php if(!empty($productObject[$lang.'_sapo'])){?>

  <div class="mota_css_detail">

<?php echo ($productObject[$lang.'_sapo']!=0 || !empty($productObject[$lang.'_sapo']))?$productObject[$lang.'_sapo']:''; ?>

</div>

<?php }?>

<form id="form_cart" action="<?php echo base_url()."shopping-".$productObject['id']."-39.html" ?>" method="post">

<input type="hidden" name="id_pro" value="<?php echo  $productObject['id'];?>">

        <div class="clear"></div>

</form>

 <div class="muangay_css">

       <a href="javascript:void(0);">
           <?php echo lang('buy') ?>
       </a>

    </div>

    <div class="clear"></div>

<script type="text/javascript">

  $(document).ready(function() {

    $( "#submit_cart" ).click(function() {

  $( "#form_cart" ).submit();

});

  });

</script>



  </div>

</div>

</div>





<div class="clear"></div>





<!-- tabs-->

<div id="tabs_khoahoc" class="tabs_khoahoc">

        <nav>

          <ul>

            <li><a href="#section-1" class="icon-cup" title="Chi tiết"><span><?php echo lang('detail') ?></span></a></li>

            <li><a href="#section-3" class="icon-food" title="Nhận xét"><span><?php echo lang('comment') ?></span></a></li>

          </ul>

        </nav>

        <div class="content">

          <section id="section-1">

          <div class="bao_detail_css_main">

           <?php echo $productObject[$lang.'_detail'] ?>

           </div>

          </section>

          <section id="section-3">

           <div class="bao_detail_css_main">

           

          <div class="fb-comments" data-href="<?php echo current_url(); ?>" data-numposts="5"></div>

          </div>

          </section>

          

        </div><!-- /content -->

      </div><!-- /tabs -->



<!-- end tabs-->



<div class="clear"></div>

 <?php if(isset($otherProducts) && !empty($otherProducts)){?>

 <div class="title_right_pro text-uppercase">

            <h4><strong>
                <?php echo lang('relative_product') ?>
            </strong></h4>

        </div>



<div class="wrap_right_products_css">

       

        <div class="row">

        <?php foreach ($otherProducts as $key => $value) {

            $url= $value['slug'].'-a'.$value['id'].'.html';

            ?>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 w_100_460">

        <div class="con_img_sp_banchay">

        <a href="<?php echo $url ?>" title="<?php echo $value[$lang.'_name'] ?>">

            <img class="img-responsive" src="uploads/products/<?php echo $value['avatar'] ?>" alt="<?php echo $value[$lang.'_name'] ?>" title="<?php echo $value[$lang.'_name'] ?>">

            </a>

            <div class="title_sp_banchay">

            <strong>

            <a href="<?php echo $url ?>" title="<?php echo $value[$lang.'_name'] ?>">

            <?php echo $value[$lang.'_name'] ?>

            </a></strong>

            </div>

            <div class="wrap_point_star">

            <div class="row">

                <div class="col-lg-7 text_center_992"><?php echo lang('price') ?>: <strong><span class="red_color">

                    <?php if($value['price']!=''){

                      echo number_format(intval($value['price']), 0, ',', ',').' '.lang('currency');

                    }else{

                    echo lang('contact');

                      }?>



                </span></strong></div>

                <div class="col-lg-5 text_center_992">

                    <img class="img-responsive" src="publics/images/point_star.png" alt="Point star" title="Point star">

                </div>

            </div>

            </div>

        </div>

    </div>

    <?php }?>



     </div>

     <div class="clear"></div>

     <?php echo (isset($listPages) && !empty($listPages))?$listPages:'' ?>

   

        </div>

  <?php }?>





        </div>

        </div>

    </div>



     <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-left">

        <?php $this->view('view/inc/left') ?>

    </div>





</div>

</div>

<script src="publics/js/cbpFWTabs.js"></script>

<script>

  new CBPFWTabs( document.getElementById( 'tabs_khoahoc' ) );

</script>