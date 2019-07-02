<?php

/**

 * @author Nguyễn Văn Thái

 * @copyright 2012

 */

include_once('home.php');

class Adsgroups extends Home {

    

    public $data = null;

    function __construct(){

		parent::__construct();

        $this->load->model(array('admin/adsgroups_m','admin/adsgroups_m'));

        $this->data['title_site'] = 'Nhóm quảng cáo';

		$this->lang->load('vi', 'vietnam/admin');

    }

	# main

	public function main($gId = 0){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->adsgroups_m->data['id'] = $this->input->post('txtArrayID');
            $this->adsgroups_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->adsgroups_m->data['id']);

			break;

			case 'delete_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++){

                $this->adsgroups_m->data['id'] = $data[$i];

                $this->adsgroups_m->changeStatus(2);

            }

            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));

			break;

			# enable

			case 'enable':

			$this->adsgroups_m->data['id'] = $this->input->post('txtArrayID');

            $this->adsgroups_m->changeStatus(1);

            $this->data['error'] =  sprintf(lang('display_item_success'),$this->adsgroups_m->data['id']);

			break;

			case 'enable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++){

                $this->adsgroups_m->data['id'] = $data[$i];

                $this->adsgroups_m->changeStatus(1);

				

            }

            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));

			break;

			# disable

			case 'disable':

			$this->adsgroups_m->data['id'] = $this->input->post('txtArrayID');

            $this->adsgroups_m->changeStatus(0);

            $this->data['error'] = sprintf(lang('hide_item_success'),$this->adsgroups_m->data['id']);

			break;

			# disable all

			case 'disable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->adsgroups_m->data['id'] = $data[$i];
                $this->adsgroups_m->changeStatus(0);
            }

            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));

			break;
			case 'clean_trash':
			$this->adsgroups_m->cleanTrash();

			$this->data['error'] = 'Đã dọn rác thành công';

			} // end switch

        $this->data['url_add_new'] = base_url().'AdminCP/adsgroups/detail/new';
        $this->data['objects'] = $this->adsgroups_m->getAlls();
		$this->load->model('admin/adsgroups_m');

        $this->index('ads/groups','Nhóm quảng cáo');

		}

    function detail($id='0'){

        $action = $this->input->post('action');
        $status = $this->input->post('status');
		$this->data['url_cancel'] = base_url().'AdminCP/adsgroups/main';
        if($action == ''){
            $this->data['objects'] = $this->adsgroups_m->getAlls();
            $this->adsgroups_m->data['id'] = $id;
			$this->adsgroups_m->data['gid'] = 0;
			$this->data['adsGroups'] = $this->adsgroups_m->getAlls();
            $this->data = array_merge($this->data,$this->adsgroups_m->select_entry());
			$this->index('ads/groups_detail','Nhóm quảng cáo');
        }
        else{
            $datas = array('id'=> $id,
							'vn_name'=> $this->input->post('vn_name',TRUE),
							'en_name'=> $this->input->post('en_name',TRUE),
							'status'=> $this->input->post('cboStatus'));

            if($id == 'new'){
                $this->adsgroups_m->addData($datas);

            }

            else{
                $this->adsgroups_m->editData($datas,$id);

            }
            
            if($status == 'save')

                redirect(base_url().'AdminCP/adsgroups/main/','refresh');

            else if($status == 'close')

                redirect(base_url().'AdminCP','refresh');

            else

                redirect(base_url().'AdminCP/adsgroups/detail/new','refresh');

        }

    }

	

}