<link rel="stylesheet" href="publics/admin/css/validation/validationEngine.jquery.css" media="screen"/>
<script src="publics/admin/js/validation/jquery.validationEngine.js" type="text/javascript"></script> 

<script src="publics/admin/js/validation/jquery.validationEngine-vi.js" type="text/javascript"></script>

<script type="text/javascript">



	$(document).ready(function() {

		$("#frmAction").validationEngine();


	});



</script>




<div class="ui-widget-content ui-corner-all"> 


                    	<form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="post" id="frmAction" name="frmAction" enctype="multipart/form-data">


   

                           	<div>
<?php if($error) echo '<p style="color:red; margin-left:150px">'.$error.'</p>';?>
                            	<table cellpadding="0" cellspacing="0" border="0" id="table_data_source">


 <tr>



                                    	<td class="border">Tên đăng nhập</td>



                                        <td class="border"><input type="text" name="username"  class="text validate[required]" id="username" style="width:200px" value="<?php if(isset($_POST['username'])) echo $_POST['username']?>"/></td>



                                    </tr>
                                

                                     <tr>



                                    	<td class="border"><?php echo lang('status')?></td>



                                        <td class="border">



                                        	<select id="cboStatus" name="cboStatus" class="text  validate[required]" style="width:200px">



                                                <option value="1" >Kích hoạt</option>



                                                <option value="0">Ẩn</option>



                                                <option value="2"><?php echo lang('deleted')?></option>



                                            </select>



                                        </td>



                                    </tr>



                                    <tr>



                                    	<td class="border width_display_td">Tên đầy đủ</td>



                                        <td class="border"><input type="text" id="fullname" name="fullname" class="text  validate[required]" style="width:200px"  value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname']?>"/></td>



                                    </tr>



                                   

                                     <tr>



                                    	<td class="border">Loại tài khoản</td>



                                        <td class="border"><select name="tId" id="tId" style="width:200px">


                                        

                                        <option value="3" >Admin</option>
                                        <option value="5" >Quản lý sản phẩm</option>
                                        <option value="6" >Quản lý bài viết</option>


                                        </select></td>



                                    </tr>



                                    
                                     <tr>



                                    	<td class="border">Mật khẩu </td>

                                        <td class="border"><input value="" type="password" id="newPass" name="newPass" class="text  validate[required]" style="width:200px"/> </td>

                                    </tr>

                                     <tr>



                                    	<td class="border">Xác nhận mật khẩu </td>

                                        <td class="border"><input value="" type="password" id="confirmPass" name="confirmPass" class="text validate[required]" style="width:200px"/></td>

                                    </tr>

                                      <tr>



                                    	<td class="border">Email</td>



                                        <td class="border"><input type="text" id="email" name="email" class="text"  value="<?php if(isset($_POST['email'])) echo $_POST['email']?>"/></td>



                                    </tr>

                                      <tr>



                                    	<td class="border"><?php echo lang('address')?></td>



                                        <td class="border"><input  type="text" id="address" name="address" class="text"  value="<?php if(isset($_POST['address'])) echo $_POST['address']?>"/></td>



                                    </tr>

                                      <tr>



                                    	<td class="border">Điện thoại</td>



                                        <td class="border"><input  type="text" id="cell" name="cell" class="text"  value="<?php if(isset($_POST['cell'])) echo $_POST['cell']?>"/></td>



                                    </tr>




                                </table>
                                <p style="margin-left:220px">
<input type="submit" name="submit" value="Thêm mới">
<input type="button" name="buttom" value="Hủy bỏ" onClick="location.href='AdminCP/users/staff'"/>
</p>

                            </div>



                            <div class="clear"></div>



                        </form>



                    </p>


				</div>

