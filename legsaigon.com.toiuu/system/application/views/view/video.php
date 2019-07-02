<div class="page-content">
<div class="con_main_mhs">
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right">

<?php if(isset($video) && !empty($video)){?>
<div class="title_cackhoa_css text-uppercase">
<strong>Video</strong>

</div>	
<div class="bao_khoahoc_css_main">
<div class="row">
<?php foreach ($video as $key => $value) {
	$img_thumb= explode('=', $value['link_video']);
	if(!empty($img_thumb[1])){
       $link_vd= $img_thumb[1];
		$img_thumb= 'http://img.youtube.com/vi/'.$img_thumb[1].'/hqdefault.jpg';
	
?>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 con_khoahoc con_video_index">
		<img id="img_dialog<?php echo $key; ?>" class="img-responsive" src="<?php echo (!empty($img_thumb))?$img_thumb:'';?>" alt="<?php echo $value['vn_name'] ?>" title="<?php echo $value['vn_name'] ?>" >
	<div class="title_videos text-center"><h5><?php echo $value['vn_name']; ?></h5></div>
    </div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#img_dialog<?php echo $key; ?>').on('click', function() {
           BootstrapDialog.show({
            title: '<?php echo ($value["vn_name"]!="")?$value["vn_name"]:"Videos" ?>',
            message: '<div class="videoWrapper"><iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $link_vd; ?>" frameborder="0" allowfullscreen></iframe></div>',
            draggable: true
        });
        });
    });
</script>

<?php }?>
<?php }?>
<div class="clear"></div>
</div>
</div>

<?php }?>

</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left"><?php $this->view('view/inc/left'); ?></div>
<div class="clear"></div>
</div>

</div>
</div>