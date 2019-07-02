<div class="col-sm-3 hidden-xs">
<?php $this->view('view/inc/left') ?>
</div>

<div class="page-content col-sm-9">
<div class="title_main text-uppercase title_right_pro"><h4><strong><?php echo lang('product'); ?></strong></h4></div>
<div class="con_main_mhs bao_sp_moi_main">
<div class="clear"></div>
<?php if(isset($listProducts) && !empty($listProducts)){?>
<div class="row mar_l_none">
<?php foreach ($listProducts as $key => $value) { 
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
                      echo number_format(intval($value['price']), 0, ',', ',').' VND';
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
<div class="clear"></div>
<?php echo (isset($listPages) && !empty($listPages))?$listPages:'' ?>
</div>
<?php }else{?>
<div class="dang_capnhat_css"><strong><i><?php echo lang('comming_soon'); ?></i></strong></div>
<?php }?>
</div>
</div>