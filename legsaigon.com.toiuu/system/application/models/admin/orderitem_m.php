<?php

/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Orderitem_m extends CI_Model
    {
		private $table='';
        public $data = array(
								'id' => '',
								'order_id' => '',
								'pro_id' => '',
								'properties' => ''
                            );

        function __construct()
        {
            parent::__construct();
			$this->table = 'order_item';
        }
        
      
        # Get entry from id
		public function getById(){
			$this->db->where('id',$this->data['id']);
			$query = $this->db->get($this->table);
			if($query){
				$result = $query->row();
				$query->free_result();
				return $result;
				} return '';
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
			$query = $this->db->insert($this->table,$datas);
			return $this->db->insert_id();
			}
		# update
		public function editData($datas,$id){
			$this->db->update($this->table,$datas,array('id' => $id));
			return $this->db->affected_rows();
			}
		# change status
		public function changeStatus($value){
			$data = array('status' => $value);
			$query = $this->db->update($this->table,$data, array('id' => $this->data['id']));
			if($query) return $this->db->affected_rows();
			return 0;			
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
                $this->data['order_id'] = $row->order_id;
                $this->data['pro_id'] = $row->pro_id;
				$this->data['properties'] = unserialize($row->properties);
                
            }
            return $this->data;
        }
             
	public function cleanTrash(){
			$this->db->select('id,avatar');
			$this->db->where('status',2);
			$query = $this->db->get($this->table);
			if($query){
				$results = $query->result();
				$query->free_result();
				if($results){
					foreach($results as $result){
						//@unlink(ROOT_PATH.('/uploads/exhibitor/'.$result->avatar));
						$this->db->delete($this->table,array('id' => $result->id));
						}
					}
				
				}
			}	
	# Front end
	# get all entry
		public function getObjects($condition,$page = 1,$per_page = 100){
			$this->db->where($condition);
			$start = ($page-1)*$per_page;
			if($start < 0) $start = 0;
			$this->db->limit($per_page,$start);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				return $results;
				} return '';
			}
		public function getObject($field='id',$value=0){
			$this->db->where($field,$value);
			$this->db->limit(1);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				$query->free_result();
				return $result;
				} return '';
			}
    }
?>