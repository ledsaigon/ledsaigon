<?php
require_once (APPPATH.'controllers/indexcontroller.php');

class Staticpages extends IndexController{

	public function __construct(){

		parent:: __construct();

	}

	public function getStaticContent($slug){
		$this->load->model(array('admin/staticpages_m','admin/configs_m'));
		$adminCp =$this->configs_m->getValues('admincp');
		$lang =$_SESSION['lang'];
		$staticObject = $this->staticpages_m->getObject('slug',$slug);
		$this->data['lang']=$lang;
		if($slug=='gioi-thieu') $this->data['active_menu'] = 2;
		if($slug=='chuyen-gia') $this->data['active_menu'] = 4;
		if($slug=='khuyen-mai') $this->data['active_menu'] = 3;
		if($slug=='do-sang-ss') $this->data['active_menu'] = 5;

		if($staticObject){
			$this->data['slug']= $slug;
			$title_page = $staticObject[$lang.'_title'];
			$keyword_page = '';
			$description_page ='';
			if($adminCp['seo_web']==1){
			$title_page = $staticObject[$_SESSION['lang'].'_title_site'];
			$keyword_page = $staticObject[$_SESSION['lang'].'_keyword'];
			$description_page = $staticObject[$_SESSION['lang'].'_description'];
			}
			
			$this->data['staticObject'] = $staticObject;
			$breadcrumb["Trang chủ"]="index.html";
			$breadcrumb[$staticObject['vn_title']]="";
			$this->data['breadcrumb'] = $breadcrumb;
			$this->index('staticpage',$title_page,$keyword_page,$description_page);

		}else $this->index('staticpage');

	}

}

?>