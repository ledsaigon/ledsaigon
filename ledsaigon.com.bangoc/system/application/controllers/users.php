<?php
require_once('indexcontroller.php');
class Users extends IndexController{
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/users_m');
		$this->data['userPage'] = 1;
		}
	public function profile(){
		if(!isset($_SESSION['userInfo'])||$_SESSION['userInfo']==FALSE)
		redirect(base_url().'login.html');
		$this->data['hideSlide'] = 1;
		$this->data['object'] = $this->users_m->getById($_SESSION['userInfo']->id);
		$config = array(
					array('field' => 'fullname',
							'label' => 'Họ tên',
							'rules' => 'required|xss_clean'),
					
					array('field' => 'cell',
							'label' => 'Điện thoại',
							'rules' => 'numeric|min_length[6]|required'),
					array('field' => 'address',
							'label' => 'Địa chỉ',
							'rules' => 'xss_clean'),
					array('field' => 'email',
							'label' => 'Email',
							'rules' => 'required|valid_email|xss_clean'),
					
					);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required','%s - '.lang('not_empty'));
		$this->form_validation->set_message('valid_email','%s - '.lang('invalid'));
		$this->form_validation->set_message('numeric','%s - '.lang('invalid'));
		$this->form_validation->set_message('min_length','%s - '.lang('min_length'));
		$this->form_validation->set_message('max_length','%s - '.lang('max_length'));
		$this->form_validation->set_error_delimiters('', '');
		if($this->form_validation->run()==FALSE){
			$this->data['error_fullname'] = form_error('fullname');
			$this->data['error_company'] = form_error('company');
			$this->data['error_cell'] = form_error('cell');
			$this->data['error_address'] = form_error('address');
			$this->data['error_email'] = form_error('email');
			}
			else{
				
				$properties = array(
									'date_created' => $this->input->post('date_created')
									);
				$data = array('fullname' => $this->input->post('fullname'),
								'company' => $this->input->post('company'),
								'cell' => $this->input->post('cell'),
								'email' => $this->input->post('email'),
								'address' => $this->input->post('address'),
								'properties' => serialize($properties)
								);
				
				$this->users_m->editData($data,$_SESSION['userInfo']->id);
				$this->data['result'] = 'Cập nhật thành công';
				echo '<meta http-equiv="refresh" content="1">';
						
			}// end els
		$this->index('users/profile','Thông tin cá nhân');
			
		
		}
	public function register(){
		$this->load->model('admin/staticpages_m');
		$this->data['dieuKhoan'] = $this->staticpages_m->getObject('slug','dieu-khoan');
		if(isset($_SESSION['userInfo'])&&$_SESSION['userInfo']==true)
		redirect(base_url().'profile.html');
		$config = array(
						array('field' => 'fullname',
								'label' => 'Họ tên',
								'rules' => 'required|xss_clean'),
						
						array('field' => 'cell',
								'label' => 'Điện thoại',
								'rules' => 'numeric|min_length[6]|required'),
						array('field' => 'address',
								'label' => 'Địa chỉ',
								'rules' => 'xss_clean'),
						array('field' => 'email',
								'label' => 'Email',
								'rules' => 'required|valid_email|xss_clean|callback_check_email'),
						array('field' => 'facebook',
								'label' => 'Facebook',
								'rules' => 'xss_clean'),
						array('field' => 'username',
								'label' => lang('username'),
								'rules' => 'required|xss_clean|trim()|strtolower()|min_length[4]|max_length[20]|alpha_dash|callback_check_username'),
						array('field' => 'password',
								'label' => lang('password'),
								'rules' => 'required|xss_clean|min_length[6]|max_length[30]|md5|trim()'),
						array('field' => 'confirm_pass',
								'label' => lang('confirm_pass'),
								'rules' => 'required|xss_clean|matches[password]'),
						array('field' => 'security',
								'label' => lang('security'),
								'rules' => 'required|callback_check_security_code')
						);
			
		$this->load->library('form_validation');
		$this->check_username($this->input->post('username'));
		$this->check_email($this->input->post('email'));
		$this->check_security_code($this->input->post('security'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required','%s - '.lang('not_empty'));
		$this->form_validation->set_message('valid_email','%s - '.lang('invalid'));
		$this->form_validation->set_message('numeric','%s - '.lang('invalid'));
		$this->form_validation->set_message('matches','%s - '.lang('wrong'));
		$this->form_validation->set_message('alpha_dash','%s - '.lang('alpha_dash'));
		$this->form_validation->set_message('min_length','%s - '.lang('min_length'));
		$this->form_validation->set_message('max_length','%s - '.lang('max_length'));
		$this->form_validation->set_message('check_username','Tên đăng nhập này đã có người sử dụng');
		$this->form_validation->set_message('check_email','Email này đã được sử dụng, vui lòng chọn email khác');
$this->form_validation->set_message('check_security_code','%s - '.lang('wrong'));
		$this->form_validation->set_error_delimiters('', '');
		if($this->form_validation->run()==FALSE){
			$this->data['error_fullname'] = form_error('fullname');
			$this->data['error_cell'] = form_error('cell');
			$this->data['error_email'] = form_error('email');
			$this->data['error_pass'] = form_error('password');
			$this->data['error_confirm_pass'] = form_error('confirm_pass');
			$this->data['error_username'] = form_error('username');
			$this->data['error_security'] = form_error('security');
			unset($_SESSION['captcha']);
			}
			else{
				
				$properties = array(
									
									'date_created' => date('d-m-Y'),
									
									);
				$data = array('tid' => 1,
								'username' => strtolower($this->input->post('username')),
								'password' => $this->input->post('password'),
								'fullname' => $this->input->post('fullname'),
								'cell' => $this->input->post('cell'),
								'email' => $this->input->post('email'),
								'address' => $this->input->post('address'),
								'status' => 1,
								'code' => '',
								'properties' => serialize($properties)
								);
				
				if($this->users_m->addData($data)){
					include_once(APPPATH.'controllers/class/function.php');
					$emailCustomer = $this->input->post('email');
					$company = $this->input->post('company');
					$username = strtolower($this->input->post('username'));
					$password = md5($this->input->post('password'));
					$message = sprintf(lang('mail_register_account'),$company,$username,$password,$emailCustomer);
					smtpmailer('no-reply@'.$_SERVER['HTTP_HOST'], $emailCustomer, $fullname, 'Thông tin tài khoản', $message);
					$_SESSION['fullname'] = $this->input->post('fullname');
					redirect(base_url().'dang-nhap.html');
					}
				unset($_SESSION['captcha']);
						
			}// end els
		$this->index('users/register','Đăng ký thành viên');
		}
	
	
		
	
	public function login(){
		if(isset($_SESSION['userInfo'])&& $_SESSION['userInfo']==true)
		redirect(base_url().'profile.html');
		$configs = array(array('field' => 'username',
								'label' => lang('username'),
								'rules' => 'required|xss_clean|trim()'),
						array('field' => 'password',
								'label' => lang('password'),
								'rules' => 'required|xss_clean|trim()')
								
						);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($configs);
		$this->form_validation->set_message('required','Chưa nhập %s');
		$this->form_validation->set_error_delimiters('','');
		if($this->form_validation->run()==FALSE){
			$this->data['error_login_user'] = form_error('username');
			$this->data['error_login_pass'] = form_error('password');
		}
		else{
			$this->load->model('admin/users_m');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$userInfo = $this->users_m->checkAcountCustomer($username,$password);
			if($userInfo){
				$_SESSION['userInfo'] = $userInfo;
				//if($this->input->post('option')=='toPromotion')
			redirect(base_url());
			}
			else
			$this->data['error_login'] =lang('username_pass_wrong');
		}
		$this->index('users/login',lang('login'));
		}
	public function logout(){
		if(isset($_SESSION['userInfo']))
		unset($_SESSION['userInfo']);
		session_destroy();
		//redirect(base_url().'index.html');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function changePass(){
		if(!isset($_SESSION['userInfo'])||$_SESSION['userInfo']==FALSE)
		redirect(base_url().'login.html');
		$this->data['hideSlide'] = 1;
		$this->load->library('form_validation');

		$config = array(

						array('field' =>'oldPass',
								'label' => 'Mật khẩu củ',
								'rules' => 'required|trim()'),
						array('field' =>'newPass',
								'label' => 'Mật khẩu mới',
								'rules' => 'required|trim()|min_length[6]'),
						array('field' =>'confirmPass',
								'label' =>'Xác nhận mật khẩu',
								'rules' =>'required|trim()|min_length[6]|matches[newPass]')

						);

		$this->form_validation->set_message('required','%s - Không được bỏ trống');

		$this->form_validation->set_message('min_length','%s - Có ít nhất 6 ký tự');

		$this->form_validation->set_message('matches','%s - Không đúng');

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == FALSE){

			$this->data['errorOldPass'] = form_error('oldPass');

			$this->data['errorNewPass'] = form_error('newPass');

			$this->data['errorConfirmPass'] = form_error('confirmPass');

			

			}else{

				$oldPass = $this->input->post('oldPass');
				$newPass = $this->input->post('newPass');
				$confirmPass = $this->input->post('confirmPass');
				$this->load->model('admin/users_m');
				$idUser = $_SESSION['userInfo']->id;
				$checkOldPass = $this->users_m->checkDuplicatePass($idUser,md5($oldPass));
				if($checkOldPass == 0){
					$this->data['errorOldPass'] = '<p>Mật khẩu củ không đúng';
					}
				else{
					if($this->users_m->changePass(md5($newPass),$idUser))
					{
						$this->data['changePassOk'] = 'Mật khẩu của bạn đã được thay đổi.';
						unset($_SESSION['userInfo']);
						$_SESSION['changepass']= $this->data['changePassOk'];
						redirect(base_url().'dang-nhap.html');
					}
					else
						$this->data['changePassOk'] = '<span style="color:red">Đổi mật khẩu không thành công.</span>';
					}				
				}
		$this->index('users/changepass','Đổi mật khẩu');
	}
	
	public function member($type){
		$this->load->model('admin/articles_m');
		$this->data['type'] = $type;
		$slug = 'nha-thuoc';
		if($type==2)
		$slug = 'nha-phan-phoi';
		$condition = "status = 1 AND tid = $type";
		$p=$this->uri->segment('3');
		$per_page= 20;
		if($p==0)
		$page = 1;
		else
		$page = $p;

		$total_rows=count($this->users_m->getObjects($condition));
		$total_page = ceil($total_rows/$per_page);
		if($p>$total_page)
		$page = $total_page;

		$config['base_url']=base_url()."thanh-vien/$slug";
		$config['first_url']=base_url()."thanh-vien/$slug.html";

		$config['total_rows'] =$total_rows;

		$config['per_page'] = $per_page; 
		//*********************************************

		$config['uri_segment'] =3;

		$this->load->library('pagination');

		$this->pagination->initialize($config); 

		$this->data['listPages']=$this->pagination->create_links();

		$this->data['listMember']=$this->users_m->getObjects($condition,$page,$per_page);
		$this->index('users/member','Thành viên');
		}	
	
	public function lostPass(){
	$this->load->model(array('admin/configs_m','admin/staticpages_m'));
	$generalConfigs = $this->configs_m->getValues('general');
	$adminCp =$this->configs_m->getValues('admincp');
	$configs = array(array('field' => 'email',
							'label' => 'Email',
							'rules' => 'required|valid_email'),
					array('field' => 'code',
							'label' => 'Mã bảo vệ',
							'rules' => 'required|callback_check_security_code')
							
					);
		$this->load->library('form_validation');
		$this->check_security_code($this->input->post('code'));
		$this->form_validation->set_rules($configs);
		$this->form_validation->set_message('required','Chưa nhập %s');
		$this->form_validation->set_message('valid_email','Email không hợp lệ');
		$this->form_validation->set_message('check_security_code','Mã bảo vệ không đúng');
		$this->form_validation->set_error_delimiters('','');
		if($this->form_validation->run()==FALSE){
			$this->data['error_email'] = form_error('email');
			$this->data['error_code'] = form_error('code');
			unset($_SESSION['captcha']);
		}
		else{
			$email = $this->input->post('email');
			$userObject = $this->users_m->getByEmail($email);
			if($userObject){
				$str = md5(rand());
				$fullname = $userObject->fullname;
				$username = $userObject->username;
				$pass = substr($str,0,6);
				$this->users_m->changePass(md5($pass),$userObject->id);
				$lang =$_SESSION['lang'];
				$company = $generalConfigs[$lang.'_company'];
				$adminEmail = $generalConfigs['email'];
				
				include_once(APPPATH.'controllers/class/function.php');


				
               $bodyMailAdmin = sprintf(lang('email_lost_pass'),$fullname,$username,$pass);
				smtpmailer($email, $adminEmail, $fullname, 'Thông tin tài khoản', $bodyMailAdmin);
				$this->data['error']= '<span style="color:green">Mật khẩu mới của bạn đã được gửi đến '.$email.', vui lòng kiểm tra email để lấy lại mật khẩu.</span>';
				//$_SESSION['userInfo'] = $userInfo;
			//redirect($_SERVER['HTTP_REFERER']);
			}
			else
			$this->data['error'] = '<span style="color:red">Email không đúng hoặc không tồn tại</span>';
		unset($_SESSION['captcha']);
		}
		$this->index('users/lostpass','Quên mật khẩu');
		}
	
	public function check_username($username){
		$this->load->model('admin/users_m');
		if($this->users_m->checkExist('username',$username) ==1)
		return false;
		else 
		return true;
		}
	public function check_email($email){
		if($this->users_m->checkExist('email',$email) ==1)
		return false;
		else 
		return true;
		}
	public function check_security_code($code){
		include_once(ROOT_PATH."/captcha/authimg.php");
		$AuthImage = new AuthImage();
		if(strtolower($_SESSION['captcha'])!=strtolower($code))
		return false;
		else 
		return true;
	}
}
?>