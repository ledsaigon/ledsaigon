<?php
class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		}
		
	public function index(){
		if(isset($_SESSION['usersInfo']))
		redirect(base_url().'AdminCP/');
		else
		$this->load->view('admin/frmlogin');
		}
	public function checkLogin(){
		
		$this->load->model('admin/users_m');
			$this->load->library('form_validation');
			$config = array(
								array(
									'field' =>"username",
									'label' => 'Tên đăng nhập',
									'rules' => 'required|xss_clean|alpha_dash|trim()'
									),
									array(
									'field' =>"password",
									'label' => 'Mật khẩu',
									'rules' => 'required|xss_clean|trim()'
									)
								);

			$this->form_validation->set_message('required', 'Bạn chưa nhập %s  ');
			$this->form_validation->set_message('alpha_dash', '%s Không hợp lệ ');
			$this->form_validation->set_rules($config);

		if ($this->form_validation->run() ===FALSE){

			$this->data['error_username'] = '<p class="error"'.form_error('username').'</p>';
			$this->data['error_pass'] = '<p class="error"'.form_error('password').'</p>';
			$this->load->view('admin/frmlogin',$this->data);
		
		
		}// end False
		else{
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);
			$result = $this->users_m->checkLogin($username,$password);
			if($result){
			$usersInfo = array( 'u_id' => $result->id,
										'u_type' => $result->tid,
										'u_username' => $result->username,
										'u_fullname' => $result->fullname
										);
			$_SESSION['usersInfo'] = $usersInfo;
			redirect(base_url().'AdminCP/');
			}else{
				$this->data['error_login'] = '<p class="error">Tên đăng nhập hoặc mật khẩu không đúng</p>';
				$this->load->view('admin/frmlogin',$this->data);
				}
			
			}// end else
			
			
		
		}
		public function logout(){
			if(isset($_SESSION['usersInfo']))
			unset($_SESSION['usersInfo']);
			redirect(base_url().'AdminCP/login');
			}
	}
?>