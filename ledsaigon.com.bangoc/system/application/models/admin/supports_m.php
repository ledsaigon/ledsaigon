<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Supports_m extends CI_Model
    {
		private $table='';
        public $data = array(
                                'id' => '',
                                'fullname' => '',
                                'nick_skype' => '',
                                'nick_yahoo' => '',
                                'cell' => '',
								'email' => '',
								'status' => '',
								'gender' => '',
                            );
        function __construct()
        {
            parent::__construct();
			$this->table = 'supports';
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
                $this->data['fullname'] = $row->fullname;
                $this->data['nick_skype'] = $row->nick_skype;
				$this->data['nick_yahoo'] = $row->nick_yahoo;
				$this->data['cell'] = $row->cell;
				$this->data['email'] = $row->email;
                $this->data['status'] = $row->status;
                $this->data['gender'] = $row->gender;
                
            }
            return $this->data;
        }
        
      
	#insert
	public function insert_entry()
        {
            $sql = "INSERT INTO `".$this->table."` (
                                                `id`
                                            ,   `fullname`
                                            ,   `nick_skype`
                                            ,   `nick_yahoo`
                                            ,   `cell`
											,   `email`
                                            ,   `status`
                                             ,   `gender`
                                            )
                    VALUES (
                        NULL, ?, ?, ?, ?, ?,?,?
                    )";
                    
            $param = array(  $this->data['fullname']
                            ,$this->data['nick_skype']
                            ,$this->data['nick_yahoo']
                            ,$this->data['cell']
							,$this->data['email']
                            ,$this->data['status']
                            ,$this->data['gender']
                          );
            
            $query = $this->db->query($sql, $param  );
            return $this->db->affected_rows();
        }
        
        public function update_entry()
        {
            $sql = "UPDATE  `".$this->table."` 
                    SET `fullname` = ?
                    ,   `nick_skype` = ?
                    ,   `nick_yahoo` = ?
                    ,   `cell` = ?
					,   `email` = ?
                    ,   `status` = ?
                    ,   `gender` = ?
                    WHERE `id` = ? ;";
                    
            $param = array(  $this->data['fullname']
                            ,$this->data['nick_skype']
                            ,$this->data['nick_yahoo']
                            ,$this->data['cell']
							,$this->data['email']
                            ,$this->data['status']
                            ,$this->data['gender']
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
	# get all entry
		public function getObjects($condition = '',$limit=0){
			if($condition !='') $this->db->where($condition);
			if($limit >0) $this->db->limit($limit);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				return $results;
				} else return '';
			}
    }
?>