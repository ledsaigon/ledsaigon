<div class="page-content">
<div class="con_main_mhs">
<div class="bao_breabcrum">
  <?php
  if(isset($breadcrumb)&&  !is_null($breadcrumb)){
  ?>      
  <div class="row-fluid">
    <div class="span12">
      <div class="span2">
         
      </div>
      <div class="span10" style="margin-left:5px;">
        <div>
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
        </div>
      </div>
    </div>
  </div>
  <?php 
    }
  ?>    
</div>
<div class="clear"></div>
<?php if(isset($thuonghieu) && !empty($thuonghieu)) {?>
  <div class="title_main_home"><h2> Thương hiệu</h2></div>
<div class="clear"></div>
<div class="chitiet_css_static">

<!-- 2 sản phẩm 1 hàng -->

<div class="bao_thuonghieu none_675">
<?php foreach ($thuonghieu as $key => $value) {?>
  <div class="con_thuonghieu <?php if(($key + 1)%2==0) echo 'margin_0'; ?>">
    <div class="left_con_thuonghieu">
      <a href="uploads/galleries/<?php echo $value['avatar'] ?>" data-title="<?php echo $value['vn_name'] ?>" data-lightbox="thuonghieu">
        <img class="img_responsive" src="timthumb.php?src=uploads/galleries/<?php echo $value['avatar'] ?>&w=200&h=240" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>">
      </a>
    </div>
    <div class="right_con_thuongieu">
      <?php echo $value['vn_name'] ?>
    </div>
    <div class="clear"></div>
  </div>
  <?php if(($key + 1)%2==0 || ($key + 1)==count($thuonghieu) ) echo '<div class="clear"></div>'; ?>
<?php }?>
</div>
<!-- end 2 sản phẩm 1 hàng -->


<!-- 1 sản phẩm 1 hàng -->

<div class="bao_thuonghieu block_675">
<?php foreach ($thuonghieu as $key => $value) {?>
  <div class="con_thuonghieu <?php if(($key + 1)%1==0) echo 'margin_0'; ?>">
    <div class="left_con_thuonghieu">
      <a href="uploads/galleries/<?php echo $value['avatar'] ?>" data-title="<?php echo $value['vn_name'] ?>" data-lightbox="thuonghieu">
        <img class="img_responsive" src="timthumb.php?src=uploads/galleries/<?php echo $value['avatar'] ?>&w=200&h=240" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>">
      </a>
    </div>
    <div class="right_con_thuongieu">
      <?php echo $value['vn_name'] ?>
    </div>
    <div class="clear"></div>
  </div>
  <?php if(($key + 1)%1==0 || ($key + 1)==count($thuonghieu) ) echo '<div class="clear"></div>'; ?>
<?php }?>
</div>
<!-- end 1 sản phẩm 1 hàng -->


</div>
<?php }?>


</div>
</div>
<link rel="stylesheet" href="publics/css/lightbox.css">
<script src="publics/js/lightbox.js"></script>