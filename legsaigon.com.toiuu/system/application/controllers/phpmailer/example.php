<?php

try {
			
			# Tạo đối tượng Email
			$mail = new PHPMailer(true); // true: Nếu có lỗi sẽ throw exception
			$mail->SMTPDebug = 1;
			$mail->SMTPSecure = $this->_smtp_secure;
			$mail->IsSMTP();
			$mail->Host     = $this->_host;
			//$mail->Port		= $this->_port;
			$mail->SMTPAuth = true;
			$mail->Username = $this->_username;
			$mail->Password = $this->_password;
				
			$mail->From     = $from['email'];
			$mail->FromName = $from['name'];
			$mail->AddAddress($to['email']);
			//$mail->AddCC($cc['email'],$cc['name']);
			
			//$mail->AddReplyTo("quangtruong1985@gmail.com", "Lê Quang Trưởng");
		
			$mail->IsHTML(true);
			$mail->Subject  =  $email_options['subject'];
			
			//$base_url = 'http://evashop.qt/';
			# Khai báo template
			$template = $this->load_email_template($template_options['template']);
			
			# Parse nội dung vào template
			$content = $this->parse_data_to_template($template_options['data'], $template);
			
			$mail->Body     =  $content;
			
			//echo $content;die;
				
			return $mail->Send();
		
		} catch (phpmailerException $e) {
			return $e;
		}
