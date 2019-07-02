<?php

/**

 * @author Nguyễn Văn Thái

 * @copyright 2012

 */



include_once('home.php');

class Configs extends Home {

    

    public $data = null;

    function __construct()

    {

		parent::__construct();

		$this->load->model('admin/configs_m');

        $this->data['title_site'] = 'Cấu hình ';

		$this->lang->load('vi', 'vietnam/admin');

		if(!in_array($_SESSION['usersInfo']['u_type'],array(3,4)))

		redirect(base_url().'AdminCP');

    }

	public function general(){

		//$this->data['objects'] = $this->configs_m->getConfigs();

		$this->data['general'] = $this->configs_m->getValues('general');

		

		if($_POST){

			$status = $this->input->post('status');

			$properties = array(  'vn_title_site' => $this->input->post('vn_title_site',TRUE),

							'en_title_site' => $this->input->post('en_title_site',TRUE),

							'vn_company' => $this->input->post('vn_company',TRUE),

							'en_company' => $this->input->post('en_company',TRUE),

							'top_welcome' => $this->input->post('top_welcome',TRUE),

							/*'vn_address' => $this->input->post('vn_address',TRUE),

							'en_address' => $this->input->post('en_address',TRUE),*/

							'vn_keyword' => $this->input->post('vn_keyword',TRUE),

							'en_keyword' => $this->input->post('en_keyword',TRUE),

							'vn_description' => trim($this->input->post('vn_description',TRUE)),

							'en_description' => trim($this->input->post('en_description',TRUE)),

							'email' => $this->input->post('email',TRUE),

							'diachi' => $this->input->post('diachi',TRUE),

							'toado' => $this->input->post('toado',TRUE),

							'sodienthoai' => $this->input->post('sodienthoai',TRUE),

							'vn_introduction_1' => $this->input->post('vn_introduction_1',TRUE),
							
							'vn_introduction_2' => $this->input->post('vn_introduction_2',TRUE),

							'vn_introduction_3' => $this->input->post('vn_introduction_3',TRUE),

							'en_introduction_1' => $this->input->post('en_introduction_1',TRUE),
							
							'en_introduction_2' => $this->input->post('en_introduction_2',TRUE),

							'en_introduction_3' => $this->input->post('en_introduction_3',TRUE),

							'tel' => $this->input->post('tel',TRUE),

							'tuvan' => $this->input->post('tuvan',TRUE),

							'nick_yahoo' => $this->input->post('nick_yahoo',TRUE),

							'nick_skype' => $this->input->post('nick_skype',TRUE),

							'facebook' => $this->input->post('facebook',TRUE),

							'googleplus' => $this->input->post('googleplus',TRUE),

							'twitter' => $this->input->post('twitter',TRUE),

							'sitemap_title' => $this->input->post('sitemap_title',TRUE),

							'sitemap_key' => $this->input->post('sitemap_key',TRUE),

							'lichlam' => $this->input->post('lichlam',TRUE),

							'sitemap_des' => $this->input->post('sitemap_des',TRUE),

							'hotline' => $this->input->post('hotline',TRUE),

							'name_hotline' => $this->input->post('name_hotline',TRUE),

							'offline' => $this->input->post('offline',TRUE),

							'contentOff' => $this->input->post('contentOff'),

							'dangky_mail' => $this->input->post('dangky_mail'),

							'seo_web' => $this->input->post('seoWeb',TRUE),

							'language' => $this->input->post('language',TRUE)

							//'copyright' => htmlentities($this->input->post('copyright')),

							);

			$values = array('values'=>serialize($properties));

			$this->configs_m->setValues($values,'general');

			 if($status == 'save'){

			   $this->load->library('session');

			   $this->session->set_flashdata('error', 'Cập nhật thành công');

			    redirect(base_url().'AdminCP/configs/general','refresh');

			 }else if($status == 'close')

                redirect(base_url().'AdminCP','refresh');

			} 

		$this->index('configs/general','Thiết lập thông số');

		}

	public function contact(){

		$contact =  $this->configs_m->getValues('email_acount');

		$this->data['hostmail'] =$contact['host_mail'];

		$this->data['username'] =$contact['username'];

		$this->data['password'] =$contact['password'];

		$configs =  array(array(	'field' => 'hostmail',

											'label' => 'Host mail',

											'rules' => 'trim()|required|xss_clean'),

								array(	'field' => 'username',

											'label' => 'Username',

											'rules' => 'trim()|required|xss_clean'),

								array(	'field' => 'password',

											'label' => 'Password',

											'rules' => 'trim()|required|xss_clean'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules($configs);

		$this->form_validation->set_message('required','%s Không được rỗng');

		$this->form_validation->set_error_delimiters('<p class="error">','</p>');

		if($this->form_validation->run()===FALSE){

			$this->data['error_host'] = form_error('hostmail');

			$this->data['error_user'] = form_error('username');

			$this->data['error_pass'] = form_error('password');

		

			}else{

				$properties = array();

				$properties['host_mail'] = $this->input->post('hostmail');

				$properties['username'] = $this->input->post('username');

				$properties['password'] = $this->input->post('password');

				$values =array('values' => serialize($properties));

				$this->configs_m->setValues($values,'email_acount');

				redirect($_SERVER['HTTP_REFERER']);

				$this->data['update_succes'] = 'Đã cập nhật thành công';

				}

		$this->index('configs/contact');

		

		}

	public function adminPanel(){

		

		$admincp = $this->configs_m->getValues('admincp');

		$this->data['admincp'] = $admincp;

		if($_POST){

		$properties = array();

		$properties['menu_product']= $this->input->post('menu_product');

		$properties['menu_articles']= $this->input->post('menu_articles');

		$properties['menu_static']= $this->input->post('menu_static');

		$properties['menu_ads']= $this->input->post('menu_ads');

		$properties['menu_gallery']= $this->input->post('menu_gallery');

		$properties['menu_support']= $this->input->post('menu_support');

		$properties['menu_comment']= $this->input->post('menu_comment');

		$properties['menu_partner']= $this->input->post('menu_partner');

		$properties['menu_weblink']= $this->input->post('menu_weblink');

		$properties['menu_gallery']= $this->input->post('menu_gallery');

		$properties['menu_orders']= $this->input->post('menu_orders');

		$properties['language']= $this->input->post('language');

		$properties['seo_web']= $this->input->post('seo_web');

		$values = array('values' => serialize($properties));

		$this->configs_m->setValues($values,'admincp');

		redirect($_SERVER['HTTP_REFERER']);

		}

		$this->index('configs/adminpanel');

		}

}