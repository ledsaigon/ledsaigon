<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */

include_once('home.php');
class Supports extends Home {
    
    public $data = null;
    function __construct()
    {
		parent::__construct();
        $this->load->model('admin/supports_m');
        $this->data['title_site'] = lang('manage_support');
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->supports_m->data['id'] = $this->input->post('txtArrayID');
            $this->supports_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->supports_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->supports_m->data['id'] = $data[$i];
                $this->supports_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->supports_m->data['id'] = $this->input->post('txtArrayID');
            $this->supports_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->supports_m->data['id']);
			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->supports_m->data['id'] = $data[$i];
                $this->supports_m->changeStatus(1);
				
            }
            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':
			$this->supports_m->data['id'] = $this->input->post('txtArrayID');
            $this->supports_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->supports_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->supports_m->data['id'] = $data[$i];
                $this->supports_m->changeStatus(0);
				
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'sort':
			 $arrayID = $this->input->post('txtOrderID');
            $arrayValue = $this->input->post('txtOrder');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ )
            {
                $this->supports_m->data['cOrder'] = $arrayValue[$i];
                $this->supports_m->data['cID'] = $arrayID[$i];
                $this->supports_m->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;
			case 'clean_trash':
			$this->supports_m->cleanTrash();
			 $this->data['error'] = 'Dọn rác thành công';
			} // end switch

        $this->data['url_add_new'] = base_url().'AdminCP/supports/detail/new';
        $this->data['objects'] = $this->supports_m->getAlls();
        $this->index('supports/index',lang('manage_support'));
		}
	
    
    function detail($id='0')
    {
        $action = $this->input->post('action');
        $status = $this->input->post('status');
                    
        if($action == '')
        {
            $this->data['listSupport'] = $this->supports_m->getAlls();
            $this->supports_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->supports_m->select_entry());
			$this->index('supports/detail',lang('manage_support'));
        }
        else
        {
            $this->supports_m->data['id'] = $id;
            $this->supports_m->data['fullname'] = $this->input->post('fullname', TRUE);
            $this->supports_m->data['nick_skype'] = $this->input->post('nick_skype',TRUE);
			$this->supports_m->data['nick_yahoo'] = $this->input->post('nick_yahoo',TRUE);
			$this->supports_m->data['cell'] = $this->input->post('cell',TRUE);
			$this->supports_m->data['email'] = $this->input->post('email',TRUE);
            $this->supports_m->data['status'] = $this->input->post('cboStatus');
            $this->supports_m->data['gender'] = $this->input->post('cbogender');
            if($id == 'new')
            {
                $this->supports_m->insert_entry();
                $id = mysql_insert_id();
            }
            else 
            {
                $this->supports_m->update_entry();
            }
            
            if($status == 'save')
                redirect(base_url().'AdminCP/supports/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/supports/detail/new','refresh');
        }
    }
	
}