<?php

include_once('home.php');
class Cms extends Home{

	function __construct()
	{
		parent::__construct();
        $this->load->model(array('admin/Mod_viewer','admin/Mod_config'));
		$this->Mod_config->data['langID'] = $this->session->userdata('CI_language_admin_id');
	}
	
    function cms_main($key='')
	{
	   if($key == '') redirect(base_url()."AdminCP","refresh");
       
	   $action = $this->input->post('action');
       $status_save = $this->input->post('status');
       if($action == 'update')
       {
            if($this->Mod_config->checkExistKey('cms_contact_'.$key) == true)
                $this->Mod_config->update_entry('cms_contact_'.$key,$this->input->post('config_value'));
            else $this->Mod_config->insert_entry('cms_contact_'.$key,$this->input->post('config_value'));
                        
            $this->data['error'] = 'Cập nhật dữ liệu thành công';        
            if($status_save == 'close')
            {

                redirect(base_url()."AdminCP");
                exit(0);
            }
       }
       $this->data['key'] = $key;
       $this->data['cms_content'] = $this->Mod_config->select_key('cms_contact_'.$key);
	   $this->index('cms_templates','.: Admin Cpanel :. | Quản lý liên hệ');
	}
    
	function content($key='')
	{
	   $action = $this->input->post('action');
       $status_save = $this->input->post('status');
       if($action == 'update')
       {
            if($this->Mod_config->checkExistKey('cms_contact_'.$key) == true)
                $this->Mod_config->update_entry('cms_contact_'.$key,$this->input->post('config_value'));
            else $this->Mod_config->insert_entry('cms_contact_'.$key,$this->input->post('config_value'));
                        
            $this->data['error'] = 'Cập nhật dữ liệu thành công';        
            if($status_save == 'close')
            {
                redirect(base_url()."AdminCP");
                exit(0);
            }
       }
       $this->data['key'] = $key;
       $this->data['cms_content'] = $this->Mod_config->select_key('cms_contact_'.$key);
	   $this->index('cms_templates','.: Admin Cpanel :. | Quản lý liên hệ');
	}
    
}
 ?>