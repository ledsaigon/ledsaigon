<div class="row hidden-xs header_menu clearfix" data-spy="affix" data-offset-top="90">
    <div class="col-sm-3">
        <?php if(isset($bannerTop) && $bannerTop!=''){
            $avatar = $bannerTop->avatar;
            $type = $avatar[strlen($avatar)-3].''.$avatar[strlen($avatar)-2].''.$avatar[strlen($avatar)-1];?>
            <?php if($type=='jpg'||$type=='png'||$type=='gif'){?>
                <a href="<?php echo base_url()?>" title="<?php echo $title_site; ?>">
                    <img class="img-responsive" title="<?php echo $title_site; ?>" alt="<?php echo $title_site; ?>" src="<?php echo base_url().'uploads/ads/'.$avatar; ?>" />
                </a>
            <?php }?>
        <?php }?>
    </div>
    <div class="col-sm-push-1 col-sm-9 menu_lg">
        <?php if(isset($menuTop) && !empty($menuTop)){?>
        <div class="navbar-wrapper">
            <nav class="navbar min_height_navbar my_navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <?php 
                        $arrayURLDanhMuc = array();
                        foreach ($dm_spham as $key => $value) {
                        $con_dm_spham= $this->productcategories_m->getObjects('status = 1 AND pid = '.$value['id']);
                        $urlDanhMuc = $value['slug'].'.html';
                        array_push($arrayURLDanhMuc,  $urlDanhMuc);
                        foreach ($con_dm_spham as $key_sub => $value_sub) {
                            $urlDanhMucCon = $value_sub['slug'].'.html';
                            array_push($arrayURLDanhMuc,  $urlDanhMucCon);
                        }
                        }
                    ?>
                    <?php 
                        $cutURI = explode('/',$_SERVER['REQUEST_URI']); 
                        $getURI = array_pop($cutURI);                        
                        // $con_dm_spham= $this->productcategories_m->getObjects('status = 1 AND pid = '.$value['id']); 
                    ?>
                </div>
                <div id="navbar" class="navbar-collapse collapse pad_none">
                    <ul class="nav navbar-nav text-left">
                        <?php foreach ($menuTop as $key => $value) {?>
                        <li class="po_res text-uppercase 
                            <?php  
                                echo ($getURI == $value['url'])? 'active':'';
                                if($value['url']=='san-pham.html'){
                                    if(in_array($getURI, $arrayURLDanhMuc)==TRUE)
                                    echo 'active';
                                }
                            ?>
                        ">
                            <a href='<?php echo $value["url"]; ?>' title="<?php echo $value[$lang.'_name'] ?>"><?php echo $value[$lang.'_name']; ?></a>
                            <?php if($value['url']=='san-pham.html') :?>
                            <ul style="display: none;" class="danhmuc_menu">
                                <?php foreach ($dm_spham as $key => $value) {
                                    $con_dm_spham= $this->productcategories_m->getObjects('status = 1 AND pid = '.$value['id']);
                                    ?>
                                    <li class="text-uppercase dm_li_css">
                                        <a class="hover_a_li" href="<?php echo $value['slug'] ?>.html"><?php echo $value[$lang.'_name'] ?>
                                            <span class="pull-right"><i class="fa fa-angle-double-down"></i></span>
                                        </a>
                                        <?php if(isset($con_dm_spham) && !empty($con_dm_spham)){?>
                                        <ul class="nav_dropdown">
                                            <?php foreach ($con_dm_spham as $key_con => $value_con) {?>
                                            <li class="text-capitalize dm_li_css">
                                                <span class="pull-left l_danhmuc_css"><i
                                                        class="fa fa-caret-right"></i></i></span>
                                                <a class="hover_a_li"
                                                    href="<?php echo $value_con['slug'] ?>.html"><?php echo $value_con[$lang.'_name'] ?>
                                                </a>
                                            </li>
                                            <?php }?>
                                        </ul>
                                        <?php }?>
                                    </li>
                                    <?php if(($key+1) != count($dm_spham)){?>
                                    <li class="divider"></li>

                                    <?php }?>
                                <?php }?>
                            </ul>
                            <?php endif;?>

                        </li>
                        <?php }?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="clear"></div>
        <?php }?>
    </div>
</div>
</div>

<!--  -->

<div class="row visible-xs">
    <div class="col-xs-12">
        <?php if(isset($dm_spham) && !empty($dm_spham)){?>
        <div id="nav_left">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown">
                        <span class="logo_menu">
                            <?php if(isset($bannerTop) && $bannerTop!=''){
                      $avatar = $bannerTop->avatar;
                      $type = $avatar[strlen($avatar)-3].''.$avatar[strlen($avatar)-2].''.$avatar[strlen($avatar)-1];?>
                            <?php if($type=='jpg'||$type=='png'||$type=='gif'){?>
                            <img class="img-responsive" title="<?php echo $title_site; ?>"
                                alt="<?php echo $title_site; ?>"
                                src="<?php echo base_url().'uploads/ads/'.$avatar; ?>" />
                            <?php }?>
                            <?php }?>
                        </span>
                        <span class="menu_xs">
                            <span class="l_danhmuc_css"><i class="fa fa-list"></i></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="text-uppercase dm_li_css visible-xs "><a class="hover_a_li" href="#">Menu <span
                                    class="pull-right"><i class="fa fa-angle-double-down"></i></span></a>

                            <?php if(isset($menuTop) && !empty($menuTop)){?>
                            <ul class="nav_dropdown">
                                <?php foreach ($menuTop as $key_con => $value_con) {?>

                                <li class="text-capitalize dm_li_css">

                                    <span class="pull-left l_danhmuc_css"><i class="fa fa-caret-right"></i></i></span>

                                    <a class="hover_a_li"
                                        href="<?php echo $value_con['url'] ?>"><?php echo $value_con[$lang.'_name'] ?>
                                    </a>
                                </li>
                                <?php }?>
                            </ul>
                            <?php }?>
                        </li>
                        <li class="divider"></li>

                        <?php foreach ($dm_spham as $key => $value) {
                $con_dm_spham= $this->productcategories_m->getObjects('status = 1 AND pid = '.$value['id']);
                ?>

                        <li class="text-uppercase dm_li_css"><a class="hover_a_li"
                                href="<?php echo $value['slug'] ?>.html"><?php echo $value[$lang.'_name'] ?> <span
                                    class="pull-right"><i class="fa fa-angle-double-down"></i></span></a>

                            <?php if(isset($con_dm_spham) && !empty($con_dm_spham)){?>

                            <ul class="nav_dropdown">

                                <?php foreach ($con_dm_spham as $key_con => $value_con) {?>

                                <li class="text-capitalize dm_li_css">

                                    <span class="pull-left l_danhmuc_css"><i class="fa fa-caret-right"></i></i></span>

                                    <a class="hover_a_li"
                                        href="<?php echo $value_con['slug'] ?>.html"><?php echo $value_con[$lang.'_name'] ?>
                                    </a>

                                </li>

                                <?php }?>

                            </ul>

                            <?php }?>
                        </li>

                        <?php if(($key+1) != count($dm_spham)){?>

                        <li class="divider"></li>

                        <?php }?>
                        <?php }?>



                    </ul>

                </li>

            </ul>

        </div>

        <?php }?>

    </div>


    <script type="text/javascript">
        $(".menu-xs").click(function () {
            $('ul.dropdown-menu').slideToggle();
        });
    </script>