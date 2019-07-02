<?php
/*************************************************************************
Class Upload

**************************************************************************/
define('ALLOW_FILE_TYPES','jpg$|pdf$|doc$|docx$|jpeg$|png|swf|gif$|bmp$|flv$|mp4$|avi$|mkv$');
require_once('filter.php');
class Upload
{
	var $uploadDir;
	var $fileName;
	var $fileSize;
	var $tempLocation;
	var $maxFileSize;
	var $type;
	

/*-----------------------------------------------------------------------*
* Function: Constructor
* Parameter: DB , Table, Fields
* Return: No return
*-----------------------------------------------------------------------da*/	
	function Upload($files) {
		$filter = new Filter();
		$this->fileName = $filter->filterName($files['name']);
		$this->fileSize = $files['size'];
		$this->tempLocation = $files['tmp_name'];
		$thum = substr($this->fileName,-4,4);
		if($thum == 'jpeg'){
			$thum = '.jpeg';
			$nametamp = substr($this->fileName,0,-4);
			$name =$nametamp;	
			$this->type = strtolower(substr($this->fileName,-4));
		}else{
			$nametamp = substr($this->fileName,0,-3);
			$name =$nametamp;	
			$this->type = strtolower(substr($this->fileName,-3));
		}
		$this->name = addslashes(rand()."_".$name.$thum);
	}
	
	function moveFile($uploadDir){	
		$tmp_file = $this->tempLocation;
		$size = $this->fileSize;
		if($this->checkType() !="") {
			move_uploaded_file($tmp_file,$uploadDir.$this->name);
		}
		return '0';
	}

	function checkType() {
		if(preg_match("/".ALLOW_FILE_TYPES."/",strtolower($this->type))){
			return '1';
		}
		return "";
	}
	
	function getType() {
		return $this->type;
	}
	
	function getNameFile() {
		return $this->name;
	}
#SetMaxFileSize

