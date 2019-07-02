<?php
require_once (APPPATH.'controllers/indexcontroller.php');

class Faq extends IndexController{

	public function __construct(){

		parent:: __construct();
$this->load->model(array('admin/faq_m','admin/configs_m'));
	}

	public function getStaticContent($slug){
		$this->load->model('admin/ads_m');
		$adminCp =$this->configs_m->getValues('admincp');
		$lang =$_SESSION['lang'];
		$staticObject = $this->faq_m->getObjects();
		$this->data['lang']=$lang;
		$this->data['active_menu'] = 30;
		$name= $lang.'_name';

			$this->data['staticObject'] = objectToArray($staticObject);
			# Bread crumb
			$breadcrumb = array(
				lang('home')=> $lang."/index.html",
				"Câu hỏi thường gặp" => ""

			);
	     $this->data['breadcrumb'] = $breadcrumb;
		$this->index('faq');

	}
	public function landingPage($slug){
		//echo $slug;
		$landingPage = $this->faq_m->getObject('slug',$slug);
		if($landingPage){
			if($landingPage['status'] < 3)
			redirect(base_url());
			$this->data['landingPage'] = $landingPage;
			$this->load->view('view/landingpage',$this->data);

			}else{
				redirect(base_url());
				}
		
	}


}

?>