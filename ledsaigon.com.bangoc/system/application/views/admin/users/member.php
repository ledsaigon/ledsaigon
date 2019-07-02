<script type="text/javascript" src="publics/admin/js/submitaction.js">
</script> 
<script type="text/javascript">

$(document).ready(function(){
	$("#type").change(function(){
		var url = 'AdminCP/users/member/'+$(this).val();
		location.href = url;
	});

});

</script>
<style type="text/css">
td { line-height:22px; padding:5px}
td b{width:100px; float:left}
</style>
<div class="ui-widget-content ui-corner-all"> 
<?php $this->load->view('admin/inc/top_toolbar');?>

        <form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="post" id="frmAction" name="frmAction">
            <input type="hidden" id="action" name="action" value="action"/>
            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>
            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>
            <table cellpadding="0" cellspacing="0" border="0" id="table_data">
                <thead> 
                    <tr> 
                        
                        <th width="50"><?php echo lang('number')?></th>
                        <th>Thông tin</th>
                        <th>Thông tin liên hệ</th>
                        <th width="70"><?php echo lang('status')?></th>
                        <th width="90"><?php echo lang('actions')?></th>
                        <td width="50" class="bg_check_all"><input type="checkbox" id="chkCheckAll"/></td>
                    </tr> 
                </thead>
    <tbody>
        <?php if($objects){
            $i=0;
            foreach($objects as $row ) {
                $properties = @unserialize($row->properties);
                $i++; ?>
        <tr style="text-align:center">
           
            <td><?php echo $i;?></td>
            <td align="left">
           
                <b>Họ tên:</b><?php echo $row->fullname ?><br>
                <b>Tên đăng nhập:</b> <?php echo $row->username ?><br>
                <b>Ngày đăng ký</b> <?php echo $properties['date_created'] ?><br>
                
            </td>
            <td align="left">
            <b>Email</b><?php echo $row->email ?><br>
			
             
             <b>ĐC</b><?php echo $row->address ?><br>
             <b>ĐT</b><?php echo $row->cell ?>
            </td>
            <td>
            <span style="display:none"><?php echo $row->status?></span>
                <img src="publics/admin/images/iconx16/public_<?php echo $row->status ?>.png" />
            </td>
            <td class="button_action">
              <!--  <a href="<?php echo base_url() ?>AdminCP/users/detail/<?php echo $row->id ?>" class="edit_item" rel="<?php echo $row->id ?>" title="<?php echo lang('edit')?>"></a>-->
                 <a href="javascript:formSubmit('frmAction','enable',<?php echo $row->id;?>);" class="enable_item"  title="<?php echo lang('display')?>"><?php echo lang('display')?></a>
                 <a href="javascript:formSubmit('frmAction','disable',<?php echo $row->id;?>);" class="disable_item"  title="<?php echo lang('hide')?>"><?php echo lang('hide')?></a>
                  <a href="javascript:formSubmit('frmAction','delete',<?php echo $row->id;?>);" class="delete_item"  title="<?php echo lang('delete')?>"><?php echo lang('delete')?></a>

            </td>
             <td><input type="checkbox" class="chkCheck" name="chkBox[]" value="<?php echo $row->id ?>"/></td>
        </tr>
        <?php } }?>
    </tbody> 
</table>
            <div class="clear"></div>
        </form>
    </p>
   <?php $this->load->view('admin/inc/bottom_toolbar')?>
    </div>