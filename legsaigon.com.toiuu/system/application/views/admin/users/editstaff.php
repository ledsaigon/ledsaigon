<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>



<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 



<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>




<div class="ui-widget-content ui-corner-all"> 






                    <p>



                   



                    	<form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">


                         



                            <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>



                           	<div>


<?php if($objects){?>
                            	<table cellpadding="0" cellspacing="0" border="0" id="table_data_source">


 <tr>



                                    	<td class="border">Tên đăng nhập</td>



                                        <td class="border"><?php echo $objects->username ?></td>



                                    </tr>
                                

                                     <tr>



                                    	<td class="border"><?php echo lang('status')?></td>



                                        <td class="border">



                                        	<select id="cboStatus" name="cboStatus" class="text  validate[required]" style="width:200px">



                                                <option value="1" <?php if($objects->status == 1) echo 'selected'?>><?php echo lang('display')?> </option>



                                                <option value="0"<?php if($objects->status == 0) echo 'selected'?>><?php echo lang('hide')?></option>



                                                <option value="2"<?php if($objects->status == 2) echo 'selected'?>><?php echo lang('deleted')?></option>



                                            </select>



                                        </td>



                                    </tr>



                                    <tr>



                                    	<td class="border width_display_td">Tên đầy đủ</td>



                                        <td class="border"><input value="<?php echo $objects->fullname?>" type="text" id="fullname" name="fullname" class="text  validate[required]" style="width:200px"/></td>



                                    </tr>



                                   

                                     <tr>



                                    	<td class="border">Loại tài khoản</td>



                                        <td class="border"><select name="tId" id="tId" style="width:200px">


                                       

                                        <option value="3" <?php if($objects->tid == 3) echo 'selected'?>>Admin</option>
                                         <option value="5" <?php if($objects->tid == 5) echo 'selected'?>>Quản lý sản phẩm</option>
                                          <option value="6" <?php if($objects->tid == 6) echo 'selected'?>>Quản lý bài viết</option>


                                        </select></td>



                                    </tr>



                                     <tr>



                                    	<td class="border">Mật khẩu củ</td>

                                        <td class="border"><input value="<?php echo $objects->password ?>" type="password" id="oldPass" name="oldPass" class="text" readonly style="width:200px"/></td>

                                    </tr>
                                     <tr>



                                    	<td class="border">Mật khẩu mới</td>

                                        <td class="border"><input value="" type="password" id="newPass" name="newPass" class="text" style="width:200px"/> &nbsp; Để trống nếu không muốn đổi mật khẩu</td>

                                    </tr>
                                    <!-- <tr>



                                    	<td class="border">Xác nhận mật khẩu mới</td>

                                        <td class="border"><input value="" type="password" id="confirmPass" name="confirmPass" class="text" style="width:200px"/> Để trống nếu không muốn đổi mật khẩu</td>

                                    </tr>-->

                                      <tr>



                                    	<td class="border">Email</td>



                                        <td class="border"><input value="<?php echo $objects->email ?>" type="text" id="email" name="email" class="text"/></td>



                                    </tr>

                                      <tr>



                                    	<td class="border"><?php echo lang('address')?></td>



                                        <td class="border"><input value="<?php echo $objects->address ?>" type="text" id="address" name="address" class="text"/></td>



                                    </tr>

                                      <tr>



                                    	<td class="border">Điện thoại</td>



                                        <td class="border"><input value="<?php echo $objects->cell ?>" type="text" id="cell" name="cell" class="text"/></td>



                                    </tr>




                                </table>
                                <p style="margin-left:220px">
<input type="submit" name="submit" value="Cập nhật">
<input type="button" name="buttom" value="Hủy bỏ" onClick="location.href='AdminCP/users/staff'"/>
</p>
<?php }?>
                            </div>



                            <div class="clear"></div>



                        </form>



                    </p>


				</div>

