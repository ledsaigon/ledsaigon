<link  href="<?php echo base_url(); ?>publics/css/master.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	$(function(){
		$(".btnCartClear").remove();
	});
</script>
<style type="text/css">
.button_view_cart input{
	padding:.4em 1em;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	border-radius: 6px;
	border:none;
	margin:3px;
	font-weight:bold; 
}
</style>
<div id="content_page">
<form action="<?php echo base_url() ?>cart/confirm" method="post" id="frmAction">
    <input type="hidden" name="action" value="update" />
    <div class="box_content">
        <div class="start_print_page"></div>
        <h2 class="step3_cart">
            <ul>
                <li class="step1">
                    <span>
                        <?php echo common::lang('cart_detail','Giỏ hàng của bạn');?>
                    </span>                                        
                </li>
                <li class="step2">
                    <span>
                        <?php echo common::lang('payment_method','Cách giao hàng & Thanh toán');?>
                    </span>                                        
                </li>
                <li class="step3">
                    <span>
                        <?php echo common::lang('confirm_order','Xác nhận đơn hàng');?>
                    </span>
                </li>
            </ul>
            <div class="clear"></div>
        </h2>
        <div style="color:#FFF;">                                        
            <h2 style="text-align:center;">
                <?php echo common::lang('order_success','ĐẶT HÀNG THÀNH CÔNG');?>
            </h2>                  
            <h3 style="text-align:center;">
                MÃ ĐƠN HÀNG: <?php echo $oCode ?>
            </h3>
            <p style="text-align:center;line-height:25px;">
                Cám ơn bạn đã gửi đơn hàng cho chúng tôi!<br />
                Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất
            </p>
        </div>
    </div>
</form>
</div>