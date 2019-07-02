<div class="row">
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
  <div class="title_title_lienhe text-uppercase">
  <h5><?php echo lang('contact_information') ?></h5>
  </div>
  <div class="mota_lienhe">
  <div style="color: rgb(255, 255, 255); font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13.0013px;">
	<div>
		CÔNG TY TNHH S.V</div>
	<div>
    Trụ sở chính : 526-528 Xô Viết Nghệ Tĩnh - P. 25 - Q.Bình Thạnh &nbsp;</div><div>Mã số doanh nghiệp: 0303031085 do Sở KH&amp;ĐT Tp. HCM cấp ngày 05/08/2003</div>
	<div>
		Điện thoại: (028) 3511 2730 &nbsp;- &nbsp;Fax: (028) 3511 8984. &nbsp; &nbsp;</div>
	<div>
		Website : http://www.ledsaigon.com</div>
	<div>
		Email: ledsaigon.com@gmail.com&nbsp;</div>
	</div>
  </div>
</div>
<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
<?php if(isset($chinhsach_menu) && !empty($chinhsach_menu)){?>
  <div class="row">
  <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-12 ">
  <div class="row">
  <?php foreach ($chinhsach_menu as $key => $value) {
    $url_news= $value['slug'].'-p'.$value['id'].'.html';
    ?>
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="title_chinhsach_foo">
         <h5>
           <a href="<?php echo $url_news ?>" title="<?php echo $value[$lang.'_title'] ?>">
          <i class="fa fa-angle-double-right"></i> <?php echo $value[$lang.'_title'] ?>
        </a>
         </h5>
      </div>
    </div>
  <?php }?>
  
  </div>
  </div>
  </div>
  <?php }?>
  <div class="clear"></div>

  <div class="css_online_footer">
  <div class="col-lg-12 col-md-12 col-sm-12">
  <div class="row">
  <div class="col-lg-7 col-md-12 col-sm-12 pad_r_none">
      <div class="title_luot_truycap">
  <h5>
<p>  <?php echo lang('visited') ?>: <?php echo round($counters->year) ?> | Today: <?php echo round($counters->today) ?> |Online: <?php echo round($userOnline) ?></p>


  <p><?php //echo lang('designed_by') ?> <a href="http://triviet.net" title="Thiết kế website Trí Việt"> <!-- Trí Việt --></a></p>

     
  </h5>
  </div>
  </div>
  <div class="col-lg-5 col-md-12 col-sm-12">
    <?php if(isset($icon_footer) && !empty($icon_footer)){?>
<ul class="list-inline">
<?php foreach ($icon_footer as $key => $value): ?>
  <li>
    <a target="_blank" href="<?php 
    if ($value['id']==111) {
      echo $generalConfigs['twitter'];
    }
    elseif ($value['id']==112) {
      echo $generalConfigs['facebook'];
    }
    else
      echo $generalConfigs['googleplus'];
    ?>" title="<?php echo $value[$lang.'_name'] ?>">
      <img src="uploads/ads/<?php echo $value['avatar'] ?>" alt="<?php echo $value[$lang.'_name'] ?>" title="<?php echo $value[$lang.'_name'] ?>">
    </a>
  </li>
<?php endforeach ?>
</ul>
	<a style="display: block;
    text-align: left;
    top: 0;" href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=35650" title="Bộ công thương" style="margin-top: 10px;"><img class="" width="150" height="57" src="/uploads/galleries/a_1462919299_dathongbaobocongthuongadsplus.x39442.png" alt="Bộ công thương"/></a>
<?php }?>
  </div>
  <div class="clear"></div>
  </div>
  </div>
  <div class="clear"></div>
  </div>
</div>
</div>