<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */
include_once('home.php');
class Gallerygroups extends Home {   
    public $data = null;
    function __construct(){
		parent::__construct();
        $this->load->model('admin/gallerygroups_m');
        $this->data['title_site'] = 'Danh sách Album';
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main($gId = 0){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$id = $this->input->post('txtArrayID');
			$this->gallerygroups_m->data['id'] = $id;
            if($this->gallerygroups_m->isDelete($id)==0){
			$this->gallerygroups_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->gallerygroups_m->data['id']);
			}else
			$this->data['error'] = 'Không được phép xóa Album này';
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
				if($this->gallerygroups_m->isDelete($data[$i]) ==0){
                $this->gallerygroups_m->data['id'] = $data[$i];
                $this->gallerygroups_m->changeStatus(2);
				}
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->gallerygroups_m->data['id'] = $this->input->post('txtArrayID');
            $this->gallerygroups_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->gallerygroups_m->data['id']);
			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->gallerygroups_m->data['id'] = $data[$i];
                $this->gallerygroups_m->changeStatus(1);		
            }
            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':
			$this->gallerygroups_m->data['id'] = $this->input->post('txtArrayID');
            $this->gallerygroups_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->gallerygroups_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->gallerygroups_m->data['id'] = $data[$i];
                $this->gallerygroups_m->changeStatus(0);
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;			
			case 'clean_trash':
			$this->gallerygroups_m->cleanTrash();
			$this->data['error'] = 'Đã dọn rác thành công';
			} // end switch
        $this->data['url_add_new'] = base_url().'AdminCP/gallerygroups/detail/new';
        $this->data['objects'] = $this->gallerygroups_m->getAlls();
		$this->load->model('admin/gallerygroups_m');
        $this->index('gallery/album','Danh sách album');
		}
    
    function detail($id='0'){
        $action = $this->input->post('action');
        $status = $this->input->post('status');
		$this->data['url_cancel'] = base_url().'AdminCP/gallerygroups/main';                    
        if($action == ''){
            $this->data['objects'] = $this->gallerygroups_m->getAlls();
            $this->gallerygroups_m->data['id'] = $id;
			$this->data['albumCombo'] = $this->gallerygroups_m->creatCombobox();
            $this->data = array_merge($this->data,$this->gallerygroups_m->select_entry());
			$this->index('gallery/album_detail','Album');
        }
        else{
			$gallery_path =  ROOT_PATH.'/uploads/galleries/';
			require_once(APPPATH.'controllers/class/filter.php');
			include_once(APPPATH.'controllers/class/function.php');
			$filter = new Filter();
			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
				if($files['name']){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
					$img = $gallery_path.$file_name;
					$img_avatar = $gallery_path.'a_'.$file_name;
					resizeImg($img,280,250,$img_avatar);
					resizeImg($img,700,7000,$img);
					@unlink($gallery_path.$this->input->post('old_avatar'));
					@unlink($gallery_path.'a_'.$this->input->post('old_avatar'));
				}else $file_name = $this->input->post('old_avatar');
			$filter = new Filter();
			$slug = $filter->filterSlug($this->input->post('slug'),'-');
			$i = 0;
			$dup = 1;
			while($dup) {
				$dup = $this->gallerygroups_m->checkDuplicateSlug($id,$slug.($i?'-'.$i:''));
				if($dup) $i++;
			}
			$slug .= $i?'-'.$i:'';
			$datas = array('pid'=> $this->input->post('pId',TRUE),
							'vn_name'=> $this->input->post('vn_name',TRUE),
							'en_name'=> $this->input->post('en_name',TRUE),
							'slug'=> $slug,
							'avatar'=> $file_name,
							'vn_detail'=> $this->input->post('vn_detail'),
							'status'=> $this->input->post('cboStatus'),
							'home'=> $this->input->post('home'),
							'is_delete'=> $this->input->post('is_delete'));
            
            if($id == 'new'){
                $this->gallerygroups_m->addData($datas);
            }
            else{
                $this->gallerygroups_m->editData($datas,$id);
            }           
            if($status == 'save')
                redirect(base_url().'AdminCP/gallerygroups/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/gallerygroups/detail/new','refresh');
        }
    }
	
}