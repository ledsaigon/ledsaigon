<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Users_m extends CI_Model
    {
		private $table='';
        public $data = array(
                                'id' => '',
								'tid' => '',
                                'username' => '',
                                'password' => '',
                                'fullname' => '',
                                'cell' => '',
								'email' => '',
								'address' => '',
								'properties' => '',
								'last_login' => '',
								'status' => '',
								'code' => ''
                            );
        function __construct()
        {
            parent::__construct();
			$this->table = 'users';
        }
        
        public function checkExist($field='username',$value='')
        {
			$this->db->select($field);
			$this->db->where($field,$value);
			$query = $this->db->get($this->table);
            if($query->num_rows() > 0)
                return 1;
			else
            	return 0;
        }
		# check duplicate
		 public function checkDuplicate($username)
        {
			$this->db->select('id');
			$this->db->where('username',$username);
			$query = $this->db->get($this->table);
            if($query->num_rows() > 0)
                return 1;
			else
            	return 0;
        }
		public function checkDuplicatePass($id,$pass)
        {
			$this->db->select('id');
			$this->db->where('id',$id);
			$this->db->where('password',$pass);
			$query = $this->db->get($this->table);
            if($query->num_rows() > 0)
                return 1;
			else
            	return 0;
        }
		
		# change pass
		public function changePass($value,$id){
			$datas = array('password' => $value);
			$this->db->update($this->table,$datas,array('id' => $id));
			if($this->db->affected_rows() > 0) return 1;
			else return 0;
			}
        # Get entry from id
		public function getById($id){
			$this->db->where('id',$id);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				$query->free_result();
				return $result;
				} return '';
			}
		public function getByEmail($email){
			$this->db->where('email',$email);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				$query->free_result();
				return $result;
				} return '';
			}
		 # Get entry from id
		public function getByType($tId){
			if($tId > 0) $this->db->where('tid',$tId);
			$query = $this->db->get($this->table);
			if($query->num_rows() > 0){
				$results = $query->result();
				$query->free_result();
				return $results;
				} else return '';
			}
		# get all entry
		public function getAlls(){
			$this->db->where('tid in (3,4,5)');
			$query = $this->db->get($this->table);
			if($query){
				$results = $query->result();
				$query->free_result();
				return $results;
				} return '';
			}
		# get title
		public function getObject($id){
			$this->db->where('id',$id);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				return $result;
				$query->free_result();
				} return '';
			}
		# insert
		public function addData($data){
			$query = $this->db->insert($this->table,$data);
			return $this->db->insert_id();
			}
		# update
		public function editData($data,$id){
			$this->db->update($this->table,$data,array('id' => $id));
			return $this->db->affected_rows() ;
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
				$this->data['tid'] = $row->tid;
                $this->data['username'] = $row->username;
				 $this->data['company'] = $row->company;
                $this->data['password'] = $row->password;
				$this->data['fullname'] = $row->fullname;
				$this->data['cell'] = $row->cell;
				$this->data['cell2'] = $row->cell2;
				$this->data['email'] = $row->email;
				$this->data['address'] = $row->address;
				$this->data['properties'] = unserialize($row->properties);
				$this->data['status'] = $row->status;
				$this->data['code'] = $row->code;
            }
            return $this->data;
        }
        
      
	#insert
	public function insert_entry()
        {
            $sql = "INSERT INTO `".$this->table."` (
                                                `id`
											,	`tid`
                                            ,   `username`
                                            ,   `password`
                                            ,   `fullname`
                                            ,   `cell`
											,   `email`
											,   `address`
											,   `date_created`
											,   `last_login`
											,   `status`
											,   `code`
                                            )
                    VALUES ( NULL, ?, ?, ?, ?, ?,?,?,?,?,?,?)";
                    
            $param = array(  $this->data['tid']
							,$this->data['username']
                            ,$this->data['password']
                            ,$this->data['fullname']
                            ,$this->data['cell']
							,$this->data['email']
							,$this->data['adress']
							,$this->data['date_created']
							,$this->data['last_login']
                            ,$this->data['status']
							,$this->data['code']
                          );
            
            $query = $this->db->query($sql, $param  );
            return $this->db->affected_rows();
        }
        
        public function update_entry()
        {
            $sql = "UPDATE  `".$this->table."` 
                    SET `tid` = ?
					,	`username` = ?
                    ,   `fullname` = ?
                    ,   `cell` = ?
					,   `email` = ?
					,   `address` = ?
					,   `last_login` = ?
					,   `status` = ?
					,   `code` = ?
                    WHERE `id` = ? ;";
                    
            $param = array(  $this->data['tid']
							,$this->data['username']
                            ,$this->data['fullname']
                            ,$this->data['cell']
							,$this->data['email']
							,$this->data['address']
							,$this->data['last_login']
                            ,$this->data['status']
							,$this->data['code']
							,$this->data['id']
                          );
            
            $query = $this->db->query($sql, $param  );
            return $this->db->affected_rows();
        }
	# check login
	public function checkLogin($username,$password){
		$username = htmlspecialchars($username);
		$password = htmlspecialchars($password);
		$username = addslashes($username);
		$password = addslashes($password);
		$md5Pass = md5($password);
		$this->db->select('id, tid,username,fullname');
		$this->db->where('username',$username);
		$this->db->where('password',$md5Pass);
		$this->db->where('status',1);
		$this->db->where('tid in (3,4,5,6)');
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$result = $query->row();
			$query->free_result();
			return $result;
			}else return '';
		
		}
	public function checkAcountCustomer($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$this->db->where('status',1);
		//$this->db->where('tid in (1,2)');
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$result = $query->row();
			$query->free_result();
			return $result;
		}else return '';
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
		# get all entry with status = 1 and gid =?
		public function getObjects($condition,$page=1,$per_page=''){
			$this->db->where($condition);
			$start = ($page-1)*$per_page;
			if($start < 0) $start = 0;
			if($per_page)
			$this->db->limit($per_page,$start);
			$this->db->order_by('id','DESC');
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				return $results;
				}else return '';
			}
	public function countAccount($tId){
		$this->db->where('tid',$tId);
		$query  =$this->db->get($this->table);
		return $query->num_rows();
		}
		
	public function getStaff(){
		$this->db->where('tid in (1,2,3,5,6)');
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$results = $query->result();
			$query->free_result();
			return $results;
			} return '';
		}
	public function getField($field='fullname',$id=0){
		$this->db->select($field);
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$result = $query->row();
			$query->free_result();
			return $result->$field;
			}else return '';
		}
    function creatCombobox($value='') {
		$combo = '';
		$this->db->select('id,company');
		$this->db->where('tid',2);
		$this->db->order_by('company','ASC');
		$query = $this->db->get($this->table);
		if($query->num_rows()>0) {
			$results = $query->result_array();
			foreach($results as $key => $result) {
				$combo .= "<option value='".$result['id']."'".($value==$result['id']?" selected":"").">&nbsp;&nbsp;&nbsp;l--".$result['company']."</option>";	
			}
		}
		return $combo;
	}
	}
?>