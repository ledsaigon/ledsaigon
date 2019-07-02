<?php

require 'indexcontroller.php';

class News extends IndexController{

	public function __construct(){

		parent:: __construct();

		$this->load->helper('text');

		include_once(APPPATH.'controllers/class/function.php');

		$this->load->model(array('admin/categories_m','admin/articles_m','admin/configs_m'));

	}

	public function listNews($slug){

		if($slug=='bai-viet'){

			$cateObject = $this->categories_m->getAlls();

		} else{

			$cateObject = $this->categories_m->getObject('slug',$slug);

		}

		$adminCp =$this->configs_m->getValues('admincp');

		$lang = $_SESSION['lang'];

		$this->data['slug']= $slug;

		$this->data['cateObject'] = $cateObject;

		if(isset($cateObject) && !empty($cateObject)){

			if($slug=='bai-viet'){

				$this->data['cateName'] = 'Tin tức';

				$this->data['cateSlug'] = 'bai-viet';

				$title_page = 'Tin tức';

				$keyword_page = '';

				$description_page ='';

				if($adminCp['seo_web']==1){

				$title_page = 'Tin tức';

				$keyword_page = 'Tin tức';

				$description_page = 'Tin tức';

				}

				$p=$this->uri->segment('3');

				$per_page=12;

				if($p == 0)

				$page = 1;

				else

				$page = $p;

				$this->data['page'] = $page;

				$condition = "status = 1";

			}else{

				$this->data['cateName'] = $cateObject[$lang.'_name'];

				$this->data['cateSlug'] = $cateObject['slug'];

				$title_page = $cateObject[$lang.'_name'];

				$keyword_page = '';

				$description_page ='';

				if($adminCp['seo_web']==1){

				$title_page = $cateObject[$lang.'_title_site'];

				$keyword_page = $cateObject[$lang.'_keyword'];

				$description_page = $cateObject[$lang.'_description'];

				}

				$cId = $cateObject['id'];			

				$p=$this->uri->segment('3');

				$per_page=3;

				if($p == 0)

				$page = 1;

				else

				$page = $p;

				$this->data['page'] = $page;

				$allCid = $this->categories_m->arrSubCid($cateObject['id']);

				$condition = "status = 1 AND cid = $cId";

			}

			

			$total_rows=count($this->articles_m->getObjects($condition));

			$total_page = ceil($total_rows/$per_page);

			if($p>$total_page)

			$page = $total_page;

			$config['base_url']=base_url().$slug.'/page';

			$config['first_url']=base_url().$slug.'.html';

			$config['total_rows'] =$total_rows;

			$config['per_page'] = $per_page; 

			//*********************************************

			$config['full_tag_open'] = '<ul class="pagination pull-right css_title">';

	        $config['full_tag_close'] = '</ul>';

	        $config['first_link'] = false;

	        $config['last_link'] = false;

	        $config['first_tag_open'] = '<li>';

	        $config['first_tag_close'] = '</li>';

	        $config['prev_link'] = '&laquo';

	        $config['prev_tag_open'] = '<li class="prev">';

	        $config['prev_tag_close'] = '</li>';

	        $config['next_link'] = '&raquo';

	        $config['next_tag_open'] = '<li>';

	        $config['next_tag_close'] = '</li>';

	        $config['last_tag_open'] = '<li>';

	        $config['last_tag_close'] = '</li>';

	        $config['cur_tag_open'] = '<li class="active"><a href="#">';

	        $config['cur_tag_close'] = '</a></li>';

	        $config['num_tag_open'] = '<li>';

	        $config['num_tag_close'] = '</li>';

			//*********************************************

			$config['uri_segment'] = 3;

			$this->load->library('pagination');

			$this->pagination->initialize($config); 

			$this->data['listPages']=$this->pagination->create_links();

			$this->data['listNews']=$this->articles_m->getObjects($condition,$page,$per_page);

		



			# Bread crumb

	


			if($lang=='vn')
			$breadcrumb["Trang chủ"]="index.html";
			else
			$breadcrumb["Home"]="index.html";

			$breadcrumb[$cateObject[$lang.'_name']]="";

			$this->data['breadcrumb'] = $breadcrumb;







			

			$this->index('news/listnews',$title_page,$keyword_page,$description_page);

		}else $this->index('news/listnews');

	}

	

