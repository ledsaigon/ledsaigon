<style type="text/css">
div.promotion{ overflow:hidden; clear:both; padding:5px 0 5px 0; text-align:justify; line-height:23px}
</style>
<?php if($listProducts){
	$this->load->model('admin/productcategories_m');
?>
<div class="page-content">
  <?php
  if(isset($breadcrumb)&&  !is_null($breadcrumb)){
  ?>  
  <ul class="breadcrumb">
          <?php
          foreach ($breadcrumb as $key=>$value) {
            if($value!=''){
          ?>
              <li><a href="<?=$value; ?>"><?=$key; ?></a> <span class="divider"><i class="fa fa-angle-double-right"></i></span></li>
              <?php }else{?>
              <li class="active"><?=$key; ?></li>
              <?php }
          }
          ?>      
            </ul>
  <?php }?>
<div class="title_sp_home"><h2>
  Sản phẩm mới
</h2>
<div class="clear"></div>
</div><div class="list-product">
   <div class="bao_sp_sale hidden_md">
<?php foreach ($listProducts as $key => $value) {?>
    <div class="con_sp_saleoff <?php if(($key + 1)%5==0 && $key !=0){?> mar_ri_none <?php }?>">
        <?php if(($value['price']>0 && $value['price_km'] < $value['price']) && $value['price'] !='' && $value['is_new'] == 0){
            $khuyenmai= round((($value['price']- $value['price_km'])/$value['price'])*100);
            ?>
        <div class="po_khmai_bg">
            <?php echo $khuyenmai; ?>%
        </div>
        <?php }else if($value['is_new'] == 1){?>
        <div class="po_spmoi_bg">
        </div>
        <?php }?>
        <div class="bao_img">
        <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
            <img class="img_responsive" src="timthumb.php?src=uploads/products/<?php echo $value['avatar'] ?>&w=204&h=166&zc=2" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>">
        </a>
        </div>
        <div class="title_code_ma">
        <?php if(isset($value['code']) && $value['code'] !='' && $value['code'] != 0){?>
        <?php echo $value['code']
         ?>
         <?php }?>
        </div>
        <div class="title_ten_sp_css">
            <h3>
            <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
                <?php echo $value['vn_name'] ?>
                </a>
            </h3>
        </div>
        <div class="bao_gia_css">
        <?php if($value['price'] >0){?>
            <?php if(isset($value['price_km']) && $value['price_km'] >0){?>
            <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price_km']), 0, '.', '.').' VND';?></div>
            <div class="gia_khuyenmai_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        
        <?php }else{?>
        <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>

        <?php }else{?>
        <div class="gia_that_css w_100_992">Liên hệ</div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>
            <div class="clear"></div>
        </div>
    </div>
    <?php if(($key + 1)%5==0 && $key !=0){?><div class="clear"></div><?php }?>
<?php }?>
</div>



<div class="bao_sp_sale display_lg">
<?php foreach ($listProducts as $key => $value) {?>
    <div class="con_sp_saleoff <?php if(($key + 1)%4==0 && $key !=0){?> mar_ri_none <?php }?>">
        <?php if(($value['price']>0 && $value['price_km'] < $value['price']) && $value['price'] !='' && $value['is_new'] == 0){
            $khuyenmai= round((($value['price']- $value['price_km'])/$value['price'])*100);
            ?>
        <div class="po_khmai_bg">
            <?php echo $khuyenmai; ?>%
        </div>
        <?php }else if($value['is_new'] == 1){?>
        <div class="po_spmoi_bg">
        </div>
        <?php }?>
        <div class="bao_img">
        <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
            <img class="img_responsive" src="timthumb.php?src=uploads/products/<?php echo $value['avatar'] ?>&w=204&h=166&zc=2" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>">
        </a>
        </div>
       <div class="title_code_ma">
        <?php if(isset($value['code']) && $value['code'] !='' && $value['code'] != 0){?>
        <?php echo $value['code']
         ?>
         <?php }?>
        </div>
        <div class="title_ten_sp_css">
            <h3>
            <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
                <?php echo $value['vn_name'] ?>
                </a>
            </h3>
        </div>
        <div class="bao_gia_css">
        <?php if($value['price'] >0){?>
            <?php if(isset($value['price_km']) && $value['price_km'] >0){?>
            <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price_km']), 0, '.', '.').' VND';?></div>
            <div class="gia_khuyenmai_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        
        <?php }else{?>
        <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>

        <?php }else{?>
        <div class="gia_that_css w_100_992">Liên hệ</div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>
            <div class="clear"></div>
        </div>
    </div>
    <?php if(($key + 1)%4==0 && $key !=0){?><div class="clear"></div><?php }?>
<?php }?>
</div>


<div class="bao_sp_sale display_md">
<?php foreach ($listProducts as $key => $value) {?>
    <div class="con_sp_saleoff <?php if(($key + 1)%4==0 && $key !=0){?> mar_ri_none <?php }?>">
       <?php if(($value['price']>0 && $value['price_km'] < $value['price']) && $value['price'] !='' && $value['is_new'] == 0){
            $khuyenmai= round((($value['price']- $value['price_km'])/$value['price'])*100);
            ?>
        <div class="po_khmai_bg">
            <?php echo $khuyenmai; ?>%
        </div>
        <?php }else if($value['is_new'] == 1){?>
        <div class="po_spmoi_bg">
        </div>
        <?php }?>
        <div class="bao_img">
        <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
            <img class="img_responsive" src="timthumb.php?src=uploads/products/<?php echo $value['avatar'] ?>&w=204&h=166&zc=2" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>">
        </a>
        </div>
       <div class="title_code_ma">
        <?php if(isset($value['code']) && $value['code'] !='' && $value['code'] != 0){?>
        <?php echo $value['code']
         ?>
         <?php }?>
        </div>
        <div class="title_ten_sp_css">
            <h3>
            <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
                <?php echo $value['vn_name'] ?>
                </a>
            </h3>
        </div>
        <div class="bao_gia_css">
        <?php if($value['price'] >0){?>
            <?php if(isset($value['price_km']) && $value['price_km'] >0){?>
            <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price_km']), 0, '.', '.').' VND';?></div>
            <div class="gia_khuyenmai_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        
        <?php }else{?>
        <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>

        <?php }else{?>
        <div class="gia_that_css w_100_992">Liên hệ</div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>
            <div class="clear"></div>
        </div>
    </div>
    <?php if(($key + 1)%4==0 && $key !=0){?><div class="clear"></div><?php }?>
<?php }?>
</div>

<div class="bao_sp_sale display_sm">
<?php foreach ($listProducts as $key => $value) {?>
    <div class="con_sp_saleoff <?php if(($key + 1)%3==0 && $key !=0){?> mar_ri_none <?php }?>">
        <?php if(($value['price']>0 && $value['price_km'] < $value['price']) && $value['price'] !='' && $value['is_new'] == 0){
            $khuyenmai= round((($value['price']- $value['price_km'])/$value['price'])*100);
            ?>
        <div class="po_khmai_bg">
            <?php echo $khuyenmai; ?>%
        </div>
        <?php }else if($value['is_new'] == 1){?>
        <div class="po_spmoi_bg">
        </div>
        <?php }?>
        <div class="bao_img">
        <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
            <img class="img_responsive" src="timthumb.php?src=uploads/products/<?php echo $value['avatar'] ?>&w=204&h=166&zc=2" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>">
        </a>
        </div>
       <div class="title_code_ma">
        <?php if(isset($value['code']) && $value['code'] !='' && $value['code'] != 0){?>
        <?php echo $value['code']
         ?>
         <?php }?>
        </div>
        <div class="title_ten_sp_css">
            <h3>
            <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
                <?php echo $value['vn_name'] ?>
                </a>
            </h3>
        </div>
        <div class="bao_gia_css">
        <?php if($value['price'] >0){?>
            <?php if(isset($value['price_km']) && $value['price_km'] >0){?>
            <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price_km']), 0, '.', '.').' VND';?></div>
            <div class="gia_khuyenmai_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        
        <?php }else{?>
        <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>

        <?php }else{?>
        <div class="gia_that_css w_100_992">Liên hệ</div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>
            <div class="clear"></div>
        </div>
    </div>
    <?php if(($key + 1)%3==0 && $key !=0){?><div class="clear"></div><?php }?>
<?php }?>
</div>

<div class="bao_sp_sale display_xs">
<?php foreach ($listProducts as $key => $value) { ?>
    <div class="con_sp_saleoff <?php if(($key + 1)%2==0 && $key !=0){?> mar_ri_none <?php }?>">
       <?php if(($value['price']>0 && $value['price_km'] < $value['price']) && $value['price'] !='' && $value['is_new'] == 0){
            $khuyenmai= round((($value['price']- $value['price_km'])/$value['price'])*100);
            ?>
        <div class="po_khmai_bg">
            <?php echo $khuyenmai; ?>%
        </div>
        <?php }else if($value['is_new'] == 1){?>
        <div class="po_spmoi_bg">
        </div>
        <?php }?>
        <div class="bao_img">
        <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
            <img class="img_responsive" src="timthumb.php?src=uploads/products/<?php echo $value['avatar'] ?>&w=204&h=166&zc=2" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>">
        </a>
        </div>
       <div class="title_code_ma">
        <?php if(isset($value['code']) && $value['code'] !='' && $value['code'] != 0){?>
        <?php echo $value['code']
         ?>
         <?php }?>
        </div>
        <div class="title_ten_sp_css">
            <h3>
            <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
                <?php echo $value['vn_name'] ?>
                </a>
            </h3>
        </div>
        <div class="bao_gia_css">
        <?php if($value['price'] >0){?>
            <?php if(isset($value['price_km']) && $value['price_km'] >0){?>
            <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price_km']), 0, '.', '.').' VND';?></div>
            <div class="gia_khuyenmai_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        
        <?php }else{?>
        <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>

        <?php }else{?>
        <div class="gia_that_css w_100_992">Liên hệ</div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>
            <div class="clear"></div>
        </div>
    </div>
    <?php if(($key + 1)%2==0 && $key !=0){?><div class="clear"></div><?php }?>
<?php }?>
</div>


<div class="bao_sp_sale display_xs_400">
<?php foreach ($listProducts as $key => $value) {?>
    <div class="con_sp_saleoff <?php if(($key + 1)%2==0 && $key !=0){?> mar_ri_none <?php }?>">
        <?php if(($value['price']>0 && $value['price_km'] < $value['price']) && $value['price'] !='' && $value['is_new'] == 0){
            $khuyenmai= round((($value['price']- $value['price_km'])/$value['price'])*100);
            ?>
        <div class="po_khmai_bg">
            <?php echo $khuyenmai; ?>%
        </div>
        <?php }else if($value['is_new'] == 1){?>
        <div class="po_spmoi_bg">
        </div>
        <?php }?>
        <div class="bao_img">
        <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
            <img class="img_responsive" src="timthumb.php?src=uploads/products/<?php echo $value['avatar'] ?>&w=204&h=166&zc=2" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>">
        </a>
        </div>
       <div class="title_code_ma">
        <?php if(isset($value['code']) && $value['code'] !='' && $value['code'] != 0){?>
        <?php echo $value['code']
         ?>
         <?php }?>
        </div>
        <div class="title_ten_sp_css">
            <h3>
            <a href="<?php echo $value['slug'] ?>-p<?php echo $value['id'] ?>.html" title="<?php echo $value['vn_name'] ?>">
                <?php echo $value['vn_name'] ?>
                </a>
            </h3>
        </div>
        <div class="bao_gia_css">
        <?php if($value['price'] >0){?>
            <?php if(isset($value['price_km']) && $value['price_km'] >0){?>
            <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price_km']), 0, '.', '.').' VND';?></div>
            <div class="gia_khuyenmai_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        
        <?php }else{?>
        <div class="gia_that_css w_100_992"><?php echo number_format(intval($value['price']), 0, '.', '.').' VND';?></div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>

        <?php }else{?>
        <div class="gia_that_css w_100_992">Liên hệ</div>
        <div class="gia_khuyenmai_css w_100_992"></div>
        <?php }?>
            <div class="clear"></div>
        </div>
    </div>
    <?php if(($key + 1)%2==0 && $key !=0){?><div class="clear"></div><?php }?>
<?php }?>
</div>



</div><!-- end list-product-->
<div class="paging"><?php echo $listPages;?></div>
</div><!-- end page-content-->  
<?php } else echo lang('data_updating');?>