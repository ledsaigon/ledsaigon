<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>
<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 
<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>
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



                   <h3 class="ui-widget-header ui-corner-all">



<span>



    <?php echo $title_page ?>



</span>







<div class="clear"></div>



</h3>



                    <p>



                   



                    	<form action="" method="post" id="frmAction" name="frmAction">



                            <input type="hidden" id="action" name="action" value="action"/>



                            <input type="hidden" id="status" name="status" value="save"/>



                            <input type="hidden" id="txtID" name="txtID" value="<?php echo $id ?>"/>



                            





                           	<div>



                            	<table cellpadding="0" cellspacing="0" border="0" id="table_data_source">



                                	<tr>



                                    	<th colspan="2"><?php echo lang('detail')?></th>



                                    </tr>



                                	<tr>



                                    	<td class="border width_display_td">ID</td>



                                        <td class="border"><b><?php echo $id ?></b></td>



                                    </tr>



                                      



                                    <tr>



                                    	<td class="border"><?php echo lang('status')?></td>



                                        <td class="border">



                                        	<select id="cboStatus" name="cboStatus" style="width:200px">



                                                <option value="1"><?php echo lang('display')?> </option>



                                                <option value="0"><?php echo lang('hide')?></option>



                                                <!--<option value="2"><?php echo lang('deleted')?></option>-->



                                            </select>



                                        </td>



                                    </tr>



                                    <tr>



                                    	<td class="border width_display_td">Tên</td>



                                        <td class="border"><input value="<?php echo $vn_name?>" type="text" id="vn_name" name="vn_name" class="text  validate[required]"/></td>



                                    </tr>

                                    <?php if($seoWeb){?>

                                    <tr>



                                    	<td class="border width_display_td">Mô tả thẻ a</td>



                                        <td class="border"><input value="<?php echo $solan_title?>" type="text" id="solan_title" name="solan_title" class="text" /></td>



                                    </tr>

                                    <?php }?>

                                    <?php if($englishLang ){ ?>



                                     <tr>



                                    	<td class="border width_display_td">Tên (Tiếng Anh)</td>



                                        <td class="border"><input value="<?php echo $en_name?>" type="text" id="en_name" name="en_name" class="text  validate[required]" /></td>



                                    </tr>



                                   <?php }?>

									<?php if($_SESSION['usersInfo']['u_type']==4){?>

                                    <tr>



                                    	<td class="border">Url</td>



                                        <td class="border"><input value="<?php echo $url ?>" type="text" id="url" name="url" class="text"/></td>



                                    </tr>



                                  <?php }else{?>

                                  <input value="<?php echo $url ?>" type="hidden" id="url" name="url" class="text validate[required]"/>

                                  

                                  <?php }?>

 <tr> 



                                    <td class="border">Vị trí</td>



                                     <td class="border">



<input value="<?php echo $position ?>" type="text" id="position" name="position" 



                                        class="text"  style="width:100px"/>                                        </td> 



                                    </tr>

                                   <?php if($seoWeb >10){?>

                                   <tr> 



                                    <td class="border">Meta Title</td>



                                     <td class="border">



<input value="<?php echo $vn_title_site ?>" type="text" id="vn_title_site" name="vn_title_site" 



                                        class="text  validate[required]" />                                        </td> 



                                    </tr>

                                    <?php if($englishLang){?>

                                     <tr> 



                                    <td class="border">Meta Title (Tiếng Anh)</td>



                                     <td class="border">



<input value="<?php echo $en_title_site ?>" type="text" id="en_title_site" name="en_title_site" 



                                        class="text  validate[required]" />                                        </td> 



                                    </tr>

                                    <?php }?>

                                     <tr> 



                                    <td class="border">Meta Keyword</td>



                                     <td class="border">



<input value="<?php echo $vn_keyword ?>" type="text" id="vn_keyword" name="vn_keyword" 



                                        class="text  validate[required]" />                                        </td> 



                                    </tr>

                                    <?php if($englishLang){?>

                                    <tr>



                                     <td class="border">Meta Keyword (Tiếng Anh)</td>



                                     <td class="border">



<input value="<?php echo $en_keyword ?>" type="text" id="en_keyword" name="en_keyword" 



                                        class="text  validate[required]" />                                        </td> 



                                    </tr>



                                   <?php }?>



                                    <tr> 



                                    <td class="border">Meta Description</td>



                                        <td  class="border">



                                            <textarea  name="vn_description" id="vn_description" class="text  validate[required]"><?php echo $vn_description ?></textarea>



                                        </td> 



                                    </tr>

<?php if($englishLang){?>

                                     <tr> 



                                    <td class="border">Meta Description (Tiếng Anh)</td>



                                        <td  class="border">



                                            <textarea name="en_description" id="en_description" class="text  validate[required]"><?php echo $en_description ?></textarea>



                                        </td> 



                                    </tr>

                                    <?php }?>

                                    <?php } //end seo?>



                                   



                                </table>



                            </div>



                            <div class="clear"></div>



                        </form>



                    </p>



                    <h3 class="ui-widget-header ui-corner-all">



                    	<div class="function_button">



                        	<a href="" class="button_save">Save</a>

                             <span class="line"></span>



                            <a href="" class="button_save_close">Save & Close</a>





                            <span class="line"></span>



                            <a href="AdminCP/menu/main/" class="button_cancel">Calcel</a>



                           



                        </div>



                        <div class="clear"></div>



                    </h3> 



				</div>



