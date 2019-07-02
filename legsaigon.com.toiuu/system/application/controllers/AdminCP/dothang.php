<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */

include_once('home.php');
class Dothang extends Home {
    
    public $data = null;
    function __construct()
    {
		parent::__construct();
        $this->load->model('admin/dothang_m');
        $this->data['title_site'] = 'Quản lý đợt hàng';
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->dothang_m->data['id'] = $this->input->post('txtArrayID');
            $this->dothang_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->dothang_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->dothang_m->data['id'] = $data[$i];
                $this->dothang_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->dothang_m->data['id'] = $this->input->post('txtArrayID');
            $this->dothang_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->dothang_m->data['id']);
			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->dothang_m->data['id'] = $data[$i];
                $this->dothang_m->changeStatus(1);
				
            }
            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':
			$this->dothang_m->data['id'] = $this->input->post('txtArrayID');
            $this->dothang_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->dothang_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->dothang_m->data['id'] = $data[$i];
                $this->dothang_m->changeStatus(0);
				
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'sort':
			 $arrayID = $this->input->post('positionID');
            $arrayValue = $this->input->post('position');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ )
            {
                $this->dothang_m->data['position'] = $arrayValue[$i];
                $this->dothang_m->data['id'] = $arrayID[$i];
                $this->dothang_m->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;
			case 'clean_trash':
			$this->dothang_m->cleanTrash();
			 $this->data['error'] = 'Dọn rác thành công';
			} // end switch

        $this->data['url_add_new'] = base_url().'AdminCP/dothang/detail/new';
        $this->data['objects'] = $this->dothang_m->getAlls();
        $this->index('dothang/index','Quản lý đợt hàng');
		}
	
    
    function detail($id='0')
	
    {
        $action = $this->input->post('action');
        $status = $this->input->post('status');
        $this->data['url_cancel'] = base_url().'AdminCP/dothang/main';           
        if($action == '')
        {
            $this->dothang_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->dothang_m->select_entry());
			$this->index('dothang/detail','Quản lý đợt hàng');
        }
        else
        {
			include_once APPPATH.'controllers/class/function.php';
			$slug = $this->input->post('name');
			$slug = str_replace('/',' ',$slug);
			$slug = creatSlug($slug);

			$i = 0;
			$dup = 1;
			while($dup) {
				$dup = $this->dothang_m->checkDuplicateSlug($id,$slug.($i?'-'.$i:''));
				if($dup) $i++;

			}
			$slug .= $i?'-'.$i:'';
            $datas = array (
						'name'=> $this->input->post('name', TRUE),
						'slug'=> $slug,
						
						'position'=> $this->input->post('position',TRUE),
						'status'=>$this->input->post('cboStatus')
						);
            
            if($id == 'new')
            {
                $this->dothang_m->addData($datas);
                $id = mysql_insert_id();
            }
            else 
            {
                $this->dothang_m->editData($datas,$id);
            }
            
            if($status == 'save')
                redirect(base_url().'AdminCP/dothang/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/dothang/detail/new','refresh');
        }
    }
	
}