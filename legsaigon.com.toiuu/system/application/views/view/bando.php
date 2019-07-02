<div class="page-content">
<div class="title_main text-uppercase">Bản đồ</div>
<div class="con_main_mhs bao_sp_moi_main">
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
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5Miuyew-9ErpHHbzb2N4XEyxqK6o-lS0&signed_in=true&callback=initMap"></script>
    
</div>
</div>