
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lấy tỷ giá , giá vàng , thời tiết từ vnexpress</title>
<script language="javascript" src="js/ajax.js"></script>

<style>
body
{
	font-family:tahoma;
	font-size:12px;
}
.ctd
{
	border-bottom:1px solid #ccc;
	border-right:1px solid #ccc
}
.bor_ctd
{
	border-top:1px solid #ccc;
	border-left:1px solid #ccc
}
td
{
	font-size:<?php if($_GET['fsize']){echo $_GET['fsize'].'px';} else {echo '12px';}?>
}
.bg_tb
{
	background:url(<?php if($_GET['bg']){echo $_GET['bg'];} else {echo 'images/bg.png';}?>) #fff;
	background-repeat:<?php if($_GET['repeat']){echo $_GET['repeat'];} else {echo 'repeat-x';}?>
}
a
{
	text-decoration:none
}
</style>
</head>

<body>
<?php
if($_GET['col']==1)
{
?>

<table width="<?php if($_GET['size']){echo $_GET['size'].'px';} else {echo '280px';}?>" cellspacing="0" cellpadding="0" border="0" class="bg_tb">
        <?php
	   if($_GET['w']==1)
	   {
	   ?>
        <tr>
    <td  valign="top" style="padding:5px">

        <table width="120px" border="0" cellspacing="0" cellpadding="0">
          <tr><td><a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"><img src="images/cloud.png" border="0"  width="25px" style="vertical-align:middle" alt="Cập nhật thời tiết" title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress" /></a> <b>Thời tiết</b></td>
          </tr>
             <form name="form1" method="post">
                <tr height="20px">
                    <td>
                        <select name="select" onChange="Weather(this.value);">
                         <option value="0">TP.HCM</option>
                        <option value="1">Sơn la</option>
                        <option value="2">Hải Phòng</option>
                        <option value="3">Hà Nội</option>
                        <option value="4">Vinh</option>
                        <option value="5">Đà Nẵng</option>
                        <option value="6">Nha Trang</option>
                        <option value="7">Pleiku</option>
                        </select>
                </td>
                </tr>
                   </form>
                <tr>
                     <td id="content_Weather"><script>Weather(0)</script></td>
                </tr>
             </table>
             </td>
             </tr>
             <?php
			 }
	if($_GET['g']==1)
	{
	?>
    <tr>
    <td style="padding:5px">
         <table border="0" cellpadding="0" cellspacing="0" width="100%">
         <tr><td colspan="2">
          <a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"><img title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress"  border="0" src="images/money.png" style="vertical-align:middle" width="25px" alt="Giá vàng" />  </a>
               <b>Giá vàng 9999</b>
          </td></tr>
         <tr><td>
        <table class="bor_ctd" border="0"  cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
            <script type="text/javascript" language="JavaScript" src="http://www.vnexpress.net/Service/Gold_Content.js"></script>
             <script type="text/javascript" language="JavaScript" src="js/giavang.js"></script>
             </table>
            </td></tr>
       </table>
           </td>
  </tr>
    <?php
	}

	 if($_GET['r']==1)
	 {
	 ?>
      <tr>
     <td style="padding:5px">

<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td colspan="2">
                                           <a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"> <img src="images/circle-chart.png" style="vertical-align:middle" border="0" title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress"  alt="Tỷ giá" />  </a>
                                      <b>Tỷ giá</b>                              </td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="100%">
                                        <div id="AdTyGiaLoc" style="display: block;height:80px;width:100%;overflow:scroll">
                                            <script type="text/javascript" language="JavaScript" src="http://www.vnexpress.net/Service/Forex_Content.js"></script>
                                            <script type="text/javascript" language="JavaScript" src="js/tygia.js"></script>
                                        </div>
                                    </td>
                                </tr>
                            </table> 
                                </td>
  </tr>   
    <?php
	}
	?>

</table>


<?php
}
else
{
?>
<table width="<?php if($_GET['size']){echo $_GET['size'].'px';} else {echo '280px';}?>" cellspacing="0" cellpadding="0" border="0" class="bg_tb">
  <tr>
    <td rowspan="2" valign="top" style="<?php if($_GET['w']==1 and (($_GET['g']==1) or ($_GET['r']==1))) echo 'border-right:1px dashed #ccc;';?>padding:5px">
       <?php
	   if($_GET['w']==1)
	   {
	   ?>
        <table width="120px" border="0" cellspacing="0" cellpadding="0">
          <tr><td><a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"><img title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress"  src="images/cloud.png" border="0"  width="25px" style="vertical-align:middle" alt="Cập nhật thời tiết" /></a> <b>Thời tiết</b></td>
          </tr>
             <form name="form1" method="post">
                <tr height="20px">
                    <td>
                        <select name="select" onChange="Weather(this.value);">
                         <option value="0">TP.HCM</option>
                        <option value="1">Sơn la</option>
                        <option value="2">Hải Phòng</option>
                        <option value="3">Hà Nội</option>
                        <option value="4">Vinh</option>
                        <option value="5">Đà Nẵng</option>
                        <option value="6">Nha Trang</option>
                        <option value="7">Pleiku</option>
                        </select>
                </td>
                </tr>
                   </form>
                <tr>
                     <td id="content_Weather"><script>Weather(0)</script></td>
                </tr>
             </table>
             <?php
			 }
			 ?>
             </td>
    <td style="padding:5px;padding-left:10px">
    <?php
	if($_GET['g']==1)
	{
	?>
         <table border="0" cellpadding="0" cellspacing="0" width="100%">
         <tr><td colspan="2">
         <a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"><img title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress"  border="0" src="images/money.png" style="vertical-align:middle" width="25px" alt="Giá vàng" />  </a>
               <b>Giá vàng 9999</b>
          </td></tr>
         <tr><td>
        <table class="bor_ctd" border="0"  cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
            <script type="text/javascript" language="JavaScript" src="http://www.vnexpress.net/Service/Gold_Content.js"></script>
             <script type="text/javascript" language="JavaScript" src="js/giavang.js"></script>
             </table>
            </td></tr>
       </table>
    <?php
	}
	?>
	
    </td>
  </tr>
  <tr>
     <td style="padding:5px;padding-left:10px">
     <?php
	 if($_GET['r']==1)
	 {
	 ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td colspan="2">
                                             <a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"> <img src="images/circle-chart.png" style="vertical-align:middle" border="0" title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress"  alt="Tỷ giá" />  </a>
                                      <b>Tỷ giá</b>                              </td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="100%">
                                        <div id="AdTyGiaLoc" style="display: block;height:80px;width:100%;overflow:scroll">
                                            <script type="text/javascript" language="JavaScript" src="http://www.vnexpress.net/Service/Forex_Content.js"></script>
                                            <script type="text/javascript" language="JavaScript" src="js/tygia.js"></script>
                                        </div>
                                    </td>
                                </tr>
                            </table>    
    <?php
	}
	?>
    </td>
  </tr>
</table>
<?php
}
?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17352228-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  document.write(unescape("%3Cscript%20language%3D%22javascript%22%20type%3D%22text/javascript%22%20src%3D%22http%3A//www.thienduongweb.com/home/js/tdw.js%22%3E%3C/script%3E"));
</script>
</body>
</html>
