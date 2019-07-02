<?php
require 'indexcontroller.php';
class Shopping extends IndexController{
	public function __construct(){
		parent:: __construct();
		$this->load->model('admin/products_m');
		
	}
	public function manage(){
		$this->load->model('admin/configs_m');
		if(isset($_SESSION['cart']))$this->data['arrCart']=$_SESSION['cart'];	
		# Bread crumb
		$breadCrumbs = array(array(	'name'=>'Shopping Cart', 'url' =>'')
							
);
		$this->data['breadCrumbs'] = $breadCrumbs;
		$this->index('cart/shopping',lang('cart'));
		}
	
	public function remove($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function update(){
		$pid=$this->input->post('id_update');
		$quantity=$this->input->post('quantity');
		
		$pid=intval($pid);
		$quantity=intval($quantity);
		if($quantity==0) $quantity=1;
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				$_SESSION['cart'][$i]['qty']=$quantity;
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function addtocart($pid,$size){
		$q= $this->input->post('quantity');
		if(!$q) $q=1;
		$q=intval($q);
		if($q==0) $q=1;
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart']=array();
			$_SESSION['size']=array();
			$_SESSION['size'][0]['productid']=$size;
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}else{
			$max = count($_SESSION['cart']);
			for($i=0;$i<$max;$i++){
				if($pid==$_SESSION['cart'][$i]['productid']){
					$_SESSION['cart'][$i]['qty']+=$q;
					break;
				}
			}
			if($i >= $max){
				$_SESSION['cart'][$max]['productid']=$pid;
				$_SESSION['cart'][$max]['qty']=$q;
				}
		}
		$this->data['arrCart']=$_SESSION['cart'];
	redirect(base_url().'shopping.html');
	}
	public function deleteAll(){
		unset($_SESSION['cart']);
		unset($_SESSION['size']);
		redirect($_SERVER['HTTP_REFERER']);
		}
	public function order(){
		$this->load->model(array('admin/configs_m','admin/products_m'));
		if(isset($_SESSION['lang']))
		$lang = $_SESSION['lang'];
		else
		$lang = 'vn';
		$generalConfigs = $this->configs_m->getValues('general');
		$this->load->model('admin/staticpages_m');
		$contactInfo = $this->staticpages_m->getObject('slug','contact');
		if(isset($_SESSION['cart']))
		$this->data['arrCart']=$_SESSION['cart'];
		$config = array(
							   array(
									 'field'   => 'fullname', 
									 'label'   => lang('fullname'), 
									 'rules'   => 'required|xss_clean'
								  ),
							   array(
									 'field'   => 'address', 
									 'label'   => lang('address'), 
									 'rules'   => 'required|xss_clean'
								  ),
							   array(
									 'field'   => 'content', 
									 'label'   => lang('message_attachments'), 
									 'rules'   => 'xss_clean'
								  ),
								array(
									 'field'   => 'cell', 
									 'label'   => lang('telephone'), 
									 'rules'   => 'required|numeric'
								  ),
								 
								array(
									 'field'   => 'email', 
									 'label'   => 'Email', 
									 'rules'   => 'required|valid_email'
								  ),
								array(
									 'field'   => 'security', 
									 'label'   => lang('security'), 
									 'rules'   => 'required|trim()|callback_check_code'
								  )
							);
$this->load->library('form_validation');
$this->form_validation->set_message('required', '%s - '.lang('not_empty'));
$this->form_validation->set_message('valid_email', '%s - '.lang('invalid'));
$this->form_validation->set_message('numeric', '%s - '.lang('required_num'));
$this->form_validation->set_message('check_code', '%s - '.lang('wrong'));

$this->form_validation->set_rules($config);
if ($this->form_validation->run() ===FALSE){
	$this->data['error_fullname'] = form_error('fullname');
	$this->data['error_address'] = form_error('address');
	$this->data['error_email'] = form_error('email');
	$this->data['error_cell'] = form_error('cell');
	$this->data['error_security'] = form_error('security');
	}
else{
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');	
		$cell = $this->input->post('cell');
		$address = $this->input->post('address');
		$messages = $this->input->post('content');
		$day = $this->input->post('day');
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$date_deliver = $day.'-'.$month.'-'.$year;
		
		# Insert database
		$properties = array('email' => $email,
							'cell' => $cell,
							'address' => $address,
							'messages' => $messages,
							'date_deliver' => $date_deliver,
							'gioiTinh' => $this->input->post('gioiTinh'),
							'ptThanhToan' => $this->input->post('ptThanhToan'),
							'ptGiaoHang' => $this->input->post('ptGiaoHang'),);
		$this->load->model(array('admin/orders_m','admin/orderitem_m'));
		$datas = array('user_id' => 0,
						'fullname' => $fullname,
						'date_created' => date('H:m:i d-m-Y'),
						'properties' => serialize($properties));
		$newId = $this->orders_m->addData($datas);
		if($newId){
			# inser item
			for($i=0;$i<count($_SESSION['cart']);$i++){
				$id = $_SESSION['cart'][$i]['productid'];
				$quantity = $_SESSION['cart'][$i]['qty'];
				$products = $this->products_m->getObject('id',$id);
				$properties= array();
				if($products['khuyenmai']>0){
					$khuyenmai= $products['price']- ($products['price'] * $products['khuyenmai'])/100;
					$properties = array(
									'pro_name' => $products['vn_name'],
									'quantity' => $quantity,
									'pro_price' => $khuyenmai,
									'total' => $khuyenmai*$quantity);
				}else{
					$properties = array(
									'pro_name' => $products['vn_name'],
									'quantity' => $quantity,
									'pro_price' => $products['price'],
									'total' => $products['price']*$quantity);
				}




				
				$datas = array('order_id' => $newId,
								'pro_id' => $id,
								'properties' => serialize($properties)
								);
				$this->orderitem_m->addData($datas);
			}
			
			}
						
		$html=' <table cellpadding="4" cellspacing="0" width="500" border="1">
			  <tr>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Giá </th>
				<th>Thành tiền </th>
			  </tr>';
		$total=0;
		for($i=0;$i<count($_SESSION['cart']);$i++){
			$id = $_SESSION['cart'][$i]['productid'];
			$quantity = $_SESSION['cart'][$i]['qty'];
			$products = $this->products_m->getObject('id',$id);
			if($products){
				$html.="<tr>";
				$html.="<td style='padding-left:10px'>".$products[$lang.'_name']."</td>";
				$html.="<td align='center'>".$quantity."</td>";
					if($products['khuyenmai']>0){
						$khuyenmai= $products['price']- ($products['price'] * $products['khuyenmai'])/100;
						$html.="<td align='center'>".number_format($khuyenmai)." Vnđ</td>";
				
						$html.="<td align='center'>".number_format(($khuyenmai)*($quantity))." Vnđ</td>";
						$html.="</tr>";
						$total +=($khuyenmai)*($quantity); 
					}else{
						$html.="<td align='center'>".number_format($products['price'])." Vnđ</td>";
				
						$html.="<td align='center'>".number_format(($products['price'])*($quantity))." Vnđ</td>";
						$html.="</tr>";
						$total +=($products['price'])*($quantity); 
					}
				
				}
			}// end for
			$company = $generalConfigs[$_SESSION['lang'].'_company'];
			$html.='<tr><td colspan="4" align="center"><b>Tổng cộng </b>:'.number_format($total).' Vnđ</td></tr>';
			$html.='</table>';
			$content="Tên khách hàng: $fullname<br>";
			$content.="Địa chỉ: $address<br>";
			$content.="Số điện thoại: $cell<br>";
			$bodyOfAdmin='Đơn hàng từ website:<br>'.base_url();
			$bodyOfAdmin.="<h3>Thông tin sản phẩm</h3>";
			$bodyOfAdmin.=$html;
			$bodyOfAdmin.="<h3>Thông tin khách hàng</h3>";
			$bodyOfAdmin.=$content;
			$bodyOfAdmin.="<h3>Thông tin giao hàng</h3>";
			$bodyOfAdmin.="Ngày giao hàng: $date_deliver<br>";
			if($messages)$bodyOfAdmin.="Ghi chú: $messages<br>";
			$bodyOfAdmin.="Thanks & Regards<br>
							<strong>$company</strong><br>
							<hr align='left' width='60%'><br>
							".$contactInfo[$_SESSION['lang'].'_detail']."";
			
			$emailAdmin = $generalConfigs['email'];
			$emailCustomer = $this->input->post('email');

			include_once(APPPATH.'controllers/class/function.php');
			smtpmailer($emailAdmin, $emailCustomer, $fullname, 'Thông tin đơn hàng', $bodyOfAdmin);
			# sent to customer
			$bodyCustomer = "Xin chào $fullname!<br>";
			$bodyCustomer.='Quý khách vừa đăt một đơn hàng từ website <a href="'.base_url().'">'.base_url().'</a> với thông tin sản phẩm như sau:<br><br>';
			$bodyCustomer.=$html;
			$bodyCustomer.='<br>Chúng tôi sẽ xác nhận thông tin và liên hệ với quý khách trong thời gian sớm nhất<br>
			Trân trọng cảm ơn quý khách!<br>
			<b>'.$company.'</b><br>
			<hr width="60%" align="left"><br>
			'.$contactInfo[$_SESSION['lang'].'_detail'].'
			
			';
			smtpmailer($emailCustomer,$emailAdmin,  $company, 'Thông tin đơn hàng', $bodyCustomer);
			unset($_SESSION['cart']);
			unset($_SESSION['captcha']);
			redirect(base_url().'dat-hang-thanh-cong.html');
					
	}
		unset($_SESSION['captcha']);
		$this->index('cart/shopping', lang('infomation_customer'));
	
}
	public function orderSuccess(){
		$this->data['orderOk']=TRUE;
		$this->index('cart/ordersuccess');
		}
	public function check_code($code){
		include_once(ROOT_PATH."/captcha/authimg.php");
		$AuthImage = new AuthImage();
		if(strtolower($_SESSION['captcha'])!=strtolower($code))
		return false;
		else return true;
		}
}
?>