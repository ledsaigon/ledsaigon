<?php

require_once (APPPATH.'controllers/indexcontroller.php');

class Products extends IndexController {

	public function __construct(){

		parent::__construct();

		$this->data['menuProduct'] =1;

		$this->load->model(array('admin/productcategories_m','admin/products_m'));

	}

	# Get all product 

	public function listCategory($slug=''){

		$listCategory = $this->productcategories_m->getObjects('status = 1');

		$this->data['listCategory'] =  $listCategory;

		

		

		$this->index('products/categories',lang('product'));

	}

	

	

	# Get all product from  category

	public function listProductFromCate($slug=''){

		$this->load->model(array('admin/productcategories_m','admin/products_m','admin/menu_m'));

		$cateObjects = $this->productcategories_m->getObject('slug',$slug);

		# Langues

		if(!isset($_SESSION['lang'])) $lang = 'vn';
		 
		$lang = $_SESSION['lang'];

		$this->lang->load($lang,$lang);

		$this->data['lang'] = $lang;

		

		$this->data['cateObjects'] = $cateObjects;

		

		if($cateObjects){

			$url= $cateObjects['slug'].'.html';

    		$this->data['menuTop'] = $this->menu_m->getObjects("status = 1");
    
    		$menutop= $this->data['menuTop'];
    
    		foreach ($menutop as $key => $value) {
    
    			if($value['url']== $url){
        
        			$this->data['active_menu']= $value['id'];
        
        		}
    
    		}

		

			$cat_id = $cateObjects['id'];

			$allPid = $this->productcategories_m->subCateId($cat_id);

			$this->data['cateSub'] = $this->productcategories_m->getObjects('status = 1 AND pid = '.$cat_id);

			$pId = $cateObjects['pid'];

			$this->data['pId'] = $pId;

			$this->data['cId'] = $cat_id;

		 	$this->data['cat_name'] = $cateObjects[$lang.'_name'];

		 	$this->data['mota'] = $cateObjects[$lang.'_sapo'];

			$this->data['cat_slug'] = $cateObjects['slug'];

			

			$p=$this->uri->segment('3');

			settype($p,"integer");

			$per_page=12;

			if($p==0)

			$page = 1;

			else

			$page = $p;

			$condition ="status = 1 AND cid in ($allPid)";

			$total_rows=count($this->products_m->getObjects($condition));

			$total_page = ceil($total_rows/$per_page);

			if($p>$total_page)

			$page = $total_page;

			$config['base_url']=base_url().$cateObjects['slug']."/page";

			$config['first_url']=base_url().$cateObjects['slug'].".html";

			$config['total_rows'] =$total_rows;

			$config['per_page'] = $per_page; 

			//*********************************************

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

			$config['uri_segment'] =3;

			$this->load->library('pagination');

			$this->pagination->initialize($config); 

			$this->data['listPages']=$this->pagination->create_links();

			$this->data['listProducts']=$this->products_m->getObjects($condition,$page,$per_page);

			$adminCp =$this->configs_m->getValues('admincp');

			$title_page = $cateObjects[$lang.'_name'];

			$keyword_page = '';

			$description_page ='';

			if($adminCp['seo_web']==1){

			$title_page = $cateObjects[$lang.'_title_site'];

			$keyword_page = $cateObjects[$lang.'_keyword'];

			$description_page = $cateObjects[$lang.'_description'];

			}

			# Bread crumb

			if($lang=='vn')
			$breadcrumb["Trang chủ"]="index.html";
			else
			$breadcrumb['Home']="index.html";


			$breadcrumb[$cateObjects[$lang.'_name']]="";

			$this->data['breadcrumb'] = $breadcrumb;

			$this->index('products/productfromcategory',$title_page,$keyword_page,$description_page);
			
		}else {
		    $this->index('products/productfromcategory');
		}

	}

