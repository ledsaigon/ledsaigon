<div class="wrap_pro">
<div class="row">
   
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right">
        <div class="wrap_right_pro">
        <div class="title_right_pro text-uppercase">
            <h4><strong>
                <?php echo (isset($cat_name) && !empty($cat_name))?$cat_name:'' ?>
            </strong></h4>
        </div>

        <p class="bg-success pad_10_css">
<span class="text-danger"><?php echo (isset($countResult) && !empty($countResult))?$countResult:''?></span> kết quả với từ khóa <span class="text-danger"><?php echo (isset($search_key) && !empty($search_key))?$search_key:''?></span> được tìm thấy
</p>

        <div class="wrap_right_products_css">
        <?php if(isset($listProducts) && !empty($listProducts)){?>
        <div class="row">
        <?php foreach ($listProducts as $key => $value) {
            $url= $value['slug'].'-a'.$value['id'].'.html';
            ?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 w_100_460">
        <div class="con_img_sp_banchay">
        <a href="<?php echo $url ?>" title="<?php echo $value['vn_name'] ?>">
            <img class="img-responsive" src="uploads/products/<?php echo $value['avatar'] ?>" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>">
            </a>
            <div class="title_sp_banchay">
            <strong>
            <a href="<?php echo $url ?>" title="<?php echo $value['vn_name'] ?>">
            <?php echo $value['vn_name'] ?>
            </a></strong>
            </div>
            <div class="wrap_point_star">
            <div class="row">
                <div class="col-lg-7 text_center_992">Giá: <strong><span class="red_color">
                    <?php if($value['price']!=''){
                      echo number_format(intval($value['price']), 0, ',', ',').' VNĐ';
                    }else{
                    echo 'Liên hệ';
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
 <?php } else echo sprintf(lang('search_result_no'),$search_key);?>
        </div>
        </div>
    </div>

     <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-left">
        <?php $this->view('view/inc/left') ?>
    </div>


</div>
</div>