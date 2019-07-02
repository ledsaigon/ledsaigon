<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>

<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 

<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>

<script type="text/javascript">

	$(document).ready(function() {

		$("#disable_top_page").css('display','block');

        $(".languageList").hide();

		$("#cboStatus").val(('<?php echo $status ?>' == '') ? '1' : '<?php echo $status ?>');

		$("#pId").val(('<?php echo $pid ?>' == '') ? '0' : '<?php echo $pid ?>');

		

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


                            </select>

                        </td>

                    </tr>

                      <tr>

                        <td class="border">Album cha</td>

                        <td class="border">

                            <select id="pId" name="pId" class="text  validate[required]">
                            <option value="0">Album gốc</option>

                            <?php if($albumCombo){
			echo $albumCombo;
			}?>

                            </select>

                        </td>

                    </tr>

                    <tr>

                        <td class="border width_display_td"><?php echo lang('name')?> Album</td>

                        <td class="border"><input value="<?php echo $vn_name?>" type="text" id="vn_name" name="vn_name" class="text" onblur="return getKey('vn_name','slug');"/></td>

                    </tr>
                  <?php if($englishLang){?>
                    <tr>

                        <td class="border"><?php echo lang('name')?> Album (Tiếng Anh)</td>

                        <td class="border"><input value="<?php echo $en_name ?>" type="text" id="en_name" name="en_name" class="text"/></td>

                    </tr>
                    <?php }?>
                      <tr>

                        <td class="border">Slug</td>

                        <td class="border"><input value="<?php echo $slug ?>" type="text" id="slug" name="slug" class="text"/></td>

                    </tr>
                    <tr>

                        <td class="border width_display_td">Hiển thị trang chủ</td>

                        <td class="border" align="left"><input value="1" type="checkbox" id="home" name="home" <?php if($home==1) echo 'checked';?>/>
                        <?php if($usersInfo['u_type']==4){?>
                        &nbsp; &nbsp; &nbsp;<input type="checkbox" name="is_delete" value="1" <?php if($is_delete==1) echo 'checked'?>/>Không được xóa
                        <?php }?>
                        </td>

                    </tr>

                   

<tr> 



<td colspan="2" class="titleFCK"><?php echo lang('detail_content') ?> </td> 



</tr> 



<tr> 



<td colspan="2" class="border">



<textarea style="width:99%;" name="vn_detail" id="vn_detail" ><?php echo $vn_detail ?></textarea>



</td> 



</tr>


<tr>
                  
                     

                     <tr>

                        <td class="border">Hình đại diện</td>

                        <td class="border">

                         <?php if($avatar ==true){
                             
                         $type = $avatar[strlen($avatar)-3].''.$avatar[strlen($avatar)-2].''.$avatar[strlen($avatar)-1];
						if(in_array($type,array('jpg','png','gif')))
						echo "<img src='".base_url()."uploads/galleries/a_".$avatar."' alt='' weight='200' />";
						else{
                             ?>
                              <OBJECT codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="250" ALIGN="">

                  <PARAM NAME=movie VALUE="<?php echo 'uploads/galleries/'.$avatar; ?>">

                  <PARAM NAME=quality VALUE=high>

                  <param name="wmode" value="transparent">

                  <param name="menu" value="false">

                  <EMBED src="<?php echo 'uploads/galleries/'.$avatar; ?>" quality=high WIDTH="250" wmode="transparent" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer" menu="false">

                  </EMBED>

                </OBJECT>
                             
                             <?php }?>


                        <input type="hidden" name="old_avatar" id="old_avatar" value="<?php echo $avatar?>" />

                        <?php }?>

                            <input type="file" name="avatar" id="avatar" />

                        </td></td>

                    </tr>

                     

                    

                   

                </table>

                            </div>

                            <div class="clear"></div>

                        </form>

                    </p>

       <?php $this->load->view('admin/inc/bottom_toolbar_detail')?>

				</div>
<script type="text/javascript" src="resource/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="resource/ckfinder/ckfinder.js"></script>
<script type="text/javascript">

//<![CDATA[
var editor = CKEDITOR.replace( 'vn_detail' , {height:'150',language: 'vi'} );

CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;

//]]>

</script>