<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */

include_once('home.php');
class Productcategories extends Home {
    public $data = null;
    function __construct(){
		parent::__construct();
		$this->load->model('admin/productcategories_m','ProductCate');
        $this->data['title_site'] = '  Quản lý danh mục khóa học';
		$this->lang->load('vi', 'vietnam/admin');
    }
	public function main($pId=0){
		$action = $this->input->post('action');
		$this->load->model(array('admin/productcategories_m','admin/products_m'));
		switch($action){
			case 'delete':
			$id = $this->input->post('txtArrayID');
			$this->ProductCate->data['id'] = $id;
			if( $this->ProductCate->isParent($id) ==0 ){
				if($this->ProductCate->changeStatus(2)){
				$this->products_m->deleteFromCid($this->input->post('txtArrayID'),2);

				}
         $this->data['error'] = sprintf(lang('delete_item_success'),$this->ProductCate->data['id']);
				}else

				$this->data['error'] ='Không được phép xóa';

			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->ProductCate->data['id'] = $data[$i];
				if($this->ProductCate->isParent($data[$i]) ==0 ){
                if( $this->ProductCate->changeStatus(2)){
				 $this->products_m->deleteFromCid($data[$i],2);
				}
				   }else
				   $this->data['error'] = 'Xóa các mẩu tin không thành công';
            }

            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;

			# enable

			case 'enable':
			$this->ProductCate->data['id'] = $this->input->post('txtArrayID');
            $this->ProductCate->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->ProductCate->data['id']);
			break;

			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->ProductCate->data['id'] = $data[$i];
                $this->ProductCate->changeStatus(1);
            }
            $this->data['error'] = 'Hiểm thị '.count($data).' mẫu tin thành công';
			break;

			# disable

			case 'disable':
			$this->ProductCate->data['id'] = $this->input->post('txtArrayID');
            if($this->ProductCate->changeStatus(0)){
				$this->products_m->deleteFromCid($this->input->post('txtArrayID'),0);
				}

            $this->data['error'] =  sprintf(lang('hide_item_success'),$this->ProductCate->data['id']);

			break;

			# disable

			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->ProductCate->data['id'] = $data[$i];
               if( $this->ProductCate->changeStatus(0)){
				 $this->products_m->deleteFromCid($data[$i],0);
				   }else
				   $this->data['error'] = 'Ẩn các mẩu tin không thành công';
            }
            $this->data['error'] = 'Ẩn thị '.count($data).' mẫu tin thành công';
			break;

			case 'sort':
			$arrayID = $this->input->post('positionID');
          	$arrayValue = $this->input->post('position');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ ){
                $this->ProductCate->data['position'] = $arrayValue[$i];
                $this->ProductCate->data['id'] = $arrayID[$i];
                $this->ProductCate->sort_entry();
            }

            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;

			case 'enable_home':
			$this->ProductCate->data['id'] = $this->input->post('txtArrayID');
            $this->ProductCate->changeEnableHome(1);
            $this->data['error'] =  sprintf(lang('enable_home_success'),$this->ProductCate->data['id']);

			break;

			case 'delete_home':
			$this->ProductCate->data['id'] = $this->input->post('txtArrayID');
            $this->ProductCate->changeEnableHome(0);
            $this->data['error'] =  sprintf(lang('delete_home_success'),$this->ProductCate->data['id']);

			break;

			case 'clean_trash':
			$this->ProductCate->cleanTrash();
			$this->data['error'] =  "Đã dọn rác thành công";
			break;

			} // end switch


        $this->data['url_add_new'] = base_url().'AdminCP/productcategories/detail/new';
        $this->data['pId'] = $pId;
        $this->data['listProductCate'] = $this->productcategories_m->getAlls();
        $this->index('products/category','Quản lý danh mục khóa học');
		}

    function detail($id='0'){
        $action = $this->input->post('action');
        $status = $this->input->post('status');
		$this->load->model(array('admin/categoriesfactory_m'));
		$this->data['url_cancel'] = base_url().'AdminCP/productcategories/main';

        if($action == ''){
            $this->ProductCate->data['pid'] = 0;
            $this->data['listProductCate'] = $this->ProductCate->creatCombobox();			
            $this->ProductCate->data['id'] = $id;
            $this->data = array_merge($this->data,$this->ProductCate->select_entry());
			$this->index('products/category_detail',' Quản Lý khóa học');

        }
        else{
			include_once APPPATH.'controllers/class/function.php';
			require_once(APPPATH.'controllers/class/filter.php');
			$filter = new Filter();
			$gallery_path = (ROOT_PATH.('/uploads/products/'));
			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
				if(isset($files['tmp_name']) && !empty($files['tmp_name'])){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
					@unlink($gallery_path.$this->input->post('old_avatar'));
		
				}else $file_name = $this->input->post('old_avatar');



				$files_bg = isset($_FILES['avatar_bg'])?$_FILES['avatar_bg']:'';
				if(isset($files_bg['tmp_name']) && !empty($files_bg['tmp_name'])){
					$file_name_bg = rand().'_'.addslashes($filter->filterName($files_bg['name'],'_'));
					move_uploaded_file($files_bg['tmp_name'],$gallery_path.$file_name_bg);
					@unlink($gallery_path.$this->input->post('old_avatar_bg'));
		
				}else $file_name_bg = $this->input->post('old_avatar_bg');


			$slug = creatSlug($this->input->post('vn_name'));
			$i = 0;
			$dup = 1;
			while($dup) {
				$dup = $this->ProductCate->checkDuplicateSlug($id,$slug.($i?'-'.$i:''));
				if($dup) $i++;
			}
			$slug .= $i?'-'.$i:'';			
			$this->ProductCate->data['id'] = $id;
			$pId = $this->input->post('pId');
			$datas = array('pid' => $pId,
							'vn_name'=>$this->input->post('vn_name', TRUE),
							'vn_sapo'=>$this->input->post('vn_sapo', TRUE),
							'en_sapo'=>$this->input->post('en_sapo', TRUE),

							'en_name'=>$this->input->post('en_name', TRUE),
							//'vn_solan_title'=>$this->input->post('vn_solan_title', TRUE),
							//'en_solan_title'=>$this->input->post('en_solan_title', TRUE),
							'slug'=>$slug,
							'vn_keyword'=>$this->input->post('vn_keyword', TRUE),
							'en_keyword'=>$this->input->post('en_keyword', TRUE),
							'vn_title_site'=>$this->input->post('vn_title_site', TRUE),
							'en_title_site'=>$this->input->post('en_title_site', TRUE),
							'vn_description'=>$this->input->post('vn_description', TRUE),
							'en_description'=>$this->input->post('en_description', TRUE),
							'avatar'=> $file_name,
							'bg_top'=> $file_name_bg,
							'position'=>$this->input->post('position'),
						   	'status'=>$this->input->post('cboAccess')
						);
            if($id == 'new'){
               $this->ProductCate->addData($datas);
            }
            else{
                $this->ProductCate->editData($datas,$id);
            }

            if($status == 'save')
                redirect(base_url().'AdminCP/productcategories/main/'.$this->input->post('pId').'','refresh');

            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/productcategories/detail/new','refresh');

        }
    }
}