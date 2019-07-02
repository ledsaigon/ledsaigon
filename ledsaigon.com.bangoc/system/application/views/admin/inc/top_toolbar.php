    <h3 class="ui-widget-header ui-corner-all">
        <span style="float:left">
            <?php echo $title_page;?> 
        </span>
        <div class="function_button">
            <a href="<?php echo $url_add_new;?>" class="button_new"><?php echo lang('button_add')?></a>
             <span class="line"></span>
            <a href="#" class="button_enable"><?php echo lang('display')?></a>
             <span class="line"></span>
             <a href="#" class="button_disable"><?php echo lang('hide')?></a>
              <span class="line"></span>
            <a href="#" class="button_delete"><?php echo lang('button_delete')?></a>
             <span class="line"></span>
             <a href="#" class="button_clean_trash">Dọn rác</a>

           
        </div>
        <div class="clear"></div>
    </h3> 
    <p>
        <div style="width:210px; float:left">
            <span style="text-align:center;display:inline-block;width:50px;">
                <img src="<?php echo base_url() ?>publics/admin/images/iconx16/public_1.png" /><br />
               <?php echo lang('display')?>
            </span>
            <span style="text-align:center;display:inline-block;width:50px;">
                <img src="<?php echo base_url() ?>publics/admin/images/iconx16/public_0.png" /><br />
               <?php echo lang('hide')?>
            </span>
             <span style="text-align:center;display:inline-block;width:100px;">
                <img src="<?php echo base_url() ?>publics/admin/images/iconx16/public_2.png" /><br />
               <?php echo lang('deleted')?>
            </span>
            
        </div>