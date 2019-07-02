<div class="bao_giohang search_top_wlcome">
<div class="row">
<form name="frmSearch" id="frmSearch" method="post" action="tim-kiem.html" role="search">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pad_r_none">
<?php if(isset($dm_spham) && !empty($dm_spham)){?>
<select class="selectpicker show-tick" name="cid">
	<option value="">Danh mục sản phẩm</option>
<?php foreach ($dm_spham as $key => $value) {?>
	<option value="<?php echo $value['id'];?>"><?php echo $value['vn_name'] ?></option>
<?php }?>
</select>
<?php }?>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pad_l_none">
 <div class="input-group stylish-input-group">
    <input type="text" class="form-control" placeholder="" autofocus name="keyword" id="keyword" >
    <span class="input-group-addon">
        <button type="submit">
            <span class="glyphicon glyphicon-search"></span>
        </button>  
    </span>
</div>
</div>
</form>
<div class="clear"></div>
</div>
</div>
