<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Categories_m extends CI_Model{
		private $table='';
        public $data = array(
                                'id' => 0,
								'pid' => 0,
                                'vn_name' => '',
								'en_name' => '',
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
                                'position' => 0,
								'home' => 0,
								'status' => 1,
								'is_delete' => 0
                            );
        function __construct(){
            parent::__construct();
			$this->table = 'categories';
        }        
        public function checkExist($field='name',$value=''){
			$this->db->select($field);
			$this->db->where($field,$value);
			$query = $this->db->get($this->table);
            if($query->num_rows() > 0)
                return 1;
            return 0;
        }
		# check is parent category
		public function isParent($id){
			$this->db->select('id,status');
			$this->db->where('pid',$id);
			$this->db->where('status <>','2');
			$query = $this->db->get($this->table);
			if($query->num_rows()>0)return 1;
			else return 0;
			$query->free_result();
			}
		# check is delete
		public function isDelete($id){
			$this->db->select('is_delete');
			$this->db->where('id',$id);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				$query->free_result();
				$is_delete = $result->is_delete;
				if($is_delete)
				return 1;
				else 
				return 0;
				}else return '';
			}
		# check slug exit
		public function checkDuplicateSlug($id,$value=''){
			$this->db->select('id','slug');
			$this->db->where('id <>',$id);
			$this->db->where('slug',$value);
			$query = $this->db->get($this->table);
            if($query->num_rows() > 0)
                return 1;
            return 0;
        }
		# Get entry from id
		public function getObject($field='id',$value='0'){
			$this->db->where($field,$value);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row_array();
				$query->free_result();
				return $result;
				} return '';
			}
		# get many item
		public function getObjects($condition){
			$this->db->where($condition);
			$this->db->order_by('position','ASC');
			$query  = $this->db->get($this->table);
			if($query->num_rows()>0){
				$results = $query->result_array();
				$query->free_result();
				return $results;
				}else return '';
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
		# get name
		public function getName($id,$lang='vn'){
			$name = $lang.'_name';
			$this->db->select($name);
			$this->db->where('id',$id);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				return  $result->$name;
				$query->free_result();
				} return 'Gốc';
			}
		# get slug
		public function getSlug($id){
			$this->db->select('slug');
			$this->db->where('id',$id);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				return $result->slug;
				$query->free_result();
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
		# change home
		public function changeEnableHome($value){
			$data = array('home' => $value);
			$this->db->update($this->table,$data, array('id' => $this->data['id']));
			return $this->db->affected_rows();
			}
        public function select_entry(){
            $sql = '';
            $sql .= '   SELECT *
                        FROM `'.$this->table.'` 
                        WHERE 1 AND `id` = ?;';
            $param = array( $this->data['id']);
            $query = $this->db->query($sql,$param);
            if($query->num_rows() > 0){
                $row = $query->row();
                $this->data['id'] = $row->id;
				$this->data['pid'] = $row->pid;
                $this->data['vn_name'] = $row->vn_name;
				$this->data['en_name'] = $row->en_name;
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
				$this->data['position'] = $row->position;
				$this->data['home'] = $row->home;
                $this->data['status'] = $row->status;
				$this->data['is_delete'] = $row->is_delete;
            }
            return $this->data;
        }
	function creatCombobox($value='') {
		$combo = '';
		$this->db->select('id,vn_name');
		$this->db->order_by('id','ASC');
		$this->db->where('pid',0);
		$query = $this->db->get($this->table);
		if($query->num_rows()>0) {
			$results = $query->result_array();
			foreach($results as $key => $result) {
				$combo .= "<option value='".$result['id']."'".($value==$result['id']?" selected":"").">&nbsp;&nbsp;&nbsp;l--".$result['vn_name']."</option>";	
				$sql = "SELECT `id`, `vn_name` FROM `".$this->table."` WHERE `pid` = ".$result['id'];
				$query2 = $this->db->query($sql);
				if($query2) {
					$s1results =$query2->result_array();
					foreach($s1results as $key1 => $result1) {
						$combo .= "<option value='".$result1['id']."'".($value==$result1['id']?" selected":"").">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;l--".$result1['vn_name']."</option>";
					}
				}			
			}
		}
		return $combo;
	}
	# get sub category
		public function arrSubCid($pId){
			$this->db->select('id');
			$this->db->where('pid',$pId);
			$query = $this->db->get($this->table);
			$arrCid = "$pId";
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				foreach($results as $result){
					$arrCid .= ','.$result->id;
					}
				} 
				return $arrCid;
			}
	   public function sort_entry(){
            $sql = "UPDATE  `categories` 
                    SET  `position` =  ?
                    WHERE `id` = ? ;";
            $query = $this->db->query($sql, array($this->data["position"]
                                                  ,$this->data["id"]));
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
					$this->load->model('admin/articles_m');
					foreach($results as $result){
						if($this->db->delete($this->table,array('id' => $result->id))){
							$arrEntries = $this->articles_m->getFromPid($result->id);
								if($arrEntries){
									foreach($arrEntries as $entries){
										$this->db->delete('articles',array('cid' => $result->id));
										}
									}
							}
						}
					}
				
				}
			}
		public function delete(){
			$this->db->select('id');
			$this->db->where('id',$this->data['id']);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				if($results){
					$this->load->model('admin/articles_m');
					foreach($results as $result){
						if($this->changeStatus(2)){
							$arrProduct = $this->articles_m->getFromPid($result->id);
								if($arrProduct){
									foreach($arrProduct as $product){
										$this->articles_m->data['id'] = $result->id;
										$this->articles_m->changeStatus(2);
										}
									}
							}
						}
					}
				
				}
			}
    }
?>