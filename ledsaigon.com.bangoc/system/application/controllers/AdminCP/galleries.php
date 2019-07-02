<?php
/**
* @author Nguyễn Văn Thái
 * @copyright 2012
 */
include_once('home.php');
class Galleries extends Home {
    public $data = null;
    function __construct(){
	parent::__construct();
  	$this->load->model('admin/galleries_m');
   	$this->data['title_site'] = lang('manage_gallery');
	$this->lang->load('vi', 'vietnam/admin');
    }
	public function main($abId = 0){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->galleries_m->data['id'] = $this->input->post('txtArrayID');
            $this->galleries_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->galleries_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->galleries_m->data['id'] = $data[$i];
                $this->galleries_m->changeStatus(2);
				}
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->galleries_m->data['id'] = $this->input->post('txtArrayID');
            $this->galleries_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->galleries_m->data['id']);
			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->galleries_m->data['id'] = $data[$i];
                $this->galleries_m->changeStatus(1);
            }
           $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':			
			$this->galleries_m->data['id'] = $this->input->post('txtArrayID');
            $this->galleries_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->galleries_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->galleries_m->data['id'] = $data[$i];
                $this->galleries_m->changeStatus(0);
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'clean_trash':
			$this->galleries_m->cleanTrash();
			$this->data['error'] = 'Đã dọn rác thành công';
			} // end switch
        $this->data['url_add_new'] = base_url().'AdminCP/galleries/detail/new';
		$this->load->model('admin/gallerygroups_m');
        $this->data['objects'] = $this->galleries_m->getByAlbum($abId);
		$this->data['abId'] = $abId;
		$this->data['listAlbum'] = $this->gallerygroups_m->getAlls();
       $this->index('gallery/index',lang('manage_gallery'));
		}
    function detail($id='0'){
        $action = $this->input->post('action');
        $status = $this->input->post('status');                 
        if($action == ''){
            $this->data['objects'] = $this->galleries_m->getAlls();
            $this->galleries_m->data['id'] = $id;
			$this->load->model('admin/gallerygroups_m');
			$this->data['albumCombo'] = $this->gallerygroups_m->creatCombobox();
		    $this->data = array_merge($this->data,$this->galleries_m->select_entry());
			$this->index('gallery/detail',lang('manage_gallery'));
        }
        else{
			$gallery_path =  ROOT_PATH.'/uploads/galleries/';
			require_once(APPPATH.'controllers/class/filter.php');
			include_once(APPPATH.'controllers/class/function.php');
			$filter = new Filter();
			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
				if($files['tmp_name']){
					// var_dump($files);
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					// echo $file_name; die;
					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
					$img = $gallery_path.$file_name;
					$img_avatar = $gallery_path.'a_'.$file_name;
					$img_medium = $gallery_path.'m_'.$file_name;
					resizeImg($img,250,200,$img_avatar);
					resizeImg($img,800,700,$img_medium);
					@unlink($gallery_path.$this->input->post('old_avatar'));
					@unlink($gallery_path.'a_'.$this->input->post('old_avatar'));
					@unlink($gallery_path.'m_'.$this->input->post('old_avatar'));
				}else $file_name = $this->input->post('old_avatar');
            $datas = array('ab_id'=>$this->input->post('cboAlbum',TRUE),
							'vn_name'=>$this->input->post('vn_name',TRUE),
							'en_name'=>$this->input->post('en_name',TRUE),
							'avatar'=>$file_name,
							'link_video'=>$this->input->post('link_video',TRUE),
							'date_created'=>date('m - d -Y'),
							//'detail'=>$this->input->post('detail'),
							'status'=>$this->input->post('cboStatus')
							);
           if($id == 'new'){
                $this->galleries_m->addData($datas);
           }
            else {
                $this->galleries_m->editData($datas,$id);
            }
            if($status == 'save')
              redirect(base_url().'AdminCP/galleries/main/'.$this->input->post('cboAlbum').'','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/galleries/detail/new','refresh');
        }
    }
}