


<div class="page-content">

   <div class="title"> <h3 class="title"><?php  echo $nameDH?> </h3></div>
<?php if($listProducts){?>
<div class="list-product" >
            <?php $i= 1;
        
            foreach($listProducts as $product) { 
			$properties = unserialize($product['properties']);
        
            $url = base_url().$product['slug'].'-p'.$product['id'].'.html';
            ?>
			
			<div <?php if($i%4 ==0) echo 'class="product-item-last"';else echo 'class="product-item"';?>>
                	
                  <div class="img"><a href="<?php echo $url?>" title="<?php echo $product[$lang.'_name']?>">
                    <img src="<?php echo base_url().'uploads/products/a_'.$product['avatar']?>" alt=""  />
                    </a></div>
                     <p class="code">MS: <?php echo $product['code']?></p>
     <p class="price">Giá: <?php if($product['price']) echo number_format($product['price']).' VNĐ';else echo 'Liên hệ'?></p>
     <p class="price">Đã có <?php echo @$properties['numBuy']?> người mua sp</p>
     <p class="order"><a href="<?php echo base_url().'shopping-'.$product['id']?>.html" title="Thêm vào giỏ hàng"><span>Giỏ hàng</span></a></p>
                   
                </div><!--end procate-item-->
			<?php if($i%4 ==0) echo '</div><div class="list-product">';?>
			<?php $i++;}?>

</div><!-- end list-procate-->

<div class="paging"><?php echo $listPages;?></div>
<?php } else echo lang('data_updating');?>
</div><!-- end page-content-->  

