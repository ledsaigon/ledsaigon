<?php
class home extends CI_Controller {
	function __construct(){
		parent::__construct();
       // $this->load->model('admin/Mod_viewer');
        //$this->data = $this->template_base->getDataPage_Admin();
		if(!isset($_SESSION['usersInfo']))
		redirect(base_url().'AdminCP/login');
		/*if($_SESSION['usersInfo']['u_type'] < 3)
		//echo $_SESSION['usersInfo']['u_type'];
		redirect(base_url().'AdminCP/productartists');*/
	}
	
	function index($main='',$titlePage=''){
		$language=$this->session->userdata('CI_language_admin');
		$this->data['usersInfo'] = $_SESSION['usersInfo'];
		$this->load->model('admin/configs_m');
		$adminCofigs = $this->configs_m->getValues('admincp');
		$this->data['adminCofigs'] = $adminCofigs;
		$languageSite = $adminCofigs['language'];
		$seoWeb = $adminCofigs['seo_web'];
		if($languageSite==2) $this->data['englishLang'] = 1;
		else $this->data['englishLang'] = 0;
		if($seoWeb ==1) $this->data['seoWeb'] = 1;
		else $this->data['seoWeb'] = 0;		
		$this->lang->load('vi', 'vietnam/admin');
		
	  	$this->data['title_page']=$titlePage;
		$this->load->model('admin/contacts_m');
		$this->data['contact_new_admin']=$this->contacts_m->newsMessages();
		if($main==''){
		$this->load->model(array('admin/articles_m','admin/categories_m','admin/productcategories_m','admin/products_m','admin/contacts_m','admin/counters_m'));
		
		$this->data['contact_new_admin']=$this->contacts_m->newsMessages();
		$this->data['main']='control';

		$this->load->view('admin/home',$this->data);

		}

		else

		{

			$this->data['main']=$main;
			

			$this->load->view('admin/home',$this->data);

		}

	}

	


}

 ?>