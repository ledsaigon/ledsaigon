<?php if(isset($sp_banchay) && !empty($sp_banchay)){?>

<div class="wrap_spbanchay">

<div class="title_giaychungnhan text-uppercase">

	<h5><strong>Sản phẩm bán chạy</strong></h5>

</div>

<div class="wrap_sanpham_banchay">

  <div class="sanpham_banchay">   

    <?php foreach ($sp_banchay as $key => $value) {

    	$url= $value['slug'].'-a'.$value['id'].'.html';

    	?>

     <?php if($key == 0 || ($key+1)%9==0){?>

     <div class="row">

     <?php }?>

    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 w_100_460">

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
        <?php if($value['khuyenmai']!='' > 0 && $value['price'] !='' > 0){
    			echo '<div class="col-lg-7 text_center_992">';
              echo 'Khuyến mãi: ';
                    $promotion_price =  $value['price'] - (($value['price']*$value['khuyenmai'])/100);
                    echo '<strong><span class="red_color">';
                          echo number_format(intval($promotion_price), 0, ',', ',');
                    echo '</span>  VND</strong>';
          echo '<br/><strong><span class="line_through">';
					  echo number_format(intval($value['price']), 0, ',', ',');
    			echo '</span> VNĐ</strong></div>';

             } else{ ?>
                  <div class="col-lg-7 text_center_992">
                  Giá: 
                      <strong>
                          <span class="red_color">
                          <?php  if($value['price'] !='' > 0){
                            echo number_format(intval($value['price']), 0, ',', ',');
                            echo '</span> VNĐ';
                          }

                            else{
                              echo '<span class="red_color">Liên hệ</span>';
                             }?>


                          
                      </strong>
                  </div>



             <?php } ?>






    			<div class="col-lg-5 text_center_992">

    				<img class="img-responsive" src="publics/images/point_star.png" alt="Point star" title="Point star">

    			</div>

    		</div>

    		</div>

    	</div>

    </div>

    <?php if($key+1 == count($sp_banchay) || ($key+1)%8==0){?>

     </div>

     <?php }?>

    <?php }?>

  </div>

</div>

</div>



<script type="text/javascript">

    $(document).ready(function(){

      $('.sanpham_banchay').slick({

		dots: false,

		infinite: false,

		speed: 300,

		slidesToShow: 1,

	});

    });

  </script>



<?php }?>