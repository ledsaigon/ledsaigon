<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2011
 */
include_once('home.php');
class Author extends Home {    
    public $data = null;
    function __construct(){
		parent::__construct();
		$this->load->model('admin/author_m','static_m');
        $this->data['title_site'] = 'Quản lý trang tĩnh';
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->static_m->data['id'] = $this->input->post('txtArrayID');
            $this->static_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->static_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->static_m->data['id'] = $data[$i];
                $this->static_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->static_m->data['id'] = $this->input->post('txtArrayID');
            $this->static_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->static_m->data['id']);
			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->static_m->data['id'] = $data[$i];
                $this->static_m->changeStatus(1);			
            }
            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':
			$this->static_m->data['id'] = $this->input->post('txtArrayID');
            $this->static_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->static_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->static_m->data['id'] = $data[$i];
                $this->static_m->changeStatus(0);			
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'sort':
			 $arrayID = $this->input->post('txtOrderID');
            $arrayValue = $this->input->post('txtOrder');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ ){
                $this->static_m->data['cOrder'] = $arrayValue[$i];
                $this->static_m->data['cID'] = $arrayID[$i];
                $this->static_m->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;
			case 'clean_trash':
			$this->static_m->cleanTrash();
			 $this->data['error'] = 'Dọn rác thành công';
			} // end switch
        $this->static_m->data['pi'] = 0;
        $this->data['url_add_new'] = base_url().'AdminCP/author/detail/new';
        $this->data['stt'] = 0;
        $this->data['objects'] = $this->static_m->getAlls();
        $this->index('author/index',lang('manage_static_page'));
		}
    
    function detail($id='0'){

        $action = $this->input->post('action');
        $status = $this->input->post('status');
		$this->data['url_cancel'] = base_url().'AdminCP/author/main';     

              
        if($action == ''){
            $this->data['liststatic_m'] = $this->static_m->getAlls();
            $this->static_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->static_m->select_entry());
			$this->index('author/detail',lang('manage_static_page'));
        }
        else{
        $gallery_path = (ROOT_PATH.'/uploads/news/');
            require_once(APPPATH.'controllers/class/filter.php');
            include_once(APPPATH.'controllers/class/function.php');
            $filter = new Filter();
            $files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
            $files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
                if(isset($files['tmp_name']) && $files['tmp_name'] !=''){
                    $file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
                    move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
                    $image = $gallery_path.$file_name;
                    $avatar = ($gallery_path.'a_'.$file_name);
                    resizeImg($image,250, 250, $avatar);
                    @unlink($gallery_path.'a_'.$this->input->post('old_avatar'));
                    @unlink($gallery_path.$this->input->post('old_avatar'));
                }else $file_name = $this->input->post('old_avatar');


            $this->static_m->data['id'] = $id;
            $this->static_m->data['name'] = $this->input->post('name', TRUE);
			$this->static_m->data['position'] = $this->input->post('position', TRUE);
            $this->static_m->data['twitter'] = $this->input->post('twitter', TRUE);
            $this->static_m->data['face'] = $this->input->post('face', TRUE);
            $this->static_m->data['instagram'] = $this->input->post('instagram', TRUE);
            $this->static_m->data['mota'] = $this->input->post('mota', TRUE);
            $this->static_m->data['avatar'] = $file_name;
            if($id == 'new')
            {

                $this->static_m->insert_entry();
                $id = mysql_insert_id();
            }
            else 
            {
                $this->static_m->update_entry();
            }
            
            if($status == 'save')
                redirect(base_url().'AdminCP/author/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/author/detail/new','refresh');
        }
    }
}