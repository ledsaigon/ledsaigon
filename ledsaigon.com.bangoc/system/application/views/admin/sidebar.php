<li class="parent"><span class="uppercase" title="QUẢN LÝ WEBSITE">QUẢN LÝ WEBSITE</span>
    <ul>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/home" title="<?php echo lang('menu_control_panel') ?>"><?php echo lang('menu_control_panel') ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-cpanel.png"
                title="Bảng điều khiển - Trang chủ quản trị của admin"/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/configs/general" title="<?php echo lang('menu_global_config') ?>"><?php echo lang('menu_global_config') ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-config.png"
                 title="Cấu hình email - Cấu hình nội dung website"/>
        </li>
        <?php if($usersInfo['u_type'] ==4) {?>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/users/main" title="Tài khoản admin">Tài khoản admin</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-new.png"
                title="Tài khoản admin"/>
        </li>
       <!--  <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/configs/contact" title="Tài khoản email">Tài khoản email</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-new.png"
                title="Tài khoản email"/>
        </li> -->
          <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/configs/adminPanel" title="Admin Panel">Admin Panel</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-new.png"
                title="Admin Panel"/>
        </li>
        
        <?php }?>
     
    </ul>
</li>
<?php if($usersInfo['u_type'] >2) {?>
<li class="parent"><span class="uppercase" title="QUẢN LÝ TÀI KHOẢN">QUẢN LÝ TÀI KHOẢN</span>
    <ul>
    	<li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/users/staff" title="Danh sách tài khoản">Danh sách tài khoản</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-category.png"
                title=""/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/users/addStaff" title="Thêm tài khoản">Thêm tài khoản</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-new.png"
                title=""/>
        </li>
    </ul>
</li>
<?php }?>
<li class="parent"><span class="uppercase" title="QUẢN LÝ MENU">QUẢN LÝ MENU</span>
    <ul>
    	<li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/menu/main/" title="Danh sách menu">Danh sách menu</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-category.png"
                title="Danh sách menu"/>
        </li>
        <?php if($_SESSION['usersInfo']['u_type'] ==4) {?>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/menu/detail/new" title="Thêm menu">Thêm menu</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-new.png"
                title=""/>
        </li>
        
        <?php }?>
    </ul>
</li>
<?php if($adminCofigs['menu_static'] ==1){?>
<li class="parent"><span class="uppercase" title="<?php echo lang('manage_static_page') ?>"><?php echo lang('manage_static_page') ?></span>
    <ul>
    	<li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/staticpages/main/" title="<?php echo lang('list_static_page') ?>"><?php echo lang('list_static_page') ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-category.png"
                title="<?php echo lang('manage_static_page'); echo lang('lis_static_page_new')?>"/>
        </li>
        <?php if($_SESSION['usersInfo']['u_type'] ==4) {?>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/staticpages/detail/new" title="<?php echo lang('add_static_page') ?>"><?php echo lang('add_static_page') ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-new.png"
                title="<?php echo lang('manage_static_page');echo lang('add_static_page_new')?>"/>
        </li>
        
        <?php }?>
    </ul>
</li>
<?php }?>
<?php if($adminCofigs['menu_product'] ==1){?>
<li class="parent"><span class="uppercase" title="QUẢN LÝ SẢN PHẨM">QUẢN LÝ SẢN PHẨM</span>
    <ul>
    
    	
    	<li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/productcategories/main" title="Danh mục SẢN PHẨM">Danh mục SẢN PHẨM</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-category.png"
                title="<?php echo lang('manage_product_cate_product'). lang('list_cate_product'); ?>"/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/productcategories/detail/new" title="Thêm danh mục SẢN PHẨM">Thêm danh mục SẢN PHẨM</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-new.png"
                title="Thêm danh mục SẢN PHẨM"/>
        </li>
     
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/products/main" title="Danh sách SẢN PHẨM">Danh sách SẢN PHẨM</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-stats.png"
                title="<?php echo lang('list_product');?>"/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/products/detail/new" title="Thêm danh sách SẢN PHẨM">Thêm danh sách SẢN PHẨM</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-newarticle.png"
                title="<?php echo lang('add_product')?>"/>
        </li>
         
    </ul>
</li>
<?php }?>
<?php if($adminCofigs['menu_articles'] ==1){?>
<li class="parent"><span class="uppercase" title="QUẢN LÝ BÀI VIẾT">QUẢN LÝ BÀI VIẾT</span>
    <ul>
    	<li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/categories/main" title="Danh sách chuyên mục">Danh sách chuyên mục</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-category.png"
                title="Danh sách chuyên mục"/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/categories/detail/new" title="Thêm chuyên mục">Thêm chuyên mục</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-new.png"
                title="Thêm chuyên mục"/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/articles/main" title="Danh sách bài viết">Danh sách bài viết</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-stats.png"
                title="Danh sách bài viết"/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/articles/detail/new" title="Thêm bài viết">Thêm bài viết</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-newarticle.png"
                title="Thêm bài viết"/>
        </li>
    </ul>
</li>
<?php }?>
<?php //if($adminCofigs['menu_gallery'] ==1){?>
<li class="parent"><span class="uppercase" title="QUẢN LÝ THƯ VIỆN">QUẢN LÝ FILES</span>
    <ul>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/galleries/detail/new" title="<?php echo 'Thêm mới'; ?>"><?php echo 'Thêm mới' ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo 'Thêm mới' ?>"/>
        </li>
         <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/galleries/main" title="Danh sách file">Danh sách file</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="Danh sách file"/>
        </li>
    </ul>
