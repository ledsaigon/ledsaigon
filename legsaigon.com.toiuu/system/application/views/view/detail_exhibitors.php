<style type="text/css">
</style>
<div class="page-content">
<?php if($object){?>
<div class="title"><h1 class="title">Exhibition <span class="space"></span><?php  echo $object->name;?></h1></div>
<div style="text-align:center; margin-bottom:10px">
<img src="uploads/exhibitors/<?php echo $object->avatar?>"/>
</div>
<div  style="overflow:hidden; text-align:justify; line-height:25px">

<?php echo $object->detail?>
</div>
<?php }?>
</div>