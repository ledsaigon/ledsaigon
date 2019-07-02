<script type="text/javascript" src="publics/admin/js/submitaction.js">

</script> 



<div class="ui-widget-content ui-corner-all"> 

   <h3 class="ui-widget-header ui-corner-all">
        <span style="float:left">
            <?php echo $title_page;?> 
        </span>
        <div class="function_button">
         
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
        <div style="width:310px; float:left">
            <span style="text-align:center;display:inline-block;width:80px;">
                <img src="<?php echo base_url() ?>publics/admin/images/iconx16/public_1.png" /><br />
              Đã xử lý
            </span>
            <span style="text-align:center;display:inline-block;width:100px;">
                <img src="<?php echo base_url() ?>publics/admin/images/iconx16/public_0.png" /><br />
               Chưa xử lý
            </span>
             <span style="text-align:center;display:inline-block;width:100px;">
                <img src="<?php echo base_url() ?>publics/admin/images/iconx16/public_2.png" /><br />
               Đã hoàn tất và xóa
            </span>
            
        </div>

        <form action="" method="post" id="frmAction" name="frmAction">

            <input type="hidden" id="action" name="action" value="action"/>

            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>

            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>

           <table cellpadding="0" cellspacing="0" border="0" id="table_data">

                <thead> 

                    <tr> 

                        

                        <th width="50">STT</th>

                        <th width="50">Mã ĐH</th>


                        <th>Tên khách hàng</th>
                        <th>Số ĐT</th>
                        <th>Ngày đặt</th>

                        <th width="60">Trạng thái</th>

                        

                        <td class="bg_check_all" width="140" >Thao tác</td>

                        <td width="30" class="bg_check_all"><input type="checkbox" id="chkCheckAll"/></td>

                    </tr> 

                </thead>

                <tbody>

               

                    <?php
					if($objects){
					 $i=0;foreach($objects as $row ) {$i++;
					 $properties = unserialize($row->properties);
					  ?>

                    <tr style="text-align:center">

                        

                        <td><?php echo $i;?></td>

                        <td> <a href="<?php echo base_url() ?>AdminCP/orders/detail/<?php echo $row->id ?>" style="text-decoration:underline; font-weight:bold" title="Xem chi tiết đơn hàng"> <?php echo $row->id;?></a></td>


                        <td tyle="text-align:left;padding:5px;">

                           <strong><?php echo $row->fullname ?></strong>


                        </td>
                        <td>  <?php echo $properties['cell'];?></td>
                        <td><?php echo $row->date_created ?></td>

                        <td class="public_<?php echo $row->id ?>">

                        <span style="display:none"><?php echo $row->status?></span>

                            <img src="publics/admin/images/iconx16/public_<?php echo $row->status ?>.png" />

                        </td>

                          

                       

                        <td class="button_action">

                            <a href="<?php echo base_url() ?>AdminCP/orders/detail/<?php echo $row->id ?>" class="edit_item" rel="<?php echo $row->id ?>" title="Chi tiết"></a>

                             <a href="javascript:formSubmit('frmAction','enable',<?php echo $row->id;?>);" class="enable_item"  title="Đã xử lý">Hiện</a>

                             <a href="javascript:formSubmit('frmAction','disable',<?php echo $row->id;?>);" class="disable_item"  title="Chưa xử lý">Ẩn</a>

                              <a href="javascript:formSubmit('frmAction','delete',<?php echo $row->id;?>);" class="menu_item_delete"  title="Xóa">xóa</a>

                            



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