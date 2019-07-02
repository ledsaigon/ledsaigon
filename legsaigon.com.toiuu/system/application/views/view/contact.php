<div class="wrap_static_css">
<div class="page-content">
    <div class="title_right_pro text-uppercase">
            <h4><strong>
                <?php echo lang('contact')?>
            </strong></h4>
        </div>
<div class="row con_main_mhs bao_sp_moi_main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="pading_10">
  <?php if($contactInfo) echo $contactInfo[$lang.'_detail'];?>
    </div>
    <form name="frmContact" id="frmContact" method="post" action="">
    <div class="p_5">
       <p class="bg-primary p_5"><?php echo lang('note_form_require')?>.</p>
      <?php if(isset($send_mail_success) && !empty($send_mail_success)) echo ' <p class="bg-success">'.$send_mail_success.'</p>'?>
    <dl class="dl-horizontal">
      <dt><?php echo lang('fullname')?> <span>*</span></dt>
      <dd><input class="form-control" type="text" name="fullname" id="fullname" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:''; ?>" /></dd>
       <?php if(isset($error_fullname) && !empty($error_fullname)) echo ' <p class="bg-warning"> '.$error_fullname.'</p>'?>
        <dt><?php echo lang('address')?></dt>
      <dd><input class="form-control" type="text" name="address" id="address" value="<?php  echo isset($_POST['address'])?$_POST['address']:''; ?>" /></dd>
        <dt><?php echo lang('telephone')?></dt>
      <dd><input class="form-control" type="text" name="cell" id="cell" value="<?php  echo isset($_POST['cell'])?$_POST['cell']:''; ?>"/></dd>
        <?php if(isset($error_cell) && !empty($error_cell)) echo ' <p class="bg-warning">'.$error_cell.'</p>'?>
        <dt>Email <span>*</span></dt>
      <dd><input class="form-control" type="text" name="email" id="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>"/></dd>
        <?php if(isset($error_email) && !empty($error_email)) echo '<p class="bg-warning">'.$error_email.'</p>'?>
    <dt><?php echo lang('title')?> <span>*</span></dt>
      <dd><input class="form-control" type="text" name="title" id="title" value="<?php echo isset($_POST['title'])?$_POST['title']:''; ?>"/></dd>
         <?php if(isset($error_title) && !empty($error_title)) echo '<p class="bg-warning">'.$error_title.'</p>'?>
    <dt><?php echo lang('content')?> <span>*</span></dt>
      <dd><textarea rows="3" class="form-control" name="content" id=""><?php echo isset($_POST['content'])?$_POST['content']:''; ?></textarea></dd>
         <?php if(isset($error_content) && !empty($error_content)) echo '<p class="bg-warning">'.$error_content.'</p>'?>
    <dt><?php echo lang('security')?><span>*</span></dt>
      <dd><input class="form-control pull-left" type="text" style="width:100px; margin-top:0; margin-bottom:10px;  " name="security" /><img class="pull-left" src="<?php echo base_url()?>captcha.php" align="absbottom" alt="" style="padding:0; margin-top:10px; padding-left:10px "/></dd>
         <?php if(isset($error_security) && !empty($error_security)) echo '<p class="bg-warning">'.$error_security.'</p>'?>
    <dd>
    <input type="hidden" name="action" value="send" />
    <button class="btn btn-primary" type="submit" value="<?php echo lang('send')?>" name="send" title="<?php echo lang('send')?>" id="send" /><?php echo lang('send')?></button>
    <button class="btn btn-primary" type="reset" value="<?php echo lang('reset')?>" name="reset" title="<?php echo lang('reset')?>" /><?php echo lang('reset')?></button>
</dd>
    </dl>
     </div>
    </form>

    <div class="clear"></div>


<div class="bao_map">
    <div id="map_container"></div>
    <div id="map"></div>
  </div>  

<script type="text/javascript">
  $( document ).ready( function() {
  //Google Maps JS
  //Set Map
  function initialize() {
      var myLatlng = new google.maps.LatLng(<?php echo (isset($toado) && !empty($toado))?$toado:'10.7893345,106.7540001' ?>);
      var imagePath = 'publics/images/svg-map-icon.png'
      var mapOptions = {
        zoom: 19,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
    //Callout Content
    var contentString = '<h4 class="text-center"><strong><?php echo (isset($vn_company) && !empty($vn_company))?$vn_company:'' ?></strong></h4>'
    .concat('<h5 class="text-center"><em><?php echo (isset($diachi) && !empty($diachi))?$diachi:'' ?></em></h5>');
    //Set window width + content
    var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth: 850
    });

    //Add Marker
    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: imagePath,
      title: 'Địa chỉ công ty'
    });

   infowindow.open(map,marker);
  google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });

    //Resize Function
    google.maps.event.addDomListener(window, "resize", function() {
      var center = map.getCenter();
      google.maps.event.trigger(map, "resize");
      map.setCenter(center);
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);

});
</script>
 <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5Miuyew-9ErpHHbzb2N4XEyxqK6o-lS0&signed_in=true"></script>

    




  </div>
    </div>
        
</div>
        
</div>
</div>
