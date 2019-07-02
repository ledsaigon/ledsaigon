<?php

require_once('home.php');
class Newsletter extends Home {
    
    public $data = null;
    function __construct(){
		parent::__construct();
        $this->load->model('admin/newsletter_m');
        $this->data['manage'] = 'newsletter';
		if(!in_array($_SESSION['usersInfo']['u_type'],array(3,4)))
		redirect(base_url().'AdminCP');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
				$this->newsletter_m->data['id'] = $this->input->post('txtArrayID');
				$id = $this->input->post('txtArrayID');
	            $this->newsletter_m->changeStatus($id,2);
	            $this->data['error'] = sprintf(lang('delete_item_success'),$this->newsletter_m->data['id']);
				break;
			case 'delete_all':
				$data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
               $this->newsletter_m->data['id'] = $data[$i];
               $id = $data[$i];
                $this->newsletter_m->changeStatus($id,2);
            }

            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
				$id = $this->input->post('txtArrayID');
				$this->newsletter_m->changeStatus($id,1);
				$this->data['error'] =  sprintf(lang('display_item_success'),$id);
				break;
			case 'enable_all':
				$arrayId = $this->input->post('chkBox');
				for($i = 0 ; $i < count($arrayId); $i++){
					$id = $arrayId[$i];
					$this->newsletter_m->changeStatus($id,1);
				}
				$this->data['error'] =  sprintf(lang('display_items_success'),count($arrayId));
				break;
			# disable
			case 'disable':
				$id = $this->input->post('txtArrayID');
				$this->newsletter_m->changeStatus($id,0);
				$this->data['error'] = sprintf(lang('hide_item_success'),$id);
				break;
			# disable all
				case 'clean_trash':
			$this->newsletter_m->cleanTrash();
			$this->data['error'] = "Dọn rác thành công";
			case 'disable_all':
				$arrayId = $this->input->post('chkBox');
				for($i = 0 ; $i < count($arrayId); $i++){
					$id = $arrayId[$i];
					$this->newsletter_m->changeStatus($id,0);
					
				}
				$this->data['error'] =  sprintf(lang('hide_items_success'),count($arrayId));
				break;
			
			} // end switch

        $this->data['url_add_new'] = base_url().'admin-panel/newsletter/add';
        $this->data['listItem'] = $this->newsletter_m->getObjects('id > 0');
        $this->index('newsletter/index');
		}
	
    function edit($id){
		$this->data['item'] =$this->newsletter_m->getFromId($id);
		$this->data['url_cancel'] = base_url().'admin-panel/newsletter/main';
        if($_POST){
            $datas = array (
						'fullname'=> $this->input->post('fullname', TRUE),
						'address'=> $this->input->post('address', TRUE),
						'cell'=> $this->input->post('cell', TRUE),
						'email'=> $this->input->post('email', TRUE),
						'status'=>$this->input->post('cmbStatus')
						);
           
                $this->newsletter_m->editData($datas,$id);
                redirect(base_url().'admin-panel/newsletter/main','refresh');
        }
		$this->index('newsletter/edit');
    }
	
	function add(){
		$this->data['url_cancel'] = base_url().'admin-panel/newsletter/main';
        if($_POST){
            $datas = array (
							'fullname'=> $this->input->post('fullname', TRUE),
							'address'=> $this->input->post('address', TRUE),
							'cell'=> $this->input->post('cell', TRUE),
							'email'=> $this->input->post('email', TRUE),
							'status'=>$this->input->post('cmbStatus')
						);
           
                $this->newsletter_m->addData($datas);
                redirect(base_url().'admin-panel/newsletter/main','refresh');
        }
		$this->index('newsletter/add');
    }
	
	public function sendMail11(){
		$this->data['url_cancel'] = base_url().'AdminCP/newsletter/main';
		$listEmail = '';
			$listItem = $this->newsletter_m->getObjects('status = 1');
			if($listItem){
				foreach($listItem as $item){
					$listEmail .= $item['email'].',';
					}
				}
			$this->data['listEmail'] = $listEmail;
		if($_POST){
			include_once(APPPATH.'controllers/phpmailer/class.phpmailer.php');
			$this->load->model('admin/configs_m');
			$generalConfigs = $this->configs_m->getValues('general');
			$title = $this->input->post('title');
			$bodyMail = $this->input->post('contentMail');
			
			$mail = new PHPMailer();
				
			$SMTP_Host = "duy.trivietit.net";
			$SMTP_Port = 465;
			$mail->SMTPSecure = 'ssl';

			$SMTP_UserName = "newsletters@consultantcnc.com";
			$SMTP_Password = "123@456@789";
			$from = 'newsletters@consultantcnc.com';
			$fromName = $generalConfigs['vn_company'];
			$to = $this->input->post('to');
			$cc = $this->input->post('cc');
			$bcc = $this->input->post('bcc');
			//$mail->SMTPDebug = 2;
			$mail->IsSMTP();
			$mail->Host     = $SMTP_Host;
			$mail->SMTPAuth = true;
			$mail->Username = $SMTP_UserName;
			$mail->Password = $SMTP_Password;
			$mail->From     = $from;
			$mail->FromName = $fromName;
			$mail->AddAddress($to);
			$mail->AddCC($cc);
			//$mail->AddBCC($bcc);
			//$mail->AddReplyTo($from, $fromName);
			$mail->IsHTML(true);
			$mail->Subject  = $title;
			$mail->Body     =  $bodyMail;
			if($mail->Send())
			$this->data['result'] = 'Gửi mail thành công';;
			}
			
		$this->index('newsletter/sendmail');
		}
		public function sendMail(){
		$this->data['url_cancel'] = base_url().'AdminCP/newsletter/main';
		if($_POST){
			include_once(APPPATH.'controllers/class/function.php');
			$this->load->model('admin/configs_m');
			$generalConfigs = $this->configs_m->getValues('general');
			$title = $this->input->post('title');
			$bodyMail = $this->input->post('contentMail');
			$listItem = $this->newsletter_m->getObjects('status = 1');
			if($listItem){
				foreach($listItem as $item){
					smtpmailer($item['email'], $generalConfigs['email'], $generalConfigs['vn_company'], $title, $bodyMail);
					}
				}
			
			}
			
		$this->index('newsletter/sendmail');
		}
}