<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */
include_once('home.php');
class Products extends Home {   
    public $data = null;
    function __construct(){
		parent::__construct();
        $this->load->model(array('admin/products_m','admin/dothang_m'));
        $this->data['title_page'] = 'Quản lý khóa học';
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main($cId = ''){
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
        $this->index('products/products',"Quản lý khóa học");
		}
	
    function detail($id='0'){
    	
        $action = $this->input->post('action');
        $status = $this->input->post('status');
        $this->data['url_cancel'] = base_url().'AdminCP/products/main';      
		$this->load->model(array('admin/productcategories_m','admin/artists_m','admin/author_m'));
		$this->data['categoryCombo'] = $this->productcategories_m->creatCombobox();
		if(isset($id) && !empty($id) && $id !='new'){
			$detailOb = $this->products_m->getObject('id',$id);	
			if(!empty($detailOb))			
			$this->data['combo_author'] = $this->author_m->creatCombobox($detailOb['id_author']);
		
		}else{
			$this->data['combo_author'] = $this->author_m->creatCombobox();
		}
			 	


		
		$this->data['cmbDotHang'] = $this->dothang_m->creatCombobox();  
        if($action == ''){
            $this->data['objects'] = $this->products_m->getAlls();
            $this->products_m->data['id'] = $id;
			$this->load->model('admin/productcategories_m');
			
            $this->data = array_merge($this->data,$this->products_m->select_entry());
			$this->index('products/product_detail',"Quản lý khóa học");
        }
        else{
			include_once(APPPATH.'controllers/class/function.php');
			require_once(APPPATH.'controllers/class/filter.php');
			$filter = new Filter();

			$gallery_path = (ROOT_PATH.('/uploads/products/'));
			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
				if(isset($files['tmp_name']) && !empty($files['tmp_name'])){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
					$image = $gallery_path.$file_name;
					$avatar = ($gallery_path.'a_'.$file_name);
					$medium = ($gallery_path.'m_'.$file_name);
					resizeImg($image,250, 200, $avatar);
					resizeImg($image,600, 500, $medium);	
					@unlink($gallery_path.$this->input->post('old_avatar'));
					@unlink($gallery_path.'a_'.$this->input->post('old_avatar'));
					@unlink($gallery_path.'m_'.$this->input->post('old_avatar'));
		
				}else $file_name = $this->input->post('old_avatar');
			

			$gallery_path_video = (ROOT_PATH.('/uploads/videos/'));
			$files_video = isset($_FILES['file_video'])?$_FILES['file_video']:'';
				if(isset($files_video['tmp_name']) && !empty($files_video['tmp_name'])){
					$file_name_video = rand().'_'.addslashes($filter->filterName($files_video['name'],'_'));
					move_uploaded_file($files_video['tmp_name'],$gallery_path_video.$file_name_video);
					$image = $gallery_path_video.$file_name_video;
		
				}else $file_name_video = $this->input->post('old_video');
	
				




			
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
			
			$price_km = $this->input->post('price_km',TRUE);
			$price_km_new =  str_replace($str,'',$price_km);
			
			$this->products_m->data['id'] = $id;
			





            if($id == 'new'){
            	$this->data['categoryCombo'] = $this->productcategories_m->creatCombobox();
				$arrPhotos = array();
				# Files upload
			$files = isset($_FILES['files'])?$_FILES['files']:'';
			if($files) {
				
				for($i=0; $i<count($files['name']);$i++) {
					if($files['name'][$i]!=''){
					$img = addslashes((rand()."_".$filter->filterName($files['name'][$i])));
					$tmp_img = $files['tmp_name'][$i];
						# Upload
							move_uploaded_file($tmp_img,$gallery_path.$img);
							$image = $gallery_path.$img;
							$avatar = ($gallery_path.'a_'.$img);
							$medium = ($gallery_path.'m_'.$img);
							resizeImg($image,100, 100, $avatar);
							resizeImg($image,600, 500, $medium);
							$arrPhotos[] = $img;
					}
				} #/for($i=0;
			}
			$properties = array('photos' => $arrPhotos,
								'vn_img_alt' => $this->input->post('vn_img_alt'),
								'vn_img_title' => $this->input->post('vn_img_title')
								);
			$datas = array(	'cid' => $this->input->post('cId'),
							'code' => $this->input->post('code'),
							'id_author' => $this->input->post('id_author'),
							'vn_name' =>  $this->input->post('vn_name', TRUE),
							'en_name' =>  $this->input->post('en_name', TRUE),
							'mota_khoahoc' =>  $this->input->post('mota_khoahoc'),
							'chitiet_khoahoc' =>  $this->input->post('chitiet_khoahoc'),
							'slug' =>  $slug,
							'price' =>  $price_new,
							'price_km' =>  $price_km_new,
							'vn_title_site' =>  $this->input->post('vn_title_site',TRUE),
							'video' =>  $this->input->post('video',TRUE),
							'hang_sx' =>  $this->input->post('hang_sx',TRUE),
							'xuatxu' =>  $this->input->post('xuatxu',TRUE),
							'luuluong' =>  $this->input->post('luuluong',TRUE),
							'dientich_sd' =>  $this->input->post('dientich_sd',TRUE),
							'khuyenmai' =>  $this->input->post('khuyenmai',TRUE),
							'congsuat' =>  $this->input->post('congsuat',TRUE),
							'file_video' => $file_name_video,
							'en_title_site' =>  $this->input->post('en_title_site',TRUE),
							'vn_keyword' =>  $this->input->post('vn_keyword',TRUE),
							'en_keyword' =>  $this->input->post('en_keyword',TRUE),
							'size' =>  $this->input->post('size',TRUE),
							'vn_sapo' =>  $this->input->post('vn_sapo'),
							'en_sapo' =>  $this->input->post('en_sapo'),
							'vn_detail' =>  $this->input->post('vn_detail'),
							'en_detail' =>  $this->input->post('en_detail'),
							'avatar' => $file_name,
							'date_created' => date('Y-m-d'),
							'home' =>  $this->input->post('home'),
							'is_seller' =>  $this->input->post('is_seller'),
							'is_promotion' =>  $this->input->post('is_promotion'),
							'is_new' =>  $this->input->post('is_new'),
							'position' =>  $this->input->post('position',TRUE),
							'properties' =>  serialize($properties),
							'status' =>  $this->input->post('cboStatus')
							);
                $this->products_m->addData($datas);
            }else {

				$detailOb = $this->products_m->getObject('id',$id);				
			 	$properties = unserialize($detailOb['properties']);
				$arrPhotos = array();
				if(isset($properties['photos']))
				$arrPhotos = $properties['photos'];
				# Files upload
				$files = isset($_FILES['files'])?$_FILES['files']:'';
				if($files) {
					for($i=0; $i<count($files['name']);$i++) {
						if($files['name'][$i]!=''){
						$img = addslashes((rand()."_".$filter->filterName($files['name'][$i])));
						$tmp_img = $files['tmp_name'][$i];
						# Upload
						move_uploaded_file($tmp_img,$gallery_path.$img);
						$image = $gallery_path.$img;
						$avatar = ($gallery_path.'a_'.$img);
						$medium = ($gallery_path.'m_'.$img);
						resizeImg($image,150, 150, $avatar);
						resizeImg($image,600, 500, $medium);
						$arrPhotos[] = $img;
						}
					} #/for($i=0;
				}
				
				$properties = array('photos' => $arrPhotos,
								'vn_img_alt' => $this->input->post('vn_img_alt'),
								'vn_img_title' => $this->input->post('vn_img_title')
								);
				$datas = array(	'cid' => $this->input->post('cId'),
								'code' => $this->input->post('code'),
								'size' =>  $this->input->post('size',TRUE),
								'id_author' => $this->input->post('id_author'),
								'vn_name' =>  $this->input->post('vn_name', TRUE),
								'en_name' =>  $this->input->post('en_name', TRUE),
								'mota_khoahoc' =>  $this->input->post('mota_khoahoc'),
								'chitiet_khoahoc' =>  $this->input->post('chitiet_khoahoc'),
								'slug' =>  $slug,
								'price' =>  $price_new,
								'price_km' =>  $price_km_new,
								'vn_title_site' =>  $this->input->post('vn_title_site',TRUE),
								'en_title_site' =>  $this->input->post('en_title_site',TRUE),
								'vn_keyword' =>  $this->input->post('vn_keyword',TRUE),
								'en_keyword' =>  $this->input->post('en_keyword',TRUE),
								'vn_sapo' =>  $this->input->post('vn_sapo'),
								'en_sapo' =>  $this->input->post('en_sapo'),
								'vn_detail' =>  $this->input->post('vn_detail'),
								'en_detail' =>  $this->input->post('en_detail'),
								'video' =>  $this->input->post('video'),
								'hang_sx' =>  $this->input->post('hang_sx',TRUE),
								'xuatxu' =>  $this->input->post('xuatxu',TRUE),
								'luuluong' =>  $this->input->post('luuluong',TRUE),
								'dientich_sd' =>  $this->input->post('dientich_sd',TRUE),
								'khuyenmai' =>  $this->input->post('khuyenmai',TRUE),
								'congsuat' =>  $this->input->post('congsuat',TRUE),
								'avatar' => $file_name,
								'file_video' => $file_name_video,
								'date_created' => date('Y-m-d'),
								
								'home' =>  $this->input->post('home'),
								'is_seller' =>  $this->input->post('is_seller'),
								'is_promotion' =>  $this->input->post('is_promotion'),
								'is_new' =>  $this->input->post('is_new'),
								'position' =>  $this->input->post('position',TRUE),
								'properties' =>  serialize($properties),
								'status' =>  $this->input->post('cboStatus')
								);
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
	
	
	public function deleteFile($id,$file){
		if($file&&$id) {
			$detailOb = $this->products_m->getObject('id',$id);
			$properties = unserialize($detailOb['properties']);
			if(isset($properties['photos'])&&$properties['photos']==true){
			foreach($properties['photos'] as $key => $value) {
				if($value == $file) {
					unlink($gallery_path.$properties['photos'][$key]);
					unset($properties['photos'][$key]);
					$datas = array('properties' => serialize($properties));
					 $this->products_m->editData($datas,$id);
					 header("location:".base_url().'AdminCP/products/detail/'.$id);
				}
			}
			}
		}
		}
}