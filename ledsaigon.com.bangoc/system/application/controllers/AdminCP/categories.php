<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */
include_once('home.php');
class Categories extends Home {   
    public $data = null;
    function __construct(){
		parent::__construct();
		$this->load->model('admin/categories_m','category');
        $this->data['title_site'] = '  Quản lý chuyên mục';
		$this->lang->load('vi', 'vietnam/admin');
		if(!in_array($_SESSION['usersInfo']['u_type'],array(4)))
		redirect(base_url().'AdminCP');
    }
	public function main($pId =0){
		$action = $this->input->post('action');
		$this->load->model('admin/articles_m');
		
		switch($action){
			case 'delete':
			$id = $this->input->post('txtArrayID');
			$this->category->data['id'] = $id;
			if( $this->category->isParent($id) ==0 ){
				if($this->category->isDelete($id) == 0){
				if($this->category->changeStatus(2)){
				$this->articles_m->deleteFromCid($this->input->post('txtArrayID'),2);
				}
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->category->data['id']);
				}else {
					$name = $this->category->getName($id,'vn');
					$this->data['error'] ='Không được phép xóa chuyên mục <b>'.$name.'</b>';
				}
				}else{
					$name = $this->category->getName($id,'vn');
					$this->data['error'] ='Bạn phải xóa chuyên mục con của <b>'.$name.'</b> trước';
				}
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
				if($this->category->isParent($data[$i]) == 0 && $this->category->isDelete($data[$i])==0){
						$this->category->data['id'] = $data[$i];
		
						if( $this->category->changeStatus(2)){
		
						 $this->articles_m->deleteFromCid($data[$i],2);
						 $this->data['error'] = 'Đã xóa các mẫu tin';
		
						   }else
		
						   $this->data['error'] = 'Xóa các mẩu tin không thành công';
						} // end is_delete
						else
						$this->data['error'] = 'Xóa các mẩu tin không thành công';
						
            }// end for
			
            //$this->data['error'] = 'Đã xóa các mẫu tin';
			break;
			# enable
			case 'enable':
			$this->category->data['id'] = $this->input->post('txtArrayID');
            $this->category->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->category->data['id']);
			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->category->data['id'] = $data[$i];
                $this->category->changeStatus(1);
            }
            $this->data['error'] = 'Hiểm thị '.count($data).' mẫu tin thành công';
			break;
			# disable
			case 'disable':
			$this->category->data['id'] = $this->input->post('txtArrayID');
            if($this->category->changeStatus(0)){
				$this->articles_m->deleteFromCid($this->input->post('txtArrayID'),0);
				}
            $this->data['error'] =  sprintf(lang('hide_item_success'),$this->category->data['id']);
			break;
			# disable
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->category->data['id'] = $data[$i];
               if( $this->category->changeStatus(0)){
				 $this->articles_m->deleteFromCid($data[$i],0);
				   }else
				   $this->data['error'] = 'Ẩn các mẩu tin không thành công';
            }
            $this->data['error'] = 'Ẩn thị '.count($data).' mẫu tin thành công';
			break;
			case 'sort':
			 $arrayID = $this->input->post('positionID');
            $arrayValue = $this->input->post('position');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ ){
				$this->category->data['position'] = $arrayValue[$i];
                $this->category->data['id'] = $arrayID[$i];
                $this->category->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;
			case 'enable_home':
			$this->category->data['id'] = $this->input->post('txtArrayID');
            $this->category->changeEnableHome(1);
            $this->data['error'] =  sprintf(lang('enable_home_success'),$this->category->data['id']);
			break;
			case 'delete_home':
			$this->category->data['id'] = $this->input->post('txtArrayID');
            $this->category->changeEnableHome(0);
            $this->data['error'] =  sprintf(lang('delete_home_success'),$this->category->data['id']);
			break;
			case 'clean_trash':
			$this->category->cleanTrash();
			$this->data['error'] =  "Đã dọn rác thành công";
			break;
			} // end switch
        $this->data['pId'] = $pId;
        $this->data['url_add_new'] = base_url().'AdminCP/categories/detail/new';
        $this->data['objects'] = $this->category->getObjects("pid = $pId");
        $this->index('news/category','Quản lý chuyên mục');
		}
    function detail($id='0'){
        $action = $this->input->post('action');
        $status = $this->input->post('status');
		$this->data['url_cancel'] = base_url().'AdminCP/categories/main';
        if($action == ''){
            $this->category->data['pid'] = 0;
            $this->data['listCategory'] = $this->category->creatCombobox();
            $this->category->data['id'] = $id;
            $this->data = array_merge($this->data,$this->category->select_entry());
			$this->index('news/category_detail',' Quản lý chuyên mục');
        }
        else{
			$gallery_path = (ROOT_PATH.'/uploads/news/');
			include_once(APPPATH.'controllers/class/function.php');
			require_once(APPPATH.'controllers/class/filter.php');
			$filter = new Filter();
			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
				if($files['tmp_name']){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
					@unlink($gallery_path.$this->input->post('old_avatar'));
				}else $file_name = $this->input->post('old_avatar');
			$slug = creatSlug($this->input->post('slug'));
			$i = 0;
			$dup = 1;
			while($dup) {
				$dup = $this->category->checkDuplicateSlug($id,$slug.($i?'-'.$i:''));
				if($dup) $i++;
			}
			$slug .= $i?'-'.$i:'';
			$datas = array('pid' => $this->input->post('pId'),
							'vn_name'=> $this->input->post('vn_name', TRUE),
							'en_name'=> $this->input->post('en_name', TRUE),
							'slug'=> $slug,
							'vn_title_site'=> $this->input->post('vn_title_site', TRUE),
							'en_title_site'=> $this->input->post('en_title_site', TRUE),
							'vn_keyword'=> $this->input->post('vn_keyword', TRUE),
							'en_keyword'=> $this->input->post('en_keywords', TRUE),
							'vn_description'=> $this->input->post('vn_description', TRUE),
							'en_description'=> $this->input->post('en_description', TRUE),
							'vn_sapo'=> $this->input->post('vn_sapo'),
							'en_sapo'=> $this->input->post('en_sapo'),
							'vn_detail'=> $this->input->post('vn_detail'),
							'en_detail'=> $this->input->post('en_detail'),
							'avatar'=> $file_name,
							'position'=> $this->input->post('position'),
							'home'=> $this->input->post('home'),
							'status'=> $this->input->post('cboAccess'),
							'is_delete'=>$this->input->post('is_delete'));
            if($id == 'new'){
                $this->category->addData($datas);
            }
            else{
                $this->category->editData($datas,$id);
            }
            if($status == 'save'){
              	$url = base_url().'AdminCP/categories/main/'.$this->input->post('pId');
			    redirect($url,'refresh');
			}
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/categories/detail/new','refresh');
        }
    }
  
}