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

							<?php echo $title_site ?>

                        </span>

						<div class="function_button">

                        	<a href="javascript:save();" class="button_save">Save</a>

                            <a href="javascript:save_close();" class="button_save_close">Save & Close</a>

                            <a href="javascript:save_new();" class="button_save_new">Save & New</a>

                            <span class="line"></span>

                            <a href="AdminCP/exhibitors/main" class="button_cancel">Calcel</a>

                        </div>

                        <div class="clear"></div>

                    </h3> 

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

                                   <!-- <tr>

                                    	<td class="border width_display_td">Mã số</td>

                                        <td class="border"><input value="<?php echo $no?>" type="text" id="no" name="no" class="text  validate[required]"/></td>

                                    </tr>-->
                                    <tr>

                                    	<td class="border width_display_td"><?php echo lang('name')?></td>

                                        <td class="border"><input value="<?php echo $name?>" type="text" id="name" name="name" class="text  validate[required]" onblur="return getKey('name','slug');"/></td>

                                    </tr>

                                   
                                    <tr>

                                    	<td class="border">Slug</td>

                                        <td class="border"><input value="<?php echo $slug ?>" type="text" id="slug" name="slug" class="text validate[required]" onblur="return getKey('name','slug');"/></td>

                                    </tr>
                                   <!-- <tr>
                                    
                                    <td class="border"><?php echo lang('address')?></td>

                                        <td class="border"><input value="<?php if(isset($properties['address']))echo $properties['address'] ?>" type="text" id="address" name="address" class="text"/></td>

                                    </tr>
                                    <tr>

                                    	<td class="border">Website</td>

                                        <td class="border">http://<input value="<?php if(isset($properties['website']))echo $properties['website'] ?>" type="text" id="website" name="website" class="text" style="width:500px"/></td>

                                    </tr>

                                     <tr>

                                    <td class="border">Điện thoại</td>

                                        <td class="border"><input value="<?php if(isset($properties['telephone']))echo $properties['telephone'] ?>" type="text" id="telephone" name="telephone" class="text"/></td>

                                    </tr>
                                    <td class="border">Fax</td>

                                        <td class="border"><input value="<?php if(isset($properties['fax']))echo $properties['fax'] ?>" type="text" id="fax" name="fax" class="text"/></td>

                                    </tr>
                                    <td class="border">Email</td>

                                        <td class="border"><input value="<?php if(isset($properties['email']))echo $properties['email'] ?>" type="text" id="email" name="email" class="text"/></td>

                                    </tr>-->
                                     <tr> 
                                        <td colspan="2" class="titleFCK"><?php echo lang('detail_content') ?></td> 
                                    </tr> 
                                    <tr> 
                                        <td colspan="2" class="border">
                                            <textarea style="width:99%;" name="detail" id="detail" ><?php echo $detail ?></textarea>
                                        </td> 
                                    </tr>

                                     <tr>

                                    	<td class="border"><?php echo lang('avatar')?></td>

                                        <td class="border">

                                        <?php if($avatar){ ?>

                                        <img src="uploads/exhibitors/<?php echo $avatar?>" alt="" width="100" />

                                        <input type="hidden" name="old_avatar" value="<?php echo $avatar ?>">

                                        <?php }?>

                                        <input type="file" id="avatar" name="avatar" /></td>

                                    </tr>

                                     

                                    

                                   

                                </table>

                            </div>

                            <div class="clear"></div>

                        </form>

                    </p>

                    <h3 class="ui-widget-header ui-corner-all">

                    	<div class="function_button">

                        	<a href="" class="button_save">Save</a>

                            <a href="" class="button_save_close">Save & Close</a>

                            <a href="" class="button_save_new">Save & New</a>

                            <span class="line"></span>

                            <a href="AdminCP/exhibitors/main/" class="button_cancel">Calcel</a>

                        </div>

                        <div class="clear"></div>

                    </h3> 

				</div>

<script type="text/javascript">

//<![CDATA[

var editor = CKEDITOR.replace( 'detail' , {height:'150',language: 'vi'} );

CKFinder.setupCKEditor( editor, 'resource/ckfinder/' ) ;

//]]>

</script>