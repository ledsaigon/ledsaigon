<?php

/**

 * @author Thai Nguyen

 * @copyright 2011

 */

    class Productcategories_m extends CI_Model {

		private $table='';

        public $data = array(

                                'id' => 0,

								'pid' => 0,

                                'vn_name' => '',

                                 'vn_sapo' => '',
                                 'en_sapo' => '',

								'en_name' => '',

								'solan_title' => '',

                                'slug' => '',

								'vn_title_site' => '',

								'en_title_site' => '',

								'vn_keyword' => '',

                                'en_keyword' => '',

                                'vn_description' => '',

								'en_description' => '',

								'avatar' => '',

								'bg_top' => '',

                                'position' => 0,

								'status' => 1,

								'home' => 0,

                            );

        function __construct(){

            parent::__construct();

			$this->table = 'product_categories';

        }

        public function checkExist($field='name',$value=''){

			$this->db->select($field);

			$this->db->where($field,$value);

			$query = $this->db->get($this->table);

            if($query->num_rows() > 0)

                return 1;

           	else

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

		# check exit subcate from pid

		public function checkExitSub($pId){

			$this->db->select('id');

			$this->db->where('pid',$pId);

			$this->db->where('status',1);

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				return 1;

				$query->free_result();

				}else return 0;

			

			}

		# check slug exit

		public function checkDuplicateSlug($id,$value=''){

			$this->db->select('id','slug');

			$this->db->where('id <>',$id);

			$this->db->where('slug',$value);

			$query = $this->db->get($this->table);

            if($query->num_rows() > 0)

				return 1;

            else return 0;

        }

		public function getByPId($pId){

			$this->db->where('pid',$pId);

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$results = $query->result();

				$query->free_result();

				return $results;

				} else return '';

			}

			

		# Get entry where home =1

		public function getByHome($pId = 0, $home='1'){

			$this->db->where('pid',$pId);

			$this->db->where('home',$home);

			$this->db->order_by('position','ASC');

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$results = $query->result_array();

				$query->free_result();

				return $results;

				} return '';

			}

		#get Object

		public function getObject($field = 'id',$value=0){

			$this->db->where($field,$value);

			$this->db->limit(1);

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$result = $query->row_array();

				$query->free_result();

				return $result;

				}else return '';

			}

		#get Objects

		public function getObjects($condition){

			$this->db->where($condition);

			$this->db->order_by('position','ASC');

			$query = $this->db->get($this->table);

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

			if($query->num_rows()>0){

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

				}else return '';

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

				}else return '';

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

                  $this->data['vn_sapo'] = $row->vn_sapo;
                $this->data['en_sapo'] = $row->en_sapo;

				$this->data['en_name'] = $row->en_name;

				$this->data['solan_title'] = $row->solan_title;

                $this->data['slug'] = $row->slug;

				$this->data['vn_title_site'] = $row->vn_title_site;

				$this->data['en_title_site'] = $row->en_title_site;

				$this->data['vn_keyword'] = $row->vn_keyword;

				$this->data['en_keyword'] = $row->en_keyword;

				$this->data['vn_description'] = $row->vn_description;

				$this->data['en_description'] = $row->en_description;

                $this->data['avatar'] = $row->avatar;

                $this->data['bg_top'] = $row->bg_top;

				$this->data['position'] = $row->position;

				$this->data['home'] = $row->home;

                $this->data['status'] = $row->status;

            }

            return $this->data;

        }

	function creatCombobox($value='') {

		$combo = '';

		$this->db->select('id,vn_name');

		$this->db->order_by('position','ASC');

		$this->db->where('pid',0);

		$query = $this->db->get($this->table);

		if($query->num_rows()>0) {

			$results = $query->result_array();

			foreach($results as $key => $result) {

				$combo .= "<option value='".$result['id']."'".($value==$result['id']?" selected":"").">&nbsp;&nbsp;&nbsp;l--".$result['vn_name']."</option>";	

				$sql = "SELECT `id`, `vn_name` FROM `".$this->table."` WHERE `pid` = ".$result['id']." ORDER BY position ASC";

				$query2 = $this->db->query($sql);

				if($query2) {

					$s1results =$query2->result_array();

					foreach($s1results as $key1 => $result1) {

						$combo .= "<option value='".$result1['id']."'".($value==$result1['id']?" selected":"").">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;l--".$result1['vn_name']."</option>";

					$sql2 = "SELECT `id`, `vn_name` FROM `".$this->table."` WHERE `pid` = ".$result1['id']." ORDER BY position ASC";

					$query3 = $this->db->query($sql2);

					if($query3) {

					$s2results =$query3->result_array();

					foreach($s2results as $key2 => $result2) {

						$combo .= "<option value='".$result2['id']."'".($value==$result2['id']?" selected":"").">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;l--".$result2['vn_name']."</option>";

					}

					}

					}

				}			

			}

		}

		return $combo;

	}

	

	   public function sort_entry(){

            $sql = "UPDATE  `".$this->table."` 

                    SET  `position` =  ?

                    WHERE `id` = ? ;";

            $this->db->query($sql, array($this->data["position"],

                                         $this->data["id"]));

            return $this->db->affected_rows();

        }

	

	public function cleanTrash(){

			$this->db->select('id');

			$this->db->where('status',2);

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$results = $query->result();

				$query->free_result();

				if($results){

					$this->load->model('admin/products_m');

					foreach($results as $result){

						if($this->db->delete($this->table,array('id' => $result->id))){

							$arrProduct = $this->products_m->getFromPid($result->id);

								if($arrProduct){

									foreach($arrProduct as $product){

										$this->db->delete('products',array('cid' => $result->id));

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

					$this->load->model('admin/products_m');

					foreach($results as $result){

						if($this->changeStatus(2)){

							$arrProduct = $this->products_m->getFromPid($result->id);

								if($arrProduct){

									foreach($arrProduct as $product){

										$this->products_m->data['id'] = $result->id;

										$this->products_m->changeStatus(2);

										}

									}

							}

						}

					}

				}

			}

    # function get all productuc categories from pid

	public function getProCateFromPid($pId=0,$home =''){

		$this->db->where('pid',$pId);

		$this->db->where('status',1);

		if($home !='')	$this->db->where('home',$home);

		$this->db->order_by('position');

		$query = $this->db->get($this->table);

		if($query->num_rows() > 0){

			$results = $query->result_array();

			$query->free_result();

			return $results;

			

			}else return '';

		

		}    

	public function getField($field='vn_name',$id=0){

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

	

    # get sub category

		public function getSubCateFromPid($pId){

			$this->db->order_by('position','ASC');

			$query = $this->db->get_where($this->table,array('pid' => $pId));

			if($query->num_rows()>0){

				$results = $query->result();

				$query->free_result();

				return $results;

				} return '';

			}

	public function subCateId($pid){

		$this->db->select('id');

		$arrCid = "$pid";

		$this->db->where('pid',$pid);

		$query = $this->db->get($this->table);

		if($query->num_rows()>0){

			$results = $query->result();

			$query->free_result();

			if($results){

				foreach($results as $result){

					$arrCid.=','.$result->id;

					$this->db->where('pid',$result->id);

					$query2 = $this->db->get($this->table);

					if($query2->num_rows()>0){

						$results2 = $query2->result();

						$query2->free_result();

						if($results2){

							foreach($results2 as $result2){

								$arrCid.=','.$result2->id;

							}

							}

						}

					}

				}

			}

		return $arrCid;

		}

	}

?>