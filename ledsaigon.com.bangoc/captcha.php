<?php
if (!defined( "ROOT_PATH" )) {
	define("ROOT_PATH", dirname(__FILE__)."/");
}
session_start();
include_once(ROOT_PATH."/captcha/authimg.php");
$authimg = new AuthImage();
$op=isset($_REQUEST['op'])?$_REQUEST['op']:'showImage';
if($op=="renewCode") $authimg->renewCode();
$authimg->showImage();

?>