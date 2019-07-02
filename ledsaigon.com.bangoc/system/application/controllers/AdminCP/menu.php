<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */
include_once('home.php');
class Menu extends Home {
    public $data = null;
    function __construct()
    {
		parent::__construct();
        $this->load->model('admin/menu_m');
        $this->data['title_site'] = 'Quản lý menu';
		$this->lang->load('vi', 'vietnam/admin');
		if(!in_array($_SESSION['usersInfo']['u_type'],array(3,4)))
		redirect(base_url().'AdminCP');
    }

	# main

	public function main(){

		$action = $this->input->post('action');

		switch($action){

			case 'delete':

			$this->menu_m->data['id'] = $this->input->post('txtArrayID');

            $this->menu_m->changeStatus(2);

            $this->data['error'] = sprintf(lang('delete_item_success'),$this->menu_m->data['id']);

			break;

			case 'delete_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->menu_m->data['id'] = $data[$i];

                $this->menu_m->changeStatus(2);

            }

            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));

			break;

			# enable

			case 'enable':

			$this->menu_m->data['id'] = $this->input->post('txtArrayID');

            $this->menu_m->changeStatus(1);

            $this->data['error'] =  sprintf(lang('display_item_success'),$this->menu_m->data['id']);

			break;

			case 'enable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->menu_m->data['id'] = $data[$i];

                $this->menu_m->changeStatus(1);

				

            }

            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));

			break;

			# disable

			case 'disable':

			$this->menu_m->data['id'] = $this->input->post('txtArrayID');

            $this->menu_m->changeStatus(0);

            $this->data['error'] = sprintf(lang('hide_item_success'),$this->menu_m->data['id']);

			break;

			# disable all

			case 'disable_all':

			 $data = $this->input->post('chkBox');

            for($i = 0 ; $i <= count($data) - 1 ; $i++)

            {

                $this->menu_m->data['id'] = $data[$i];

                $this->menu_m->changeStatus(0);

				

            }

            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));

			break;

			case 'sort':

			 $arrayID = $this->input->post('positionID');

            $arrayValue = $this->input->post('position');

            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ )

            {

                $this->menu_m->data['position'] = $arrayValue[$i];

                $this->menu_m->data['id'] = $arrayID[$i];

                $this->menu_m->sort_entry();

            }

            $this->data['error'] = 'Cập nhật vị trí thành công';

			break;

			case 'clean_trash':

			$this->menu_m->cleanTrash();

			 $this->data['error'] = 'Dọn rác thành công';

			} // end switch



        $this->data['url_add_new'] = base_url().'AdminCP/menu/detail/new';

        $this->data['objects'] = $this->menu_m->getAlls();

        $this->index('menu/index','Quản lý menu');

		}

	

    

    function detail($id='0')
    {
        $action = $this->input->post('action');
        $status = $this->input->post('status');
        if($action == '')
        {
            $this->data['listSupport'] = $this->menu_m->getAlls();
            $this->menu_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->menu_m->select_entry());
			$this->index('menu/detail','Quản lý menu');
        }
        else
        {
            $datas = array (
						'vn_name'=> $this->input->post('vn_name', TRUE),
                        'en_name'=> $this->input->post('en_name', TRUE),
						'solan_title'=> $this->input->post('solan_title', TRUE),
						'url'=> $this->input->post('url',TRUE),
						'position'=> $this->input->post('position',TRUE),
						'status'=>$this->input->post('cboStatus')
						);
            if($id == 'new')
            {
                $this->menu_m->addData($datas);
                $id = mysql_insert_id();
            }
            else 
            {
                $this->menu_m->editData($datas,$id);
            }
            if($status == 'save')
                redirect(base_url().'AdminCP/menu/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/menu/detail/new','refresh');
        }
    }
}