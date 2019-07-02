<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2011
 */
include_once('home.php');
class Staticpages extends Home {    
    public $data = null;
    function __construct(){
		parent::__construct();
		$this->load->model('admin/staticpages_m','static_m');
        $this->data['title_site'] = 'Quản lý trang tĩnh';
		$this->lang->load('vi', 'vietnam/admin');
		if(!in_array($_SESSION['usersInfo']['u_type'],array(3,4)))
		redirect(base_url().'AdminCP');
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
        $this->data['url_add_new'] = base_url().'AdminCP/staticpages/detail/new';
        $this->data['stt'] = 0;
        $this->data['objects'] = $this->static_m->getAlls();
        $this->index('staticpages/index',lang('manage_static_page'));
		}
    
    function detail($id='0'){
        $action = $this->input->post('action');
        $status = $this->input->post('status');
		$this->data['url_cancel'] = base_url().'AdminCP/staticpages/main';                   
        if($action == ''){
            $this->data['liststatic_m'] = $this->static_m->getAlls();
            $this->static_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->static_m->select_entry());
			$this->index('staticpages/detail',lang('manage_static_page'));
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
            $this->static_m->data['vn_title'] = $this->input->post('vn_title', TRUE);
			$this->static_m->data['en_title'] = $this->input->post('en_title', TRUE);
            $this->static_m->data['slug'] = $this->input->post('slug');
			$this->static_m->data['vn_title_site'] = $this->input->post('vn_title_site',TRUE);
			$this->static_m->data['en_title_site'] = $this->input->post('en_title_site',TRUE);
			$this->static_m->data['vn_keyword'] = $this->input->post('vn_keyword',TRUE);
			$this->static_m->data['en_keyword'] = $this->input->post('en_keyword',TRUE);
			$this->static_m->data['vn_description'] = $this->input->post('vn_description',TRUE);
			$this->static_m->data['en_description'] = $this->input->post('en_description',TRUE);
			$this->static_m->data['vn_sapo'] = $this->input->post('vn_sapo');
            $this->static_m->data['vn_nd_1'] = ($this->input->post('vn_nd_1') !='')?$this->input->post('vn_nd_1'):'';
            $this->static_m->data['vn_nd_2'] = ($this->input->post('vn_nd_2') !='')?$this->input->post('vn_nd_2'):'';
            $this->static_m->data['vn_nd_3'] = ($this->input->post('vn_nd_3') !='')?$this->input->post('vn_nd_3'):'';
            $this->static_m->data['avatar'] = $file_name;
          
			$this->static_m->data['en_sapo'] = $this->input->post('en_sapo');
			$this->static_m->data['vn_detail'] = $this->input->post('vn_detail');
           
			$this->static_m->data['en_detail'] = $this->input->post('en_detail');
            $this->static_m->data['status'] = $this->input->post('cboStatus');
          

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
                redirect(base_url().'AdminCP/staticpages/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/staticpages/detail/new','refresh');
        }
    }
}