<?php
require_once'indexcontroller.php';
class Comments extends IndexController{
	public function __construct(){
		parent::__construct();
		}
	public function post(){
		date_default_timezone_set('Asia/Ho_Chi_Minh');

		$this->load->model(array('admin/configs_m','admin/comments_m'));
		$this->data['active_menu']=7;
		$start_row=$this->uri->segment('2');
		$per_page=3;

		if(trim($start_row)=='')
		$start_row=0;

		$total_rows=count($this->comments_m->getObjects(-1,-1));

		$config['base_url']=base_url().'phan-hoi.html';

		$config['total_rows'] =$total_rows;

		$config['per_page'] = $per_page; 
		//*********************************************

			$config['uri_segment'] =2;

			$this->load->library('pagination');

			$this->pagination->initialize($config); 

			$this->data['listPages']=$this->pagination->create_links();

		$this->data['listComment'] = $this->comments_m->getObjects($start_row,$per_page);
		$generalConfigs = $this->configs_m->getValues('general');
		$emailConfigs = $this->configs_m->getValues('email_acount');
		$this->data['main_color'] = $generalConfigs['main_color'];
		$hostMail = $emailConfigs['host_mail'];
		$username =  $emailConfigs['username'];
		$password = $emailConfigs['password'];
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
		
							 'field'   => 'email', 
							 'label'   => 'Email', 
							 'rules'   => 'required|valid_email'
						  ),
						array(
							 'field'   => 'comment', 
							 'label'   => 'Ý kiến', 
							 'rules'   => 'required|min_length[30]|max_length[500]|xss_clean'
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
		$this->form_validation->set_message('min_length', '%s - Phải nhiều hơn 30 ký tự ');
		$this->form_validation->set_message('max_length', '%s - Không được vượt quá 500 ký tự ');
		$this->form_validation->set_message('check_code', '%s - '.lang('wrong'));
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
		$this->check_code($this->input->post('security'));
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() ===FALSE){
			$this->data['error_fullname'] = form_error('fullname');
			$this->data['error_address'] = form_error('address');
			$this->data['error_comment'] = form_error('comment');
			$this->data['error_email'] = form_error('email');
			$this->data['error_code'] = form_error('security');
			
			$this->data['fullname'] = $this->input->post('fullname');
			$this->data['address'] = $this->input->post('address');
			$this->data['email'] = $this->input->post('email');
			$this->data['comment'] = $this->input->post('comment');
			}else
				{

               $this->load->model('admin/comments_m');
			   $data = array('fullname' => $this->input->post('fullname'),
			   				'address' => $this->input->post('address'),
							'email' => $this->input->post('email'),
							'comment' => $this->input->post('comment'),
							'date_created' => date('H:i  - d -m -Y'),
							'status' => '0'
			   					);
				$this->comments_m->addData($data);
            	require_once(APPPATH.'controllers/phpmailer/email.php');
				$email =  new Email($hostMail,$username,$password);
		 		$site_name = $generalConfigs[$_SESSION['lang'].'_title_site'];
			
				$from = array('name'=>$site_name,'email'=>$username);

              # feeback 
			  $to = array('name'=>$this->input->post('fullname'),'email'=>$this->input->post('email'));
			  $content = 'Xin chào '.$this->input->post('fullname').'!<br>';
			  $content.= 'Cảm ơn bạn đã tham gia đóng góp ý kiến tại website của chúng tôi, ý kiến của bạn sẽ được xét duyệt và hiển thị lên website.<br>Trân trọng cảm ơn!<br><b>'.$site_name.'</b>';			  			  $option = array('subject'=>lang('title_feedback'),'content'=>$content);
			  $email->sendMail($from,$to,$option);
			 
              $this->data['send_comment_success'] = 'Cảm ơn bạn đã gửi ý kiến phản hồi đến chúng tôi. Ý kiến của bạn sẽ được xét duyệt và hiển thị lên website'; 
            }

	$this->index('comment','Phản hồi');
	 unset($_SESSION['captcha']);

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