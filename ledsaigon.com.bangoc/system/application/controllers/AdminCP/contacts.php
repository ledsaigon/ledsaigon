<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */

include_once('home.php');
class Contacts extends Home {
    
    public $data = null;
    function __construct()
    {
		parent::__construct();
        $this->load->model('admin/contacts_m');
        $this->data['title_site'] = 'Quản lý thư liên hệ';
		$this->lang->load('vi', 'vietnam/admin');
		if(!in_array($_SESSION['usersInfo']['u_type'],array(3,4)))
		redirect(base_url().'AdminCP');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		
		switch($action){
			case 'delete':
			$id = $this->input->post('txtArrayID');
			$this->contacts_m->delete($id); 
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->contacts_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
               // $this->contacts_m->data['id'] = $data[$i];
                $this->contacts_m->delete($data[$i]); 
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
		}
        $this->data['url_add_new'] = '#';
        $this->data['objects'] = $this->contacts_m->getAlls();
        $this->index('contacts/index','Quản lý thư liên hệ');
		}
	
    
    function detail($id='0'){
		$this->data['objects'] = $this->contacts_m->getObject($id);
		$this->contacts_m->changeStatus(1,$id);
		$this->index('contacts/detail');
    }
	
}