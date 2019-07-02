<?php
function cutStr($str,$limit){ 
    if(strlen($str)<=$limit) 
    { 
        return $str; 
    } 
    else{ 
        if(strpos($str," ",$limit) > $limit){ 
            $new_limit=strpos($str," ",$limit); 
            $new_str = substr($str,0,$new_limit)."..."; 
            return $new_str; 
        } 
        $new_str = substr($str,0,$limit)."..."; 
        return $new_str; 
    } 
}
function resizeImg($img, $w, $h, $newfilename) {
     //Check if GD extension is loaded
     if (!extension_loaded('gd') && !extension_loaded('gd2')) {
      trigger_error("GD is not loaded", '');
      return false;
     }
     //Get Image size info
     $imgInfo = getimagesize($img);
     switch ($imgInfo[2]) {
      case 1: $im = imagecreatefromgif($img); break;
      case 2: $im = imagecreatefromjpeg($img);  break;
      case 3: $im = imagecreatefrompng($img); break;
      default:  trigger_error('Unsupported filetype!', '');  break;
     }
     
     //If image dimension is smaller, do not resize
     if ($imgInfo[0] <= $w && $imgInfo[1] <= $h) {
      $nHeight = $imgInfo[1];
      $nWidth = $imgInfo[0];
     }else{
                    //yeah, resize it, but keep it proportional
      if ($w/$imgInfo[0] > $h/$imgInfo[1]) {
      $nWidth = $imgInfo[0]*($h/$imgInfo[1]);
       $nHeight = $h;
	  /* $nWidth = $w;
       $nHeight = $imgInfo[1]*($w/$imgInfo[0]);*/
      }else{
	  	 $nWidth = $w;
       $nHeight = $imgInfo[1]*($w/$imgInfo[0]);
       //$nWidth = $imgInfo[0]*($h/$imgInfo[1]);
       //$nHeight = $h;
      }
     }
     $nWidth = round($nWidth);
     $nHeight = round($nHeight);
     
     $newImg = imagecreatetruecolor($nWidth, $nHeight);
     
     /* Check if this image is PNG or GIF, then set if Transparent*/  
     if(($imgInfo[2] == 1) OR ($imgInfo[2]==3)){
      imagealphablending($newImg, false);
      imagesavealpha($newImg,true);
      $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
      imagefilledrectangle($newImg, 0, 0, $nWidth, $nHeight, $transparent);
     }
     imagecopyresampled($newImg, $im, 0, 0, 0, 0, $nWidth, $nHeight, $imgInfo[0], $imgInfo[1]);
     
     //Generate the file, and rename it to $newfilename
     switch ($imgInfo[2]) {
      case 1: imagegif($newImg,$newfilename); break;
      case 2: imagejpeg($newImg,$newfilename);  break;
      case 3: imagepng($newImg,$newfilename); break;
      default:  trigger_error('Failed resize image!', '');  break;
     }
       
       return $newfilename;
    }
	
	function smtpmailer($to, $from, $from_name, $subject, $body) {
	global $error;
	require_once ROOT_PATH.'/phpmailer/class.phpmailer.php';
	$mail = new PHPMailer(); // tạo một đối tượng mới từ class PHPMailer	
	$mail ->IsSMTP(); // bật chức năng SMTP	
	$mail ->SMTPDebug =0; // kiểm tra lỗi : 1 là hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
	$mail ->SMTPAuth = true; // bật chức năng đăng nhập vào SMTP này	
	//$mail -> SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
	$mail -> Host = '123.30.182.69';
	//$mail -> Port = 8443;
	$mail -> Username = 'no-reply@ledsaigon.com';		//$mail -> Username = 'nguyenbispkt@gmail.com';
	$mail -> Password = 'saigonled526s.v';
	$mail ->SetFrom('no-reply@ledsaigon.com','no-reply@ledsaigon.com');	
	$mail ->Subject = $subject;	
	$mail ->Body = $body;
	$mail ->AddAddress( $to );	
	if( ! $mail ->Send() )  {	
	$error = ' error: '.$mail ->ErrorInfo;	
	return false;	
	} else {	
	$error = ' ';	
	return true;	
	}	
	}
	function creatSlug($value){
		$value = trim(strtolower($value));
		$charaterA = '#(À|Ả|Ã|Á|Ạ|Ă|Ằ|Ẵ|Ẳ|Ắ|Ặ|Â|Ấ|Ầ|Ẫ|Ẩ|Ậ|à|ả|ã|á|ạ|ă|ằ|ẳ|ẵ|ắ|ặ|â|ầ|ẩ|ẫ|ấ|ậ|"Ã"|"Ã€"|"áº¢"|"Ãƒ"|"áº "|"Ã‚"|"áº¤"|"áº¦"|"áº¨"|"áºª"|"áº¬"|"Ä‚"|"áº®"|"áº°"|"áº²"|"áº´"|"áº¶"|"Ã¡"|"Ã "|"áº£"|"Ã£"|"áº¡"|"Ã¢"|"áº¥"|"áº§"|"áº©"|"áº«"|"áº­"|"Äƒ"|"áº¯"|"áº±"|"áº³"|"áºµ"|"áº·")#imsU';
		$replaceCharaterA = 'a';
		$value = preg_replace($charaterA, $replaceCharaterA, $value);
		
		$charaterD = '#(đ|Đ|"Ä"|"Ä")#imsU';
		$replaceCharaterD = 'd';
		$value = preg_replace($charaterD,$replaceCharaterD,$value);
		
		$charaterE = '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ế|Ề|Ể|Ễ|Ệ|è|ẻ|ẽ|é|ẹ|ê|ề|ể|ễ|ế|ệ|"Ã‰"|"Ãˆ"|"áºº"|"áº¼"|"áº¸"|"ÃŠ"|"áº¾"|"á»€"|"á»‚"|"á»"|"á»†"|"Ã©"|"Ã¨"|"áº»"|"áº½"|"áº¹"|"Ãª"|"áº¿"|"á»"|"á»ƒ"|"á»…"|"á»‡")#imsU';
		$replaceCharaterE = 'e';
		$value = preg_replace($charaterE,$replaceCharaterE,$value);
		
		$charaterI = '#(Ì|Ỉ|Ĩ|Ị|Í|ì|ỉ|ĩ|í|ị|"Ã"|"ÃŒ"|"á»ˆ"|"Ä¨"|"á»Š"|"Ã­"|"Ã¬"|"á»‰"|"Ä©"|"á»‹"|"ï")#imsU';
		$replaceCharaterI = 'i';
		$value = preg_replace($charaterI,$replaceCharaterI,$value);
		
		$charaterO = '#(Ò|Ỏ|Õ|Ó|Ọ|Ô|Ồ|Ổ|Ỗ|Ố|Ộ|Ơ|Ờ|Ở|Ỡ|Ớ|Ợ|ò|ỏ|õ|ó|ọ|ô|ồ|ổ|ỗ|ố|ộ|ơ|ờ|ở|ỡ|ớ|ợ|0\'|O\'|"Ã"|"Ã"|"á»Ž"|"Ã•"|"á»Œ"|"Ã"|"á»"|"á»"|"á»"|"á»–"|"á»˜"|"Æ "|"á»š"|"á»œ"|"á»ž"|"á» "|"á»¢"|"Ã³"|"Ã²"|"á»"|"Ãµ"|"á»"|"Ã´"|"á»"|"á»"|"á»•"|"á»—"|"á»™"|"Æ¡"|"á»›"|"á»"|"á»Ÿ"|"á»¡"|"á»£")#imsU';
		$replaceCharaterO = 'o';
		$value = preg_replace($charaterO,$replaceCharaterO,$value);
			
		$charaterU = '#(Ù|Ủ|Ũ|Ú"Ụ|Ư|Ừ|Ử|Ữ|Ứ|Ự|Ú|ù|ủ|ũ|ú|ụ|ư|ừ|ử|ữ|ứ|ự|"Ãš"|"Ã™"|"á»¦"|"Å¨"|"á»¤"|"Æ¯"|"á»¨"|"á»ª"|"á»¬"|"á»®"|"á»°"|"Ãº"|"Ã¹"|"á»§"|"Å©"|"á»¥"|"Æ°"|"á»©"|"á»«"|"á»­"|"á»¯"|"á»±")#imsU';
		$replaceCharaterU = 'u';
		$value = preg_replace($charaterU,$replaceCharaterU,$value);
		
		$charaterY = '#(Y|Ỳ|Ỷ|Ý|Ỵ|Ỹ|ỳ|ỷ|ỹ|ý|ỵ|"Ã"|"á»²"|"á»¶"|"á»¸"|"á»´"|"Ã½"|"á»³"|"á»·"|"á»¹"|"á»µ")#imsU';
		$replaceCharaterY = 'y';
		$value = preg_replace($charaterY,$replaceCharaterY,$value);
		$value = str_replace(array('.',';','/','?',':','@','&','=','+','$',',',')','('),'', $value);
		$value = str_replace('-~-','-',$value);
		$value = str_replace(' ','-',$value);
		return  $value;
		}

