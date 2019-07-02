<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Products_m extends CI_Model {
		private $table='';
        public $data = array(
                                'id' => 0,
                                'id_author' => 0,
								'cid' => 0,
								'dh'=>0,
								'code' => '',
                                'vn_name' => '',
								'video' => '',
								'hang_sx' => '',
								'xuatxu' => '',
								'luuluong' => '',
								'dientich_sd' => '',
								'khuyenmai' => '',
								'congsuat' => '',
                                  'file_video' => '',
								'en_name' => '',
                                'slug' => '',
                                'mota_khoahoc' => '',
                                'chitiet_khoahoc' => '',
                                 'size' => '',
								'price' => '',
								'price_km' => '',
                                'vn_keyword' => '',
								'vn_title_site' => '',
                                'vn_description' => '',
								'en_description' => '',
								'vn_sapo' => '',
								'en_sapo' => '',

								'vn_detail' => '',
								
								'en_detail' => '',
								'avatar' => '',
								'date_created' => '',
								'home' => 0,
								'is_seller' => 0,
								'is_new' => 0,
								'is_promotion' => 0,
								'position' => 0,
								'view' => 0,
								'status' => 1,
								'properties' => ''
								
                            );
        function __construct(){
            parent::__construct();
			$this->table = 'products';
        }
        public function checkExist($field='vn_name',$value=''){
			$this->db->select($field);
			$this->db->where($field,$value);
			$query = $this->db->get($this->table);
            if($query->num_rows() > 0)
                return true;
			else
            return false;
        }
		
		public function getFromPid($cId){
			$query = $this->db->get_where($this->table,array('cid' => $cId));
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				return $results;
				} return '';
			}
		public function getFromUserid($user_id){
			$query = $this->db->get_where($this->table,array('user_id' => $user_id));
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				return $results;
				} return '';
			}
			# check slug exit
		public function checkDuplicateSlug($id,$value=''){
			$this->db->select('id','slug');
			$this->db->where('id <>',$id);
			$this->db->where('slug',$value);
			$query = $this->db->get($this->table);
            if($query->num_rows() > 0)
                return 1;
            else
				return 0;
        }
		public function getObject($field='id',$value='0'){
			$this->db->where($field,$value);
			$this->db->limit(1);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row_array();
				$query->free_result();
				return $result;
				} else return '';
			}
			
		public function getProOfUser($condition){
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				$query->free_result();
				return $result;
				} else return '';
			}
		# get all entry
		public function getAlls(){
			$this->db->order_by('id','DESC');
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				return $results;
				} else return '';
			}
	
		public function getAvatarForCid($cId){
			$this->db->select('avatar');
			$this->db->where('cid',$cId);
			$this->db->limit(1);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				return $result->avatar;
				$query->free_result();
				} else return '';
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
			$query = $this->db->update($this->table,$data, array('id' => $this->data['id']));
			if($query) return $this->db->affected_rows();
			return 0;			
			}
		# Delete product from pid
		public function deleteFromCid($cId,$value){
			$datas = array('status' => $value);
			$this->db->update($this->table,$datas, array('cid' => $cId));
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
                $this->data['id_author'] = $row->id_author;
				$this->data['cid'] = $row->cid;
				$this->data['dh'] = $row->dh;
				$this->data['code'] = $row->code;
                $this->data['vn_name'] = $row->vn_name;
				$this->data['en_name'] = $row->en_name;
                $this->data['slug'] = $row->slug;
                 $this->data['mota_khoahoc'] = $row->mota_khoahoc;
                 $this->data['chitiet_khoahoc'] = $row->chitiet_khoahoc;
                 $this->data['video'] = $row->video;
                 $this->data['hang_sx'] = $row->hang_sx;
                 $this->data['xuatxu'] = $row->xuatxu;
                 $this->data['luuluong'] = $row->luuluong;
                 $this->data['dientich_sd'] = $row->dientich_sd;
                  $this->data['khuyenmai'] = $row->khuyenmai;
                   $this->data['congsuat'] = $row->congsuat;
                 $this->data['file_video'] = $row->file_video;
                 $this->data['size'] = $row->size;
				$this->data['price'] = $row->price;
				$this->data['price_km'] = $row->price_km;
				$this->data['vn_keyword'] = $row->vn_keyword;
				$this->data['vn_title_site'] = $row->vn_title_site;
				$this->data['en_title_site'] = $row->en_title_site;
				$this->data['vn_description'] = $row->vn_description;
				$this->data['en_description'] = $row->en_description;
				$this->data['vn_sapo'] = $row->vn_sapo;
				$this->data['en_sapo'] = $row->en_sapo;

				$this->data['vn_detail'] = $row->vn_detail;
				$this->data['en_detail'] = $row->en_detail;
                $this->data['avatar'] = $row->avatar;
				$this->data['date_created'] = $row->date_created;
				$this->data['home'] = $row->home;
				$this->data['is_seller'] = $row->is_seller;
				$this->data['is_new'] = $row->is_new;
				$this->data['is_promotion'] = $row->is_promotion;
				$this->data['position'] = $row->position;
				$this->data['view'] = $row->view;			
                $this->data['status'] = $row->status;				
				$this->data['properties'] = unserialize($row->properties);
				
            }
            return $this->data;
        }
        public function sort_entry() {
            $sql = "UPDATE  `".$this->table."` 
                    SET  `position` =  ?
                    WHERE `id` = ? ;";
            $query = $this->db->query($sql, array($this->data["position"],
                                                  $this->data["id"])
												  );
            return $this->db->affected_rows();
        }
		public function search($keyword=''){
			$sql ="SELECT * FROM ".$this->table." WHERE match(vn_name) against('$keyword') OR match(en_name) against('$keyword') OR match(vn_keyword) against('$keyword') OR match(vn_title_site) against('$keyword') OR match(vn_description) against('$keyword') OR match(en_description) against('$keyword') OR match(vn_detail) against('$keyword') OR match(en_detail) against('$keyword')";
			$query = $this->db->query($sql);
			if($query->num_rows() > 0){
				$reusults = $query->result_array();
				$query->free_result();
				return $reusults;
				}else return '';
			}
		public function cleanTrash(){
			$this->db->select('id,avatar,properties');
			$this->db->where('status',2);
			$query = $this->db->get($this->table);
			if($query){
				$results = $query->result();
				$query->free_result();
				if($results){
					foreach($results as $result){
						$properties =  unserialize($result->properties);
						$this->db->delete($this->table,array('id' => $result->id));
						@unlink(ROOT_PATH.('/uploads/products/'.$result->avatar));
						@unlink(ROOT_PATH.('/uploads/products/a_'.$result->avatar));
						@unlink(ROOT_PATH.('/uploads/products/m_'.$result->avatar));
						if(@$properties['photos']){
							foreach(@$properties['photos'] as $photo){
								@unlink(ROOT_PATH.('/uploads/products/a_'.$photo));
								@unlink(ROOT_PATH.('/uploads/products/m_'.$photo));
								}
							}
						}
					}
				}
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
				@unlink(ROOT_PATH.('/uploads/products/'.$result->avatar));
				@unlink(ROOT_PATH.('/uploads/products/a_'.$result->avatar));
				}
			}
     # Fron-end
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
	public function listPowers(){
		$this->db->select('power');
		$this->db->distinct();
		$this->db->where('status',1);
		$this->db->order_by('power','ASC');
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$results = $query->result_array();
			$query->free_result();
			return $results;
			} else return '';
		}
		
	# update view
	public function updateField($id,$value,$field = 'viewed'){
		$datas = array($field=>$value);
		$query = $this->db->update($this->table, $datas,array('id'=>$id));
		if($query)
		return 1;
		else return 0;
		}
	public function getAllName(){
		$this->db->select('vn_name');
		$this->db->distinct();
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$results = $query->result();
			$query->free_result();
			return $results;
			}else return '';
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