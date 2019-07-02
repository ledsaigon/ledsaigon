<script type="text/javascript" src="<?php echo base_url().'publics/admin/js/submitaction.js'?>">

</script> 



<div class="ui-widget-content ui-corner-all"> 

 <?php $this->load->view('admin/inc/top_toolbar');?>

        <form action="" method="post" id="frmAction" name="frmAction">

            <input type="hidden" id="action" name="action" value="action"/>

            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>

            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>

           <table cellpadding="0" cellspacing="0" border="0" id="table_data">

                <thead> 

                    <tr> 

                        

                        <th width="50">STT</th>

                        <th width="50">ID</th>


                        <th>Tên / Slug</th>
                        <th>Hình đại diện</th>

                        <th width="60">Trạng thái</th>

                        <th width="60">Vị trí<a href="#" class="button_save_order" title="Save Order - Lưu lại thứ tự của các record"></a>

                        <td class="bg_check_all" width="140" >Thao tác</td>

                        <td width="30" class="bg_check_all"><input type="checkbox" id="chkCheckAll"/></td>

                    </tr> 

                </thead>

                <tbody>

               

                    <?php
					if($objects){
					 $i=0;foreach($objects as $row ) {$i++; ?>

                    <tr style="text-align:center">

                        

                        <td><?php echo $i;?></td>

                        <td>  <?php echo $row->id;?></td>


                        <td class="name_<?php echo $row->id ?>" style="text-align:left;padding:5px;">

                            <a href="<?php echo base_url().'AdminCP/factories/category/'.$row->id?>" title="Xem danh mục sản phẩm của hãng sản xuất này"><strong><?php echo $row->vn_name ?></strong></a>

                            <label style="color:#666;display:block;">

                                (slug: <?php echo $row->slug ?>)

                            </label>

                        </td>
                        <td><img src="<?php echo base_url().'uploads/products/'.$row->avatar?>" width="100" /></td>

                        <td class="public_<?php echo $row->id ?>">

                        <span style="display:none"><?php echo $row->status?></span>

                            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/public_<?php echo $row->status ?>.png" />

                        </td>

                          <td>

                            <input type="hidden" name="positionID[]" value="<?php echo $row->id ?>"/>

                            <input type="text" name="position[]" onkeypress="return keypress(event);" 

                             style="width:30px;text-align:center;" value="<?php echo $row->position?>"/>

                             <span style=" display:none"><?php echo $row->position?></span>

                             </td>

                       

                        <td class="button_action">

                            <a href="<?php echo base_url() ?>AdminCP/factories/detail/<?php echo $row->id ?>" class="edit_item" rel="<?php echo $row->id ?>" title="Chi tiết"></a>

                             <a href="javascript:formSubmit('frmAction','enable',<?php echo $row->id;?>);" class="enable_item"  title="Hiện">Hiện</a>

                             <a href="javascript:formSubmit('frmAction','disable',<?php echo $row->id;?>);" class="disable_item"  title="Ẩn">Ẩn</a>

                              <a href="javascript:formSubmit('frmAction','delete',<?php echo $row->id;?>);" class="menu_item_delete"  title="Xóa">xóa</a>
 <?php if($row->home == 0) {?>



                              <a href="javascript:formSubmit('frmAction','enable_home',<?php echo $row->id;?>);" class="enable_home"  title="Hiển thị trang chủ">Home</a>



                              <?php }else {?>



                              <a href="javascript:formSubmit('frmAction','delete_home',<?php echo $row->id;?>);" class="delete_home" title="Delete home">Delete Home</a>



                              <?php }?>


                        </td>

                       <td><input type="checkbox" class="chkCheck" name="chkBox[]" value="<?php echo $row->id ?>"/></td>

                    </tr>

                    <?php } 
					
					}?>

                </tbody> 

            </table>

            <div class="clear"></div>

        </form>

    </p>

   <?php $this->load->view('admin/inc/bottom_toolbar')?>

    </div>