<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */

class Productartists extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model(array('admin/products_m'));
        $this->data['title_page'] = 'Quản lý sản phẩm';
		$this->lang->load('vi', 'vietnam/admin');
		$this->data['usersInfo'] = $_SESSION['usersInfo'];
    }

	# main

	public function index($cId = ''){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->products_m->data['id'] = $this->input->post('txtArrayID');
            $this->products_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->products_m->data['id']);
			break;

			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->products_m->data['id'] = $data[$i];
                $this->products_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;

			# enable
			case 'enable':
			$this->products_m->data['id'] = $this->input->post('txtArrayID');
            $this->products_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->products_m->data['id']);
			break;
			
			case 'enable_all':
			$data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->products_m->data['id'] = $data[$i];
                $this->products_m->changeStatus(1);
            }
            $this->data['error'] = sprintf(lang('display_items_success'),count($data));

			break;

			# disable 

			case 'disable':
			$this->products_m->data['id'] = $this->input->post('txtArrayID');
            $this->products_m->changeStatus(0);
            $this->data['error'] =  sprintf(lang('hide_item_success'),$this->products_m->data['id']);

			break;


			# disable all

			case 'disable_all':
			$data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->products_m->data['id'] = $data[$i];
                $this->products_m->changeStatus(0);

            };
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));

			break;
			
			case 'enable_home':
			$this->products_m->data['id'] = $this->input->post('txtArrayID');
            $this->products_m->changeEnableHome(1);
            $this->data['error'] =  sprintf(lang('enable_home_success'),$this->products_m->data['id']);

			break;

			case 'delete_home':
			$this->products_m->data['id'] = $this->input->post('txtArrayID');
            $this->products_m->changeEnableHome(0);
            $this->data['error'] =  sprintf(lang('delete_home_success'),$this->products_m->data['id']);

			break;

			case 'sort':
            $arrayID = $this->input->post('positionID');
            $arrayValue = $this->input->post('position');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ ){
                $this->products_m->data['position'] = $arrayValue[$i];
                $this->products_m->data['id'] = $arrayID[$i];
                $this->products_m->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';

			break;

			case 'clean_trash':

			$this->products_m->cleanTrash();
			$this->data['error'] = "Dọn rác thành công";

			} // end switch



        $this->products_m->data['cid'] = 0;
		$this->data['url_add_new'] = base_url().'AdminCP/products/detail/new';

		if($cId){
			$this->data['cat_id'] = $cId;
			$this->data['objects'] = $this->products_m->getFromPid($cId);
	
			}else
			$this->data['objects'] = $this->products_m->getAlls();

		$this->load->model('admin/productcategories_m');
		$this->data['listCategory'] = $this->productcategories_m->getSubCateFromPid(0);
        $this->load->view('admin/artists/products',$this->data);
		}

	
    function detail($id='0'){

        $action = $this->input->post('action');
        $status = $this->input->post('status');
        $this->data['url_cancel'] = base_url().'AdminCP/products/main';      
		$this->load->model(array('admin/productcategories_m','admin/artists_m'));
		$this->data['categoryCombo'] = $this->productcategories_m->creatCombobox();
		$this->data['artistsCombo'] = $this->artists_m->creatCombobox();    

        if($action == ''){
            $this->data['objects'] = $this->products_m->getAlls();
            $this->products_m->data['id'] = $id;
			$this->load->model('admin/productcategories_m');
			$this->data['categoryCombo'] = $this->productcategories_m->creatCombobox();
            $this->data = array_merge($this->data,$this->products_m->select_entry());
			$this->index('products/product_detail',lang('manage_product'));

        }

        else{
			include_once(APPPATH.'controllers/class/function.php');
			require_once(APPPATH.'controllers/class/filter.php');
			$filter = new Filter();
			$gallery_path = (ROOT_PATH.('/uploads/products/'));
			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
				if($files['tmp_name']){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
					$image = $gallery_path.$file_name;
					$avatar = ($gallery_path.'a_'.$file_name);
					$medium = ($gallery_path.'m_'.$file_name);
					resizeImg($image,250, 200, $avatar);
					resizeImg($image,800, 700, $medium);	
					@unlink($gallery_path.$this->input->post('old_avatar'));
					@unlink($gallery_path.'a_'.$this->input->post('old_avatar'));
					@unlink($gallery_path.'m_'.$this->input->post('old_avatar'));
		
				}else $file_name = $this->input->post('old_avatar');
			
			
			$deleteAvatar = $this->input->post('deleteAvatar',true);
		  	if($deleteAvatar==1){
			   @unlink($gallery_path.$this->input->post('old_avatar'));
			   $file_name='no-image.jpg';
		   }
			$slug = $filter->filterSlug($this->input->post('slug'),'-');

			$i = 0;
			$dup = 1;
			while($dup) {
				$dup = $this->products_m->checkDuplicateSlug($id,$slug.($i?'-'.$i:''));
				if($dup) $i++;

			}

			$slug .= $i?'-'.$i:'';
			$price = $this->input->post('price',TRUE);
			$str =  array('.',',',';',' ');
			$price_new =  str_replace($str,'',$price);
			
			$this->products_m->data['id'] = $id;
			$properties = array(
								'sapo' => $this->input->post('sapo'));

			$datas = array(	'cid' => $this->input->post('cId'),
							'code' => $this->input->post('code'),
							'aid' => $this->input->post('aId'),
							'size' => htmlspecialchars($this->input->post('size')),
							'vn_name' =>  $this->input->post('vn_name', TRUE),
							'en_name' =>  $this->input->post('en_name', TRUE),
							'slug' =>  $slug,
							'price' =>  $price_new,
							'vn_title_site' =>  $this->input->post('vn_title_site',TRUE),
							'en_title_site' =>  $this->input->post('en_title_site',TRUE),
							'vn_keyword' =>  $this->input->post('vn_keyword',TRUE),
							'en_keyword' =>  $this->input->post('en_keyword',TRUE),
							'vn_description' =>  $this->input->post('vn_description',TRUE),
							'en_description' =>  $this->input->post('en_description',TRUE),
							'vn_detail' =>  $this->input->post('vn_detail'),
							'en_detail' =>  $this->input->post('en_detail'),
							'avatar' => $file_name,
							'date_created' => date('Y-m-d'),
							'home' =>  $this->input->post('home'),
							'is_seller' =>  $this->input->post('is_seller'),
							'position' =>  $this->input->post('position',TRUE),
							'properties' =>  serialize($properties),
							'status' =>  $this->input->post('cboStatus')
							);

            if($id == 'new'){
                $this->products_m->addData($datas);
            }else {
                $this->products_m->editData($datas,$id);
            }

            if($status == 'save')
               redirect(base_url().'AdminCP/products/main/'.$this->input->post('cId').'','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/products/detail/new','refresh');
        }
    }

}