<?php 
$sslog=$this->session->userdata('CI_admin');
if(!isset($usersInfo))
header("Location: ".base_url()."AdminCP/users"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title><?php echo lang('title_website_admin'); if($title_page) echo ' - '.$title_page; ?></title>
<base href="<?php echo base_url()?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>publics/admin/css/treeview/jquery.treeview.css"/>
<link type="text/css" href="<?php echo base_url() ?>publics/admin/ui/themes/base/jquery.ui.all.css" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url() ?>publics/admin/css/jquery.tooltip.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>publics/admin/css/master.css"/>
<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/js/treeview/jquery.treeview.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/ui/ui/jquery.ui.core.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/ui/ui/jquery.ui.widget.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/ui/ui/jquery.ui.button.js"></script> 
<!--TOOLTIP--> 
<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/js/jquery.dimensions.js"></script> 
<link href="<?php echo base_url() ?>publics/admin/css/table_jui.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>publics/admin/js/jquery.dataTables.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/js/master.js"></script>
</head>
<body>
    <div id="disable_top_page"></div>
    
	<div id="top_page">
    	<?php $this->load->view('admin/top'); ?>
        
    </div>
    <div id="center_page">
       	<div class="hide_left">Hide Menu</div>
      
        <div class="clear"></div>
    	<div class="left">
        	
            <ul id="navigation">
                <?php $this->load->view('admin/sidebar'); ?>
			</ul>
            
        </div>
        
    	<div class="right">
        
           <div class="content_right">
            	<?php $this->load->view('admin/'.$main); ?>    
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <!--<div class="clear"></div>
    <div id="footer">
    	<?php //$this->load->view('admin/footer'); ?>
    </div>-->
	<style>
		html{font-size:{fontsize}px;}
        .width_display_td{width:200px;}
    </style>
    <!--[if IE]>
	<style>
        .width_display_td{width:20%;}
    </style>
    <![endif]-->                
    <script type="text/javascript">
		$(document).ready(function(){
			resize();
			$(window).resize(function() {
				resize();
			});
		});
	</script> 
	<script type="text/javascript">
    	$("#center_page .right").css('display','block');
    </script>
    <!--[if IE]>
    <script>
    
    </script>
    <link type="text/css" rel="stylesheet" href="{resource}/admin/css/master_ie.css"/>
    <![endif]-->
 <!--<script src="http://cdn.wibiya.com/Toolbars/dir_0711/Toolbar_711283/Loader_711283.js" type="text/javascript"></script><noscript><a href="http://www.wibiya.com/">Web Toolbar by Wibiya</a></noscript> -->
</body>
</html>
