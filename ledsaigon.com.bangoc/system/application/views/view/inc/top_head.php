
<div class="row">
<div class="col-md-8 col-sm-7 col-xs-12">
	<div class="title_top_head">
		<h5>
		<span class="col-md-4 col-xs-12"><i class="fa fa-mobile"></i> <?php echo lang('telephone'); ?>: <?php echo $hotline ?> </span> 
		<span class="col-md-6 col-xs-12">Hotline: <?php echo $sodienthoai?></span>
		</h5>
	</div>
</div>
<div class="col-md-4 col-sm-5 col-xs-12 pull-right ">
<div class="pull-right icon_lang">
	<ul class="list-inline">
		<li><a href="<?php echo base_url() ?>indexcontroller/selectLang/en"><img src="<?php echo base_url() ?>publics/images/english-icon.png"></a></li>
		<li><a href="<?php echo base_url() ?>indexcontroller/selectLang/vn"><img src="<?php echo base_url() ?>publics/images/vietnam-icon.png"></a></li>
	</ul>
</div>
<?php if(isset($icon_top) && !empty($icon_top)){?>
<ul class="list-inline pull-right pad_top_10 mar_bottom_0 hidden-xs hidden-sm">

<?php foreach ($icon_top as $key => $value) {?>
	<li><a href="<?php echo ($value['id']==127)? $generalConfigs['facebook']:$generalConfigs['googleplus']  ?>" target="_blank" title="<?php echo $value['vn_name'] ?>">
	<img src="uploads/ads/<?php echo $value['avatar'] ?>" class="img-responsive" title="<?php echo $value['vn_name'] ?>" alt="<?php echo $value['vn_name'] ?>">
	</a></li>
<?php }?>


</ul>
<?php }?>
<form role="search" method="post" id="custom-search-form" class="form-search form-horizontal pull-right" action="tim-kiem.html">
    <div class="input-append">
        <input type="text" name="keyword" id="search-field" class="search-query mac-style" placeholder="<?php echo lang('key_search') ?>">
        <button type="submit" class="btn" id="search-submit"><i class="fa fa-search"></i></button>
    </div>
</form>

</div>

</div>