	public function productFromDH($id){

		$this->load->model('admin/dothang_m');

		

		# Langues

		$lang = $this->uri->segment(1);

		if(!$lang||strlen($lang)>2)

		$lang = 'vn';

		$this->lang->load($lang,$lang);

		$this->data['lang'] = $lang;

		$this->data['nameDH'] = $nameDH = $this->dothang_m->getField('name',$id);

		$slug = $this->dothang_m->getField('slug',$id);

		

		

		$p=$this->uri->segment('3');

		settype($p,"integer");

		$per_page=16;

		if($p==0)

		$page = 1;

		else

		$page = $p;

		$condition ="status = 1 AND dh = $id";

		$total_rows=count($this->products_m->getObjects($condition));

		$total_page = ceil($total_rows/$per_page);

		if($p>$total_page)

		$page = $total_page;

		$config['base_url']=base_url().$slug."-d$id/page";

		$config['first_url']=base_url().$slug."-d$id.html";

		$config['total_rows'] =$total_rows;

		$config['per_page'] = $per_page; 

		//*********************************************

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

		$config['uri_segment'] =3;

		$this->load->library('pagination');

		$this->pagination->initialize($config); 

		$this->data['listPages']=$this->pagination->create_links();

		$this->data['listProducts']=$this->products_m->getObjects($condition,$page,$per_page);

		

		# Bread crumb

		/*$breadCrumbs = array(array(	'name'=>'Style', 'url' =>base_url()),

							array(	'name'=>$cateObjects['vn_name'], 'url' =>'')

);

		$this->data['breadCrumbs'] = $breadCrumbs;*/

		$this->index('products/dothang',$nameDH);

	}

	

	

	public function factory(){

		$this->index('products/factories');

		}

	public function spMoi(){

		# Langues

		$lang = $this->uri->segment(1);

		if(!$lang||strlen($lang)>2)

		$lang = 'vn';

		$this->lang->load($lang,$lang);

		$this->data['lang'] = $lang;

		

		$p = (int)$this->uri->segment('3');

		$per_page=20;

		if($p==0)

		$page = 1;

		else

		$page = $p;

		$condition ="status = 1 and is_new >0";

		$total_rows=count($this->products_m->getObjects($condition));

		$total_page = ceil($total_rows/$per_page);

		if($p>$total_page)

		$page = $total_page;

		$config['base_url']=base_url().'/san-pham-moi/page';

		$config['first_url']=base_url().'/san-pham-moi.html';

		$config['total_rows'] =$total_rows;

		$config['per_page'] = $per_page; 

		//*********************************************

		$config['uri_segment'] = 3;

		$this->load->library('pagination');

		$this->pagination->initialize($config); 

		$this->data['listPages']=$this->pagination->create_links();

		$this->data['listProducts']=$this->products_m->getObjects($condition,$page,$per_page);

		$breadcrumb["<i class='fa fa-home'></i> Trang chủ"]="index.html";

			$breadcrumb['Sản phẩm']="san-pham.html";

			$breadcrumb['Sản phẩm mới']="";

			$this->data['breadcrumb'] = $breadcrumb;

		$this->index('products/spmoi');

	}	



















public function proNoibat(){

		# Langues

		$lang = $this->uri->segment(1);

		if(!$lang||strlen($lang)>2)

		$lang = 'vn';

		$this->lang->load($lang,$lang);

		$this->data['lang'] = $lang;

		

		$p = (int)$this->uri->segment('3');

		$per_page=16;

		if($p==0)

		$page = 1;

		else

		$page = $p;

		$condition ="status = 1 and is_seller =1";

		$total_rows=count($this->products_m->getObjects($condition));

		$total_page = ceil($total_rows/$per_page);

		if($p>$total_page)

		$page = $total_page;

		$config['base_url']=base_url().'/san-pham-noi-bat/page';

		$config['first_url']=base_url().'/san-pham-noi-bat.html';

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

		$this->data['listProducts']=$this->products_m->getObjects($condition,$page,$per_page);

		$breadcrumb["<i class='fa fa-home'></i> Trang chủ"]="index.html";

			$breadcrumb['Sản phẩm']="san-pham.html";

			$breadcrumb['Sản phẩm mới']="";

			$this->data['breadcrumb'] = $breadcrumb;

		$this->index('products/allproduct');

	}	







public function proMoinhat(){

		# Langues

		$lang = $this->uri->segment(1);

		if(!$lang||strlen($lang)>2)

		$lang = 'vn';

		$this->lang->load($lang,$lang);

		$this->data['lang'] = $lang;

		

		$p = (int)$this->uri->segment('3');

		$per_page=16;

		if($p==0)

		$page = 1;

		else

		$page = $p;

		$condition ="status = 1 and home =1";

		$total_rows=count($this->products_m->getObjects($condition));

		$total_page = ceil($total_rows/$per_page);

		if($p>$total_page)

		$page = $total_page;

		$config['base_url']=base_url().'/san-pham-moi-nhat/page';

		$config['first_url']=base_url().'/san-pham-moi-nhat.html';

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

		$this->data['listProducts']=$this->products_m->getObjects($condition,$page,$per_page);

		$breadcrumb["<i class='fa fa-home'></i> Trang chủ"]="index.html";

			$breadcrumb['Sản phẩm']="san-pham.html";

			$breadcrumb['Sản phẩm mới']="";

			$this->data['breadcrumb'] = $breadcrumb;

		$this->index('products/allproduct');

	}	



public function proKhuyenmai(){

		# Langues

		$lang = $this->uri->segment(1);

		if(!$lang||strlen($lang)>2)

		$lang = 'vn';

		$this->lang->load($lang,$lang);

		$this->data['lang'] = $lang;

		

		$p = (int)$this->uri->segment('3');

		$per_page=16;

		if($p==0)

		$page = 1;

		else

		$page = $p;

		$condition ="status = 1 and is_new =1";

		$total_rows=count($this->products_m->getObjects($condition));

		$total_page = ceil($total_rows/$per_page);

		if($p>$total_page)

		$page = $total_page;

		$config['base_url']=base_url().'/san-pham-khuyen-mai/page';

		$config['first_url']=base_url().'/san-pham-khuyen-mai.html';

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

		$this->data['listProducts']=$this->products_m->getObjects($condition,$page,$per_page);

		$breadcrumb["<i class='fa fa-home'></i> Trang chủ"]="index.html";

			$breadcrumb['Sản phẩm']="san-pham.html";

			$breadcrumb['Sản phẩm mới']="";

			$this->data['breadcrumb'] = $breadcrumb;

		$this->index('products/allproduct');

	}	









