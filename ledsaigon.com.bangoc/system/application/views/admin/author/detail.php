<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>
<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 
<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#disable_top_page").css('display','block');
        $(".languageList").hide();
        
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
<div class="function_button">
    <a href="javascript:save();" class="button_save">Save</a>
    <span class="line"></span>
    <a href="javascript:save_close();" class="button_save_close">Save & Close</a>
    <span class="line"></span>
   
    <a href="<?php echo $url_cancel;?>" class="button_cancel">Calcel</a>
</div>
<div class="clear"></div>
</h3>
                    <p>
                   
                        <form action="" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">
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
                                        <td class="border width_display_td"><?php echo lang('title')?> </td>
                                        <td class="border"><input value="<?php echo $name?>" type="text" id="name" name="name" class="text  validate[required]"/></td>
                                    </tr>
                                    <tr>
                                        <td class="border width_display_td">Chức vụ </td>
                                        <td class="border"><input value="<?php echo $position?>" type="text" id="position" name="position" class="text  validate[required]"/></td>
                                    </tr>
                                    <tr>
                                        <td class="border width_display_td">Link twitter </td>
                                        <td class="border"><input value="<?php echo $twitter?>" type="text" id="twitter" name="twitter" class="text  "/></td>
                                    </tr>
                                     <tr>
                                        <td class="border width_display_td">Link face </td>
                                        <td class="border"><input value="<?php echo $face?>" type="text" id="face" name="face" class="text  "/></td>
                                    </tr>
                                     <tr>
                                        <td class="border width_display_td">Link instagram </td>
                                        <td class="border"><input value="<?php echo $instagram?>" type="text" id="instagram" name="instagram" class="text  "/></td>
                                    </tr>
                                   <tr>
                                        <td class="border">Mô tả</td>
                                        <td class="border">
                                        <textarea name="mota" id="mota" style="height:100px"><?php echo $mota ?></textarea></td>
                                    </tr>
<tr>    
<td class="border"><?php echo lang('avatar')?></td>
<td class="border">
<?php if($avatar){?>
<img src="uploads/news/a_<?php echo $avatar?>" width="150" /><br />
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
                    <h3 class="ui-widget-header ui-corner-all">
                        <div class="function_button">
                            <a href="" class="button_save">Save</a>
                            <span class="line"></span>
                            <a href="" class="button_save_close">Save & Close</a>
                            <span class="line"></span>
                            <a href="AdminCP/staticpages/main/" class="button_cancel">Calcel</a>
                           
                        </div>
                        <div class="clear"></div>
                    </h3> 
                </div>
