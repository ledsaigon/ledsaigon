<?php

/**

 * @author Nguyễn Văn Thái

 * @copyright 2012

 */

include_once('home.php');

class Ads extends Home {

    public $data = null;

    function __construct(){

		parent::__construct();

        $this->load->model(array('admin/ads_m','admin/adsgroups_m'));

        $this->data['title_site'] = lang('manage_ads');

		$this->lang->load('vi', 'vietnam/admin');

		if(!in_array($_SESSION['usersInfo']['u_type'],array(3,4)))

		redirect(base_url().'AdminCP');

    }

	# main

	public function main($gId = 0){

		$action = $this->input->post('action');

		switch($action){

			case 'delete':

			$this->ads_m->data['id'] = $this->input->post('txtArrayID');

            $this->ads_m->changeStatus(2);

            $this->data['error'] = sprintf(lang('delete_item_success'),$this->ads_m->data['id']);

			break;

			case 'delete_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++){

                $this->ads_m->data['id'] = $data[$i];

                $this->ads_m->changeStatus(2);

            }

            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));

			break;

			# enable

			case 'enable':

			$this->ads_m->data['id'] = $this->input->post('txtArrayID');

            $this->ads_m->changeStatus(1);

            $this->data['error'] =  sprintf(lang('display_item_success'),$this->ads_m->data['id']);

			break;

			case 'enable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++){

                $this->ads_m->data['id'] = $data[$i];

                $this->ads_m->changeStatus(1);

            }

            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));

			break;

			# disable

			case 'disable':

			$this->ads_m->data['id'] = $this->input->post('txtArrayID');

            $this->ads_m->changeStatus(0);

            $this->data['error'] = sprintf(lang('hide_item_success'),$this->ads_m->data['id']);

			break;



			# disable all



			case 'disable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++){

                $this->ads_m->data['id'] = $data[$i];

                $this->ads_m->changeStatus(0);

            }

            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));

			break;

		

			case 'clean_trash':

			$this->ads_m->cleanTrash();

			$this->data['error'] = 'Đã dọn rác thành công';

			} // end switch

        $this->data['url_add_new'] = base_url().'AdminCP/ads/detail/new';

		$this->data['gId'] = $gId;

        $this->data['objects'] = $this->ads_m->getByGroup($gId);

		$this->load->model('admin/adsgroups_m');

		$this->data['ads_groups'] = $this->adsgroups_m->getAlls();

        $this->index('ads/index','Quản lý quảng cáo');



		}

    function detail($id='0'){

        $action = $this->input->post('action');

        $status = $this->input->post('status');

		$this->data['url_cancel'] = base_url().'AdminCP/ads/main';

           if($action == ''){

            $this->data['objects'] = $this->ads_m->getAlls();

            $this->ads_m->data['id'] = $id;

			$this->ads_m->data['gid'] = 0;

			$this->data['adsGroups'] = $this->adsgroups_m->creatCombobox();

            $this->data = array_merge($this->data,$this->ads_m->select_entry());

			$this->index('ads/detail','Quản lý quảng cáo');

        }

        else{

			$gallery_path = (ROOT_PATH.'/uploads/ads/');

			require_once(APPPATH.'controllers/class/filter.php');

			$filter = new Filter();

			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';

			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';

				if($files['tmp_name']){

					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));

					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);

					@unlink($gallery_path.$this->input->post('old_avatar'));

				}else $file_name = $this->input->post('old_avatar');

			$properties = array('width'=>$this->input->post('width'),

								'height'=>$this->input->post('height'));

            $datas = array('gid'=>$this->input->post('cboGroups'),

							'vn_name'=>$this->input->post('vn_name',TRUE),

							'en_name'=>$this->input->post('en_name',TRUE),

							'avatar'=>$file_name,

							'link'=>$this->input->post('link',TRUE),
							'position'=>$this->input->post('position',TRUE),

							'properties'=>serialize($properties),

							'status'=>$this->input->post('cboStatus'));

							

            if($id == 'new'){

                $this->ads_m->addData($datas);

        

                $id = mysql_insert_id();

            }

            else {

                $this->ads_m->editData($datas,$id);

            }

          if($status == 'save')

                redirect(base_url().'AdminCP/ads/main/'.$this->input->post('cboGroups'),'refresh');

            else if($status == 'close')

                redirect(base_url().'AdminCP','refresh');

            else

                redirect(base_url().'AdminCP/ads/detail/new','refresh');



        }



    }

}