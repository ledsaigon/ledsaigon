<?php
require_once 'home.php';
class Users extends Home{
	public function __construct(){
		parent::__construct();
		}
	public function changePass(){
		$this->load->library('form_validation');
		$config = array(
						array('field' =>'oldPass',
								'label' => 'Mật khẩu củ',
								'rules' => 'required|trim()'),
						array('field' =>'newPass',
								'label' => 'Mật khẩu mới',
								'rules' => 'required|trim()|min_length[6]'),
						array('field' =>'confirmPass',
								'label' =>'Xác nhận mật khẩu',
								'rules' =>'required|trim()|min_length[6]|matches[newPass]')
						);
		$this->form_validation->set_message('required','%s - Không được bỏ trống');
		$this->form_validation->set_message('min_length','%s - Có ít nhất 6 ký tự');
		$this->form_validation->set_message('matches','%s - Không đúng');
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$this->data['errorOldPass'] = form_error('oldPass');
			$this->data['errorNewPass'] = form_error('newPass');
			$this->data['errorConfirmPass'] = form_error('confirmPass');
			
			}else{
				$oldPass = $this->input->post('oldPass');
				$newPass = $this->input->post('newPass');
				$confirmPass = $this->input->post('confirmPass');
				$this->load->model('admin/users_m');
				$idUser = $_SESSION['usersInfo']['u_id'];
				$checkOldPass = $this->users_m->checkDuplicate($idUser,'password',md5($oldPass));
				if($checkOldPass == 0){
					$this->data['errorOldPass'] = '<p>Mật khẩu củ không đúng</p>';
					}
				else{
					if($this->users_m->changePass(md5($newPass),$idUser))
					$this->data['changePassOk'] = 'Mật khẩu của bạn đã được thay đổi.';
					else
					$this->data['changePassOk'] = '<span style="color:red">Đổi mật khẩu không thành công.</span>';
					}
				
				}
			$this->index('users/changepass');
		
		
		}
	public function main(){
		$action = $this->input->post('action');
		$this->load->model('admin/users_m');
		switch($action){
			case 'delete':
			$this->users_m->data['id'] = $this->input->post('txtArrayID');
            $this->users_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->users_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->users_m->data['id'] = $data[$i];
                $this->users_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->users_m->data['id'] = $this->input->post('txtArrayID');
            $this->users_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->users_m->data['id']);
			break;
			case 'enable_all':
			$data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->users_m->data['id'] = $data[$i];
                $this->users_m->changeStatus(1);
			}
            $this->data['error'] = sprintf(lang('display_items_success'),count($data));
			break;
			# disable 
			case 'disable':
			$this->users_m->data['id'] = $this->input->post('txtArrayID');
            $this->users_m->changeStatus(0);
            $this->data['error'] =  sprintf(lang('hide_item_success'),$this->users_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			$data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->users_m->data['id'] = $data[$i];
                $this->users_m->changeStatus(0);
            };
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'clean_trash':
			$this->users_m->cleanTrash();
			$this->data['error'] = "Dọn rác thành công";
			} // end switch
        $this->users_m->data['cid'] = 0;
		$this->data['url_add_new'] = base_url().'AdminCP/users/detail/new';
		$this->data['objects'] = $this->users_m->getAlls();	
	     $this->index('users/index','Danh sách nhân viên');
		}
	function detail($id='0'){
		$this->load->model('admin/users_m');
        $action = $this->input->post('action');
        $status = $this->input->post('status');
        $this->data['url_cancel'] = base_url().'AdminCp/users/main'; 
        if($action == ''){
            $this->users_m->data['tid'] = 0;
            $this->data['objects'] = $this->users_m->getAlls();
            $this->users_m->data['id'] = $id;
            $this->data = array_merge($this->data,$this->users_m->select_entry());
			$this->index('users/detail','Quản lý tài khoản');
        }
        else{
            $datas = array('tid'=> $this->input->post('tId'),
							'username'=> $this->input->post('username', TRUE),
							'fullname'=> $this->input->post('fullname', TRUE),
							'password'=> md5($this->input->post('password', TRUE)),
							'email'=> $this->input->post('email',TRUE),
							'cell'=> $this->input->post('cell',TRUE),
							'address'=> $this->input->post('address',TRUE),
							'status'=> $this->input->post('cboStatus'));
            if($id == 'new'){
                $this->users_m->addData($datas);
			}
            else {
                $this->users_m->editData($datas,$id);
            }
			
			if($status == 'save')
               redirect(base_url().'AdminCP/users/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/articles/detail/new','refresh');
        }
		 }
		 
	public function staff(){
			$action = $this->input->post('action');
			$this->load->model('admin/users_m');
			switch($action){	
				case 'delete':
				$this->users_m->data['id'] = $this->input->post('txtArrayID');
				$this->users_m->changeStatus(2);
				$this->data['error'] = sprintf(lang('delete_item_success'),$this->users_m->data['id']);
				break;
				case 'delete_all':
				 $data = $this->input->post('chkBox');
	
				for($i = 0 ; $i <= count($data) - 1 ; $i++){
					$this->users_m->data['id'] = $data[$i];
					$this->users_m->changeStatus(2);
				}
	
				$this->data['error'] = sprintf(lang('delete_items_success'),count($data));
	
				break;
	
				# enable
	
				case 'enable':
	
				$this->users_m->data['id'] = $this->input->post('txtArrayID');
	
				$this->users_m->changeStatus(1);
	
				$this->data['error'] =  sprintf(lang('display_item_success'),$this->users_m->data['id']);
	
				break;
	
				case 'enable_all':
	
				$data = $this->input->post('chkBox');
	
				for($i = 0 ; $i <= count($data) - 1 ; $i++){
					$this->users_m->data['id'] = $data[$i];
					$this->users_m->changeStatus(1);
				}
	
				$this->data['error'] = sprintf(lang('display_items_success'),count($data));
				break;
			# disable 
				case 'disable':
	
				$this->users_m->data['id'] = $this->input->post('txtArrayID');
	
				$this->users_m->changeStatus(0);
	
				$this->data['error'] =  sprintf(lang('hide_item_success'),$this->users_m->data['id']);
	
				break;
	
				# disable all
				case 'disable_all':
				$data = $this->input->post('chkBox');
				for($i = 0 ; $i <= count($data) - 1 ; $i++){
					$this->users_m->data['id'] = $data[$i];
					$this->users_m->changeStatus(0);
				};
	
				$this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
				break;
	
				case 'clean_trash':
	
				$this->users_m->cleanTrash();
	
				$this->data['error'] = "Dọn rác thành công";
	
				} // end switch
	
			$this->users_m->data['cid'] = 0;
	
			$this->data['url_add_new'] = base_url().'AdminCP/users/addStaff/new';
	
			$this->data['objects'] = $this->users_m->getStaff();
			 $this->index('users/staff','Danh sách tài khoản');
	
			}
	function editStaff($id='0') {
		$this->load->model('admin/users_m');
		$this->data['objects'] = $this->users_m->getObject($id);        
		if($_POST){
			$newPass = $this->input->post('newPass');
			$confirmPass = $this->input->post('confirmPass');
			$oldPass = $this->input->post('oldPass');
			if($newPass!='')
			$password = md5($newPass);
			else
			$password = $oldPass;
			$datas = array('tid' => $this->input->post('tId'),
					'fullname' => $this->input->post('fullname', TRUE),
					'password' => $password,
					'email' => $this->input->post('email',TRUE),
					'cell' => $this->input->post('cell',TRUE),
					'address' => $this->input->post('address',TRUE),
					'status' => $this->input->post('cboStatus')
				 );
                $this->users_m->editData($datas,$id);
               redirect(base_url().'AdminCP/users/staff/','refresh');
        }
		$this->index('users/editstaff','Cập nhật tài khoản');
    }
	
	function addStaff() {
		$this->load->model('admin/users_m');
		$error = '';
		if($_POST){
			$newPass = $this->input->post('newPass');
			$confirmPass = $this->input->post('confirmPass');
			$username = $this->input->post('username', TRUE);
			
			$check = $this->users_m->checkDuplicate($username);
			if($check == 1)
			$error = 'Tên đăng nhập đã tồn tại'; 
			if($newPass != $confirmPass)
			$error = 'Mật khẩu không trùng nhau';
			$password = md5($newPass);
			if($error==''){
				$datas = array('tid' => $this->input->post('tId'),
					'username' => $username,
					'fullname' => $this->input->post('fullname', TRUE),
					'password' => $password,
					'email' => $this->input->post('email',TRUE),
					'cell' => $this->input->post('cell',TRUE),
					'address' => $this->input->post('address',TRUE),
					'status' => $this->input->post('cboStatus')
				 );
                $this->users_m->addData($datas);
               redirect(base_url().'AdminCP/users/staff/','refresh');
				}
			
			
        }
		$this->data['error'] = $error;
		$this->index('users/addstaff','Thêm tài khoản');
    }
	}
?>