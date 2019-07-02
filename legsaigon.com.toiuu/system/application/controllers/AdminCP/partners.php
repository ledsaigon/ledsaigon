<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */
include_once('home.php');
class Partners extends Home {
    public $data = null;
    function __construct(){
		parent::__construct();
        $this->load->model(array('admin/partners_m'));
        $this->data['title_site'] = lang('manage_partner');
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->partners_m->data['id'] = $this->input->post('txtArrayID');
            $this->partners_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->partners_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->partners_m->data['id'] = $data[$i];
                $this->partners_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->partners_m->data['id'] = $this->input->post('txtArrayID');
            $this->partners_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->partners_m->data['id']);

			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->partners_m->data['id'] = $data[$i];
                $this->partners_m->changeStatus(1);
			}
            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':
			$this->partners_m->data['id'] = $this->input->post('txtArrayID');
            $this->partners_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->partners_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->partners_m->data['id'] = $data[$i];
                $this->partners_m->changeStatus(0);		
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'sort':
			 $arrayID = $this->input->post('txtOrderID');
            $arrayValue = $this->input->post('txtOrder');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ ){
                $this->partners_m->data['cOrder'] = $arrayValue[$i];
                $this->partners_m->data['cID'] = $arrayID[$i];
                $this->partners_m->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;
			case 'clean_trash':
			$this->partners_m->cleanTrash();
			$this->data['error'] = 'Dọn rác thành công';
			} // end switch
        $this->data['url_add_new'] = base_url().'AdminCP/partners/detail/new';
        $this->data['objects'] = $this->partners_m->getAlls();
        $this->index('partners/index',lang('manage_partner'));
		}

    function detail($id='0'){
        $action = $this->input->post('action');
        $status = $this->input->post('status');
       	if($action == ''){
            $this->data['objects'] = $this->partners_m->getAlls();
            $this->partners_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->partners_m->select_entry());
			$this->index('partners/detail',lang('manage_partner'));
        }

        else {
			$gallery_path = (ROOT_PATH.'/uploads/partners/');
			require_once(APPPATH.'controllers/class/filter.php');
			include_once(APPPATH.'controllers/class/function.php');
			$filter = new Filter();
			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
				if($files['name']){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
					$image = $gallery_path.$file_name;
					$avatar = ($gallery_path.'a_'.$file_name);
					resizeImg($image,250, 250, $avatar);
					@unlink($gallery_path.$this->input->post('old_avatar'));
					@unlink($gallery_path.'a_'.$this->input->post('old_avatar'));
				}else $file_name = $this->input->post('old_avatar');
				
            $this->partners_m->data['id'] = $id;
            $this->partners_m->data['vn_name'] = $this->input->post('vn_name', TRUE);
            $this->partners_m->data['en_name'] = $this->input->post('en_name',TRUE);
			$this->partners_m->data['avatar'] = $file_name;
			$this->partners_m->data['website'] = $this->input->post('website',TRUE);
			$this->partners_m->data['address'] = $this->input->post('address',TRUE);
			$this->partners_m->data['description'] = $this->input->post('description',TRUE);
            $this->partners_m->data['status'] = $this->input->post('cboStatus');
            if($id == 'new'){
                $this->partners_m->insert_entry();
                $id = mysql_insert_id();
            }else {
                $this->partners_m->update_entry();
            }
            if($status == 'save')
                redirect(base_url().'AdminCP/partners/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/partners/detail/new','refresh');
        }
    }
}