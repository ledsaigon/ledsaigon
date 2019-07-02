<?php 
 $cutURI = explode('/',$_SERVER['REQUEST_URI']); 
 $getURI = array_pop($cutURI);
 ?>

<div class="wrap_left">
    <?php if(isset($dm_spham) && !empty($dm_spham)){?>
        <div class="con_left_css">
        <div class="title_right_pro bg_dm_spham bor_none text-uppercase po_res">
            <h4><strong>
                <?php echo lang('products_category') ?>
            </strong></h4>
        </div>
        <div class="wrap_con_left_dm_cs">
        <ul class="list-unstyled left_nav_dm_spham">
            <?php foreach ($dm_spham as $key => $value) {
                $url_dm= $value['slug'].'.html';
                $con_dm_spham= $this->productcategories_m->getObjects('status = 1 AND pid = '.$value['id']);
                ?>
                <li class="text-uppercase">
                    <h5>
                    <a class="<?php if($getURI==$url_dm) echo 'text-bold'; ?>" href="<?php echo $url_dm ?>" title="<?php echo $value[$lang.'_name'] ?>">
                        <i class="fa fa-caret-right"></i> <?php echo $value[$lang.'_name'] ?>
                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                        </a>
                    </h5>
                    <?php if(isset($con_dm_spham) && !empty($con_dm_spham)){
                        ?>
                        <ul class="list-unstyled left_con_nav_dm_spham">
                        <?php foreach ($con_dm_spham as $key_pro => $value_pro) {
                            $url_con_dm= $value_pro['slug'].'.html';
                            ?>
                            <li class="text-uppercase <?php if(($key+1)==count($dm_spham) && ($key_pro+1)==count($con_dm_spham)) echo 'bor_none'; ?>" >
                            <h5>
                            <a class="<?php if($getURI==$url_con_dm) echo 'text-bold'; ?>" href="<?php echo $url_con_dm ?>" title="<?php echo $value_pro[$lang.'_name'] ?>">
                                <i class="fa fa-caret-right"></i> <?php echo $value_pro[$lang.'_name'] ?>
                                </a>
                            </h5>
                            </li>
                        <?php }?>
                        </ul>
                    <?php }?>
                </li>
            <?php }?>
        </ul>
        </div>
        </div>
    <?php }?>
    
    <?php if (!empty($listGallery) && $listGallery != ''): ?>
        <div class="con_left_css">
            <div class="title_right_pro bg_dm_spham bor_none text-uppercase po_res">
                <h4><strong>
                   <?php echo lang('file_price') ?>
                </strong></h4>
            </div>
            <?php foreach ($listGallery as $link): ?>
    
                <div style="margin-top:8px;">
                    <a download="<?php echo $link['avatar']; ?>" href="<?php echo base_url().'uploads/galleries/'.$link['avatar']; ?>"><?php echo $link['vn_name']; ?></a>
                </div>
    
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <?php if(isset($support) && !empty($support)){?>
        <div class="con_left_css">
        <div class="title_right_pro bg_dm_spham bor_none text-uppercase po_res">
            <h4><strong>
               <?php echo lang('live_support') ?>
            </strong></h4>
        </div>
        <div class="wrap_con_left_dm_cs">
        
        <?php foreach ($support as $key => $value) {?>
        
        <div class="support">
                
        <p><a href="ymsgr:sendIM?<?php echo $value['nick_yahoo']; ?>"><img src="http://opi.yahoo.com/online?u=<?php echo $value['nick_yahoo']; ?>&amp;t=1"></a>
        <a href="skype:<?php echo $value['nick_skype']; ?>?chat" title="<?php echo $value['fullname'] ?>"><img src="publics/images/skype.png" class="skype">  </a>
        </p>
        <p style="line-height:25px; color:#106da7"><?php echo lang('seller') ?></p>
        <p class="fullname"><?php echo $value['fullname'] ?></p>
        <p class="cell"><?php echo lang('telephone') ?>: <?php echo $value['cell'] ?></p>
                
        </div>
        <?php }?>
        </div>
        </div>
    <?php }?>
</div>