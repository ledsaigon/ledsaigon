<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class IndexController extends CI_Controller {
	public $data;
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('view/Mod_home');
		setlocale(LC_CTYPE, 'de_DE.UTF8');
		$this->load->model('admin/configs_m');
		$this->load->helper('text');
		include_once(APPPATH.'controllers/class/function.php');
		include_once(ROOT_PATH."/Mobile_Detect.php");
        $this->data = $this->template_base->getDataPage();
		if(!isset($_SESSION['lang'])) $_SESSION['lang']= 'vn';
		if(isset($_SESSION['cart']))$this->data['arrCart']=$_SESSION['cart'];			
	}

	public function selectLang($lang='vn'){
		$_SESSION['lang']=$lang;
		$this->lang->load($lang,$lang);
		$this->data['lang'] = $lang;
		redirect(base_url());
	}

	public function index($main='',$title_page='',$keyword_page ='', $description_page = '')

	{

		$detect = new Mobile_Detect;

		$this->data['detect'] =$detect;

		# Langues

		$lang = $_SESSION['lang'];

		$this->lang->load($lang,$lang);

		$this->data['lang'] = $lang;

		$this->data['generalConfigs'] = $generalConfigs = $this->configs_m->getValues('general');
		$titleSite = $generalConfigs[$lang.'_title_site'];
		$vn_company = $generalConfigs[$lang.'_company'];
		$diachi = $generalConfigs['diachi'];
		$toado = $generalConfigs['toado'];
		$sodienthoai = $generalConfigs['sodienthoai'];
		$email = $generalConfigs['email'];
		$tel = $generalConfigs['tel'];
		$tuvan = $generalConfigs['tuvan'];

		# title website
		$this->data['vn_company'] = $vn_company;
		$this->data['diachi'] = $diachi;
		$this->data['toado'] = $toado;
		$this->data['sodienthoai'] = $sodienthoai;

		$this->data['top_welcome'] = $generalConfigs['top_welcome'];
		$this->data['hotline'] = $generalConfigs['hotline'];
		$this->data['email'] = $email;
		$this->data['tel'] = $tel;
		$this->data['tuvan'] = $tuvan;
		$this->data['title_site'] = $titleSite;

		if($title_page) $this->data['title_site'] = $title_page;

		# Keywords website
		$keyword = $generalConfigs[$lang.'_keyword'];
		$this->data['keyword_site'] = $keyword;
		if($keyword_page) $this->data['keyword_site'] = $keyword_page;
		# Description wbsite
		$description = $generalConfigs[$lang.'_description'];
		$this->data['description_site'] = $description;
		if($description_page) $this->data['description_site'] = $description_page;

		# Hotline thông tin liên hệ
		$this->data['hotline'] = $generalConfigs['hotline'];
		$this->data['lichlam'] = $generalConfigs['lichlam'];
		$this->data['facebook'] = $generalConfigs['facebook'];
		$this->data['dangky_mail'] = $generalConfigs['dangky_mail'];
		$this->data['email'] = $generalConfigs['email'];

		# userInfo
		if(isset($_SESSION['userInfo']))
		{
			$userInfo =$_SESSION['userInfo'];
			$this->data['userInfo'] =$userInfo;
			$this->data['name_full'] =$userInfo->fullname;
			$this->data['username'] =$userInfo->username;
		} else {
		    $this->data['userInfo'] =FALSE;
		}
		//load các model
        $this->load->model(array('admin/galleries_m','admin/staticpages_m','admin/menu_m','admin/productcategories_m','admin/products_m','admin/articles_m', 'admin/ads_m'));
        
		if($main==''){
		    //trường hợp vào trang chủ/home sẽ load homePage
			$this->data['active_menu']=1;
			$this->data['home'] = 1;
			$main = 'home';
			$this->homePage();
		} // end main=''

		$this->data['main']=$main;
		
		//$this->getBaner();
		# get Partner
		//$this->listPartners();//load nhưng không sài
		#weblink
		//$this->listWeblinks();
		#user online
		$this->userOnline();
		
        //load chung
            //ở top header
            $this->data['icon_top'] = objectToArray($this->ads_m->getObjects(18));//danh sách icon
            //end top header
            
            //ở header
            $this->data['menuTop'] = $this->menu_m->getObjects('status = 1');//menu
            $this->data['bannerTop'] = $this->ads_m->getObject(1);//hình gogo
            //end header
            
            //ở slider
            $this->data['listSlide'] = objectToArray($this->ads_m->getObjects(6));//danh sách slider
            //end slider
            
        	//ở sidebar left
		    $this->getSupports();#get Suport 
		    $this->data['listGallery'] = $this->galleries_m->getObjects('status = 1');//ở sidebar left
		    $this->data['dm_spham'] = $this->productcategories_m->getObjects('status = 1 AND pid = 0');//load ở sidebar left danh mục sản phẩm
		    //end sidebar left
		    
		    //ở footer
            $this->data['chinhsach_menu']=$this->articles_m->getObjects('status = 1 AND cid = 2');//chính sách và quy định chung ở footer
            $this->data['icon_footer'] = objectToArray($this->ads_m->getObjects(14));
            //end footer
		//end load chung


		$this->data['contact'] = $this->staticpages_m->getObject('slug','contact-home');// load ở trang liên hệ

		
		//$this->data['thicong_menu']=$this->articles_m->getObjects('status = 1 AND cid = 4');//trang giớ thiệu gioi-thieu.html

// 								echo '<pre>';
// 		print_r($this->data['thicong_menu']);die();

		if($generalConfigs['offline'])

		$this->load->view('view/offline',$this->data);

		else

		$this->load->view('view/index',$this->data);
	}

	# home page

	public function homePage(){
		//giấy chứng nhận home
        $this->data['giay_chung_nhan'] = objectToArray($this->ads_m->getObjects(21));//
        $this->data['sp_banchay'] = $this->products_m->getObjects('status = 1 AND home = 1');//sp bán chạy
		$this->data['hinh_anh_cong_trinh'] = $this->articles_m->getObjects('status = 1 AND cid = 3');//dự án
        $this->data['tintuc_home']=$this->articles_m->getObjects('status = 1 AND cid = 1', 1, 6);//tin tức
	}

	# Supports

	public function getSupports(){
		$this->load->model('admin/supports_m');
		$this->data['support'] = objectToArray($this->supports_m->getObjects('status = 1'));

	}

	# Banner 

	public function getBaner(){

		$this->load->model('admin/ads_m');

		

		$this->data['adsHome'] = $this->ads_m->getObjects(7);

		

		$this->data['quangcao_spmoi'] = $this->ads_m->getObjects(8);

		$this->data['logo_inside'] = $this->ads_m->getObjects(9);

		$this->data['danhmuc_index'] = $this->ads_m->getObjects(10);


		$this->data['img_sp_moi'] = objectToArray($this->ads_m->getObject(15));


		$this->data['img_banner_top'] = objectToArray($this->ads_m->getObjects(19));

		

		$this->data['text_top'] = $this->ads_m->getObject(20);

		

		$this->data['text_banner'] = $this->ads_m->getObject(16);

		$this->data['text_logo'] = $this->ads_m->getObject(12);

		$this->data['img_duan_slider'] = objectToArray($this->ads_m->getObject(17));

		}

	# Sitremap

	public function siteMap(){

		$generalConfigs = $this->configs_m->getValues('general');

		$this->data['active_menu']=0;

		$this->index('sitemap',$generalConfigs['sitemap_title'],$generalConfigs['sitemap_key'],$generalConfigs['sitemap_des']);

		}

	# Google maps

	public function bando(){

		$this->data['active_menu']=7;

		$this->index('bando');

		}

	# Parner

	public function listPartners(){

		$this->load->model('admin/partners_m');

		$this->data['listPartners'] = $this->partners_m->getObjects();

	}

	# links

	public function listWeblinks(){

		$this->load->model('admin/weblinks_m');

		$this->data['listWeblinks'] = $this->weblinks_m->getObjects();

		}

	public function gmap(){

		$this->index('gmap');

		}

	public function load_spham_moi(){

		$this->load->model(array('admin/products_m'));

		$id=$_POST['id'];

		$this->data['id']= $id;

		if($id==0){

			$this->data['products_sp_ajax'] = $this->products_m->getObjects('status = 1 AND is_new = 1');

		}else if($id==1){

			$this->data['products_sp_ajax'] = $this->products_m->getObjects('status = 1 AND is_seller = 1');

		}else if($id==2){

			$this->data['products_sp_ajax'] = $this->products_m->getObjects('status = 1 AND khuyenmai > 0');

		}

		$this->load->view('view/ajax/spmoi',$this->data);

		}

	public function video(){

		$this->load->model('admin/galleries_m');

		$this->data['active_menu']=7;

		$this->data['video']= $this->galleries_m->getObjects('status = 1 AND ab_id = 1');

		$this->index('video',$this->data);

		}

	public function thuonghieu(){

		$this->load->model('admin/galleries_m');

		$this->data['active_menu']=4;

		$this->data['thuonghieu']= $this->galleries_m->getObjects('status = 1 AND ab_id = 1');

		$breadcrumb["<i class='fa fa-home'></i> Trang chủ"]="index.html";

		$breadcrumb['Thương hiệu']="thuong-hieu.html";

			$this->data['breadcrumb'] = $breadcrumb;

		$this->index('thuonghieu',$this->data);

		}

	public function load_size($id,$tontai){

		unset($_SESSION['size']);

		unset($_SESSION['id']);

		$id= $id;	

		$_SESSION['size']= $tontai;

		$_SESSION['id']= $id;

	      $data['tontai'] = $_SESSION['size'];

	      $data['id'] = $_SESSION['id'];

	      $this->load->view('view/ajax/load_tontai',$data);



    }	

	public function userOnline(){

		$session_id = session_id();

		$time = time();

		$timeRefresh = 15*60;

		$timeNew = $time - $timeRefresh;

		$local = $_SERVER['PHP_SELF'];

		

		$this->load->model(array('admin/useronline_m','admin/counters_m'));

		$this->counters_m->resetCounter();

		

		$check = $this->useronline_m->checkExits($session_id);

		if($check==1){

			$this->useronline_m->updateTime($time,$local,$session_id);

			}else{

				$datas =  array('session_id'=>$session_id,

						'time' => $time,

						'local' => $local);

				$this->useronline_m->addDatas($datas);

				$this->counters_m->update();

				}

		

		$this->useronline_m->clear($timeNew);

		

		/*$counter = $this->counters_m->getCounter();


		$datas = array('today' => ($counter->today +1),

						'week' => ($counter->week +1),

						'month' => ($counter->month +1),

						'year' => ($counter->year +1/2));*/

		

		$counters = $this->counters_m->getCounter();

		

		$this->data['counters'] = $counters;

		$this->data['userOnline'] = $this->useronline_m->getOnline();

		

		}	

}

?>

