<script type="text/javascript" src="publics/admin/js/submitaction.js">

</script> 
<div class="ui-widget-content ui-corner-all"> 
    <h3 class="ui-widget-header ui-corner-all">
        <span style="float:left">
            Danh sách nhận bản tin 
        </span>
        <div class="function_button">
           
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


        <form action="" method="post" id="frmAction" name="frmAction">

            <input type="hidden" id="action" name="action" value="action"/>

            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>

            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>

            <table cellpadding="0" cellspacing="0" border="0" id="table_data">

                <thead> 
        <tr> 
            <th width="50"><?php echo lang('number')?></th>

                        <th width="50">ID</th>


                        <!--<th>Họ tên</th>-->

                        <th>Email</th>

                        <th width="70"><?php echo lang('status')?></th>

                        <th width="90"><?php echo lang('actions')?></th>

                        <td width="50" class="bg_check_all"><input type="checkbox" id="chkCheckAll"/></td>

        </tr> 
        </thead>

                <tbody>
        <?php if($listItem){
			$i=0;
			foreach($listItem as $item ) {$i++; 
			?>
			<tr>
                
                <td align="center"><?php echo $i;?></td>
                <td align="center"><?php echo $item['id'];?></td>
                <!--<td  align="center">
                <b><?php echo $item['fullname'] ?></b>
                </td>-->
                 <td align="center"><?php echo $item['email'] ?></td>
                <td align="center">
                <img src="publics/admin/images/iconx16/public_<?php echo $item['status'] ?>.png" title="<?php echo lang('status_item_'.$item['status'])?>" />
                </td>
                <td class="button_action" align="center">

                           <!-- <a href="<?php echo base_url() ?>AdminCP/ads/detail/<?php echo $item['id'] ?>" class="edit_item" rel="<?php echo $item['id'] ?>" title="<?php echo lang('edit')?>"></a>-->

                             <a href="javascript:formSubmit('frmAction','enable',<?php echo $item['id'];?>);" class="enable_item"  title="<?php echo lang('display')?>"><?php echo lang('display')?></a>

                             <a href="javascript:formSubmit('frmAction','disable',<?php echo $item['id'];?>);" class="disable_item"  title="<?php echo lang('hide')?>"><?php echo lang('hide')?></a>

                              <a href="javascript:formSubmit('frmAction','delete',<?php echo $item['id'];?>);" class="delete_item"  title="<?php echo lang('delete')?>"><?php echo lang('delete')?></a>



                        </td>
                <td align="center"><input type="checkbox" class="chkCheck" name="chkBox[]" value="<?php echo $item['id'] ?>"/></td>
			</tr>
			<?php } }?>
 </tbody> 

            </table>

            <div class="clear"></div>

        </form>

    </p>

      <h3 class="ui-widget-header ui-corner-all">
       
        <div class="function_button">
            
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

        

    </div>
