<?php

include_once('home.php');
class Config extends Home {
    
    /**
     * khoi tao contructer
     * 
     **/
	function __construct()
	{
		parent::__construct();
        $this->load->model(array('admin/Mod_viewer','admin/Mod_config'));
		// $this->Mod_config->data['langID'] = $this->session->userdata('CI_language_admin_id');
	}
	  
    /**
     * site config email
     * */
    function email()
	{
	   $action = $this->input->post('action');
       $status_save = $this->input->post('status');
       if($action == 'update')
       {
            $data_key = $this->input->post('config_key');
            $data_value = $this->input->post('config_value');
            for($i = 0 ; $i <= count($data_key) - 1 ; $i++ )
            {
                if($this->Mod_config->checkExistKey($data_key[$i]) == true)
                    $this->Mod_config->update_entry($data_key[$i],$data_value[$i]);
                else $this->Mod_config->insert_entry($data_key[$i],$data_value[$i]);
            }
            $this->data['error'] = 'Cập nhật dữ liệu thành công';
            
            if($status_save == 'close')
            {
                redirect(base_url()."AdminCP/home");
                exit(0);
            }
       }
       $configList = $this->Mod_config->getConfigListWithPrefix('mail_setting_');
       foreach($configList as $value)
       {
            $this->data[$value->cfKey] = $value->cfDesc; 
       } 
	   $this->index('email','.: Admin Cpanel :. | Quản lý Email');
	}
    
    function SMTP()
    {
        echo '{"smtp_host":"ssl://smtp.gmail.com","smtp_port":"465","smtp_user":"test.dangcapthuonghieu@gmail.com","smtp_pass":"abcd123456789"}';
    }
    
    /**
     * Cteated XML File With prefix param & filename param 
     * */
}
 ?>