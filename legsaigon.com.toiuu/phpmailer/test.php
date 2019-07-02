<?php

require_once('class.phpmailer.php');
function smtpmailer($to, $from, $from_name, $subject, $body) {
global $error;

$mail = new PHPMailer(); // tạo một đối tượng mới từ class PHPMailer

$mail -> IsSMTP(); // bật chức năng SMTP

$mail -> SMTPDebug = 0; // kiểm tra lỗi : 1 là hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi

$mail -> SMTPAuth = true; // bật chức năng đăng nhập vào SMTP này

$mail -> SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này

$mail -> Host = 'smtp.gmail.com';

$mail -> Port = 465;

$mail -> Username = 'thainv12@gmail.com';

$mail -> Password = 'thainv12@1';

$mail -> SetFrom($from, $from_name);

$mail -> Subject = $subject;

$mail -> Body = $body;

$mail -> AddAddress( $to );

if( ! $mail -> Send() )  {

$error = ' error: '.$mail -> ErrorInfo;

return false;

} else {

$error = ' thư của bạn đã được gởi đi  ';

return true;

}

}
if($_POST){
smtpmailer('nguyenthai@trivietit.net', 'thainv12@gmail.com', 'yourName', 'test mail message', 'Hello World!' );
// gởi xong rồi thông báo gì đó cho ngươi dùng :D viết ở đây

//if (!empty( $error )) echo $error;else echo 'success';
}
?>
<form name="" action="" method="post">
<input type="submit" name="submit">
</form>