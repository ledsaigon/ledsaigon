<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */
include_once('home.php');
class Exhibitors extends Home {
    public $data = null;
    function __construct(){
		parent::__construct();
        $this->load->model(array('admin/exhibitors_m'));
        $this->data['title_site'] = 'Quản lý đại lý';
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->exhibitors_m->data['id'] = $this->input->post('txtArrayID');
            $this->exhibitors_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->exhibitors_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->exhibitors_m->data['id'] = $data[$i];
                $this->exhibitors_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->exhibitors_m->data['id'] = $this->input->post('txtArrayID');
            $this->exhibitors_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->exhibitors_m->data['id']);

			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->exhibitors_m->data['id'] = $data[$i];
                $this->exhibitors_m->changeStatus(1);
			}
            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':
			$this->exhibitors_m->data['id'] = $this->input->post('txtArrayID');
            $this->exhibitors_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->exhibitors_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->exhibitors_m->data['id'] = $data[$i];
                $this->exhibitors_m->changeStatus(0);		
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'sort':
			 $arrayID = $this->input->post('txtOrderID');
            $arrayValue = $this->input->post('txtOrder');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ ){
                $this->exhibitors_m->data['cOrder'] = $arrayValue[$i];
                $this->exhibitors_m->data['cID'] = $arrayID[$i];
                $this->exhibitors_m->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;
			case 'clean_trash':
			$this->exhibitors_m->cleanTrash();
			$this->data['error'] = 'Dọn rác thành công';
			} // end switch
        $this->data['url_add_new'] = base_url().'AdminCP/exhibitors/detail/new';
        $this->data['objects'] = $this->exhibitors_m->getAlls();
        $this->index('exhibitors/index','Quản lý đại lý');
		}

    function detail($id='0'){
        $action = $this->input->post('action');
        $status = $this->input->post('status');
       	if($action == ''){
            $this->data['objects'] = $this->exhibitors_m->getAlls();
            $this->exhibitors_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->exhibitors_m->select_entry());
			$this->index('exhibitors/detail','Quản lý đại lý');
        }

        else {
			$gallery_path = (ROOT_PATH.'/uploads/exhibitors/');
			include_once(APPPATH.'controllers/class/function.php');
			require_once(APPPATH.'controllers/class/filter.php');
			$filter = new Filter();
			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
				if($files['name']){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
					@unlink($gallery_path.$this->input->post('old_avatar'));
				}else $file_name = $this->input->post('old_avatar');
				
            $slug = $filter->filterSlug($this->input->post('slug'),'-');
			$i = 0;
			$dup = 1;
			while($dup) {

				$dup = $this->exhibitors_m->checkDuplicateSlug($id,$slug.($i?'-'.$i:''));

				if($dup) $i++;
			}
			$slug .= $i?'-'.$i:'';
			$properties = array('address' => $this->input->post('address', TRUE),
          					'website' => $this->input->post('website',TRUE),
		  					'telephone' => $this->input->post('telephone'),
							'fax' => $this->input->post('fax'),
							'email' => $this->input->post('email'));
			$datas = array('no' => $this->input->post('no', TRUE),
          					'name' => $this->input->post('name',TRUE),
							'slug' => $slug,
							'avatar' => $file_name,
							'properties' => serialize($properties),
		  					'detail' => $this->input->post('detail'),
							'status' => $this->input->post('cboStatus'));
            if($id == 'new'){
                $this->exhibitors_m->addData($datas);
            }else {
                $this->exhibitors_m->editData($datas,$id);
            }
            if($status == 'save')
                redirect(base_url().'AdminCP/exhibitors/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/exhibitors/detail/new','refresh');
        }
    }
}