<div class="page-content">
<?php
   $slug=$this->uri->segment('2');
  $slug= explode('.',$slug);
  $slug= $slug[0];
  if($staticObject){?>
  <?php
  if(isset($breadcrumb)&&  !is_null($breadcrumb)){
  ?>      
  <div class="row-fluid">
    <div class="span12">
      <div class="span2">
         
      </div>
      <div class="span10" style="margin-left:5px;">
        <div>
            <ul class="breadcrumb">
          <?php
          foreach ($breadcrumb as $key=>$value) {
            if($value!=''){
          ?>
              <li><a href="<?=$value; ?>"><?=$key; ?></a> <span class="divider"><i class="fa fa-angle-double-right"></i></span></li>
              <?php }else{?>
              <li class="active"><?=$key; ?></li>
              <?php }
          }
          ?>      
            </ul>
        </div>
      </div>
    </div>
  </div>
  <?php 
    }
  ?>  
  <div class="wrap_faq">
<div class="row ">
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mar_auto">
<?php foreach ($staticObject as $key => $value) {?>
<div class="wrapp_btn">
<?php
  $btn= array('success','primary','info','warning','danger');
  if($key>4){
    $btn_numb= $key-5;
  }else{
    $btn_numb= $key;
  }
 ?>
  <button id="con_faq_index<?php echo $key ?>" type="button" class="btn btn-<?php echo (isset($btn[$btn_numb]) && !empty($btn[$btn_numb]))?$btn[$btn_numb]:'primary'; ?> con_faq_index col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
  <div class="text-uppercase text-left">
  <h4>
  <span class="ol_faq">
  <?php echo ($key+1).'.'; ?></span><?php echo $value['vn_title']; ?>
  <span class="pull-right"><i class="fa fa-plus"></i></span>
  <div class="clear"></div>
  </h4>

<div class="clear"></div>
  </div>
  </button>
  <section>
  <div class="container-fluid text-justify answer_css">
    <?php echo $value['vn_sapo'] ?>
    </div>
  </section>  
  <div class="clear"></div>
  </div>
<?php }?>
</div>
</div>
</div>

    <?php }?>
</div>
<?php foreach ($staticObject as $key => $value) {?>
<script type="text/javascript">
  $(document).ready(function() {
     var count = 0;
    $('#con_faq_index<?php echo $key ?>').on('click', function() {
      count += 1;
      if(count%2==0){
        $(this).find('.fa-minus').removeClass('fa-minus');
      $(this).find('.fa').addClass('fa-plus');
     $(this).parent().find('.answer_css').slideUp('fast');
   
      }else{
         $(this).find('.fa-plus').removeClass('fa-plus');
      $(this).find('.fa').addClass('fa-minus');
     $(this).parent().find('.answer_css').slideDown('fast');
      }
      
      
    });
  });
</script>
  <?php }?>