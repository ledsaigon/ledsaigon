


<div class="wrap_breadcrumb">

<?php if(isset($staticObject) && !empty($staticObject['avatar'])){?>

<div class="po_res">

<img src="uploads/news/<?php echo $staticObject['avatar'] ?>" alt="<?php echo $staticObject['vn_title'] ?>" title="<?php echo $staticObject['vn_title'] ?>" >

<div class="po_title_breadcrumb">

 <div class="container">

   <div class="title_breadcrumb text-uppercase">

    <strong>12312312<?php echo $staticObject[$lang.'_title']?></strong>

 </div>

   <?php

  if(isset($breadcrumb)&&  !is_null($breadcrumb)){

  ?>      

  <div class="row-fluid">

    <div class="span12">

      <div class="span2">

         

      </div>

      <div class="span10">

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





 

 </div>

</div>

</div>

<?php }else if(isset($cateObjects) && !empty($cateObjects['bg_top'])){?>

<div class="po_res">

<img src="uploads/products/<?php echo $cateObjects['bg_top'] ?>" alt="<?php echo $cateObjects['vn_name'] ?>" title="<?php echo $cateObjects['vn_name'] ?>" >

<div class="po_title_breadcrumb">

 <div class="container">

   <div class="title_breadcrumb text-uppercase">

    <strong><?php echo (isset($cat_name) && !empty($cat_name))?$cat_name:''?></strong>

 </div>

   <?php

  if(isset($breadcrumb)&&  !is_null($breadcrumb)){

  ?>      

  <div class="row-fluid">

    <div class="span12">

      <div class="span2">

         

      </div>

      <div class="span10">

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





 

 </div>

</div>

</div>

<?php }else if(isset($contactInfo) && !empty($contactInfo['avatar'])){?>

<div class="po_res">

<img style="width: 100%" src="uploads/news/<?php echo $contactInfo['avatar'] ?>" alt="<?php echo $contactInfo['vn_title'] ?>" title="<?php echo $contactInfo['vn_title'] ?>" >

<div class="po_title_breadcrumb">

 <div class="container">

   <div class="title_breadcrumb text-uppercase">

    <strong><?php echo $contactInfo[$lang.'_title']?></strong>

 </div>

   <?php

  if(isset($breadcrumb)&&  !is_null($breadcrumb)){

  ?>      

  <div class="row-fluid">

    <div class="span12">

      <div class="span2">

         

      </div>

      <div class="span10">

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





 

 </div>

</div>

</div>

<?php }else if(isset($cateObject) && !empty($cateObject['avatar'])){?>

<div class="po_res">

<img src="uploads/news/<?php echo $cateObject['avatar'] ?>" alt="<?php echo $cateObject['vn_name'] ?>" title="<?php echo $cateObject['vn_name'] ?>" >

<div class="po_title_breadcrumb">

 <div class="container">

   <div class="title_breadcrumb text-uppercase">

    <strong><?php echo $cateObject[$lang.'_name']?></strong>

 </div>

   <?php

  if(isset($breadcrumb)&&  !is_null($breadcrumb)){

  ?>      

  <div class="row-fluid">

    <div class="span12">

      <div class="span2">

         

      </div>

      <div class="span10">

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





 

 </div>

</div>

</div>

<?php }?>

</div>