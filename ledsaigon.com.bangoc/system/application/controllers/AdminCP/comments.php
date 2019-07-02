<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */

include_once('home.php');
class Comments extends Home {
    
    public $data = null;
    function __construct()
    {
		parent::__construct();
        $this->load->model('admin/comments_m');
        $this->data['title_site'] = 'Ý kiến phản hồi';
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->comments_m->data['id'] = $this->input->post('txtArrayID');
            $this->comments_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->comments_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->comments_m->data['id'] = $data[$i];
                $this->comments_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->comments_m->data['id'] = $this->input->post('txtArrayID');
            $this->comments_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->comments_m->data['id']);
			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->comments_m->data['id'] = $data[$i];
                $this->comments_m->changeStatus(1);
				
            }
            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':
			$this->comments_m->data['id'] = $this->input->post('txtArrayID');
            $this->comments_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->comments_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->comments_m->data['id'] = $data[$i];
                $this->comments_m->changeStatus(0);
				
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'sort':
			 $arrayID = $this->input->post('txtOrderID');
            $arrayValue = $this->input->post('txtOrder');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ )
            {
                $this->comments_m->data['cOrder'] = $arrayValue[$i];
                $this->comments_m->data['cID'] = $arrayID[$i];
                $this->comments_m->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;
			case 'clean_trash':
			$this->comments_m->cleanTrash();
			 $this->data['error'] = 'Dọn rác thành công';
			} // end switch

        $this->data['url_add_new'] = base_url().'AdminCP/comments/detail/new';
        $this->data['objects'] = $this->comments_m->getAlls();
        $this->index('comments/index','Ý kiến phản hồi');
		}
	
    
    function detail($id='0')
    {
        $action = $this->input->post('action');
        $status = $this->input->post('status');
                    
        if($action == '')
        {
            $this->data['listSupport'] = $this->comments_m->getAlls();
            $this->comments_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->comments_m->select_entry());
			$this->index('comments/detail',lang('manage_support'));
        }
        else
        {
            $this->comments_m->data['id'] = $id;
            $this->comments_m->data['fullname'] = $this->input->post('fullname', TRUE);
            $this->comments_m->data['address'] = $this->input->post('address',TRUE);
			$this->comments_m->data['email'] = $this->input->post('email',TRUE);
			$this->comments_m->data['comment'] = $this->input->post('comment',TRUE);
			$this->comments_m->data['date_created'] = $this->input->post('date_created',TRUE);
            $this->comments_m->data['status'] = $this->input->post('cboStatus');
            
            if($id == 'new')
            {
                $this->comments_m->insert_entry();
                $id = mysql_insert_id();
            }
            else 
            {
                $this->comments_m->update_entry();
            }
            
            if($status == 'save')
                redirect(base_url().'AdminCP/comments/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/comments/detail/new','refresh');
        }
    }
	
}