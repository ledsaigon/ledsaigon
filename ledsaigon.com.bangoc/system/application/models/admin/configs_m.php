<?php
/**********************************
# Class configs 
# Author Nguyễn Văn Thái
# Date : 29-08-2012
***********************************/
 class Configs_m extends CI_Model{
	 private $table;

	public function __construct(){
		parent::__construct();
		$this->table = 'configs';
		}
	
	public function setValues($values,$key){
		$this->db->update($this->table,$values,array('key' => $key));
		}
	public function getValues($key){
		$this->db->where('key',$key);
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$result = $query->row();
			$query->free_result();
			return unserialize($result->values);
			}else return '';
		}
	 }