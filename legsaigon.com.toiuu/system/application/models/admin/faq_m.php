<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Faq_m extends CI_Model
    {
		private $table='';
        public $data = array(
                                'id' => '',
                                'vn_title' => '',
								'en_title' => '',
                                'slug' => '',
                                'vn_title_site' => '',
								'en_title_site' => '',
								'vn_keyword' => '',
								'en_keyword' => '',
                                'vn_description' => '',
								'en_description' => '',
								 'vn_sapo' => '',
								  'avatar' => '',
								'en_sapo' => '',
								'vn_detail' => '',
								'en_detail' => '',
								'status' => '',
                            );
        function __construct()
        {
            parent::__construct();
			$this->table = 'faq';
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
		# Get entry from id
		public function getObject($field='id',$value='0'){
			$this->db->where('(status = 1 OR status = 4)');
			$this->db->where($field,$value);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row_array();
				$query->free_result();
				return $result;
				} else return '';
			}
		public function getObjects(){
			$this->db->where('status',1);
			$query = $this->db->get($this->table);
			if($query){
				$results = $query->result();
				$query->free_result();
				return $results;
				} return '';
			}
		# get all entry
		public function getAlls($condition=''){
			if($condition)
			$this->db->where($condition);
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
                $this->data['vn_title'] = $row->vn_title;
				$this->data['en_title'] = $row->en_title;
                $this->data['slug'] = $row->slug;
				$this->data['vn_title_site'] = $row->vn_title_site;
				$this->data['en_title_site'] = $row->en_title_site;
				$this->data['vn_keyword'] = $row->vn_keyword;
				$this->data['en_keyword'] = $row->en_keyword;
				$this->data['vn_description'] = $row->vn_description;
				$this->data['en_description'] = $row->en_description;
				$this->data['vn_sapo'] = $row->vn_sapo;
				$this->data['en_sapo'] = $row->en_sapo;
				$this->data['vn_detail'] = $row->vn_detail;
				$this->data['en_detail'] = $row->en_detail;
                $this->data['avatar'] = $row->avatar;
                $this->data['status'] = $row->status;
                
            }
            return $this->data;
        }
        
      
	#insert
	public function insert_entry()
        {
            $sql = "INSERT INTO `".$this->table."` (
                                                `id`
                                            ,   `vn_title`
											,   `en_title`
                                            ,   `slug`
                                            ,   `vn_title_site`
											,   `en_title_site`
											,   `vn_keyword`
											,   `en_keyword`
                                            ,   `vn_description`
											,   `en_description`
											,   `vn_sapo`
											,   `en_sapo`
											,   `vn_detail`
											,   `en_detail`
                                            ,   `avatar`
                                            ,   `status`
                                            )
                    VALUES (
                        NULL, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?
                    )";
                    
            $param = array(  $this->data['vn_title']
							,$this->data['en_title']
                            ,$this->data['slug']
                            ,$this->data['vn_title_site']
							,$this->data['en_title_site']
							,$this->data['vn_keyword']
							,$this->data['en_keyword']
                            ,$this->data['vn_description']
							,$this->data['en_description']
							,$this->data['vn_sapo']
							,$this->data['en_sapo']
							,$this->data['vn_detail']
							,$this->data['en_detail']
							,$this->data['avatar']
                            ,$this->data['status']
                          );
            
            $query = $this->db->query($sql, $param  );
            return $this->db->affected_rows();
        }
        
        public function update_entry()
        {
            $sql = "UPDATE  `".$this->table."` 
                    SET `vn_title` = ?
                    ,   `en_title` = ?
					,   `slug` = ?
                    ,   `vn_title_site` = ?
					,   `en_title_site` = ?
					,   `vn_keyword` = ?
					,   `en_keyword` = ?
                    ,   `vn_description` = ?
					,   `en_description` = ?
					,   `vn_sapo` = ?
					,   `en_sapo` = ?
					,   `vn_detail` = ?
					,   `en_detail` = ?
					,   `avatar` = ?
                    ,   `status` = ?
                    WHERE `id` = ? ;";
                    
            $param = array(  $this->data['vn_title']
							,$this->data['en_title']
                            ,$this->data['slug']
                            ,$this->data['vn_title_site']
							,$this->data['en_title_site']
							,$this->data['vn_keyword']
							,$this->data['en_keyword']
                            ,$this->data['vn_description']
							,$this->data['en_description']
							,$this->data['vn_sapo']
							,$this->data['en_sapo']
							,$this->data['vn_detail']
							,$this->data['en_detail']
							,$this->data['avatar']
                            ,$this->data['status']
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