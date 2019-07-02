<div class="wrap_pro">
<?php if(isset($orderOk)){?>
<div class="page-content">

    <div class="title_con_congtrinh text-uppercase">
          <h5><strong>
         <?php echo lang('order_success')?>
          </strong></h5>
          </div>
<div class="con_main_mhs bao_sp_moi_main">
<div class="clear"></div>
    <?php echo lang('order_succes_info')?>
</div>
</div>
<?php } else echo lang('you_have_not_ordered');?>
</div>