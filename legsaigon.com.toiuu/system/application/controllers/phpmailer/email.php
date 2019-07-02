<?php

require_once(APPPATH.'controllers/phpmailer/class.phpmailer.php');

class Email{

	private $hostMail='';

	private $username='';

	private $password='';

	private $port =25;

	private $security='ssl';

	function __construct($_hostMail,$_username,$_password){

		$this->hostMail=$_hostMail;

		$this->username=$_username;

		$this->password=$_password;

		}

	function sendMail($from=array(),$to=array(),$option=array()){

		

try {

			

			# Tạo đối tượng Email

			$mail = new PHPMailer(true); // true: Nếu có lỗi sẽ throw exception

			$mail->SMTPDebug = 1;

			$mail->SMTPSecure = $this->security;

			$mail->IsSMTP();

			$mail->Host     = $this->hostMail;

			$mail->Port		= $this->port;

			$mail->SMTPAuth = true;

			$mail->Username = $this->username;

			$mail->Password = $this->password;

				

			$mail->From     = $from['email'];

			$mail->FromName = $from['name'];

			$mail->AddAddress($to['email']);

			//$mail->AddCC($cc['email'],$cc['name']);

			

			//$mail->AddReplyTo("quangtruong1985@gmail.com", "Lê Quang Trưởng");

		

			$mail->IsHTML(true);

			$mail->Subject  =  $option['subject'];

			

			//$base_url = 'http://evashop.qt/';

			# Khai báo template

			//$template = $this->load_email_template($template_options['template']);

			

			# Parse nội dung vào template

			//$content = $this->parse_data_to_template($template_options['data'], $template);

			

			$mail->Body     =  $option['content'];

			

			//echo $content;die;

				

			return $mail->Send();

		

		} catch (phpmailerException $e) {

			return $e;

		}



		}

	}

?>