	public function allProducts(){

		# Langues
		if(!isset($_SESSION['lang'])) $lang = 'vn';
		 
		$lang = $_SESSION['lang'];

		$this->lang->load($lang,$lang);

		$this->data['lang'] = $lang;

		

		$p = (int)$this->uri->segment('3');

		$per_page=16;

		if($p==0)

		$page = 1;

		else

		$page = $p;

		$condition ="status = 1";

		$total_rows=count($this->products_m->getObjects($condition));

		$total_page = ceil($total_rows/$per_page);

		if($p>$total_page)

		$page = $total_page;

		$config['base_url']=base_url().'/san-pham/page';

		$config['first_url']=base_url().'/san-pham.html';

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

		$this->data['listProducts']=$this->products_m->getObjects($condition,$page,$per_page);

		$breadcrumb["<i class='fa fa-home'></i> Trang chủ"]="index.html";

		$breadcrumb['Sản phẩm']="";

		$this->data['breadcrumb'] = $breadcrumb;

		$this->index('products/allproduct');

	}

	

	

	

	# Get all product from  category

	public function listProductPromotion(){

		# Langues

		$lang = $this->uri->segment(1);

		if(!$lang||strlen($lang)>2)

		$lang = 'vn';

		$this->lang->load($lang,$lang);

		$this->data['lang'] = $lang;

		$this->data['active_menu'] =5;

			

		$p=$this->uri->segment('3');

		$per_page=16;

		if($p==0)

		$page = 1;

		else

		$page = $p;

		$condition ="status = 1 AND is_promotion";

		$total_rows=count($this->products_m->getObjects($condition));

		$total_page = ceil($total_rows/$per_page);

		if($p>$total_page)

		$page = $total_page;

		$config['base_url']=base_url().'khuyen-mai/page';

		$config['first_url']=base_url().'khuyen-mai.html';

		$config['total_rows'] =$total_rows;

		$config['per_page'] = $per_page; 

		//*********************************************

		$config['uri_segment'] =3;

		$this->load->library('pagination');

		$this->pagination->initialize($config); 

		$this->data['listPages']=$this->pagination->create_links();

		$this->data['listProducts']=$this->products_m->getObjects($condition,$page,$per_page);

		$this->index('products/productpromotion',lang('promotion'));

			

	}

	

	# Detail product

