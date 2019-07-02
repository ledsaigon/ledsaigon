

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

	});

</script>



<div class="ui-widget-content ui-corner-all"> 

    <h3 class="ui-widget-header ui-corner-all">

        <span>

            <?php echo $title_site ?>

        </span>

     

        <div class="clear"></div>

    </h3> 

      <p>

<?php if($general){?>

	<form action="" method="post" id="frmAction" name="frmAction">

		<input type="hidden" id="action" name="action" value="action"/>

		<input type="hidden" id="status" name="status" value="save"/>

		

		<center><span style="color:#F00;" id="status_error"><?php if($this->session->flashdata('error')) echo $this->session->flashdata('error'); ?></span></center>

		<div>

			<table cellpadding="0" cellspacing="0" border="0" id="table_data_source">

				<tr>

					<td class="border width_display_td">Tiêu đề Website</td>

					<td class="border"><input value="<?php echo $general['vn_title_site']?>" type="text" id="vn_title_site" name="vn_title_site" class="text  validate[required]"/></td>

				</tr>

			   <?php if($englishLang){?>

				 <tr>

					<td class="border width_display_td">Tiêu đề website (Tiếng Anh)</td>

					<td class="border"><input value="<?php echo $general['en_title_site']?>" type="text" id="en_title_site" name="en_title_site" class="text  validate[required]"/></td>

				</tr>

                <?php }?>

				<tr>

					<td class="border width_display_td">Tên công ty</td>

					<td class="border">

					<input value="<?php echo $general['vn_company']?>" type="text" id="vn_company" name="vn_company" class="text  validate[required]"/></td>

				</tr>

				<tr>

					<td class="border width_display_td">Dòng giới thiệu thứ 1: </td>

					<td class="border">

					<input value="<?php echo $general['vn_introduction_1']?>" type="text" id="vn_introduction_1" name="vn_introduction_1" class="text  validate[required]"/></td>

				</tr>


				<tr>

					<td class="border width_display_td">Dòng giới thiệu thứ 1 (Tiếng Anh): </td>

					<td class="border">

					<input value="<?php echo $general['en_introduction_1']?>" type="text" id="en_introduction_1" name="en_introduction_1" class="text  validate[required]"/></td>

				</tr>

				<tr>

					<td class="border width_display_td">Dòng giới thiệu thứ 2:</td>

					<td class="border">

					<input value="<?php echo $general['vn_introduction_2']?>" type="text" id="vn_introduction_2" name="vn_introduction_2" class="text  validate[required]"/></td>

				</tr>

				<tr>

					<td class="border width_display_td">Dòng giới thiệu thứ 2(Tiếng Anh):</td>

					<td class="border">

					<input value="<?php echo $general['en_introduction_2']?>" type="text" id="en_introduction_2" name="en_introduction_2" class="text  validate[required]"/></td>

				</tr>

				<tr>

					<td class="border width_display_td">Dòng giới thiệu thứ 3:</td>

					<td class="border">

					<input value="<?php echo $general['vn_introduction_3']?>" type="text" id="vn_introduction_3" name="vn_introduction_3" class="text  validate[required]"/></td>

				</tr>

				<tr>

					<td class="border width_display_td">Dòng giới thiệu thứ 3 (Tiếng Anh):</td>

					<td class="border">

					<input value="<?php echo $general['en_introduction_3']?>" type="text" id="en_introduction_3" name="en_introduction_3" class="text  validate[required]"/></td>

				</tr>

		

				

                <?php if($englishLang){?>

				<tr>

					<td class="border width_display_td"><?php echo lang('en_company')?></td>

					<td class="border"><input value="<?php echo $general['en_company']?>" type="text" id="en_company" name="en_company" class="text  validate[required]"/></td>

				</tr>

                <?php }?>

<!--

		<tr>

					<td class="border width_display_td">Đăng ký nhận mail</td>

					<td class="border"><input value="<?php echo (isset($general['nhanmail']) && !empty($general['nhanmail']))?$general['nhanmail']:''?>" type="text" id="nhanmail" name="nhanmail" class="text  validate[required]"/></td>

				</tr>

                <tr>

					<td class="border width_display_td">Showroom</td>

					<td class="border">

                    <textarea name="showroom" id="showroom" class="text"><?php echo (isset($general['showroom']) && !empty($general['showroom']))?$general['showroom']:''?></textarea></td>

				</tr> 

                    <tr>

					<td class="border width_display_td">Đăng ký nhận bài viết</td>

					<td class="border"><input value="<?php echo (isset($general['dangky_baiviet']) && !empty($general['dangky_baiviet']))?$general['dangky_baiviet']:'';?>" type="text" id="dangky_baiviet" name="dangky_baiviet" class="text"/></td>

				</tr> 



				  <tr>

					<td class="border width_display_td">Lịch làm việc</td>

					<td class="border"><input value="<?php echo (isset($general['lichlam']) && !empty($general['lichlam']))?$general['lichlam']:'';?>" type="text" id="lichlam" name="lichlam" class="text"/></td>

				</tr>

				-->

				<?php if($seoWeb){?>

             

				<tr>

					<td class="border width_display_td">Meta Keyword</td>

					<td class="border"><input value="<?php echo $general['vn_keyword']?>" type="text" id="vn_keyword" name="vn_keyword" class="text  validate[required]"/></td>

				</tr>

                <?php if($englishLang){?>

<tr>

					<td class="border width_display_td">Meta Keyword (Tiếng Anh)</td>

					<td class="border"><input value="<?php echo $general['en_keyword']?>" type="text" id="en_keyword" name="en_keyword" class="text  validate[required]"/></td>

				</tr> 

                <?php }?>    

                <tr>

					<td class="border width_display_td">Meta Description</td>

					<td class="border">

                    <textarea name="vn_description" id="vn_description" class="text  validate[required]"><?php echo $general['vn_description']?></textarea></td>

				</tr>

                <?php if($englishLang){?>

<tr>

					<td class="border width_display_td">Mete Description (Tiếng Anh)</td>

					<td class="border">

                    <textarea name="en_description" id="en_description" class="text  validate[required]"><?php echo $general['en_description']?></textarea></td>

				</tr> 

                <?php }?>             

                <?php }?>

                <tr>

					<td class="border width_display_td">Admin email</td>

					<td class="border"><input value="<?php echo $general['email']?>" type="text" id="email" name="email" class="text"/></td>

				</tr>

				 <tr>

					<td class="border width_display_td">Link facebook</td>

					<td class="border"><input value="<?php echo (isset($general['facebook']) && !empty($general['facebook']))? $general['facebook']:"" ?>" type="text" id="facebook" name="facebook" class="text"/></td>

				</tr>

				<tr>

					<td class="border width_display_td">Link Google+</td>

					<td class="border"><input value="<?php echo (isset($general['googleplus']) && !empty($general['googleplus']))? $general['googleplus']:"" ?>" type="text" id="googleplus" name="googleplus" class="text"/></td>

				</tr>

				<tr>

					<td class="border width_display_td">Link Twitter</td>

					<td class="border"><input value="<?php echo (isset($general['twitter']) && !empty($general['twitter']))? $general['twitter']:"" ?>" type="text" id="twitter" name="twitter" class="text"/></td>

				</tr>
				

				<tr>

					<td class="border width_display_td">Điện thoại footer</td>

					<td class="border"><input value="<?php echo (isset($general['hotline']) && !empty($general['hotline']))?$general['hotline']:''?>" type="text" id="hotline" name="hotline" class="text"/></td>

				</tr>

				<tr>

					<td class="border width_display_td">Địa chỉ</td>

					<td class="border"><input value="<?php echo (isset($general['diachi']) && !empty($general['diachi']))?$general['diachi']:''?>" type="text" id="diachi" name="diachi" class="text"/></td>

				</tr>

				<tr>

					<td class="border width_display_td">Tọa độ</td>

					<td class="border"><input value="<?php echo (isset($general['toado']) && !empty($general['toado']))?$general['toado']:''?>" type="text" id="toado" name="toado" class="text"/></td>

				</tr>

				<tr>

					<td class="border width_display_td">Hotline</td>

					<td class="border"><input value="<?php echo (isset($general['sodienthoai']) && !empty($general['sodienthoai']))?$general['sodienthoai']:''?>" type="text" id="sodienthoai" name="sodienthoai" class="text"/></td>

				</tr>

				<!--

			<tr>

					<td class="border width_display_td">Dòng chữ chào mừng</td>

					<td class="border"><input value="<?php echo (isset($general['top_welcome']) && !empty($general['top_welcome']))?$general['top_welcome']:''?>" type="text" id="top_welcome" name="top_welcome" class="text"/></td>

				</tr>

				

				

				<tr>

					<td class="border width_display_td">Điện thoại tư vấn</td>

					<td class="border"><input value="<?php echo (isset($general['tuvan']) && !empty($general['tuvan']))?$general['tuvan']:''?>" type="text" id="tuvan" name="tuvan" class="text"/></td>

				</tr>

				

				

				

				<tr>

					<td class="border width_display_td">Tel</td>

					<td class="border"><input value="<?php echo (isset($general['tel']) && !empty($general['tel']))?$general['tel']:''?>" type="text" id="tel" name="tel" class="text"/></td>

				</tr>

             

                <tr>

					<td class="border width_display_td"><?php echo lang('telephone')?></td>

					<td class="border"><input value="<?php echo $general['tel']?>" type="text" id="telephone" name="telephone" class="text"/></td>

				</tr> -->

                <!--<tr>

               

					<td class="border width_display_td">Title trang sitemap</td>

					<td class="border"><input value="<?php echo $general['sitemap_title']?>" type="text" id="sitemap_title" name="sitemap_title" class="text"/></td>

				</tr>

                 <tr>

               

					<td class="border width_display_td">Keyword trang sitemap</td>

					<td class="border"><input value="<?php echo $general['sitemap_key']?>" type="text" id="sitemap_key" name="sitemap_key" class="text"/></td>

				</tr>

                <tr>

					<td class="border width_display_td">Description sitemap</td>

					<td class="border"><textarea name="sitemap_des" id="sitemap_des" class="text" rows="5" cols="65"><?php echo $general['sitemap_des']?></textarea> </td>

				</tr>

                

               

             <tr>

					<td class="border width_display_td">Hotline</td>

					<td class="border"><input value="<?php echo $general['hotline']?>" type="text" id="hotline" name="hotline" class="text"/></td>

				</tr>-->

                <?php

                if($usersInfo['u_type']==4){?>

                <tr>

					<td class="border width_display_td">Thông báo bảo trì Website:</td>

					<td class="border">

                    <textarea name="contentOff" id="contentOff" ><?php echo $general['contentOff']?></textarea>

                    <input type="checkbox" name="offline" id="offline" class="text"  value="1" style="width:auto"<?php if($general['offline']==1) echo 'checked'?>/> <span>Đồng ý tạm đóng trang web.</span>


<!--<p>CopyRight <input  value="<?php //echo html_entity_decode($general['copyright'])?>" type="text" id="copyright" name="copyright" class="text"/></p>                  

-->                <?php }else{

			echo '<input type="hidden" name="offline" id="offline"  value="'.$general['offline'].'"/>';

			echo '<input type="hidden" name="contentOff" id="contentOff"  value="'.$general['contentOff'].'"/>';

				}

				?>

               

		   </table>

             <div class="function_button" style="margin-top:15px">

            <a href="javascript:save();" class="button_save">Save</a>

            <span class="line"></span>

            <a href="javascript:save_close();" class="button_save_close">Save & Close</a>

            <span class="line"></span>

            <a href="AdminCP" class="button_cancel">Cancel</a>

            

        </div>

        <div class="clear"></div>

		   <?php }?>