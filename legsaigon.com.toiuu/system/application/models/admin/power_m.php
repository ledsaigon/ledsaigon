<?php
/**

 * @author Thai Nguyen

 * @copyright 2011

 */
    class Power_m extends CI_Model {

		private $table='';
        public $data = array(
                                'id' => 0,
                                'name' => '',
                                'slug' => '',
                                'keyword' => '',
								'title_site' => '',
                                'description' => '',
								'position' => '',
								'status' => 1
								
                            );

        function __construct(){
            parent::__construct();
			$this->table = 'power';

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
                $this->data['name'] = $row->name;
                $this->data['slug'] = $row->slug;
				$this->data['keyword'] = $row->keyword;
				$this->data['title_site'] = $row->title_site;
				$this->data['description'] = $row->description;
				$this->data['position'] = $row->position;
                $this->data['status'] = $row->status;				
				
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



     # Fron-end

	 public function getObjects($condition=''){

		 if($condition) $this->db->where($condition);
		

		 $this->db->order_by('position','ASC');

		 $query = $this->db->get($this->table);

		 if($query->num_rows() > 0){

			 $results = $query->result_array();

			 $query->free_result();

			 return $results;

			 }else return '';

		 }

	
		
	# update view
	public function updateField($id,$value,$field = 'viewed'){
		$datas = array($field=>$value);
		$query = $this->db->update($this->table, $datas,array('id'=>$id));
		if($query)
		return 1;
		else return 0;
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
	public function creatCombobox($value = 0){
			$str = '';
			$this->db->where('status',1);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				foreach($results as $item){
					$str.="<option value=\"$item->id\" ".($item->id==$value?'selected':'').">|- ".$item->name."</option>";
					}
					
				}
			return $str;
			}
    }

?>