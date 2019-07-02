<style type="text/css">
p{ overflow:hidden; line-height:25px; margin-bottom:15px}
p label{ float:left;width:130px; font-weight:bold}
</style>
<div class="ui-widget-content ui-corner-all" style="padding:20px; min-height:500px"> 
<h3 style="color:black">Thông tin liên hệ</h3>
<p> <label> Tên</label>: <?php echo $objects->fullname?></p>
<p> <label> Địa chỉ</label>: <?php echo $objects->address?></p>
<p> <label> Email</label>: <?php echo $objects->email?></p>
<p> <label> Số ĐT</label>: <?php echo $objects->mobile?></p>
<p> <label> Ngày gửi</label>: <?php echo $objects->date_created?></p>
<p> <label> Tiêu đề</label>: <?php echo $objects->subject?></p>
<p> <label> Nội dung</label>: <p style="overflow:hidden; margin-left:130px;"><?php echo $objects->content?></p></p>
<p><a class="back" href="<?php echo base_url()?>AdminCP/contacts/main" title="Quay lại hộp thư">Quay lại hộp thư</a></p>
</div>