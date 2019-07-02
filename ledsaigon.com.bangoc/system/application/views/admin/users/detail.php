<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>

<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 

<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>

<script type="text/javascript" src="resource/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="resource/ckfinder/ckfinder.js"></script>

<script type="text/javascript">

	$(document).ready(function() {

		$("#disable_top_page").css('display','block');

        $(".languageList").hide();

		$("#cboStatus").val(('<?php echo $status ?>' == '') ? '1' : '<?php echo $status ?>');
		$("#tId").val(('<?php echo $tid ?>' == '') ? '1' : '<?php echo $tid ?>');

		

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

                   

                    	<form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">

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

                                    	<td class="border width_display_td">Tên đầy đủ</td>

                                        <td class="border"><input value="<?php echo $fullname?>" type="text" id="fullname" name="fullname" class="text  validate[required]"/></td>

                                    </tr>

                                    <tr>

                                    	<td class="border">Tên đăng nhập</td>

                                        <td class="border"><input value="<?php echo $username ?>" type="text" id="username" name="username" class="text"/></td>

                                    </tr>
                                     <tr>

                                    	<td class="border">Loại tài khoản</td>

                                        <td class="border"><select name="tId" id="tId">
                                        <option value="1">Customer</option>
                                        <option value="2">Manager</option>
                                        <option value="3">Admin</option>
                                        <option value="4">Funder</option>
                                        </select></td>

                                    </tr>

                                     <tr>

                                    	<td class="border">Mật khẩu</td>

                                        <td class="border"><input value="<?php echo $password ?>" type="text" id="password" name="password" class="text"/></td>

                                    </tr>
                                      <tr>

                                    	<td class="border">Email</td>

                                        <td class="border"><input value="<?php echo $email ?>" type="text" id="email" name="email" class="text"/></td>

                                    </tr>
                                      <tr>

                                    	<td class="border"><?php echo lang('address')?></td>

                                        <td class="border"><input value="<?php echo $address ?>" type="text" id="address" name="address" class="text"/></td>

                                    </tr>
                                      <tr>

                                    	<td class="border">Điện thoại</td>

                                        <td class="border"><input value="<?php echo $cell ?>" type="text" id="cell" name="cell" class="text"/></td>

                                    </tr>
                                     

                               

                                     

                                    

                                   

                                </table>

                            </div>

                            <div class="clear"></div>

                        </form>

                    </p>
<?php $this->load->view('admin/inc/bottom_toolbar_detail');?>
				</div>

<script type="text/javascript">

//<![CDATA[

var editor = CKEDITOR.replace( 'details' , {height:'150',language: 'vi'} );

CKFinder.setupCKEditor( editor, 'resource/ckfinder/' ) ;

//]]>

</script>