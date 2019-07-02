<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */
include_once('home.php');
class Weblinks extends Home {
     public $data = null;
    function __construct()
    {
		parent::__construct();
        $this->load->model(array('admin/weblinks_m'));
        $this->data['title_site'] = lang('manage_weblink');
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->weblinks_m->data['id'] = $this->input->post('txtArrayID');
            $this->weblinks_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->weblinks_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->weblinks_m->data['id'] = $data[$i];
                $this->weblinks_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->weblinks_m->data['id'] = $this->input->post('txtArrayID');
            $this->weblinks_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->weblinks_m->data['id']);
			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->weblinks_m->data['id'] = $data[$i];
                $this->weblinks_m->changeStatus(1);
            }
            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':
			$this->weblinks_m->data['id'] = $this->input->post('txtArrayID');
            $this->weblinks_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->weblinks_m->data['id']);

			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->weblinks_m->data['id'] = $data[$i];
                $this->weblinks_m->changeStatus(0);
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			
			case 'clean_trash':
			$this->weblinks_m->cleanTrash();
			$this->data['error'] = 'Dọn rác thành công';
			} // end switch

        $this->data['url_add_new'] = base_url().'AdminCP/weblinks/detail/new';
        $this->data['objects'] = $this->weblinks_m->getAlls();
        $this->index('weblinks/index',lang('manage_weblink'));
		}
    function detail($id='0'){
        $action = $this->input->post('action');
        $status = $this->input->post('status');                   
        if($action == ''){ 
			$this->data['objects'] = $this->weblinks_m->getAlls();
            $this->weblinks_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->weblinks_m->select_entry());
			$this->index('weblinks/detail',lang('manage_partner'));

        }
        else {
            $datas = array('vn_name'=>$this->input->post('vn_name', TRUE),
							'en_name'=>$this->input->post('en_name',TRUE),
							'link'=>$this->input->post('link',TRUE),
							'status'=>$this->input->post('cboStatus'));
            if($id == 'new') {
                $this->weblinks_m->addData($datas);
            }

            else {
                $this->weblinks_m->editData($datas,$id);
            }
            if($status == 'save')
                redirect(base_url().'AdminCP/weblinks/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/weblinks/detail/new','refresh');

        }
    }
	}