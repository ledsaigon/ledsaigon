<style type="text/css">
.left-home{ overflow:hidden;width:250px; float:left; border-right:1px solid #666; margin-right:15px}
.control-panel{ overflow:hidden; }
.control-panel ul{ float:left; margin:0; padding:0}
.control-panel li{ list-style:none; float:left; display:inline;  margin:10px 20px 10px 0; min-height:90px; text-align:center; min-width:150px; overflow:hidden;}
.left-home h3{ color:black; font-size:12px}
.left-home p{ overflow:hidden; line-height:30px}
.left-home  p span{ width:80px; float:right; font-weight:bold}
</style>

<div class="ui-widget-content ui-corner-all" style="padding:20px; overflow:hidden; min-height:500px"> 
<div class="control-panel">
<h2>Bảng điều khiển</h2>

        <ul id="function_icon">

           <li>

                <a href="<?php echo base_url()?>" target="_blank">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-frontpage.png" />

                    <p>

                        Trang chủ website

                    </p>

                </a>

            </li>

            <li>

                <a href="<?php echo base_url()?>AdminCP/configs/general">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-config.png" />

                    <p>

                        <?php echo lang('cau_hinh_he_thong'); ?>

                    </p>

                </a>

            </li>
            <li>

                <a href="<?php echo base_url()?>AdminCP/users/changePass">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-user.png" />

                    <p>

                        <?php echo lang('menu_changepass'); ?>

                    </p>

                </a>

            </li>

             <li>

                <a href="<?php echo base_url()?>AdminCP/staticpages/main">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-media.png" />

                    <p>

                        Quản lý trang tĩnh

                    </p>

                </a>

            </li>
            <?php if($adminCofigs['menu_product']==1){?>

            <li>

                <a href="<?php echo base_url()?>AdminCP/products/main">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-category.png" />

                    <p>

                       Quản lý sản phẩm

                    </p>

                </a>

            </li>
            <?php }?>
            <?php if($adminCofigs['menu_articles']==1){?>
             <li>

                <a href="<?php echo base_url()?>AdminCP/articles/main">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-writemess.png" />

                    <p>

                        Quản lý bài viết

                    </p>

                </a>

            </li>
<?php }?>
          

            <li>

                <a href="<?php echo base_url()?>AdminCP/contacts/main">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-inbox.png" />

                    <p>

                        <?php echo lang('hop_thu_lien_he'); ?>

                    </p>

                </a>

            </li>
<?php if($adminCofigs['menu_ads']==1){?>
            <li>

                <a href="<?php echo base_url()?>AdminCP/ads/main">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-themes.png" />

                    <p>

                        Quản lý banner

                    </p>

                </a>

            </li>

           <?php }?> 
<?php if($adminCofigs['menu_support']==1){?>
            <li>

                <a href="<?php echo base_url()?>AdminCP/supports/main">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-help_header.png" />

                    <p>

                        Quản lý hỗ trợ

                    </p>

                </a>

            </li>

            <?php }?>
             <?php if($adminCofigs['menu_weblink']==1){?>

            <li>

                <a href="<?php echo base_url()?>AdminCP/weblinks/main">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-user-profile.png" />

                    <p>

                       Quản lý liên kết

                    </p>

                </a>

            </li>
            <?php }?>

            <?php if($adminCofigs['menu_partner']==1){?>

            <li>

                <a href="<?php echo base_url()?>AdminCP/partners/main">

                    <img src="<?php echo base_url() ?>publics/admin/images/header/icon-48-move.png" />

                    <p>

                       Quản lý đối tác

                    </p>

                </a>

            </li>
            <?php }?>

        </ul>

</div>
</div>