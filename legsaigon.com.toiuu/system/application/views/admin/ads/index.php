<script type="text/javascript" src="publics/admin/js/submitaction.js">

</script> 
<script type="text/javascript">

$(document).ready(function(){

	$("#search_by_group").change(function(){

		var url = $(this).val();

		if(url != '')

		{

			/*window.open(url);*/


			location.href = url;

		}

	});

});

</script>


<div class="ui-widget-content ui-corner-all"> 

<?php

	$this->load->view('admin/inc/top_toolbar');

	$this->load->model('admin/adsgroups_m');

?>
<form name="" action="" method="post" style="float:right">
Nhóm <select name="search_by_group" id="search_by_group">
<option value="<?php echo base_url()?>AdminCP/ads/main">- - -Tất cả - - -</option>
<?php 
$url = base_url().'AdminCP/ads/main';
 foreach($ads_groups as $group)

		{
        	echo "<option value=\"".$url.'/'.$group->id."\"".($group->id == $gId?" selected":"").">|-".$group->vn_name."</option>";

			}			
?>
</select>
</form>

        <form action="" method="post" id="frmAction" name="frmAction">

            <input type="hidden" id="action" name="action" value="action"/>

            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>

            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>

            <table cellpadding="0" cellspacing="0" border="0" id="table_data">

                <thead> 

                    <tr> 

                        

                        <th width="50"><?php echo lang('number')?></th>

                        <th width="50">ID</th>

                        <th>Nhóm</th>

                        <th><?php echo lang('vn_name')?></th>

                        <th><?php echo lang('avatar')?></th>

                        <th width="70"><?php echo lang('status')?></th>
                        <th width="70"><?php echo lang('position')?> <!-- <a href="#" class="button_save_order" title="Save Order - Lưu lại thứ tự của các record"></a> --></th>

                        <th width="90"><?php echo lang('actions')?></th>

                        <td width="50" class="bg_check_all"><input type="checkbox" id="chkCheckAll"/></td>

                    </tr> 

                </thead>

                <tbody>

                    <?php if($objects){

						$i=0;

						foreach($objects as $row ) {$i++; ?>

                    <tr style="text-align:center">

                        

                        <td><?php echo $i;?></td>

                        <td><?php echo $row->id;?></td>

                        <td align="center">

                            <strong><?php echo $this->adsgroups_m->getName($row->gid); ?></strong>

                        </td>

                        <td><?php echo $row->vn_name ?></td>

                        <td>
                        <?php
						$avatar = $row->avatar;
						if($avatar){
                        $type = $avatar[strlen($avatar)-3].''.$avatar[strlen($avatar)-2].''.$avatar[strlen($avatar)-1];
						if(in_array($type,array('jpg','png','gif')))
						echo "<img src='uploads/ads/".$avatar."' alt='' width='100' />";
						elseif($type =='swf')
						echo "<img src='publics/admin/images/icon_flash.jpg' alt='' width='100' />";
						else
						echo "<img src='publics/admin/images/icon-video.png' alt='' width='100' />";
						}?>
                        
                        </td>

                        <td>

                        <span style="display:none"><?php echo $row->status?></span>

                            <img src="publics/admin/images/iconx16/public_<?php echo $row->status ?>.png" />

                        </td>
                        
                        <td>  <input type="hidden" name="positionID[]" value="<?php echo $row->id ?>"/>

                              <input type="text" name="position[]" onkeypress="return keypress(event);" style="width:30px;text-align:center;" value="<?php echo $row->position ?>"/><span style="display:none"><?php echo $row->position ?></span></td>

                        <td class="button_action">

                            <a href="<?php echo base_url() ?>AdminCP/ads/detail/<?php echo $row->id ?>" class="edit_item" rel="<?php echo $row->id ?>" title="<?php echo lang('edit')?>"></a>

                             <a href="javascript:formSubmit('frmAction','enable',<?php echo $row->id;?>);" class="enable_item"  title="<?php echo lang('display')?>"><?php echo lang('display')?></a>

                             <a href="javascript:formSubmit('frmAction','disable',<?php echo $row->id;?>);" class="disable_item"  title="<?php echo lang('hide')?>"><?php echo lang('hide')?></a>

                              <a href="javascript:formSubmit('frmAction','delete',<?php echo $row->id;?>);" class="delete_item"  title="<?php echo lang('delete')?>"><?php echo lang('delete')?></a>



                        </td>

                        <td><input type="checkbox" class="chkCheck" name="chkBox[]" value="<?php echo $row->id ?>"/></td>

                    </tr>

                    <?php } }?>

                </tbody> 

            </table>

            <div class="clear"></div>

        </form>

    </p>

   <?php $this->load->view('admin/inc/bottom_toolbar')?>

    </div>