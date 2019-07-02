<?php
require_once('home.php');
class Profile extends Home{
	
	public function __construct(){
		parent::__construct();
		}
	public function userInfo(){
		$this->index('users/profile');
		
		
		}
	}
?>