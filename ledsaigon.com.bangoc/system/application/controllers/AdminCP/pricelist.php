<?php

/**

 * @author Nguyễn Văn Thái

 * @copyright 2012

 */



include_once('home.php');

class Pricelist extends Home {

    

    public $data = null;

    function __construct()

    {

		parent::__construct();

        $this->load->model('admin/pricelist_m');

        $this->data['title_site'] = 'Bảng giá sản phẩm';

		$this->lang->load('vi', 'vietnam/admin');

    }

	# main

	public function main($gId = 0){

		$action = $this->input->post('action');

		switch($action){

			case 'delete':
			$id = $this->input->post('txtArrayID');

			$this->pricelist_m->data['id'] = $id;

            if($this->pricelist_m->isParent($id)==0){
			$this->pricelist_m->changeStatus(2);

            $this->data['error'] = sprintf(lang('delete_item_success'),$this->pricelist_m->data['id']);
			}else
			$this->data['error'] = 'Bạn phải xóa danh mục con trước';

			break;

			case 'delete_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {
				if($this->pricelist_m->isParent($data[$i]) ==0){
                $this->pricelist_m->data['id'] = $data[$i];

                $this->pricelist_m->changeStatus(2);
				}

            }

            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));

			break;

			# enable

			case 'enable':

			$this->pricelist_m->data['id'] = $this->input->post('txtArrayID');

            $this->pricelist_m->changeStatus(1);

            $this->data['error'] =  sprintf(lang('display_item_success'),$this->pricelist_m->data['id']);

			break;

			case 'enable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->pricelist_m->data['id'] = $data[$i];

                $this->pricelist_m->changeStatus(1);

				

            }

            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));

			break;

			# disable

			case 'disable':

			$this->pricelist_m->data['id'] = $this->input->post('txtArrayID');

            $this->pricelist_m->changeStatus(0);

            $this->data['error'] = sprintf(lang('hide_item_success'),$this->pricelist_m->data['id']);

			break;

			# disable all

			case 'disable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->pricelist_m->data['id'] = $data[$i];

                $this->pricelist_m->changeStatus(0);

				

            }

            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));

			break;

			case 'sort':

            $arrayID = $this->input->post('positionID');

            $arrayValue = $this->input->post('position');

            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ )

            {

                $this->pricelist_m->data['position'] = $arrayValue[$i];

                $this->pricelist_m->data['id'] = $arrayID[$i];

                $this->pricelist_m->sort_entry();

            }

            $this->data['error'] = 'Cập nhật vị trí thành công';

			break;
			break;

			case 'clean_trash':

			$this->pricelist_m->cleanTrash();

			$this->data['error'] = 'Đã dọn rác thành công';

			} // end switch



        $this->data['url_add_new'] = base_url().'AdminCP/pricelist/detail/new';
        $this->data['objects'] = $this->pricelist_m->getAlls();
		$this->load->model('admin/pricelist_m');

        $this->index('pricelist/index','Bảng giá sản phẩm');

		}

	

    

    function detail($id='0')

    {

        $action = $this->input->post('action');

        $status = $this->input->post('status');
		$this->data['url_cancel'] = base_url().'AdminCP/pricelist/main';

                    

        if($action == '')

        {

            $this->data['objects'] = $this->pricelist_m->getAlls();

            $this->pricelist_m->data['id'] = $id;

			$this->data['combobox'] = $this->pricelist_m->creatCombobox();

            $this->data = array_merge($this->data,$this->pricelist_m->select_entry());

			$this->index('pricelist/detail','Bảng giá sản phẩm');

        }

        else

        {

			require_once(APPPATH.'controllers/class/upload.php');

			$gallery_path = (ROOT_PATH.'/uploads/products/');
			require_once(APPPATH.'controllers/class/filter.php');
			$filter = new Filter();
			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
			if($files['name']){
				$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
					@unlink($gallery_path.$this->input->post('old_avatar'));
				}else $file_name = $this->input->post('old_avatar');
			$this->pricelist_m->data['id'] = $id;
            $this->pricelist_m->data['pid'] = $this->input->post('pId',TRUE);

			$this->pricelist_m->data['name'] = $this->input->post('name',TRUE);
			$this->pricelist_m->data['link'] = $this->input->post('link',TRUE);
			$this->pricelist_m->data['file_name'] = $file_name;

            $this->pricelist_m->data['status'] = $this->input->post('cboStatus');
			 $this->pricelist_m->data['position'] = $this->input->post('position');            

            if($id == 'new')

            {

                $this->pricelist_m->insert_entry();

                $id = mysql_insert_id();

            }

            else 

            {

                $this->pricelist_m->update_entry();

            }

            

            if($status == 'save')

                redirect(base_url().'AdminCP/pricelist/main/','refresh');

            else if($status == 'close')

                redirect(base_url().'AdminCP','refresh');

            else

                redirect(base_url().'AdminCP/pricelist/detail/new','refresh');

        }

    }

	

}