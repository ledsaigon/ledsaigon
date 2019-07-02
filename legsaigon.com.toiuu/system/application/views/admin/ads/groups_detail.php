<link rel="stylesheet" href="<?php echo base_url() ?>publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>

<script src="<?php echo base_url() ?>publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 

<script src="<?php echo base_url() ?>publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url() ?>resource/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>resource/ckfinder/ckfinder.js"></script>

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

	 <?php $this->load->view('admin/inc/bottom_toolbar_detail')?>

    <p>

   

        <form action="" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">

            <input type="hidden" id="action" name="action" value="action"/>

            <input type="hidden" id="status" name="status" value="save"/>

            <input type="hidden" id="txtID" name="txtID" value="<?php echo $id ?>"/>

            

            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>

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

                            <select id="cboStatus" name="cboStatus" class="text  validate[required]">

                                <option value="1"><?php echo lang('display')?> </option>

                                <option value="0"><?php echo lang('hide')?></option>

                                <option value="2"><?php echo lang('deleted')?></option>

                            </select>

                        </td>

                    </tr>

                      
                    <tr>

                        <td class="border width_display_td"><?php echo lang('vn_name')?></td>

                        <td class="border"><input value="<?php echo $vn_name?>" type="text" id="vn_name" name="vn_name" class="text validate[required]"/></td>

                    </tr>

                   

                    <tr>

                        <td class="border"><?php echo lang('en_name')?></td>

                        <td class="border"><input value="<?php echo $en_name ?>" type="text" id="en_name" name="en_name" class="text"/></td>

                    </tr>

                                     

                </table>

                            </div>

                            <div class="clear"></div>

                        </form>

                    </p>

       <?php $this->load->view('admin/inc/bottom_toolbar_detail')?>

				</div>
