<span>

    <div style="text-transform:capitalize; float:left; font-size:25px; font-weight:bold; width:200px;"><a href="<?php echo base_url()?>AdminCP" title="Admin Panel">Admin Panel</a></div>

    <?php echo 'Xin chào: &nbsp; <b>'.$_SESSION['usersInfo']['u_username'].'</b>'?>

    <div class="function_top">
<?php if($_SESSION['usersInfo']['u_type'] > 2) {?>
        <a href="<?php echo base_url() ?>AdminCP/contacts/main" class="messages"><?php echo $contact_new_admin ?> <?php echo lang('contact_new'); ?></a>
        <?php }?>

        <a href="<?php echo base_url() ?>" class="viewsite" target="_blank"><?php echo lang('viewing_home'); ?></a>

        <a href="<?php echo base_url()?>AdminCP/users/changePass"  title="Đổi mật khẩu" class="changepass">Đổi mật khẩu</a>

        <a href="<?php echo base_url() ?>AdminCP/login/logout" class="logout"><?php echo lang('menu_logout'); ?></a>

    </div>

</span>



<!-- CHANGE PASSWORD -->

    <link type='text/css' href='<?php echo base_url() ?>publics/admin/css/dialog/basic.css' rel='stylesheet' media='screen' /> 

    <!-- IE 6 "fixes" --> 

    <!--[if lt IE 7]>

    <link type='text/css' href='<?php echo base_url() ?>publics/admin/css/dialog/basic_ie.css' rel='stylesheet' media='screen' />

    <![endif]-->

    <!-- Load jQuery, SimpleModal and Basic JS files --> 

    <!--[if IE]>

    <style>

        #basic-modal-content div{

            margin:5px 0px;	

        }

    </style>

    <![endif]-->

    <script type='text/javascript' src='<?php echo base_url() ?>publics/admin/js/dialog/jquery.simplemodal.js'></script>

    <div id="basic-modal-content"> 

        <h3><?php echo lang('menu_changepass'); ?></h3>

        <P style="text-align:left"> 

            <div id="box_changepass">

                <div>

                    <label style="width:150px;display:inline-block;"><?php echo lang('password_old'); ?></label>

                    <input id="txtPassOld" type="password" style="width:200px;"/>

                </div>

                <div>

                    <label style="width:150px;display:inline-block;"><?php echo lang('password_new'); ?></label>

                    <input id="txtPassNew" type="password" style="width:200px;"/>

                </div>

                <div>

                    <label style="width:150px;display:inline-block;"><?php echo lang('confirm'); ?></label>

                    <input id="txtPassNewConfirm" type="password" style="width:200px;"/>

                </div>

              

                <div style="text-align:center;">

                    <input type="button" id="btnChangePass" value="Xác nhận" class="button"/>

                </div>

            </div>

        </p> 

    </div> 

    <!-- END CHANGE PASSWORD -->