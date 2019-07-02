<?php

/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Weblinks_m extends CI_Model
    {
		private $table='';
        public $data = array(
                                'id' => '',
                                'vn_name' => '',
                                'en_name' => '',
                                'link' => '',
								'status' => 1,
                            );

        function __construct()
        {
            parent::__construct();
			$this->table = 'weblinks';
        }
        
        public function checkExist($field='title',$value='')
        {
			$this->db->select($field);
			$this->db->where($field,$value);
			$query = $this->db->get($this->table);
            if($query->num_rows() > 0)
                return true;
            return false;
        }
      
		# get all entry
		public function getAlls(){
			$query = $this->db->get($this->table);
			if($query){
				$results = $query->result();
				$query->free_result();
				return $results;
				} return '';
			}
		
		# insert
		public function addData($datas){
			$this->db->insert($this->table,$datas);
			return $this->db->insert_id();
			}
		# update
		public function editData($datas,$id){
			$this->db->update($this->table,$data,array('id' => $this->data['id']));
			return $this->db->affected_rows();
			
			}
		# change status
		public function changeStatus($value){
			$data = array('status' => $value);
			$this->db->update($this->table,$data, array('id' => $this->data['id']));
			return $this->db->affected_rows();
			}
        public function select_entry()
        {
            $sql = '';
            $sql .= '   SELECT *
                        FROM `'.$this->table.'` 
                        WHERE 1 AND `id` = ?;';
            $param = array( $this->data['id']);
            $query = $this->db->query($sql,$param);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $this->data['id'] = $row->id;
                $this->data['vn_name'] = $row->vn_name;
                $this->data['en_name'] = $row->en_name;
				$this->data['link'] = $row->link;
                $this->data['status'] = $row->status;
                
            }
            return $this->data;
        }
        
	public function cleanTrash(){
			$this->db->select('id');
			$this->db->where('status',2);
			$query = $this->db->get($this->table);
			if($query){
				$results = $query->result();
				$query->free_result();
				if($results){
					foreach($results as $result){
						$this->db->delete($this->table,array('id' => $result->id));
						}
					}
				
				}
			}	
	# Front end
	# get all entry
		public function getObjects(){
			$this->db->where('status',1);
			$query = $this->db->get($this->table);
			if($query){
				$results = $query->result();
				$query->free_result();
				return $results;
				} return '';
			}
    }
?>