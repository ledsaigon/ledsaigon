f<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>

<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 

<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>

<script type="text/javascript" src="resource/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="resource/ckfinder/ckfinder.js"></script>

<script type="text/javascript">

	$(document).ready(function() {

		$("#disable_top_page").css('display','block');

        $(".languageList").hide();

		$("#cboStatus").val(('<?php echo $status ?>' == '') ? '1' : '<?php echo $status ?>');

		$("#cboGroups").val(('<?php echo $gid ?>' == '') ? '1' : '<?php echo $gid ?>');

		

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

                        <td class="border">Thuộc nhóm</td>

                        <td class="border">

                            <select id="cboGroups" name="cboGroups" class="text  validate[required]">

                            <?php if($adsGroups){

			echo $adsGroups;

			}?>

                            </select>

                        </td>

                    </tr>

                    <tr>

                        <td class="border width_display_td"><?php echo lang('name')?></td>

                        <td class="border"><input value="<?php echo $vn_name?>" type="text" id="vn_name" name="vn_name" class="text"/></td>

                    </tr>

                   <tr>

                      <td class="border"><?php echo lang('position')?></td>
                      <td class="border"><input value="<?php echo $position ?>" type="text" id="position" name="position" class="text " style="width:200px"/>
                      </td>

                      </tr>

<?php if($englishLang){?>

                    <tr>

                        <td class="border"><?php echo lang('en_name')?></td>

                        <td class="border"><input value="<?php echo $en_name ?>" type="text" id="en_name" name="en_name" class="text"/></td>

                    </tr>

                    <?php }?>

                   <tr>

                        <td class="border">Link</td>

                        <td class="border"><input value="<?php echo $link ?>" type="text" id="link" name="link" class="text"/></td>

                    </tr>

                   <tr> 

                  

                     

                     <tr>

                        <td class="border">Upload</td>

                        <td class="border">

                         <?php if($avatar ==true){

                             

                         $type = $avatar[strlen($avatar)-3].''.$avatar[strlen($avatar)-2].''.$avatar[strlen($avatar)-1];

						if(in_array($type,array('jpg','png','gif')))

						echo "<img src='uploads/ads/".$avatar."' alt='' width='200' />";

						else{

                             ?>

                              <OBJECT codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="250" ALIGN="">

                  <PARAM NAME=movie VALUE="<?php echo 'uploads/ads/'.$avatar; ?>">

                  <PARAM NAME=quality VALUE=high>

                  <param name="wmode" value="transparent">

                  <param name="menu" value="false">

                  <EMBED src="<?php echo 'uploads/ads/'.$avatar; ?>" quality=high WIDTH="250" wmode="transparent" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer" menu="false">

                  </EMBED>

                </OBJECT>

                             

                             <?php }?>

                        <input type="hidden" name="old_avatar" id="old_avatar" value="<?php echo $avatar?>" />

                        <?php }?>

                            <input type="file" name="avatar" id="avatar" />

                        </td></td>

                    </tr>

                     

<tr>

                        <td class="border">Kích thước</td>

                        <td class="border">Width <input value="<?php echo @$properties['width']?>" type="text" id="width" name="width" class="text" style="width:100px"/>px &nbsp; &nbsp; Height <input value="<?php echo @$properties['height']?>" type="text" id="height" name="height" class="text" style="width:100px"/> px

                        <p>Chỉ nhập kích thước cho flash, hình ảnh bỏ qua</p>

                        </td>

                    </tr>

                    

                   

                </table>

                            </div>

                            <div class="clear"></div>

                        </form>

                    </p>

       <?php $this->load->view('admin/inc/bottom_toolbar_detail')?>

				</div>
