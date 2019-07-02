<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>.: Admin Cpanel :.</title>

    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>publics/admin/css/login/import.css"/>

    <!--[if lte IE 7]>

    <link href="<?php echo base_url() ?>publics/admin/css/login/ie7.css" rel="stylesheet" type="text/css" />

    <![endif]--> 

    <!--[if lte IE 6]>

    <link href="<?php echo base_url() ?>publics/admin/css/login/ie6.css" rel="stylesheet" type="text/css" />

    <![endif]-->

<style type="text/css">
#frm-login label{font-weight:bold; width:110px; float:left}
#frm-login input{ float:left; padding:4px 0 4px 0; width:180px; -webkit-border-radius:5px; -moz-border-radius:5px}
#frm-login .btnsubmit{width:90px !important; margin:10px 0 0 150px; font-weight:bold; color:#FFF; border:none; cursor:pointer }
p.error{ padding-left:100px; color:red !important; height:20xp; line-height:20px; overflow:hidden; font-size:11px}
p { overflow:hidden}
</style>
<script language="javascript" src="<?php echo base_url()?>publics/admin/js/jquery.js"></script>
<script language="javascript">
$(document).ready(function(){
	$('#username').focus();
	})
</script>
</head>

<body>

	<div id="header">

    	<div class="left"></div>

        <div class="right"></div>

        <div class="title">

            <span>Công Ty Phần Mềm Trí Việt</span>

        </div>

    </div>

    <div id="body">

    	<div id="form_login">

        	<div class="top">

            	<div class="t_left"></div>

	            <div class="t_right"></div>

            </div>

            <div class="center">

            	<h3>

                	Đăng nhập hệ thống quản trị website

                </h3>

                <div>

                	<div class="left">

                    	<p>


                        </p>

                        <p>

                        	<a href="<?php echo base_url() ?>">Trở về trang chủ</a>

                        </p>

                    </div>

                </div>

                <div class="right" >

                	<form action="<?php echo base_url() ?>AdminCP/login/checkLogin" method="post" id="frm-login">

                         <?php if(isset($error_login)) echo '<p class="error">'.$error_login.'</p>'?>

                            <label>Tên đăng nhập:</label>
                            
                            <input type="text" id="username" name="username" />
                            <?php if(isset($error_username)) echo $error_username?>

                            <div class="clear" style="height:15px"></div>


                            <label>Mật khẩu:</label>

                            <input type="password" id="password" name="password" />
                            <?php if(isset($error_pass)) echo $error_pass?>

                            <div class="clear"></div>

                                    <input type="submit" name="login" value="Đăng nhập" title="Đăng nhập"  class="btnsubmit" />


                    </form>

                </div>

            </div>

            <div class="footer">

                <div class="bt_left"></div>

                <div class="bt_right"></div>

            </div>

        </div>

    </div>

    <div id="footer">

    	<div class="left"></div>

        <div class="right"></div>

    </div>

    <center>

    	Copyright © 2012. Powered by <a href="http://trivietit.net" target="_blank">trivietit.net</a>

	</center>

</body>

</html>