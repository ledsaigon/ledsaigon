<?php

/**

 * @author Nguyễn Văn Thái

 * @copyright 2012

 */

include_once('home.php');

class Artists extends Home {
   
    public $data = null;

    function __construct()

    {

		parent::__construct();

        $this->load->model(array('admin/artists_m'));

        $this->data['title_site'] = 'Quản lý Họa Sỉ';

		$this->lang->load('vi', 'vietnam/admin');

    }

	# main

	public function main(){

		$action = $this->input->post('action');

		switch($action){

			case 'delete':

			$this->artists_m->data['id'] = $this->input->post('txtArrayID');

            $this->artists_m->changeStatus(2);

            $this->data['error'] = sprintf(lang('delete_item_success'),$this->artists_m->data['id']);

			break;

			case 'delete_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->artists_m->data['id'] = $data[$i];

                $this->artists_m->changeStatus(2);

            }

            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));

			break;

			# enable

			case 'enable':

			$this->artists_m->data['id'] = $this->input->post('txtArrayID');

            $this->artists_m->changeStatus(1);

            $this->data['error'] =  sprintf(lang('display_item_success'),$this->artists_m->data['id']);

			break;

			case 'enable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->artists_m->data['id'] = $data[$i];

                $this->artists_m->changeStatus(1);

				

            }

            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));

			break;

			# disable

			case 'disable':

			$this->artists_m->data['id'] = $this->input->post('txtArrayID');

            $this->artists_m->changeStatus(0);

            $this->data['error'] = sprintf(lang('hide_item_success'),$this->artists_m->data['id']);

			break;

			# disable all

			case 'disable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->artists_m->data['id'] = $data[$i];

                $this->artists_m->changeStatus(0);

				

            }

            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));

			break;
			case 'enable_home':

			$this->artists_m->data['id'] = $this->input->post('txtArrayID');

            $this->artists_m->changeEnableHome(1);

            $this->data['error'] =  sprintf(lang('enable_home_success'),$this->artists_m->data['id']);

			break;

			case 'delete_home':

			$this->artists_m->data['id'] = $this->input->post('txtArrayID');

            $this->artists_m->changeEnableHome(0);

            $this->data['error'] =  sprintf(lang('delete_home_success'),$this->artists_m->data['id']);

			break;

			case 'sort':

			 $arrayID = $this->input->post('positionID');

            $arrayValue = $this->input->post('position');

            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ )

            {

                $this->artists_m->data['position'] = $arrayValue[$i];

                $this->artists_m->data['id'] = $arrayID[$i];

                $this->artists_m->sort_entry();

            }

            $this->data['error'] = 'Cập nhật vị trí thành công';

			break;

			case 'clean_trash':

			$this->artists_m->cleanTrash();

			$this->data['error'] = 'Dọn rác thành công';

			} // end switch



        $this->data['url_add_new'] = base_url().'AdminCP/artists/detail/new';

        $this->data['objects'] = $this->artists_m->getAlls();

        $this->index('artists/index','Quản lý Họa Sỉ');

		}
	

    

    function detail($id='0')

    {

        $action = $this->input->post('action');

        $status = $this->input->post('status');
		$this->data['url_cancel'] = base_url().'AdminCP/artists/main';

                    

        if($action == '')

        {

            $this->data['objects'] = $this->artists_m->getAlls();

            $this->artists_m->data['id'] = $id;

            $this->data = array_merge($this->data,$this->artists_m->select_entry());

			$this->index('artists/detail','Quản lý Họa Sỉ');

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

				$dup = $this->artists_m->checkDuplicateSlug($id,$slug.($i?'-'.$i:''));

				if($dup) $i++;
			}
			$slug .= $i?'-'.$i:'';
				

            $datas = array('name'=> $this->input->post('name', TRUE),
							'slug'=> $slug,
				
							'avatar'=> $file_name,
				
							'position'=> $this->input->post('position',TRUE),
							'home'=> $this->input->post('home',TRUE),
							
							'detail'=> $this->input->post('detail'),
							'status'=>$this->input->post('cboStatus')
							);

            

            if($id == 'new')

            {

                $this->artists_m->addData($datas);

                $id = mysql_insert_id();

            }

            else 

            {

                $this->artists_m->editData($datas,$id);

            }

            

            if($status == 'save')

                redirect(base_url().'AdminCP/artists/main/','refresh');

            else if($status == 'close')

                redirect(base_url().'AdminCP','refresh');

            else

                redirect(base_url().'AdminCP/artists/detail/new','refresh');

        }

    }

}