	function setMaxFileSize($size,$sizeType=UPLOAD_SIZE_BYTES)	{
		if ($sizeType == UPLOAD_SIZE_BYTES) {
			$bytes = $this->toBytes($size);
			$this->maxFileSize = $bytes;
		} else {
			$this->maxFileSize = intval($size);
		}
	}
#CheckSize
	function checkSize() {
		$maxFileSize = $this->maxFileSize;
		$fileSize = $this->fileSize;
		if ($fileSize > $maxFileSize) {
			return false;
		} else {
			return true;
		}
	}

function getWidth($uploadDir)	{
	$filepath = $uploadDir.$this->name;
	$size_info=getimagesize($filepath);  
   	return  $size_info[0];
}
function getHight($uploadDir)	{
	$filepath = $uploadDir.$this->name;
	$size_info=getimagesize($filepath);  
   	return $size_info[1];
}

function getPhenotype($uploadDir)	{
		$filepath = $uploadDir.$this->name;
		$size_info=getimagesize($filepath);
		if($size_info[0]>$size_info[1])
			return 1; // hinh nam
		 if($size_info[0]<$size_info[1])
			return 2; // hinh dung
		return 0; // hinh vuong
	}
	
//funtion resize
function resize($uploadDir,$thumb_path,$width=RESIZE_WIDTH,$hight=RESIZE_HIGHT,$square=0,$quality=90) 
{ 
	$image_path=$uploadDir;
	$checkimage =$this ->getPhenotype($uploadDir);
	/*$width_size= ($this->getWidth($uploadDir)*$hight)/$this->getHight($uploadDir);
	$hight_size= ($this->getHight($uploadDir)*$width)/$this->getWidth($uploadDir);*/
	$hight_size= ($this->getWidth($uploadDir)*$hight)/$this->getWidth($uploadDir);
	$width_size= ($this->getHight($uploadDir)*$width)/$this->getHight($uploadDir);
	if($checkimage==1){//hinh nam
		if($width_size > $width){
			$dimension = $width;
			if($hight_size>$hight)
				$dimension = $hight*$this->getWidth($uploadDir)/$this->getHight($uploadDir);
		}else{
			if($hight_size>$hight)
				$dimension = $hight*$this->getWidth($uploadDir)/$this->getHight($uploadDir);
			else
				$dimension =$width;	
		}
	}else{
		if($checkimage==2){// hinh dung
			if($hight_size>$hight)
				$dimension =$hight;	
			else
				if($width_size>$width)
					$dimension =($width*$this->getHight($uploadDir))/$this->getWidth($uploadDir);
				else
					$dimension =$hight;
		}else{
			$dimension= $width;
		}
	}			
	$image_name=$this->name;
		$type = strtolower(substr($image_name,-3));
	switch ($type) {
		case 'jpg':
		    $src = imagecreatefromjpeg("$image_path/$image_name"); 	
			break;
		case 'gif':
		    $src = imagecreatefromgif("$image_path/$image_name"); 	
			break;
		case 'png':
		    $src = imagecreatefrompng("$image_path/$image_name"); 	
			break;
		case 'peg':
				$src = imagecreatefromjpeg("$image_path/$image_name"); 	
				break;
		case 'bmp':
		    $src = imagecreatefromjpeg("$image_path/$image_name"); 	
			break;
	}
    $ow=imagesx($src);
    $oh=imagesy($src);
	$src_x = 0;
	$src_y = 0;
	if($ow>$oh) {
		if($ow>$dimension) {
			$nw = $dimension;
			$nh = (int)$oh*$nw/$ow;
		} else {
			$nw = $ow;
			$nh = (int)$oh*$nw/$ow;
		}
	} else {
		if($oh>$dimension) {
			$nh = $dimension;
			$nw = (int)$ow*$nh/$oh;
		} else {
			$nh = $oh;
			$nw = (int)$ow*$nh/$oh;
		}
	}
	if($square) {
		$length = min($ow,$oh);
		$src_x = ceil( $ow / 2 ) - ceil( $length / 2 );
		$src_y = ceil( $oh / 2 ) - ceil( $length / 2 );
		$nlength = max($nw,$nh);
		$nw = $nlength;
		$nh = $nlength;
		$ow = $length;
		$oh = $length;
	}
	$dst = imagecreatetruecolor($nw,$nh);
    imagecopyresampled($dst,$src,0,0,$src_x,$src_y,$nw,$nh,$ow,$oh); 
	imagejpeg($dst, "$thumb_path/$image_name",$quality);
	imagedestroy($src);
	imagedestroy($dst);	
    return true; 
} 
function resizeImg($img, $w, $h, $newfilename) {
     
     //Check if GD extension is loaded
     if (!extension_loaded('gd') && !extension_loaded('gd2')) {
      trigger_error("GD is not loaded", E_USER_WARNING);
      return false;
     }
     
     //Get Image size info
     $imgInfo = getimagesize($img);
     switch ($imgInfo[2]) {
      case 1: $im = imagecreatefromgif($img); break;
      case 2: $im = imagecreatefromjpeg($img);  break;
      case 3: $im = imagecreatefrompng($img); break;
      default:  trigger_error('Unsupported filetype!', E_USER_WARNING);  break;
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
      default:  trigger_error('Failed resize image!', E_USER_WARNING);  break;
     }
       
       return $newfilename;
    }	

#GetSize File	 
	function getFileSize($sizeType=UPLOAD_SIZE_BYTES) {
		$bytes = $this->fileSize;
		if ($sizeType == UPLOAD_SIZE_BYTES) return $this->toBytes($bytes);
		return $bytes;
	}

/*-----------------------------------------------------------------------*
* Function: toMBytes
* Parameter: bytes, decimal
* Constants:  UPLOAD_SIZE_MBYTES | UPLOAD_SIZE_BYTES
* Return: file size 
*-----------------------------------------------------------------------*/

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
	function isImage($str) {
		$ext = strtolower(substr($str,-3));
		if(preg_match("/jpg|png|bmp|gif|peg/",$ext)) return 1;
		return 0;
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
	
}
?>