<?php

/**

 * @author Nguyễn Văn Thái

 * @copyright 2012

 */

include_once('home.php');

class Factories extends Home {
   
    public $data = null;

    function __construct()

    {

		parent::__construct();

        $this->load->model(array('admin/factories_m'));

        $this->data['title_site'] = 'Quản lý nhà sản xuất';

		$this->lang->load('vi', 'vietnam/admin');

    }

	# main

	public function main(){

		$action = $this->input->post('action');

		switch($action){

			case 'delete':

			$this->factories_m->data['id'] = $this->input->post('txtArrayID');

            $this->factories_m->changeStatus(2);

            $this->data['error'] = sprintf(lang('delete_item_success'),$this->factories_m->data['id']);

			break;

			case 'delete_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->factories_m->data['id'] = $data[$i];

                $this->factories_m->changeStatus(2);

            }

            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));

			break;

			# enable

			case 'enable':

			$this->factories_m->data['id'] = $this->input->post('txtArrayID');

            $this->factories_m->changeStatus(1);

            $this->data['error'] =  sprintf(lang('display_item_success'),$this->factories_m->data['id']);

			break;

			case 'enable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->factories_m->data['id'] = $data[$i];

                $this->factories_m->changeStatus(1);

				

            }

            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));

			break;

			# disable

			case 'disable':

			$this->factories_m->data['id'] = $this->input->post('txtArrayID');

            $this->factories_m->changeStatus(0);

            $this->data['error'] = sprintf(lang('hide_item_success'),$this->factories_m->data['id']);

			break;

			# disable all

			case 'disable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->factories_m->data['id'] = $data[$i];

                $this->factories_m->changeStatus(0);

				

            }

            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));

			break;
			case 'enable_home':
			$this->factories_m->data['id'] = $this->input->post('txtArrayID');
            $this->factories_m->changeEnableHome(1);
            $this->data['error'] =  sprintf(lang('enable_home_success'),$this->factories_m->data['id']);

			break;

			case 'delete_home':
			$this->products_m->data['id'] = $this->input->post('txtArrayID');
            $this->products_m->changeEnableHome(0);
            $this->data['error'] =  sprintf(lang('delete_home_success'),$this->products_m->data['id']);

			break;

			case 'sort':

			 $arrayID = $this->input->post('positionID');

            $arrayValue = $this->input->post('position');

            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ )

            {

                $this->factories_m->data['position'] = $arrayValue[$i];

                $this->factories_m->data['id'] = $arrayID[$i];

                $this->factories_m->sort_entry();

            }

            $this->data['error'] = 'Cập nhật vị trí thành công';

			break;

			case 'clean_trash':

			$this->factories_m->cleanTrash();

			$this->data['error'] = 'Dọn rác thành công';

			} // end switch



        $this->data['url_add_new'] = base_url().'AdminCP/factories/detail/new';

        $this->data['objects'] = $this->factories_m->getAlls();

        $this->index('products/factory','Quản lý nhà sản xuất');

		}


    

    function detail($id='0')

    {

        $action = $this->input->post('action');

        $status = $this->input->post('status');
		$this->data['url_cancel'] = base_url().'AdminCP/factories/main';

                    

        if($action == '')

        {

            $this->data['objects'] = $this->factories_m->getAlls();

            $this->factories_m->data['id'] = $id;

            $this->data = array_merge($this->data,$this->factories_m->select_entry());

			$this->index('products/factory_detail','Quản lý nhà sản xuất');

        }

        else

        {

		include_once(APPPATH.'controllers/class/function.php');
		require_once(APPPATH.'controllers/class/filter.php');
		$filter = new Filter();
		$gallery_path = (ROOT_PATH.('/uploads/products/'));
		$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
			if($files['tmp_name']){
				$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
				move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
				
				@unlink($gallery_path.$this->input->post('old_avatar'));
	
			}else $file_name = $this->input->post('old_avatar');
			
			$slug = $this->input->post('slug');
			$i = 0;
			$dup = 1;
			while($dup) {

				$dup = $this->factories_m->checkDuplicateSlug($id,$slug.($i?'-'.$i:''));

				if($dup) $i++;
			}
			$slug .= $i?'-'.$i:'';
				
            $this->factories_m->data['id'] = $id;

            $this->factories_m->data['vn_name'] = $this->input->post('vn_name', TRUE);

            $this->factories_m->data['en_name'] = $this->input->post('en_name',TRUE);
			$this->factories_m->data['slug'] = $slug;

			$this->factories_m->data['avatar'] = $file_name;

			$this->factories_m->data['title_site'] = $this->input->post('title_site',TRUE);
			$this->factories_m->data['keyword'] = $this->input->post('keyword',TRUE);
			$this->factories_m->data['description'] = $this->input->post('description',TRUE);
			$this->factories_m->data['position'] = $this->input->post('position',TRUE);
			
			$this->factories_m->data['properties'] = '';
            $this->factories_m->data['status'] = $this->input->post('cboStatus');
			$this->factories_m->data['home'] = $this->input->post('home');

            

            if($id == 'new')

            {

                $this->factories_m->insert_entry();

                $id = mysql_insert_id();

            }

            else 

            {

                $this->factories_m->update_entry();

            }

            

            if($status == 'save')

                redirect(base_url().'AdminCP/factories/main/','refresh');

            else if($status == 'close')

                redirect(base_url().'AdminCP','refresh');

            else

                redirect(base_url().'AdminCP/factories/detail/new','refresh');

        }

    }

	

}