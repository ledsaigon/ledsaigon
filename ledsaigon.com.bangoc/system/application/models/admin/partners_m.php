<?php

/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Partners_m extends CI_Model
    {
		private $table='';
        public $data = array(
                                'id' => '',
                                'vn_name' => '',
                                'en_name' => '',
                                'avatar' => '',
                                'website' => '',
								'address' => '',
								'description' => '',
								'status' => '',
                            );

        function __construct()
        {
            parent::__construct();
			$this->table = 'partners';
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
		# get title
		public function getTitle(){
			$this->db->select('title');
			$this->db->where('id',$this->data['id']);
			$query = $this->db->get($this->table);
			if($query){
				$result = $query->row();
				return $result->title;
				$query->free_result();
				} return '';
			}
		# insert
		public function addData($data=array()){
			if(!$data) $data = $this->data;
			$query = $this->db->insert($data);
			if($query) return $query->insert_id();
			return 0;
			}
		# update
		public function editData($data){
			$query = $this->db->update($this->table,$data,array('id' => $this->data['id']));
			if($query) return $this->db->affected_rows();
			return 0;
			
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
                $this->data['vn_name'] = $row->vn_name;
                $this->data['en_name'] = $row->en_name;
				$this->data['avatar'] = $row->avatar;
				$this->data['website'] = $row->website;
				$this->data['address'] = $row->address;
				$this->data['description'] = $row->description;
                $this->data['status'] = $row->status;
                
            }
            return $this->data;
        }
        
      
	#insert
	public function insert_entry()
        {
            $sql = "INSERT INTO `".$this->table."` (
                                                `id`
                                            ,   `vn_name`
                                            ,   `en_name`
                                            ,   `avatar`
                                            ,   `website`
											,   `address`
											,   `description`
                                            ,   `status`
                                            )
                    VALUES (
                        NULL, ?, ?, ?, ?, ?,?,?
                    )";
                    
            $param = array(  $this->data['vn_name']
                            ,$this->data['en_name']
                            ,$this->data['avatar']
                            ,$this->data['website']
							,$this->data['address']
							,$this->data['description']
                            ,$this->data['status']
                          );
            
            $query = $this->db->query($sql, $param  );
            return $this->db->affected_rows();
        }
        
        public function update_entry()
        {
            $sql = "UPDATE  `".$this->table."` 
                    SET `vn_name` = ?
                    ,   `en_name` = ?
                    ,   `avatar` = ?
                    ,   `website` = ?
					,   `address` = ?
					,   `description` = ?
                    ,   `status` = ?
                    WHERE `id` = ? ;";
                    
            $param = array(  $this->data['vn_name']
                            ,$this->data['en_name']
                            ,$this->data['avatar']
                            ,$this->data['website']
							,$this->data['address']
							,$this->data['description']
                            ,$this->data['status']
							,$this->data['id']
                          );
            
            $query = $this->db->query($sql, $param  );
            return $this->db->affected_rows();
        }
        
      
        
        public function delete_entry()
        {
            /*$sql = "DELETE FROM `category` WHERE  `cID` IN (".$this->data["cID"].");";
            $query = $this->db->query($sql, array($this->data["cID"]));
            return $this->db->affected_rows();*/
			$data=array(
				'cState'=>2
			);
			$this->db->update('category',$data,array('cID' => $this->data["cID"]));
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
						@unlink(ROOT_PATH.('/uploads/partners/'.$result->avatar));
						@unlink(ROOT_PATH.('/uploads/partners/a_'.$result->avatar));
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