	public function listItem($slug){

		$cateObject = $this->categories_m->getObject('slug',$slug);

		$lang = $_SESSION['lang'];

		$this->data['cateObject'] = $cateObject;		



		if($cateObject){

			

			$this->data['cateName'] = $cateObject[$lang.'_name'];

			$this->data['cateSlug'] = $cateObject['slug'];

			

			$cId = $cateObject['id'];			

			$p=$this->uri->segment('3');

			$per_page=100;

			if($p == 0)

			$page = 1;

			else

			$page = $p;

			

			$condition = "status = 1 AND cid = $cId";

			$total_rows=count($this->articles_m->getObjects($condition));

			$total_page = ceil($total_rows/$per_page);

			if($p>$total_page)

			$page = $total_page;

			$config['base_url']=base_url().$slug.'/page';

			$config['first_url']=base_url().$slug.'.html';

			$config['total_rows'] =$total_rows;

			$config['per_page'] = $per_page; 

			//*********************************************

			$config['uri_segment'] = 3;

			$this->load->library('pagination');

			$this->pagination->initialize($config); 

			$this->data['listPages']=$this->pagination->create_links();

			$this->data['listItem']=$this->articles_m->getObjects($condition,$page,$per_page);

			

		}

		

		$this->index('news/detailservice');

	}

	

	public function detail($id){

		$newObject = $this->articles_m->getObject('id',$id);

		$this->data['id_news'] = $id;

		$adminCp =$this->configs_m->getValues('admincp');
		
// 		echo '<pre>';
// 		print_r($adminCp);die();

		$lang = $_SESSION['lang'];
		$this->data['lang'] = $lang;

		$this->data['active_menu'] = 4;

		

		if(isset($newObject) && !empty($newObject)){

			if($newObject['cid'] == 1) $this->data['active_menu'] = 2;

			if($newObject['cid'] == 2) $this->data['active_menu'] = 4;

			if($newObject['cid'] == 3) $this->data['active_menu'] = 5;

			if($newObject['cid'] == 4) $this->data['active_menu'] = 6;

			if($newObject['cid'] == 5) $this->data['active_menu'] = 9;

			if($newObject['cid'] == 6) $this->data['active_menu'] = 10;

			$this->load->model('admin/users_m');

			$this->data['NPP'] = $nppObjects = $this->users_m->getObject($newObject['user_id']);

			$this->data['newObject'] = $newObject;

			$this->data['properties'] = unserialize($newObject['properties']);

			$id = $newObject['id'];

			$title_page = $newObject[$lang.'_title'];

			$keyword_page = '';

			$description_page ='';

			if($adminCp['seo_web']==1){

    			$title_page = $newObject[$lang.'_title_site'];
    
    			$keyword_page = $newObject[$lang.'_keyword'];
    
    			$description_page = $newObject[$lang.'_description'];

			}
            //load danh mục
			$cateObject = $this->categories_m->getObject('id',$newObject['cid']);
			if($cateObject){
				$this->data['cateName'] = $cateObject[$lang.'_name'];
				$this->data['cateSlug'] = $cateObject['slug'];
				$cId = $cateObject['id'];
				# orther new
				$condition = "status = 1 AND cid = $cId AND id<> $id";
				$ortherNew = $this->articles_m->getObjects($condition,0,5);
				$this->data['ortherNew'] = $ortherNew;
			}

			# Bread crumb
			$breadcrumb["<i class='fa fa-home'></i> Trang chủ"]="index.html";
			$breadcrumb[$cateObject[$lang.'_name']]=base_url().$cateObject['slug'].'.html';
			$breadcrumb[$newObject[$lang.'_title']]="";
			$this->data['breadcrumb'] = $breadcrumb;

			$this->index('news/detail',$title_page,$keyword_page,$description_page);
	    }else {
	        $this->index('news/detail');
	    }

	}

	public function service(){

		$this->data['serviceObject'] = $this->categories_m->getObject('id','23');

		//$this->data['subService'] = $this->categories_m->getObjects('status = 1 AND pid = 23');

		$this->index('news/service');

		}

	public function search(){

		$keyword =  $this->input->post('keyword',TRUE);

		$keyword = str_replace('/','',$keyword);

		$keyword = str_replace("'",'',$keyword);

		$keyword = str_replace('"','',$keyword);

		$this->data['listItem'] = $this->articles_m->getObjects("status = 1 AND (`vn_title` LIKE '%$keyword%' OR `slug` LIKE '%$keyword%' OR `vn_sapo` LIKE '%$keyword%' OR `vn_detail` LIKE '%$keyword%' )");

		$this->index('news/search');

		}

}

?>