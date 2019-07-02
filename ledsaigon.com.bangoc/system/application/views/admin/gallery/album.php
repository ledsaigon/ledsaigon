<script type="text/javascript" src="publics/admin/js/submitaction.js">

</script> 



<div class="ui-widget-content ui-corner-all"> 

<?php $this->load->view('admin/inc/top_toolbar')?>

        <form action="" method="post" id="frmAction" name="frmAction">

            <input type="hidden" id="action" name="action" value="action"/>

            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>

            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>

            <table cellpadding="0" cellspacing="0" border="0" id="table_data">

                <thead> 

                    <tr> 

                        

                        <th width="50"><?php echo lang('number')?></th>

                        <th width="50">ID</th>

                        <th>Album cha</th>
                        <th><?php echo lang('name')?></th>

                        <th><?php echo lang('avatar')?></th>

                        <th width="70"><?php echo lang('status')?></th>

                        <th width="120"><?php echo lang('actions')?></th>

                        <td width="50" class="bg_check_all"><input type="checkbox" id="chkCheckAll"/></td>

                    </tr> 

                </thead>

                <tbody>

                    <?php if($objects){
						$this->load->model('admin/gallerygroups_m');

						$i=0;

						foreach($objects as $row ) {$i++; ?>

                    <tr style="text-align:center">

                        

                        <td><?php echo $i;?></td>

                        <td><?php echo $row->id;?></td>
                         <td><?php echo $this->gallerygroups_m->getName($row->pid);?></td>

                        <td  style="text-align:left; padding-left:25px; font-weight:bold"><?php echo $row->vn_name ?></td>

                        <td>

                        <?php

						$avatar = $row->avatar;
						if($avatar){

			 $type = $avatar[strlen($avatar)-3].''.$avatar[strlen($avatar)-2].''.$avatar[strlen($avatar)-1];?>

			<?php if($type=='jpg'||$type=='png'||$type=='gif'){?>

                    <img src="uploads/galleries/a_<?php echo $row->avatar ?>" width="100" >

                    <?php }else {?>

                         <img src="publics/admin/images/icon_flass.jpg" width="100" >   

                      <?php } 
						}?>		

                        </td>

                        <td>

                        <span style="display:none"><?php echo $row->status?></span>

                            <img src="publics/admin/images/iconx16/public_<?php echo $row->status ?>.png" />

                        </td>

                        <td class="button_action">

                            <a href="<?php echo base_url()?>AdminCP/gallerygroups/detail/<?php echo $row->id ?>" class="edit_item" rel="<?php echo $row->id ?>" title="<?php echo lang('edit')?>"></a>

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