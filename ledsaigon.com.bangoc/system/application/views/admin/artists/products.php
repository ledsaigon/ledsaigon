<?php 

$sslog=$this->session->userdata('CI_admin');

if(!isset($usersInfo))
Header("Location: ".base_url()."AdminCP/users"); 

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

<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/js/jquery.cookie.js"></script> 

<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/js/treeview/jquery.treeview.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/ui/ui/jquery.ui.core.js"></script> 

<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/ui/ui/jquery.ui.widget.js"></script> 

<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/ui/ui/jquery.ui.button.js"></script> 

<!--TOOLTIP--> 

<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/js/jquery.dimensions.js"></script> 

<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/js/jquery.tooltip.min.js"></script> 

<script type="text/javascript">

	var base_url = '<?php echo base_url() ?>';

	$(document).ready(function(){

		$('a,label,li,img,textarea').tooltip({

			track: true,

			delay: 0,

			showURL: false,

			showBody: " - ",

			fade: 250

		});

	});

</script>



<link href="<?php echo base_url() ?>publics/admin/css/table_jui.css" rel="stylesheet" />

<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>publics/admin/js/jquery.dataTables.js"></script> 



<script type="text/javascript" src="<?php echo base_url() ?>publics/admin/js/master.js"></script>


</head>

<body>

    <div id="disable_top_page"></div>
<script type="text/javascript" src="<?php echo base_url().'publics/admin/js/submitaction.js'?>">

</script> 

<script type="text/javascript">

$(document).ready(function(){

	/* CONNECT SITE ------------------------ **/

	$("#search_by_category").change(function(){

		var url = $(this).val();

		if(url != '')

		{

			/*window.open(url);*/

			location.href = url;

		}

	});

});

</script>

<div class="ui-widget-content ui-corner-all"> 

<?php $this->load->view('admin/inc/top_toolbar');?>



  <div class="combobox_search">     <?php echo lang('category')?>  : 

<select name="search_by_category"  id="search_by_category" >

    <option value="<?php echo base_url().'AdminCP/productartists/index';?>">- - - Tất cả - - -</option>

   <?php if($listCategory){

       $url = base_url().'AdminCP/productartists/index';

        require_once(APPPATH.'models/admin/productcategories_m.php');

        $proCate = new Productcategories_m();

        foreach($listCategory as $category)

		{

        	echo "<option value=\"".$url.'/'.$category->id."\"".($category->id == $cat_id?" selected":"").">|-".$category->vn_name."</option>";

			$subCategory = $proCate->getSubCateFromPid($category->id);

			if($subCategory){

				foreach($subCategory as $subItems){

        			echo "<option value=\"".$url.'/'.$subItems->id."\"".($subItems->id == $cat_id?" selected":"").">&nbsp;&nbsp;|--".$subItems->vn_name."</option>";								



				}

			}								

        }

      }?>

</select>

                </div>        

        <form action="" method="post" id="frmAction" name="frmAction">

            <input type="hidden" id="action" name="action" value="action"/>

            <input type="hidden" id="txtArrayID" name="txtArrayID" value=""/>

           <center><span style="color:#F00;" id="status_error"><?php if(isset($error)) echo $error ?></span></center>

          <?php require_once(APPPATH.'models/admin/productcategories_m.php');

			$categories = new Productcategories_m();?>

            <table cellpadding="0" cellspacing="0" border="0" id="table_data">

                <thead> 

               

                    <tr> 

                        <th width="50"><?php echo lang('number')?></th>

                        <th width="50">ID</th>

                        <th><?php echo lang('category')?></th>

                        <th><?php echo lang('name_slug')?></th>

                         <th><?php echo lang('avatar');?></th>

                        <th width="70"><?php echo lang('status')?></th>

                         <th width="70"><?php echo lang('position')?> <a href="#" class="button_save_order" title="Save Order - Lưu lại thứ tự của các record"></a></th>

                        <td class="bg_check_all" width="140"><?php echo lang('actions')?></td>

                         <td class="bg_check_all" width="40"><input type="checkbox" id="chkCheckAll" title="Check all"/></td>

                    </tr> 

                </thead>

                <tbody>

                    <?php if($objects){

						$i=0;

						foreach($objects as $row ) {$i++; ?>

                    <tr style="text-align:center">

                        <td><?php echo $i;?></td>

                        <td><?php echo $row->id;?></td>

                         <td><?php echo $categories->getName($row->cid,'vn');?></td>

                        <td class="title_name">

                            <b><?php echo $row->vn_name ?></b>

                            <span class="slug">(<b>slug</b>: <?php echo $row->slug ?>)</span>

                        </td>

                        <td><img src="<?php echo base_url()?>uploads/products/a_<?php echo $row->avatar?>" alt="" width="100" /></td>

                        <td>

                        <span style="display:none"><?php echo $row->status?></span>

                            <img src="<?php echo base_url() ?>publics/admin/images/iconx16/public_<?php echo $row->status ?>.png" />

                        </td>

                        <td>  <input type="hidden" name="positionID[]" value="<?php echo $row->id ?>"/>

                              <input type="text" name="position[]" onkeypress="return keypress(event);" 

                                            	style="width:30px;text-align:center;" value="<?php echo $row->position ?>"/><span style="display:none"><?php echo $row->position ?></span></td>

                        <td class="button_action">

                            <a href="<?php echo base_url() ?>AdminCP/products/detail/<?php echo $row->id ?>" class="edit_item" rel="<?php echo $row->id ?>" title="<?php echo lang('edit')?>"></a>

                             <a href="javascript:formSubmit('frmAction','enable',<?php echo $row->id;?>);" class="enable_item"  title="<?php echo lang('display')?>"><?php echo lang('display')?></a>

                             <a href="javascript:formSubmit('frmAction','disable',<?php echo $row->id;?>);" class="disable_item" title="<?php echo lang('hide')?>"><?php echo lang('hide')?></a>

                              <a href="javascript:formSubmit('frmAction','delete',<?php echo $row->id;?>);" class="delete_item"  title="<?php echo lang('delete')?>"><?php echo lang('delete')?></a>

                              <?php if($row->home == 0) {?>

                              <a href="javascript:formSubmit('frmAction','enable_home',<?php echo $row->id;?>);" class="enable_home"  title="Hiển thị trang chủ">Home</a>

                              <?php }else {?>

                              <a href="javascript:formSubmit('frmAction','delete_home',<?php echo $row->id;?>);" class="delete_home" title="Delete home">Delete Home</a>

                              <?php }?>



                        </td>

                         <td><input type="checkbox" class="chkCheck" name="chkBox[]" value="<?php echo $row->id ?>"/></td>

                    </tr>

                    <?php } }?>

                </tbody> 

            </table>

            <div class="clear"></div>

        </form>

    </p>

   <?php $this->load->view('admin/inc/bottom_toolbar')?>

    </div>
    
</body>

</html>