</li>
<?php //}?>
<?php if($adminCofigs['menu_ads'] ==1){?>
<li class="parent"><span class="uppercase" title="<?php echo lang('menu_banner') ?>"><?php echo lang('menu_banner') ?></span>
    <ul>
    <?php if($usersInfo['u_type']==4){?>
    <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/adsgroups/detail/new" title="Thêm nhóm quảng cáo">Thêm nhóm quảng cáo</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo lang('menu_banner_list') ?>"/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/adsgroups/main" title="Danh sách nhóm quảng cáo">Danh sách nhóm quảng cáo</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo lang('menu_banner_list') ?>"/>
        </li>
<?php }?>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/ads/detail/new" title="<?php echo 'Thêm quảng cáo'; ?>"><?php echo 'Thêm quảng cáo' ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo 'Thêm quảng cáo' ?>"/>
        </li>
         <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/ads/main" title="<?php echo lang('menu_banner_list') ?>"><?php echo lang('menu_banner_list') ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo lang('menu_banner_list') ?>"/>
        </li>
    </ul>
</li>
<?php }?>
<?php if($adminCofigs['menu_weblink'] ==1){?>
<li class="parent menu_connect"><span title="<?php echo lang('Mng_Connect');?>"><?php echo lang('Mng_Connect');?></span> 
    <ul> 
        <li class="mChild"><a href="<?php echo base_url() ?>AdminCP/weblinks/detail/new"><?php echo lang('add_weblink');?></a><img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo lang('add_weblink');?>"/></li>
        <li class="mChild"><a href="<?php echo base_url() ?>AdminCP/weblinks/main"><?php echo lang('list_weblink');?></a><img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo lang('list_weblink');?>"/></li>
    </ul> 
</li>
<?php }?>
<?php if($adminCofigs['menu_support'] ==1){?>
<li class="parent"><span class="uppercase" title="<?php echo lang('manage_support') ?>"><?php echo lang('manage_support') ?></span>
    <ul>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/supports/main" title="<?php echo lang('list_support') ?>"><?php echo lang('list_support') ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo lang('list_support') ?>"/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/supports/detail/new" title="<?php echo lang('add_support') ?>"><?php echo lang('add_support') ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo lang('add_support') ?>"/>
        </li>
    </ul>
</li>
<?php }?>
<?php if($adminCofigs['menu_comment'] ==1){?>
<li class="parent"><span class="uppercase" title="Ý kiến phản hồi">Ý KIẾN PHẢN HỒI</span>
    <ul>
      
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/comments/main" title="Danh sách ý kiến phản hồi">Danh sách ý kiến phản hồi</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="Danh sách ý kiến phản hồi"/>
        </li>
    </ul>
</li>
<?php }?>
<?php if($adminCofigs['menu_partner'] ==1){?>
<li class="parent"><span class="uppercase" title="<?php echo lang('manage_partner') ?>"><?php echo lang('manage_partner') ?></span>
    <ul>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/partners/detail/new" title="<?php echo lang('add_partner') ?>"><?php echo lang('add_partner') ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo lang('add_partner') ?>"/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/partners/main" title="<?php echo lang('list_partner') ?>"><?php echo lang('list_partner') ?></a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="<?php echo lang('list_partner') ?>"/>
        </li>
    </ul>
</li>
<?php }?>
<?php if($adminCofigs['menu_orders'] ==1){?>
<li class="parent"><span class="uppercase" title="QUẢN LÝ ĐƠN HÀNG">QUẢN LÝ ĐƠN HÀNG</span>
    <ul>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/orders/main" title="Danh sách đơn hàng">Danh sách đơn hàng</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="Danh sách đơn hàng"/>
        </li>
      
    </ul>
</li>
<?php }?>
<!--
<li class="parent"><span class="uppercase" title="Câu hỏi">Câu hỏi</span>
    <ul>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/faq/main/" title="Danh sách câu hỏi">Danh sách câu hỏi</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-category.png"
                title="<?php echo lang('manage_static_page'); echo lang('lis_static_page_new')?>"/>
        </li>
        <?php if($_SESSION['usersInfo']['u_type'] ==4) {?>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/faq/detail/new" title="Thêm câu hỏi">Thêm câu hỏi</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-new.png"
                title="<?php echo lang('manage_static_page');echo lang('add_static_page_new')?>"/>
        </li>
        
        <?php }?>
    </ul>
</li>
<li class="parent"><span class="uppercase" title="DANH SÁCH THÀNH VIÊN">DANH SÁCH THÀNH VIÊN</span>
    <ul>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/users/member" title="Danh sách thành viên">Danh sách thành viên</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title=""/>
        </li>
      
    </ul>
</li>
<li class="parent"><span class="uppercase" title="Câu hỏi">Câu hỏi</span>
    <ul>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/faq/main/" title="Danh sách câu hỏi">Danh sách câu hỏi</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-category.png"
                title="<?php echo lang('manage_static_page'); echo lang('lis_static_page_new')?>"/>
        </li>
        <?php if($_SESSION['usersInfo']['u_type'] ==4) {?>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/faq/detail/new" title="Thêm câu hỏi">Thêm câu hỏi</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-new.png"
                title="<?php echo lang('manage_static_page');echo lang('add_static_page_new')?>"/>
        </li>
        
        <?php }?>
    </ul>
</li>-->
<li class="parent"><span class="uppercase" title="ĐĂNG KÝ NHẬN BẢN TIN">ĐĂNG KÝ NHẬN BẢN TIN</span>
    <ul>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/newsletter/main" title="Danh sách nhận bản tin">Danh sách nhận bản tin</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="Danh sách nhận bản tin"/>
        </li>
        <li class="mChild">
            <a href="<?php echo base_url() ?>AdminCP/newsletter/sendMail" title="Gửi bản tin">Gửi bản tin</a>
            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/icon-16-themes.png"
                title="Gửi bản tin"/>
        </li>
    </ul>
</li>