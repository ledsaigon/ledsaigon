<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	public $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('view/Mod_viewer');
		$this->load->model('view/Mod_home');
		$this->load->model('admin/configs_m');
        $this->data = $this->template_base->getDataPage();
		if(!isset($_SESSION['lang'])) $_SESSION['lang']= 'vn';
	}
	
	public function index($main='',$title_page='',$keyword_page ='', $description_page = '')
	{
		
		# Langues
		$lang = $_SESSION['lang'];
		$this->lang->load($lang,$lang);
		$this->data['lang'] = $lang;
		
		$configSite = $this->configs_m->getConfigs();
		$site_name = $lang.'_site_name';
		# title website
		$this->data['title_site'] = $configSite->$site_name;
		if($title_page !='') $this->data['title_site'] = $this->data['title_site'].' - '.$title_page;
		# Keywords website
		$keyword = $lang.'_keyword';
		$this->data['keyword_site'] = $configSite->$keyword;
		if($keyword_page !='') $this->data['keyword_site'] = $keyword_page;
		# Description wbsite
		
		$description = $lang.'_description';
		$this->data['description_site'] = $configSite->$description;
		if($description_page !='') $this->data['description_site'] = $description_page;
		
		if($main==''){
			$this->data['active_menu']=1;
			$main = 'products/home';
			$this->homePage();
		} // end main=''
		
		$this->data['main']=$main;
		$this->getBaner();
		# get Partner
		$this->listPartners();
		# get Suport
		$this->getSupports();
		# get Counter
		$this->Counter();
		# get Weblink
		$this->listWeblinks();
		# configsite
		$this->data['configSite'] = $configSite;
		$this->data['category'] = $this->Mod_home->getProCateFromPid();
		$this->load->view('view/index',$this->data);
		
	}
	# home page
	public function homePage(){
		$this->load->model('admin/productcategories_m','proCate');
		$this->data['listCateHome'] = $this->proCate->getByHome(1);
	}
	function Get_lienket()
	{
		$this->load->model('view/Mod_viewer');
		if($this->session->userdata('CI_language_id')=='' || $this->session->userdata('CI_language_id')==NULL)
		$this->session->set_userdata('CI_language_id',1);
		$this->Mod_viewer->data['langID'] = $this->session->userdata('CI_language_id');
		$this->data['lienket_list']=$this->Mod_viewer->Get_lienket();
	}
	function Get_truycap()
	{
		$this->load->model('view/Mod_home');
		if($this->session->userdata('CI_language_id')=='' || $this->session->userdata('CI_language_id')==NULL)
		$this->session->set_userdata('CI_language_id',1);
		$this->Mod_home->data['langID'] = $this->session->userdata('CI_language_id');
		$this->data['thong_so_truy_cap']=$this->Mod_home->Get_truycap();
		return $this->data['thong_so_truy_cap'];
	}
	function contact()
	{
		$this->load->model('view/Mod_home');
		$this->data['active_menu']=5;
		$this->load->model('admin/Mod_contact');
		$this->load->library('email');  
		$this->load->model('user/Mod_home');
		$thongtinMail = $this->Mod_home->Get_thongtinMail();
		$this->data['title_site'] = " - ".$thongtinMail['config_sitename'];
		$this->data['thongtin_lienhe_contact']=$this->Mod_home->Get_thongtin_contact();
		$action = $this->input->post('action');  
		include_once(ROOT_PATH."/captcha/authimg.php");
		$AuthImage = new AuthImage();
		$siteConfigs = $this->configs_m->getConfigs();
 
       if($action == 'send')
       {
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
                     'rules'   => 'required|trim()'
                  )
            );
		$this->load->library('form_validation');
		$this->form_validation->set_message('required', '%s - '.lang('not_empty'));
		$this->form_validation->set_message('valid_email', '%s - '.lang('invalid'));
		$this->form_validation->set_message('numeric', '%s - '.lang('invalid'));
		
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() ===FALSE){
			$this->data['error_fullname'] = form_error('fullname');
			$this->data['error_title'] = form_error('title');
			$this->data['error_content'] = form_error('content');
			$this->data['error_email'] = form_error('email');
			$this->data['error_cell'] = form_error('cell');
			$this->data['error_security'] = form_error('security');
			$this->data['fullname'] = $this->input->post('fullname');
			$this->data['address'] = $this->input->post('address');
			$this->data['email'] = $this->input->post('email');
			$this->data['cell'] = $this->input->post('cell');
			$this->data['title'] = $this->input->post('title');
			$this->data['content'] = $this->input->post('content');
			}else
				{
				if(strtolower($_SESSION['captcha'])!=strtolower(($this->input->post('security')))){
				$this->data['error_security'] = lang('security_not_corect');
				$this->data['fullname'] = $this->input->post('fullname');
				$this->data['address'] = $this->input->post('address');
				$this->data['email'] = $this->input->post('email');
				$this->data['cell'] = $this->input->post('cell');
				$this->data['title'] = $this->input->post('title');
				$this->data['content'] = $this->input->post('content');
				$this->form_validation->run() ===FALSE;
				}else{
                $this->Mod_contact->data['ctFullName'] = $this->input->post('fullname');
                $this->Mod_contact->data['ctPhone'] = $this->input->post('cell');
				$this->Mod_contact->data['cAddress'] = $this->input->post('address');
                $this->Mod_contact->data['ctEmail'] = $this->input->post('email');
                $this->Mod_contact->data['ctContent'] = $this->input->post('content');
                $this->Mod_contact->data['ctSubject'] = $this->input->post('title');
                $this->Mod_contact->data['ctStatus'] = 0;
              $fromMail = $thongtinMail['mail_setting_smtp_username'];
                $toMail = $this->input->post('email');
                $subJect = $thongtinMail['mail_setting_subject_email'];
                
                $message = $thongtinMail['cms_contact_contact'];
                $message = str_replace('@Fullname',$this->input->post('fullname'),$message);
                $message = str_replace('@Phone',$this->input->post('cell'),$message);
				$message = str_replace('@Address',$this->input->post('address'),$message);
				$message = str_replace('@title',$this->input->post('title'),$message);
               // $message = str_replace('@fax',$this->input->post('mobile'),$message);
                $message = str_replace('@Email',$this->input->post('email'),$message);
                $message = str_replace('@Content',$this->input->post('content'),$message);
				$message = str_replace('@Date',date('d-m-Y'),$message);
            	require_once(APPPATH.'controllers/phpmailer/email.php');
				$email =  new Email();
		 		$company = $_SESSION['lang'].'_company';
				$from = array('name'=>$siteConfigs->$company,'email'=>'info@thuanthanhco.com');
			# sent to admin
				$option = array('subject'=>lang('contact_title'),'content'=>$message);
				$toAdmin = array('name'=>'Admin','email'=>$siteConfigs->email);
				$email->sendMail($from,$toAdmin,$option);
				
                $feedback = $thongtinMail['cms_contact_feedback'];
                $feedback = str_replace('@Date',date('d-m-Y'),$feedback);
				$feedback = str_replace('@SiteName',$this->data['title_site'],$feedback);
                $feedback = str_replace('@Fullname',$this->input->post('fullname'),$feedback);
              # feeback 
			  $toCustomer = array('name'=>$this->input->post('fullname'),'email'=>$this->input->post('email'));
			  $option2 = array('subject'=>lang('title_feedback'),'content'=>$feedback);
			  $email->sendMail($from,$toCustomer,$option2);
			 
			  unset($_SESSION['captcha']);
               $this->data['send_mail_success'] = lang('send_contact_success'); 
                
                if($this->Mod_contact->insert_entry() == 1)
                {
                    $this->data['error'] = lang('send_contact_success');
                    $this->data['style_success'] = 'display:block;';
                }
                else
                {
                    $this->data['error'] = lang('info_contact_no_right');
                    $this->data['style_error'] = 'display:block;';
                }
            }
					}
      }
		$this->index('contact');
	}
	function Counter($onl=0,$count=0)
        {
            $expire = 600;
            $filename = "publics/counter.txt"; 
            if (file_exists($filename)) 
            {
               $ignore = false;
               $current_agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? addslashes(trim($_SERVER['HTTP_USER_AGENT'])) : "no agent";
               $current_time = time();
               $current_ip = $_SERVER['REMOTE_ADDR']; 
               // daten einlesen
               $c_file = array();
               $handle = fopen($filename, 'r');
               if ($handle)
               {
                  while (!feof($handle)) 
                  {
                     $line = trim(fgets($handle, 4096)); 
            		 if ($line != "")
            		    $c_file[] = $line;		  
                  }
                  fclose ($handle);
               }
               else
                  $ignore = true;
               
               // bots ignorieren   
               if (substr_count($current_agent, "bot") > 0)
                  $ignore = true;
               // hat diese ip einen eintrag in den letzten expire sec gehabt, dann igornieren?
               for ($i = 1; $i < sizeof($c_file); $i++)
               {
                  list($counter_ip, $counter_time) = explode("||", $c_file[$i]);
            	  $counter_time = trim($counter_time);
            	  
            	  if ($counter_ip == $current_ip && $current_time-$expire < $counter_time)
            	  {
            	     // besucher wurde bereits gez?t, daher hier abbruch
            		 $ignore = true;
            		 break;
            	  }
               }
               // counter hochz?en
               if ($ignore == false)
               {
                  if (sizeof($c_file) == 0)
                  {
            	     // wenn counter leer, dann f??n      
            		 $add_line1 = date("z") . ":1||" . date("W") . ":1||" . date("n") . ":1||" . date("Y") . ":1||1||1||" . $current_time . "\n";
            		 $add_line2 = $current_ip . "||" . $current_time . "\n";
          		 // daten schreiben
            		 $fp = fopen($filename,'w+');
            		 if ($fp)
                     {
            		    flock($fp, LOCK_EX);
            			fwrite($fp, $add_line1);
            		    fwrite($fp, $add_line2);
            			flock($fp, LOCK_UN);
            		    fclose($fp);
            		 }
            		 
            		 // werte zur verf??g stellen
            		 $day = $week = $month = $year = $all = $record = 1;
            		 $record_time = $current_time;
            		 $online = 1;
            	  }
                  else
            	  {
            	     // counter hochz?en
            		 list($day_arr, $week_arr, $month_arr, $year_arr, $all, $record, $record_time) = explode("||", $c_file[0]);
            		 
            		 // day
            		 $day_data = explode(":", $day_arr);
            		 $day = $day_data[1];
            		 if ($day_data[0] == date("z")) $day++; else $day = 1;
            		 
            		 // week
            		 $week_data = explode(":", $week_arr);
            		 $week = $week_data[1];
            		 if ($week_data[0] == date("W")) $week++; else $week = 1;
            		 
            		 // month
            		 $month_data = explode(":", $month_arr);
            		 $month = $month_data[1];
            		 if ($month_data[0] == date("n")) $month++; else $month = 1;
            		 
            		 // year
            		 $year_data = explode(":", $year_arr);
            		 $year = $year_data[1];
            		 if ($year_data[0] == date("Y")) $year++; else $year = 1;
            		  
            		 // all
            		 $all++;
            		 
            		 // neuer record?
            		 $record_time = trim($record_time);
            		 if ($day > $record)
            		 {
            		    $record = $day;
            			$record_time = $current_time;
            		 }
         		 // speichern und aufr?en und anzahl der online leute bestimmten
         		 $online = 1;
            		 // daten schreiben
            		 $fp = fopen($filename,'w+');
            		 if ($fp)
                     {
            		    flock($fp, LOCK_EX);
            			$add_line1 = date("z") . ":" . $day . "||" . date("W") . ":" . $week . "||" . date("n") . ":" . $month . "||" . date("Y") . ":" . $year . "||" . $all . "||" . $record . "||" . $record_time . "\n";		 
            		    fwrite($fp, $add_line1);
            		 
            		    for ($i = 1; $i < sizeof($c_file); $i++)
                        {
                           list($counter_ip, $counter_time) = explode("||", $c_file[$i]);
            	  
            	           // ??nehmen
            		   	   if ($current_time-$expire < $counter_time)
            	           {
            	              $counter_time = trim($counter_time);
            				  $add_line = $counter_ip . "||" . $counter_time . "\n";
            			      fwrite($fp, $add_line);
            			      $online++;
            	           }
                        }
            		    $add_line = $current_ip . "||" . $current_time . "\n";
            		    fwrite($fp, $add_line);
            		    flock($fp, LOCK_UN);
            		    fclose($fp);
            	     }
            	  }
               }
               else
               {
                  // nur zum anzeigen lesen
            	  if (sizeof($c_file) > 0)
            	     list($day_arr, $week_arr, $month_arr, $year_arr, $all, $record, $record_time) = explode("||", $c_file[0]);
            	  else
            		 list($day_arr, $week_arr, $month_arr, $year_arr, $all, $record, $record_time) = explode("||", date("z") . ":1||" . date("W") . ":1||" . date("n") . ":1||" . date("Y") . ":1||1||1||" . $current_time);
            	  // day
            	  $day_data = explode(":", $day_arr);
                  $day = $day_data[1];
           	  // week
            	  $week_data = explode(":", $week_arr);
            	  $week = $week_data[1];
          	  // month
            	  $month_data = explode(":", $month_arr);
            	  $month = $month_data[1];
         	  // year
            	  $year_data = explode(":", $year_arr);
            	  $year = $year_data[1];
          	  $record_time = trim($record_time);
 
            	  $online = sizeof($c_file) - 1;
               }
              $CI =& get_instance();
            $CI->load->library('common');
         $this->data['num_online']=$online + $onl;
		$this->data['counter']=$year + $count;
        }
	}
	# Get all product prom id category
	public function listProductFromPid($slug=''){
		$this->load->model('view/Mod_home');
		$categoryObjects = $this->Mod_home->getProCateFromSlug($slug);
		$lang = $_SESSION['lang'];
		$name = $lang.'_name';
		$keywords = $lang.'_keywords';
		$description = $lang.'_description';
		if($categoryObjects){
			$cat_id = $categoryObjects->id;
			$this->data['cId'] = $cat_id;
		 	$this->data['cat_name'] = $categoryObjects->$name;
			$this->data['cat_slug'] = $categoryObjects->slug;
			$start_row=$this->uri->segment('5');
			settype($start_row,"integer");
			$per_page=15;
			if(trim($start_row)=='')
			{
				$start_row=0;
			}
			$total_rows=count($this->Mod_home->getProductFromCid($cat_id,-1,-1));
			$config['base_url']=base_url().$_SESSION['lang'].'/category/'.$categoryObjects->slug.".html";
			$config['total_rows'] =$total_rows;
			$config['per_page'] = $per_page; 
			//*********************************************
			$config['uri_segment'] = 4;
			$this->load->library('pagination');
			$this->pagination->initialize($config); 
			$this->data['phantrang']=$this->pagination->create_links();
			$this->data['soluong_mautin']=$total_rows;
			$this->data['mautin_dautien']=$start_row+1;
			if(($start_row+$per_page)>$total_rows)
			$this->data['mautin_cuoicung']=$total_rows;
			else
			$this->data['mautin_cuoicung']=$start_row+$per_page;
			$this->data['listProducts']=$this->Mod_home->getProductFromCid($cat_id,$start_row,$per_page);
			$this->index('products/categorys',$categoryObjects->$name,$categoryObjects->$keywords,$categoryObjects->$description);
		}else
			$this->index('products/categorys');
	}
	# Get all product prom id category
	public function listProducts($pid){
		$this->load->model('view/Mod_home');
		$this->data['active_menu'] = 3;
		$start_row= $this->uri->segment('2');
		settype($start_row,"integer");
		$per_page=15;
		if(trim($start_row)=='')
		{
			$start_row=0;
		}
		 $total_rows=count($this->Mod_home->getProducts(-1,-1));
		$config['base_url']=base_url().$_SESSION['lang']."/products.html";
		$config['total_rows'] =$total_rows;
		$config['per_page'] = $per_page; 
		//*********************************************
		$config['uri_segment'] = 3;
		$this->load->library('pagination');
		$this->pagination->initialize($config); 
		$this->data['phantrang']=$this->pagination->create_links();
		$this->data['soluong_mautin']=$total_rows;
		$this->data['mautin_dautien']=$start_row+1;
		if(($start_row+$per_page)>$total_rows)
		$this->data['mautin_cuoicung']=$total_rows;
		else
		$this->data['mautin_cuoicung']=$start_row+$per_page;
		$this->data['listProducts']=$this->Mod_home->getProducts($start_row,$per_page);
		$this->index('products/allproducts',lang('product'));
	}
	# Get all product prom id category
	public function detailProduct($slug=''){
		$this->load->model('view/Mod_home');
		$this->data['active_menu'] = 3;
		$lang = $_SESSION['lang'];
		$name = $lang.'_name';
		$productObject = $this->Mod_home->getProductFromSlug($slug);
		if($productObject){
			$this->data['productObject'] = $productObject;
			$cat_id = $productObject->cid;
			$categoryObjects = $this->Mod_home->getProCateFromId($cat_id);
			if($categoryObjects){
				$cat_id = $categoryObjects->id;
				$this->data['cat_name'] = $categoryObjects->$name;
				$this->data['cat_slug'] = $categoryObjects->slug;
			}
			$otherProducts = $this->Mod_home->getOrtherProduct($cat_id,$productObject->id);
			if($otherProducts)
			$this->data['otherProducts'] = $otherProducts;
			$this->index('products/detail',$productObject->$name);
		}else $this->index('products/detail');
	}
	# Supports
	public function getSupports(){
		$this->load->model('view/mod_home');
		$this->data['listSupport'] = $this->mod_home->getListSupport();
		}
	# Banner 
	public function getBaner(){
		# Banner
		$this->load->model('admin/ads_m');
		$this->data['banner'] = $this->ads_m->getObject(3);
		$this->data['listSlide'] = $this->ads_m->getObjects(4);
		}
	# Sitremap
	public function siteMap(){
		$this->data['active_menu']=6;
		$this->index('sitemap','Sitemap');
		}
	# Parner
	public function listPartners(){
		$this->load->model('admin/partners_m');
		$this->data['listPartnes'] = $this->partners_m->getObjects();
		}
	# links
	public function listWeblinks(){
		$this->load->model('admin/weblinks_m');
		$this->data['listWeblinks'] = $this->weblinks_m->getObjects();
		}
	# Search 
	public function Search(){
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
		}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>
