<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */

include_once('home.php');
class Power extends Home {
    
    public $data = null;
    function __construct()
    {
		parent::__construct();
        $this->load->model('admin/power_m');
        $this->data['title_site'] = 'Quản lý công suất';
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->power_m->data['id'] = $this->input->post('txtArrayID');
            $this->power_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->power_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->power_m->data['id'] = $data[$i];
                $this->power_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->power_m->data['id'] = $this->input->post('txtArrayID');
            $this->power_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->power_m->data['id']);
			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->power_m->data['id'] = $data[$i];
                $this->power_m->changeStatus(1);
				
            }
            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':
			$this->power_m->data['id'] = $this->input->post('txtArrayID');
            $this->power_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->power_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->power_m->data['id'] = $data[$i];
                $this->power_m->changeStatus(0);
				
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'sort':
			 $arrayID = $this->input->post('positionID');
            $arrayValue = $this->input->post('position');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ )
            {
                $this->power_m->data['position'] = $arrayValue[$i];
                $this->power_m->data['id'] = $arrayID[$i];
                $this->power_m->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;
			case 'clean_trash':
			$this->power_m->cleanTrash();
			 $this->data['error'] = 'Dọn rác thành công';
			} // end switch

        $this->data['url_add_new'] = base_url().'AdminCP/power/detail/new';
        $this->data['objects'] = $this->power_m->getAlls();
        $this->index('power/index','Quản lý công suất');
		}
	
    
    function detail($id='0')
	
    {
        $action = $this->input->post('action');
        $status = $this->input->post('status');
        $this->data['url_cancel'] = base_url().'AdminCP/power/main';           
        if($action == '')
        {
            $this->power_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->power_m->select_entry());
			$this->index('power/detail','Quản lý công suất');
        }
        else
        {
			include_once APPPATH.'controllers/class/function.php';
			$slug = creatSlug($this->input->post('slug'));

			$i = 0;
			$dup = 1;
			while($dup) {
				$dup = $this->power_m->checkDuplicateSlug($id,$slug.($i?'-'.$i:''));
				if($dup) $i++;

			}
			$slug .= $i?'-'.$i:'';
            $datas = array (
						'name'=> $this->input->post('name', TRUE),
						'slug'=> $slug,
						'title_site'=> $this->input->post('title_site',TRUE),
						'keyword'=> $this->input->post('keyword',TRUE),
						'description'=> $this->input->post('description',TRUE),
						'position'=> $this->input->post('position',TRUE),
						'status'=>$this->input->post('cboStatus')
						);
            
            if($id == 'new')
            {
                $this->power_m->addData($datas);
                $id = mysql_insert_id();
            }
            else 
            {
                $this->power_m->editData($datas,$id);
            }
            
            if($status == 'save')
                redirect(base_url().'AdminCP/power/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/power/detail/new','refresh');
        }
    }
	
}