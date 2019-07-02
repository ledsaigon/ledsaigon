<div class="wrap_pro">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right">
            <div class="wrap_right_pro">
                <div class="title_right_pro text-uppercase">
                    <h4><strong>
                        <?php echo (isset($newObject) && !empty($newObject[$lang.'_title']))?$newObject[$lang.'_title']:''?>
                    </strong></h4>
                </div>
                <div class="wrap_chuyenmuc_css pading_10">
                    <ul class="list-inline">
                    	<li><strong><i class="fa fa-folder-open-o"></i><?php echo ' '.lang('category') ?>:</strong> <?php echo (isset($cateName) && !empty($cateName))?$cateName:'' ?></li>
                    	<li><strong><?php
                        $ngaytao= explode('-', $newObject['date_created']);
                        $ngaytao= $ngaytao[2].'-'.$ngaytao[1].'-'.$ngaytao[0];
                        ?></strong></li>
                    </ul>
                </div>
                <div class="wrap_right_products_css">
                    <?php if (isset($newObject) && !empty($newObject)) {?>
                        <div class="mota_news_detail_css"></div>
                        <div class="bao_news_detail_css">
                          <?php echo (!empty($newObject[$lang.'_detail']))?$newObject[$lang.'_detail']:lang('data_updating');?>
                        </div>
                        <div class="clear"></div>
                    <?php } else echo lang('data_updating');?>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-left">
            <?php $this->view('view/inc/left') ?>
        </div>
    </div>
</div>