<link rel="stylesheet" href="<?php echo base_url() ?>publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>

<script src="<?php echo base_url() ?>publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 

<script src="<?php echo base_url() ?>publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>



<script type="text/javascript">

	$(document).ready(function() {

		$("#disable_top_page").css('display','block');

        $(".languageList").hide();

		$("#cboStatus").val(('<?php echo $status ?>' == '') ? '1' : '<?php echo $status ?>');

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

                                        <td class="border"><input value="<?php echo $vn_name?>" type="text" id="vn_name" name="vn_name" class="text  validate[required]" onblur="return getKey('vn_name','slug');"/></td>

                                    </tr>

                                                                    

                                    <tr>

                                    	<td class="border">Slug</td>

                                        <td class="border"><input value="<?php echo $slug ?>" type="text" id="slug" name="slug" class="text validate[required]" onblur="return getKey('vn_name','slug');"/></td>

                                    </tr>

                                     

                                    <tr>

                                    	<td class="border">Trạng thái</td>

                                        <td class="border">

                                        	<select id="cboStatus" name="cboStatus" class="text  validate[required]">

                                                <option value="1">Hiển thị </option>

                                                <option value="0">Không hiển thị </option>

                                                <option value="2">Đã bị xóa</option>

                                            </select>

                                        </td>

                                    </tr>

                                   
                                     <tr> 

                                    <td class="border"><?php echo lang('position')?></td>

                                     <td class="border">

<input value="<?php echo $position ?>" type="text" id="position" name="position" 

                                        class="text" style="width:100px" />
                                        &nbsp; &nbsp; &nbsp; Hiển thị trạng chủ&nbsp;  <input type="checkbox" name="home" value="1"  <?php if($home==1) echo 'checked';?>/>                                        </td> 

                                    </tr>
                                  <?php if($seoWeb){?> 

                                  <tr> 



                                    <td class="border">Title </td>



                                     <td class="border">



<input value="<?php echo $title_site ?>" type="text" id="title_site" name="title_site"  class="text" />                                        </td> 



                                    </tr>
                                     <tr> 



                                    <td class="border">Keyword </td>



                                     <td class="border">



<input value="<?php echo $keyword ?>" type="text" id="keyword" name="keyword" class="text" />                                        </td> 



                                    </tr>

                                    <tr> 


                                    <td class="border">Description</td>


                                        <td  class="border">



                                            <textarea style="width:99%; height:80px" name="description" id="description" class="text"><?php echo $description ?></textarea>



                                        </td> 



                                    </tr>

<?php }?>
                                     <tr>



                                    	<td class="border"><?php echo lang('avatar')?></td>



                                        <td class="border">



                                        <?php if($avatar !=''){?>



                                        <img src="<?php echo base_url()?>uploads/products/<?php echo $avatar?>" width="150" /><br />



                                        <input type="hidden" name="old_avatar" id="old_avatar" value="<?php echo $avatar?>" />



                                        <?php }?>



                                        	<input type="file" name="avatar" id="avatar" />



                                        </td>



                                    </tr>

                                                             </table>

                            </div>

                            <div class="clear"></div>

                        </form>

                    </p>

                    <?php $this->load->view('admin/inc/bottom_toolbar_detail')?>

				</div>