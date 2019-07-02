<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>

<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 

<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$("#disable_top_page").css('display','block');
        $(".languageList").hide();
		$("#pId").val(('<?php echo $pid ?>' == '') ? '' : '<?php echo $pid ?>');

		$("#cboAccess").val(('<?php echo $status ?>' == '') ? '1' : '<?php echo $status ?>');

		$("#frmAction").validationEngine();

		$(".button_save").click(function(){



			$("#status").val('save');



			$("#frmAction").submit();



			return false;



		});



		$(".button_save_close").click(function(){



			$("#status").val('close');



			$("#frmAction").submit();



			return false;



		});



		$(".button_save_new").click(function(){



			$("#status").val('new');



			$("#frmAction").submit();



			return false;



		});



	});



</script>







<div class="ui-widget-content ui-corner-all"> 


  <?php $this->load->view('admin/inc/top_toolbar_detail')?> 


                    <p>



                   



                    	<form action="" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">



                            <input type="hidden" id="action" name="action" value="action"/>



                            <input type="hidden" id="status" name="status" value="save"/>



                            <input type="hidden" id="txtID" name="txtID" value="<?php echo $id ?>"/>



                            <input type="hidden" id="position" name="position" value="<?php echo $position ?>"/>



                            



                            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>



                           	<div>



                            	<table cellpadding="0" cellspacing="0" border="0" id="table_data_source">



                                	<tr>



                                    	<th colspan="2">Chi tiết</th>



                                    </tr>



                                	<tr>



                                    	<td class="border width_display_td">ID</td>



                                        <td class="border"><b><?php echo $id ?></b></td>



                                    </tr>



                                    <tr>



                                    	<td class="border width_display_td">Tên </td>



                                        <td class="border"><input value="<?php echo $vn_name?>" type="text" id="vn_name" name="vn_name" class="text  validate[required]" /></td>



  <?php if($seoWeb){?>                                  </tr>
<tr>
<td class="border width_display_td">Mô tả thẻ a</td>

<td class="border"><input value="<?php echo $solan_title?>" type="text" id="solan_title" name="solan_title" class="text" /></td>

</tr>
<?php }?>



                                    <tr>



                                    	<td class="border">Trạng thái</td>



                                        <td class="border">



                                        	<select id="cboAccess" name="cboAccess" class="text  validate[required]">



                                                <option value="1">Hiển thị </option>



                                                <option value="0">Không hiển thị </option>



                                                <option value="2">Đã bị xóa</option>



                                            </select>



                                        </td>



                                    </tr>



                                    <tr > 



                                        <td class="border"> 



                                            Danh mục cha



                                        </td> 



                                        <td class="border"> 



                                            <select id="pId" name="pId" class="text  validate[required]">



                                            	<option value="0">Thư mục gốc</option>



                                                <?php echo $listProductCate ?>



                                            </select>



                                        </td> 



                                    </tr>

                                   


                                     <tr> 



                                    <td class="border"><?php echo lang('position')?></td>



                                     <td class="border">



<input value="<?php echo $position ?>" type="text" id="position" name="position" 



                                        class="text" style="width:100px" />                                        </td> 



                                    </tr>

 <?php if($seoWeb){?> 

                                  <tr> 



                                    <td class="border">Title </td>



                                     <td class="border">



<input value="<?php echo $vn_title_site ?>" type="text" id="vn_title_site" name="vn_title_site"  class="text" />                                        </td> 



                                    </tr>
                                     <tr> 



                                    <td class="border">Keywords </td>



                                     <td class="border">



<input value="<?php echo $vn_keyword ?>" type="text" id="vn_keyword" name="vn_keyword" class="text" />                                        </td> 



                                    </tr>

                                    <tr> 


                                    <td class="border">Description</td>


                                        <td  class="border">



                                            <textarea style="width:99%; height:80px" name="vn_description" id="vn_description" class="text"><?php echo $vn_description ?></textarea>



                                        </td> 



                                    </tr>

<?php }?>

                                   

                                   <!--  <tr>



                                    	<td class="border">Hình đại diện</p>

                                     </td>



                                        <td class="border">

                                        <?php if($avatar ==true){?>



                                        <img src="uploads/products/<?php echo $avatar?>" width="150" /><br />



                                        <input type="hidden" name="old_avatar" id="old_avatar" value="<?php echo $avatar?>" />



                                        <?php }?>





                                        	<input type="file"  class="text  validate[required]" id="avatar" name="avatar" value=""/>







                                        </td>



                                    </tr>-->



                                </table>



                            </div>



                            <div class="clear"></div>



                        </form>



                    </p>
  <?php $this->load->view('admin/inc/bottom_toolbar_detail')?>


				</div>