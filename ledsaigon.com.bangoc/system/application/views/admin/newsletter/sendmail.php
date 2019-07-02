<style type="text/css">
p label{width:80px; float: left}
</style>
<div class="ui-widget-content ui-corner-all" style="padding:10px"> 
<h1>Gửi bản tin </h1>
<form action="" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">
   
    <!-- <p>
    <label>To</label>
    <input value="hung.le@consultantcnc.com" type="text" id="to" name="to" 	class="text" style="width:500px" />
    </p>
    <p>
    <label>CC</label>
    <input value="hoan.nguyen@consultantcnc.com" type="text" id="cc" name="cc" 	class="text" style="width:500px" />
    </p> -->
     <!-- <p>
    <label>BCC</label>
    <input value="<?php if($listEmail) echo $listEmail?>" type="text" id="bcc" name="bcc" 	class="text" style="width:500px" />
    </p> -->
    <p>
    <label>Tiêu đề</label>
    <input value="" type="text" id="title" name="title" 	class="text" style="width:500px" />
    </p>
   
	
    <p>
	<label>Nội dung</label>
    </p>
    <textarea name="contentMail" id="contentMail"  ></textarea>

    <p class="btn">
    <input type="submit" name="submit" value="Gửi" />
    <input type="button" value="Hủy bỏ" name="button" onclick="location.href='<?php echo $url_cancel?>'" />
    </p>

</form>
<script type="text/javascript" src="resource/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="resource/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
//<![CDATA[
var editor = CKEDITOR.replace( 'contentMail' , {height:'250',language: 'vi'} );
CKFinder.setupCKEditor( editor, '<?php echo base_url()?>resource/ckfinder/' ) ;
//]]>
</script>

</div>
