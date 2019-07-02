<?php

/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Articles_m extends CI_Model
    {
		private $table='';
        public $data = array(
                                'id' => 0,
								'cid' => 0,
								'user_id' => 0,
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
								'en_sapo' => '',
								'vn_detail' => '',
								'en_detail' => '',
								'avatar' => '',
								'link_download' => '',
								'date_created' => '',
								'home' => 0,
								'position' => 0,
								'properties'=>'',
								'status' => 1
                            );

        function __construct()
        {
            parent::__construct();
			$this->table = 'articles';
        }
        
        public function checkExist($field='vn_title',$value='')
        {
			$this->db->select($field);
			$this->db->where($field,$value);
			$query = $this->db->get($this->table);
            if($query->num_rows() > 0)
                return true;
            return false;
        }
		# check slug exit
		public function checkDuplicateSlug($id,$value='')
        {
			$this->db->select('id','slug');
			$this->db->where('id <>',$id);
			$this->db->where('slug',$value);
			$query = $this->db->get($this->table);
            if($query->num_rows() > 0)
                return 1;
            return 0;
        }
       
	
		# get all entry
		public function getAlls(){
			$this->db->order_by('id','DESC');
			$query = $this->db->get($this->table);
			if($query){
				$results = $query->result();
				$query->free_result();
				return $results;
				} return '';
			}
		# get all entry
		public function getFromPid($cId){
			$query = $this->db->get_where($this->table,array('cid' => $cId));
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
			$this->db->update($this->table,$datas,array('id' => $id));
			return $this->db->affected_rows();
			
			}
		# change status
		public function changeStatus($value){
			$data = array('status' => $value);
			$this->db->update($this->table,$data, array('id' => $this->data['id']));
			return $this->db->affected_rows();
			}
		# Delete product from pid
		public function deleteFromCid($cId,$value){
			$datas = array('status' => $value);
			$query = $this->db->update($this->table,$datas, array('cid' => $cId));
			if($query) return $this->db->affected_rows();
			return 0;			
			}
			
		# change home
		public function changeEnableHome($value){
			$data = array('home' => $value);
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
				$this->data['user_id'] = $row->user_id;
				$this->data['cid'] = $row->cid;
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
                $this->data['link_download'] = $row->link_download;
				$this->data['date_created'] = $row->date_created;
				$this->data['home'] = $row->home;
				$this->data['position'] = $row->position;
				$this->data['properties'] = unserialize($row->properties);
                $this->data['status'] = $row->status;
                
            }
            return $this->data;
        }
        
        public function sort_entry()
        {
            $sql = "UPDATE  `articles` 
                    SET  `position` =  ?
                    WHERE `id` = ? ;";
            $query = $this->db->query($sql, array(
                                                  $this->data["position"]
                                                  ,$this->data["id"]));
            return $this->db->affected_rows();
        }

		public function search($keyword=''){
			$sql ="SELECT * FROM ".$this->table." WHERE match(vn_title) against('$keyword') OR match(en_title) against('$keyword') OR match(vn_keyword) against('$keyword') OR match(en_keyword) against('$keyword') OR match(vn_sapo) against('$keyword') OR match(en_sapo) against('$keyword') OR match(vn_detail) against('$keyword') OR match(en_detail) against('$keyword')";
			$query = $this->db->query($sql);
			if($query){
				$reusults = $query->result();
				$query->free_result();
				return $reusults;
				}return '';
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
						@unlink(ROOT_PATH.('/uploads/news/'.$result->avatar));
						@unlink(ROOT_PATH.('/uploads/news/a_'.$result->avatar));
						$this->db->delete($this->table,array('id' => $result->id));
						}
					}
				
				}
			}
		
     public function getOrtherNew($cId,$id){
			$this->db->where('cid',$cId);
			$this->db->where('id <>',$id);
			$this->db->order_by('date_created','DESC');
			$this->db->limit(5);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				return $results;
				} return '';
			}
	
	# get with condition
	public function getObject($field ='id',$value='0'){
		$this->db->where($field,$value);
		$this->db->where('status',1);
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$result = $query->row_array();
			$query->free_result();
			return $result;
			} else return '';
		
		}
	# get with condition
	public function getItemOfUser($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('status',1);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$result = $query->row();
			$query->free_result();
			return $result;
			} else return '';
		
		}
	# get with condition
	public function getObjects($condition ='',$page =1, $per_page =''){
		$this->db->where($condition);
		$this->db->order_by('position DESC, date_created DESC');
		$start = ($page - 1)*$per_page;
		if($start< 0) $start =0;
		if($per_page) 
		$this->db->limit($per_page,$start);
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$results = $query->result_array();
			$query->free_result();
			return $results;
			} else return '';
		
		}
	public function delete($id,$id_user){
			$this->db->select('id,avatar');
			$this->db->where('id',$id);
			$this->db->where('user_id',$id_user);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				$query->free_result();
					
				$this->db->delete($this->table,array('id' => $id));
				@unlink(ROOT_PATH.('/uploads/news/'.$result->avatar));
				@unlink(ROOT_PATH.('/uploads/news/a_'.$result->avatar));
				}
			}
		public function getNewsOfUser($condition){
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				$query->free_result();
				return $result;
				} else return '';
			}
		public function getField($field = 'id',$id = 0){
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
    }
?>