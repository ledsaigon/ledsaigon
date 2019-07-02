<style type="text/css">
div.promotion{ overflow:hidden; clear:both; padding:5px 0 5px 0; text-align:justify; line-height:23px}
</style>
<?php if($listProducts){
	$this->load->model('admin/productcategories_m');
?>
<div class="page-content">
    <h3><?php  echo lang('promotion');?></h3>
<div class="list-product">
            <?php $i= 1;
        
            foreach($listProducts as $products) { 
        
            $url = base_url().$this->productcategories_m->getSlug($products['cid']).'/'.$products['slug'].'.html';
            ?>
			
			<div <?php if($i%3 ==0) echo 'class="product-item-last"';else echo 'class="product-item" ';?>>
                	
                  <div class="img-pro"><a href="<?php echo $url?>" title="<?php echo $products[$lang.'_name']?>">
                    <img src="<?php echo base_url().'gallery/products/a_'.$products['avatar']?>" alt='' />
                    </a></div>
                    <p class="name-pro"><a href="<?php echo $url?>" title="<?php echo $products[$lang.'_name']?>"><?php echo $products[$lang.'_name']?></a></p>
                    <p class="price-pro"><?php echo lang('price').':&nbsp;';
				  if($products['price']) echo number_format($products['price']).' VNĐ' ; else echo lang('call_num')?></p>
                     <p class="order"><a  href="<?php echo base_url().'shopping-'.$products['id']?>.html" title="<?php echo lang('buy')?>"><?php echo lang('buy')?></a></p>
                   <p class="detail"><a  href="<?php echo $url?>" title="<?php echo lang('detail')?>"><?php echo lang('detail')?></a></p>
                    	<?php /* if( $products[$lang.'_promotion']){
							echo '<div class="promotion">';
							echo $products[$lang.'_promotion'];
							echo '</div>';
						}*/
						?>
                    <!--<p class="detail"><a  href="<?php echo $url?>" title="<?php echo lang('detail')?>"><?php echo lang('detail')?></a></p>-->
                    
                </div><!--end procate-item-->
			<?php if($i%3 ==0) echo '</div><div class="list-product">';?>
			<?php $i++;}?>
</div><!-- end list-product-->
<div class="paging"><?php echo $listPages;?></div>
</div><!-- end page-content-->  
<?php } else echo lang('data_updating');?>