<?php
require_once (APPPATH.'controllers/indexcontroller.php');
class Contacts extends IndexController{
	public function __construct(){
		parent::__construct();
		}
	
	public	function contact(){
		# Bread crumb
	$lang = $_SESSION['lang'];
			
			if($lang=='vn'){
				$breadcrumb["Trang chủ"]="";
				$breadcrumb["Liên hệ"]="";

			}
			else{
				$breadcrumb["Home"]="";
				$breadcrumb["Contact"]="";

			}





			$this->data['breadcrumb'] = $breadcrumb;
		
		$this->load->model(array('admin/configs_m','admin/staticpages_m'));
		$this->data['active_menu']=6;
		$this->data['title_site'] = lang('contact');
		
		$generalConfigs = $this->configs_m->getValues('general');
		$adminCp =$this->configs_m->getValues('admincp');
		$contactInfo = $this->staticpages_m->getObject('slug','contact');
		$this->data['contactInfo']=$contactInfo;
		$title_page = 'Liên hệ';
		$keyword_page = '';
		$description_page ='';
		if($adminCp['seo_web']==1){
			$title_page = $contactInfo[$_SESSION['lang'].'_title_site'];
			$keyword_page = $contactInfo[$_SESSION['lang'].'_keyword'];
			$description_page = $contactInfo[$_SESSION['lang'].'_description'];
			}
		if(isset($_POST['send'])){
       	$config = array(
							   array(
									 'field'   => 'fullname', 
									 'label'   => lang('fullname'), 
									 'rules'   => 'required|xss_clean'
								  ),
							   array(
									 'field'   => 'title', 
									 'label'   => lang('title'), 
									 'rules'   => 'required|xss_clean'
								  ),
							   array(
									 'field'   => 'content', 
									 'label'   => lang('content'), 
									 'rules'   => 'required|xss_clean'
								  ),
								array(
									 'field'   => 'cell', 
									 'label'   => lang('telephone'), 
									 'rules'   => 'numeric|xss_clean'
								  ),
				
								array(
				
									 'field'   => 'address', 
				
									'label'   => lang('address'), 
									 'rules'   => 'xss_clean'
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
		$this->form_validation->set_message('numeric', '%s - '.lang('invalid'));
		$this->form_validation->set_message('check_code', '%s - '.lang('wrong'));
		$this->form_validation->set_error_delimiters('','');
		$this->check_code($this->input->post('security'));
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() ===FALSE){
			$this->data['error_fullname'] = form_error('fullname');
			$this->data['error_title'] = form_error('title');
			$this->data['error_content'] = form_error('content');
			$this->data['error_email'] = form_error('email');
			$this->data['error_cell'] = form_error('cell');
			$this->data['error_security'] = form_error('security');
			}else
				{
				$fullname = $this->input->post('fullname');
				$address = $this->input->post('address');
				$emailCustomer = $this->input->post('email');
				$cell = $this->input->post('cell');
				$title = $this->input->post('title');
				$content = $this->input->post('content');
                $datas = array ('fullname' => $this->input->post('fullname'),
							   'mobile'=> $this->input->post('cell'),
							   'email'=> $this->input->post('email'),
							   'subject'=> $this->input->post('title'),
							   'content'=> $content,
							   'address'=> $this->input->post('address'),
							   'status'=> 0,
							   'date_created' => date('H:m:i d-m-Y')
							   );
				$this->load->model('admin/contacts_m');
				$this->contacts_m->addData($datas);
				$lang =$_SESSION['lang'];
				$company = $generalConfigs[$lang.'_company'];
				$adminEmail = $generalConfigs['email'];
				
				include_once(APPPATH.'controllers/class/function.php');
               $bodyMailAdmin = sprintf(lang('email_contact_admin'),$fullname,$address,$cell,$emailCustomer,$title,$content,$company,$contactInfo[$lang.'_detail']);
				smtpmailer($adminEmail, $emailCustomer, $fullname, 'Thông tin liên hệ', $bodyMailAdmin);
               
              # feeback 
			  $bodyMailCustomer = sprintf(lang('email_contact_customer'),$fullname,$company,$contactInfo[$lang.'_detail']);
			 
			 smtpmailer($emailCustomer,$adminEmail,  $fullname, 'Thông tin phản hồi', $bodyMailCustomer);
			 
              $this->data['send_mail_success'] = lang('send_contact_success'); 
            }
			unset($_SESSION['captcha']);
		}
	$this->index('contact',$title_page,$keyword_page,$description_page);
	 
	}
	public function check_code($code){
		include_once(ROOT_PATH."/captcha/authimg.php");
		$AuthImage = new AuthImage();
		if(strtolower($_SESSION['captcha'])!=strtolower($code))
		return false;
		else return true;
		}
	function newsletter(){
		echo '<script type="text/javascript">alert("ok")</script>';
		$email = $this->input->post('email',TRUE);
		$this->load->model('admin/newsletter_m');
		$datas = array('email'=> $email,
						'status' => 1);
		$this->newsletter_m->addData($datas);
		header("location:".$_SERVER['HTTP_REFERER']);
		}
	}
	
?>