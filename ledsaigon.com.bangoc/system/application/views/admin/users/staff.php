<script type="text/javascript" src="publics/admin/js/submitaction.js">

</script> 



<div class="ui-widget-content ui-corner-all"> 

<?php $this->load->view('admin/inc/top_toolbar');?>

        <form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="post" id="frmAction" name="frmAction">

            <input type="hidden" id="action" name="action" value="action"/>

            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>

            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>

            <table cellpadding="0" cellspacing="0" border="0" id="table_data">

                <thead> 

                    <tr> 

                        

                        <th width="50"><?php echo lang('number')?></th>

                        <th width="50">ID</th>

                        <th>Tên đăng nhập</th>

                        <th>Tên đầy đủ</th>

                        <th>Loại user</th>

                        <th width="70"><?php echo lang('status')?></th>

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

                        <td class="title_name">

                            <b><?php echo $row->username ?></b>

                        </td>

                        <td><?php echo $row->fullname ?></td>

                        <td><?php if($row->tid==3) echo 'Admin';
						
						if($row->tid==5) echo 'Quản lý sản phẩm';
						if($row->tid==6) echo 'Quản lý bài viết'; ?></td>

                        <td>

                        <span style="display:none"><?php echo $row->status?></span>

                            <img src="publics/admin/images/iconx16/public_<?php echo $row->status ?>.png" />

                        </td>

                        <td class="button_action">

                            <a href="<?php echo base_url() ?>AdminCP/users/editStaff/<?php echo $row->id ?>" class="edit_item" rel="<?php echo $row->id ?>" title="<?php echo lang('edit')?>"></a>

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