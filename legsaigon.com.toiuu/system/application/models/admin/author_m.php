<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Author_m extends CI_Model
    {
		private $table='';
        public $data = array(
                                'id' => '',
                                'name' => '',
								'position' => '',
								'twitter' => '',
								'face' => '',
								'instagram' => '',
								'mota' => '',
								'avatar' => '',
                            );
        function __construct()
        {
            parent::__construct();
			$this->table = 'author';
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
		public function getById($id){
			$this->db->where('id',$id);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row_array();
				$query->free_result();
				return $result;
				} else return '';
			}


			function creatCombobox($value='') {
		$combo = '';
		$this->db->select('id,name');
		$this->db->order_by('id','DESC');
		$query = $this->db->get($this->table);
		if($query->num_rows()>0) {
			$results = $query->result_array();
			foreach($results as $key => $result) {
				$combo .= "<option value='".$result['id']."'".($value==$result['id']?" selected":"").">&nbsp;&nbsp;&nbsp;--".$result['name']."</option>";	
			}
		}
		return $combo;
	}

		# Get entry from id
		public function getObject($field='id',$value='0'){
			$this->db->where($field,$value);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row_array();
				$query->free_result();
				return $result;
				} else return '';
			}

		 public function getObjects($condition='',$page= 1,$per_page= '',$order_by='position',$order_dir='ASC'){
		 if($condition) $this->db->where($condition);
		$start = ($page - 1)*$per_page;
		if($start < 0) $start = 0;
		 if($per_page) $this->db->limit($per_page,$start);
		 $this->db->order_by($order_by,$order_dir);
		 $query = $this->db->get($this->table);
		 if($query->num_rows() > 0){
			 $results = $query->result_array();
			 $query->free_result();
			 return $results;
			 }else return '';
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
                $this->data['name'] = $row->name;
				$this->data['position'] = $row->position;
				$this->data['twitter'] = $row->twitter;
				$this->data['face'] = $row->face;
				$this->data['instagram'] = $row->instagram;
				$this->data['mota'] = $row->mota;
                $this->data['avatar'] = $row->avatar;
                
            }
            return $this->data;
        }
        
      
	#insert
	public function insert_entry()
        {
            $sql = "INSERT INTO `".$this->table."` (
                                                `id`
                                            ,   `name`
											,   `position`
											,   `twitter`
											,   `face`
											,   `instagram`
											,   `mota`
                                            ,   `avatar`
                                            )
                    VALUES (
                        NULL, ?, ?, ?, ?, ?, ?, ?
                    )";
                    
            $param = array(  $this->data['name']
							,$this->data['position']
							,$this->data['twitter']
							,$this->data['face']
							,$this->data['instagram']
							,$this->data['mota']
                            ,$this->data['avatar']
                          );
            
            $query = $this->db->query($sql, $param  );
            return $this->db->affected_rows();
        }
        
        public function update_entry()
        {
            $sql = "UPDATE  `".$this->table."` 
                    SET `name` = ?
                    ,   `position` = ?
                     ,   `twitter` = ?
                      ,   `face` = ?
                       ,   `instagram` = ?
                        ,   `mota` = ?
					,   `avatar` = ?
                    WHERE `id` = ? ;";
                    
            $param = array(  $this->data['name']
							,$this->data['position']
							,$this->data['twitter']
							,$this->data['face']
							,$this->data['instagram']
							,$this->data['mota']
                            ,$this->data['avatar']
							,$this->data['id']
                          );
            
            $query = $this->db->query($sql, $param  );
            return $this->db->affected_rows();
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
    }
?>