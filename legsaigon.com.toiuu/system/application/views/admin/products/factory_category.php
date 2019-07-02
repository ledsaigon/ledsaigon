<script type="text/javascript" src="<?php echo base_url().'publics/admin/js/submitaction.js'?>">

</script> 



<div class="ui-widget-content ui-corner-all"> 

 <?php //$this->load->view('admin/inc/top_toolbar');
 $this->load->model('admin/factories_m');
 require_once(APPPATH.'models/admin/productcategories_m.php');
 $productcategories_m = new Productcategories_m();
echo'<br>&nbsp;&nbsp;&nbsp;<a href="'.base_url().'AdminCP/factories/main" title="Trở về " class="back">Trở về </a>';
 ?>

        <form action="" method="post" id="frmAction" name="frmAction">

            <input type="hidden" id="action" name="action" value="action"/>

            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>

            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>

           <table cellpadding="0" cellspacing="0" border="0" id="table_data">

                <thead> 

                    <tr> 

                        

                        <th width="50">STT</th>

                        <th width="150">Hãng sản xuất</th>


                        <th>Danh mục sản phẩm</th>

                        <th width="100">Trạng thái</th>

                        <th width="100">Vị trí<a href="#" class="button_save_order" title="Save Order - Lưu lại thứ tự của các record"></a>

                        <td class="bg_check_all" width="100" >Thao tác</td>


                    </tr> 

                </thead>

                <tbody>

               

                    <?php
					if($objects){
					 $i=0;foreach($objects as $row ) {$i++; ?>

                    <tr style="text-align:center">

                        

                        <td><?php echo $i;?></td>

                        <td>  <?php echo $this->factories_m->getName($row->fid);?></td>


                        <td  style="text-align:left;padding:5px;">

                         <strong><?php echo $productcategories_m->getName($row->cid) ?></strong>
                           

                        </td>

                        <td >

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


                             <a href="javascript:formSubmit('frmAction','enable',<?php echo $row->id;?>);" class="enable_item"  title="Hiện">Hiện</a>

                             <a href="javascript:formSubmit('frmAction','disable',<?php echo $row->id;?>);" class="disable_item"  title="Ẩn">Ẩn</a>





                        </td>


                    </tr>

                    <?php } 
					
					}?>

                </tbody> 

            </table>

            <div class="clear"></div>

        </form>

    </p>

   <?php //$this->load->view('admin/inc/bottom_toolbar')?>

    </div>