	public function detailProduct($id){

		$this->load->model(array('admin/author_m','admin/productcategories_m','admin/products_m','admin/configs_m','admin/menu_m'));

		# Langues

		if(!isset($_SESSION['lang'])) $lang = 'vn';
		 
		$lang = $_SESSION['lang'];

		$this->lang->load($lang,$lang);

		$this->data['lang'] = $lang;

		

		$productObject = $this->products_m->getObject('id',$id);

		$this->data['productDetail'] = 1;

		if(!empty($productObject)){

			$this->products_m->updateField($id,$productObject['view']+1,'view');

			$this->data['productObject'] = $productObject;

			$this->data['properties'] = unserialize($productObject['properties']);

			$cat_id = $productObject['cid'];

			$categoryObjects = $this->productcategories_m->getObject('id',$cat_id);

			$this->data['cateObjects'] = $categoryObjects;

			if($categoryObjects){

				$cat_id = $categoryObjects['id'];

				$this->data['cateName'] = $categoryObjects[$lang.'_name'];

				$this->data['cat_slug'] = $categoryObjects['slug'];

				$this->data['pId'] = $categoryObjects['pid'];

				$this->data['cId'] = $categoryObjects['id'];	

			}

			$productId = $productObject['id'];

			$otherProducts = $this->products_m->getObjects("status = 1   AND cid = ".$productObject['cid']." AND id <> $id",1,6,'id','DESC');

			if($otherProducts)

			$this->data['otherProducts'] = $otherProducts;

			

			$adminCp =$this->configs_m->getValues('admincp');

			$title_page = $productObject[$lang.'_name'];

			$this->data['title_page'] = $title_page;

			$keyword_page = '';

			$description_page ='';

			if($adminCp['seo_web']==1){

			$title_page = $productObject[$lang.'_title_site'];

			$keyword_page = $productObject[$lang.'_keyword'];

			$description_page = $productObject[$lang.'_description'];

			}







			$breadcrumb["<i class='fa fa-home'></i> Trang chủ"]="index.html";

			$breadcrumb['Sản phẩm']="san-pham.html";

			$breadcrumb[$productObject[$lang.'_name']]="";

			$this->data['breadcrumb'] = $breadcrumb;





			$this->index('products/detail',$title_page,$keyword_page,$description_page);

		}else $this->index('products/detail');

		

	}

	

	# Search 

	public function searchWithAlpha($alpha){

		# Bread crumb

			$breadCrumbs = array(array(	'name'=>'Search', 'url' =>'')

								//array(	'name'=>$cateObjects['vn_name'], 'url' =>'')

	);

			$this->data['breadCrumbs'] = $breadCrumbs;

		$this->data['alpha'] = $alpha;

		$alpha1 = strtolower($alpha);

		$this->load->model('admin/artists_m');

		$condition = "status = 1 AND (name LIKE '$alpha%' OR slug LIKE '$alpha1%')";

		$this->data['listArtists'] = $this->artists_m->getObjects($condition);

		$this->index('products/searchartists');

		}

	/*public function Search(){

		$keyword = $this->input->post('keyword',TRUE);

		$keyword = str_replace("\"",'',$keyword);

		$keyword = str_replace("'",'',$keyword);

		$keyword = str_replace("\\",'',$keyword);

		$this->load->model('admin/products_m');

		$listProducts= $this->products_m->search($keyword);

		$this->data['listProducts'] = $listProducts;

		$this->data['count'] = count($listProducts);

		$this->data['search_key'] = $keyword;

		$this->index('products/search');

		}*/

	public function Search(){

		

		$breadcrumb["<i class='fa fa-home'></i> Trang chủ"]="index.html";

		$breadcrumb['Tìm kiếm']="";

		$this->data['breadcrumb'] = $breadcrumb;

		$keyword = $this->input->post('keyword',TRUE);

		$keyword = str_replace("\"",'',$keyword);

		$keyword = str_replace("'",'',$keyword);

		$keyword = str_replace("\\",'',$keyword);

		$cid = $this->input->post('cid',TRUE);

		if($keyword != "" || $cid != "" ){

			$this->load->model(array('admin/products_m'));

			$condition = 'status = 1';

			if($keyword)

			$condition .= "  AND (vn_name LIKE '%$keyword%' OR code  LIKE '%$keyword%' OR slug  LIKE '%$keyword%')";

			if($cid){

				$allCid = $this->productcategories_m->subCateId($cid);

				$condition .= " AND cid in ($allCid)";

			}

			$this->data['listProducts'] = $this->products_m->getObjects($condition);

			$listProducts= $this->data['listProducts'];

			$this->data['search_key'] = $keyword;

			$this->data['countResult']=count($listProducts);

			}else

			$this->data['listProducts'] = '';

		$this->data['search_key'] = $keyword;

		$this->index('products/search');

		}

	}

?>