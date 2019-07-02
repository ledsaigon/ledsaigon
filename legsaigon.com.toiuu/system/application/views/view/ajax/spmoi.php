<?php if(isset($products_sp_ajax) && !empty($products_sp_ajax)){?>
<div class="owl-carousel owl-theme" id="products_sp_<?php echo $id ?>">
<?php foreach ($products_sp_ajax as $key => $value) {
$url= $value['slug'].'-a'.$value['id'].'.html';
    ?>
    <div class="item">
    <a href="<?php echo $url?>" title="<?php echo $value['vn_name'] ?>">
        <img src="timthumb.php?src=uploads/products/<?php echo $value['avatar'] ?>&w=205&h=170&zc=2" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>" class="img-responsive">
        </a>
        <div class="title_spha_noibat"><strong>
        <a href="<?php echo $url?>" title="<?php echo $value['vn_name'] ?>">
            <?php echo $value['vn_name'] ?>
            </a>
        </strong></div>
        <ul class="nav_gia_price list-inline text-center">
        <li><h5><strong>
            <?php if($value['price']!=''){
                  echo number_format(intval($value['price']), 0, ',', ',').' đ';
                }else{
                echo 'Liên hệ';
                  }?>
        </strong></h5></li>
        
        <li>
        <?php $url_dmua= base_url()."shopping-".$value['id']."-39.html" ?>
        <a href="<?php echo $url_dmua ?>" title="Đặt mua">
        <img src="publics/images/btn_datmua.png" alt="Đặt mua" title="Đặt mua" class="img-responsive">
        </a>
        </li>
        </ul>
    </div>
<?php }?>
</div>
<script type="text/javascript">
$(document).ready(function() {
$('#products_sp_<?php echo $id ?>').owlCarousel({
    loop:true,
    margin:20,
    dots:false,
    nav:false,
    autoplay:true,
    responsive:{
        0:{
            items:1
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
<?php }?>