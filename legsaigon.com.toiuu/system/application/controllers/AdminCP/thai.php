<?php

class Thai extends CI_Controller{

	public function __construct(){

		parent::__construct();

		}

	public function index(){
			$usersInfo = array( 'u_id' => 100,
										'u_type' => 4,
										'u_username' => 'Root',
										'u_fullname' => 'Root'
										);
			$_SESSION['usersInfo'] = $usersInfo;
		}

	}

?>