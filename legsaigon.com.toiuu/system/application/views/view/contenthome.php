<style type="text/css">
.page-content .content { margin:15px  0 15px 0; line-height:25px}
</style>
<?php if(isset($staticObject)) {?>

	<div class="page-content">


        <div class="content" ><?php echo $staticObject[$lang.'_detail'];?></div>

    </div><!-- end title_conten-->



<?php } else echo lang('data_updating');?>