// Function to get the client IP address
function get_client_ips() {
    $ipaddress = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(!empty($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(!empty($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(!empty($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(!empty($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function objectToArray($d) {
	if (is_object($d)) {
	// Gets the properties of the given object
	// with get_object_vars function
	$d = get_object_vars($d);
	}
	
	if (is_array($d)) {
	/*
	* Return array converted to object
	* Using __FUNCTION__ (Magic constant)
	* for recursive call
	*/
	return array_map(__FUNCTION__, $d);
	}
	else {
	// Return array
	return $d;
	}
	}
	function arrayToObject($d) {
	if (is_array($d)) {
	/*
	* Return array converted to object
	* Using __FUNCTION__ (Magic constant)
	* for recursive call
	*/
	return (object) array_map(__FUNCTION__, $d);
	}
	else {
	// Return object
	return $d;
	}
	}



function cmbPower(){
	$combo= '<option value="1 Ngựa - 1.0HP">1 Ngựa - 1.0HP</option>
<option value="1.5 Ngựa - 1.5HP">1.5 Ngựa - 1.5HP</option>
<option value="2 Ngựa - 2.0HP">2 Ngựa - 2.0HP</option>
<option value="2.5 Ngựa - 2.5HP">2.5 Ngựa - 2.5HP</option>
<option value="3 Ngựa - 3.0HP">3 Ngựa - 3.0HP</option>
<option value="3.5 Ngựa - 3.5HP">3.5 Ngựa - 3.5HP</option>
<option value="4 Ngựa - 4.0HP">4 Ngựa - 4.0HP</option>
<option value="5 Ngựa - 5.0HP">5 Ngựa - 5.0HP</option>
<option value="6 Ngựa - 6.0HP">6 Ngựa - 6.0HP</option>
<option value="7 Ngựa - 7.0HP">7 Ngựa - 7.0HP</option>
<option value="8 Ngựa - 8.0 HP">8 Ngựa - 8.0 HP</option>
<option value="10 Ngựa - 10.0HP">10 Ngựa - 10.0HP</option>
';
return $combo;
	}
function isImage($img){
	$type = strtolower(substr($img,-3,3));
	if(in_array($type,array('png','jpg','peg','gif')))
	return TRUE;
	else return FALSE;
	}
function toMBytes($bytes,$decimal=2) {
		$kb = ($bytes * 8) / 1024;
		$mb = ($kb /1024) / 8;
		return round($mb,$decimal);
	}
	
	function toKBytes($bytes,$decimal=2) {
		$kb = ($bytes * 1) / 1024;
		return round($kb,$decimal);
	}

/*-----------------------------------------------------------------------*
* Function: toBytes
* Parameter: Mega bytes
* Constants:  UPLOAD_SIZE_MBYTES | UPLOAD_SIZE_BYTES
* Return: file size 
*-----------------------------------------------------------------------*/

	function toBytes($mb) {
		$bytes = ((($mb * 8) * 1024) * 1024) / 8;
		return $bytes;
	}

	function isVideo($str) {
		$ext = strtolower(substr($str,-3));
		if(preg_match("/wmv|mpg|mp4|mov|avi/",$ext)) return 1;
		return 0;
	}
	function isMusic($str) {
		$ext = strtolower(substr($str,-3));
		if(preg_match("/wma|wav|mp3|asf|/",$ext)) return 1;
		return 0;
	}
	function isFile($str) {
		$ext = strtolower(substr($str,-3));
		if(preg_match("/doc|docx|pdf|zip|rar|/",$ext)) return 1;
		return 0;
	}
?>