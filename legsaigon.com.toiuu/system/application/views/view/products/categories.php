<style type="text/css">
.page-content .sub-category{overflow:hidden; margin:10px 0 10px 0}
.page-content .sub-category h3{ background:#9abde6; height:30px; line-height:30px; color:white}
.page-content .sub-category h3 a{ }
.page-content .sub-category p.view-all{ float:right; margin:5px 10px 5px 0}
.page-content .sub-category p.view-all a{ text-decoration:underline}

</style>
<div class="page-content">
    <h3><?php  echo lang('product');?></h3>
<?php
	if($listCategory){
		
		foreach($listCategory as $item){
			$urlCate = base_url().$lang.'/category/'.$item['slug'].'.html';
				$conditon = 'status =1 AND cid = '.$item['id'].'';
				$listProduct = $this->products_m->getObjects($conditon,0,3);
				?>
				<div class="sub-category">
					<h3><?php echo '<a href="'.$urlCate.'" title="'.$item[$lang.'_name'].'">'.$item[$lang.'_name'].'</a>'?></h3>
                  <div class="list-product">
                    <?php 
                    if($listProduct){
                        $i= 1;
                
                    foreach($listProduct as $products) { 
                
                    $url = base_url().$lang.'/'.$this->productcategories_m->getSlug($products['cid']).'/'.$products['slug'].'.html';
                    ?>
                    
                    <div <?php if($i%3 ==0) echo 'class="product-item-last"';else echo 'class="product-item" ';?>>
                            
                          <div class="img-pro"><a href="<?php echo $url?>" title="<?php echo $products[$lang.'_name']?>">
                            <img src="<?php echo base_url().'gallery/products/a_'.$products['avatar']?>" alt='' />
                            </a></div>
                            <p class="name-pro"><a href="<?php echo $url?>" title="<?php echo $products[$lang.'_name']?>"><?php echo $products[$lang.'_name']?></a></p>
                  <p class="price-pro"><?php echo lang('price').':&nbsp;';
				  if($products['price']) echo number_format($products['price']).' VNĐ' ; else echo lang('call_num')?></p>

                   <p class="order"><a  href="<?php echo base_url().$lang.'/shopping-'.$products['id']?>.html" title="<?php echo lang('buy')?>"><?php echo lang('buy')?></a></p>
                   <p class="detail"><a  href="<?php echo $url?>" title="<?php echo lang('detail')?>"><?php echo lang('detail')?></a></p>
                            
                        </div><!--end procate-item-->
                    <?php if($i%3 ==0) echo '</div><div class="list-product">';?>
                    <?php $i++;}
                    }
                ?>
                
                </div><!-- end list-product-->
                <p class="view-all"><a href="<?php echo $urlCate?>" title="<?php echo lang('view_all')?>"><?php echo lang('view_all')?></a></p>
            </div><!--end sub-category-->
        
            <?php 
        }
        
        
    }else echo lang('updating_data');
?>                    


</div><!-- end page-content-->  

