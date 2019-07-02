<script type="text/javascript" src="publics/admin/js/submitaction.js">
</script> 
<div class="ui-widget-content ui-corner-all"> 
     <h3 class="ui-widget-header ui-corner-all">
        <span style="float:left">
            <?php echo $title_page;?> 
        </span>
        <div class="function_button">
            <a href="#" class="button_delete"><?php echo lang('button_delete')?></a>
         
        </div>
        <div class="clear"></div>
    </h3> 
    <p>
        <div style="width:210px; float:left">
            	<span style="text-align:center;display:inline-block;width:100px;">
                            	<img src="publics/admin/images/toolbar/mail_0.png"/><br />

                                Chưa đọc
                            </span>
                            <span style="text-align:center;display:inline-block;width:100px;">

                            	<img src="publics/admin/images/toolbar/mail_1.png"/><br />


                                Đã đọc



                            </span>
            
        </div>
        <form action="" method="post" id="frmAction" name="frmAction">

            <input type="hidden" id="action" name="action" value="action"/>

            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>

            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>

           <table cellpadding="0" cellspacing="0" border="0" id="table_data">

                <thead> 

                    <tr> 

                        

                        <td class="bg_check_all" width="50">STT</td>

                        <td class="bg_check_all" width="120">Họ tên</td>


                        <td class="bg_check_all" width="120">Tiêu đề </td>
                        <td class="bg_check_all" width="120">Ngày gửi</td>

                        <th width="60">Trạng thái</th>

                       
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

                        


                        <td  style="text-align:left;padding:5px;">

                           <strong><?php echo $row->fullname ?></strong>


                        </td>
                        <td><?php echo $row->subject?></td>
                        <td>  <?php echo $row->date_created;?></td>

                        <td >

                        <span style="display:none"><?php echo $row->status?></span>

                            <img src="publics/admin/images/toolbar/mail_<?php echo $row->status ?>.png" />

                        </td>

                         

                       

                        <td class="button_action">

                            <a href="<?php echo base_url() ?>AdminCP/contacts/detail/<?php echo $row->id ?>" class="edit_item" rel="<?php echo $row->id ?>" title="Chi tiết"></a>

                           
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


    </div>