<script type="text/javascript" src="publics/admin/js/submitaction.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	$("#search_by_category").change(function(){
		var url = '<?php echo base_url()?>AdminCP/products/main/'+$(this).val();

		if(url != '')
		{
			location.href = url;

		}
	});
});
</script>
<div class="ui-widget-content ui-corner-all"> 
  
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
            
        </div>  <div class="combobox_search">     <?php echo lang('category')?>  : 
<select name="search_by_category"  id="search_by_category" >
    <option value="">- - - Tất cả - - -</option>
   <?php if($cmbUser){
       $url = base_url().'AdminCP/products/main';
        echo $cmbUser;

      }?>



</select>



                </div>        



        <form action="" method="post" id="frmAction" name="frmAction">



            <input type="hidden" id="action" name="action" value="action"/>



            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>



           <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>



          <?php require_once(APPPATH.'models/admin/productcategories_m.php');



			$categories = new Productcategories_m();?>



            <table cellpadding="0" cellspacing="0" border="0" id="table_data">



                <thead> 



               



                    <tr> 



                        <th width="50"><?php echo lang('number')?></th>



                        <th width="50">ID</th>



                        <th>Nhà phân phối</th>



                        <th>Tên</th>



                         <th><?php echo lang('avatar');?></th>



                        <th width="70"><?php echo lang('status')?></th>



                         <th width="70"><?php echo lang('position')?> <a href="#" class="button_save_order" title="Save Order - Lưu lại thứ tự của các record"></a></th>



                        <td class="bg_check_all" width="140"><?php echo lang('actions')?></td>



                         <td class="bg_check_all" width="40"><input type="checkbox" id="chkCheckAll" title="Check all"/></td>



                    </tr> 



                </thead>



                <tbody>



                    <?php if($objects){



						$i=0;



						foreach($objects as $row ) {$i++; ?>



                    <tr style="text-align:center">



                        <td><?php echo $i;?></td>



                        <td><?php echo $row->id;?></td>



                         <td><a href="<?php echo base_url().'AdminCP/products/main/'.$row->user_id?>" title="Xem sản phẩm của nhà phân phối này"><?php echo $this->users_m->getField('company',$row->user_id);?></a></td>



                        <td class="title_name">



                            <b><?php echo $row->vn_name ?></b>






                        </td>



                        <td><img src="uploads/products/a_<?php echo $row->avatar?>" alt="" width="100" /></td>



                        <td>



                        <span style="display:none"><?php echo $row->status?></span>



                            <img src="publics/admin/images/iconx16/public_<?php echo $row->status ?>.png" />



                        </td>



                        <td>  <input type="hidden" name="positionID[]" value="<?php echo $row->id ?>"/>



                              <input type="text" name="position[]" onkeypress="return keypress(event);" 



                                            	style="width:30px;text-align:center;" value="<?php echo $row->position ?>"/><span style="display:none"><?php echo $row->position ?></span></td>



                        <td class="button_action">



                            <a href="<?php echo base_url() ?>AdminCP/products/detail/<?php echo $row->id ?>" class="edit_item" rel="<?php echo $row->id ?>" title="Chi tiết"></a>



                             <a href="javascript:formSubmit('frmAction','enable',<?php echo $row->id;?>);" class="enable_item"  title="<?php echo lang('display')?>"><?php echo lang('display')?></a>



                             <a href="javascript:formSubmit('frmAction','disable',<?php echo $row->id;?>);" class="disable_item" title="<?php echo lang('hide')?>"><?php echo lang('hide')?></a>



                              <a href="javascript:formSubmit('frmAction','delete',<?php echo $row->id;?>);" class="delete_item"  title="<?php echo lang('delete')?>"><?php echo lang('delete')?></a>



                              <?php if($row->home == 0) {?>



                              <a href="javascript:formSubmit('frmAction','enable_home',<?php echo $row->id;?>);" class="enable_home"  title="Hiển thị trang chủ">Home</a>



                              <?php }else {?>



                              <a href="javascript:formSubmit('frmAction','delete_home',<?php echo $row->id;?>);" class="delete_home" title="Delete home">Delete Home</a>



                              <?php }?>







                        </td>



                         <td><input type="checkbox" class="chkCheck" name="chkBox[]" value="<?php echo $row->id ?>"/></td>



                    </tr>



                    <?php } }?>



                </tbody> 



            </table>



            <div class="clear"></div>



        </form>



    </p>



  <h3 class="ui-widget-header ui-corner-all">
        <span style="float:left">
            <?php echo $title_page;?> 
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


    </div>