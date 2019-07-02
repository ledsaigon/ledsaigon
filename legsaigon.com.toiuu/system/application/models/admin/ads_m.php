<?php

/**

 * @author Thai Nguyen

 * @copyright 2011

 */

    class Ads_m extends CI_Model{

		private $table='';

        public $data = array(

                                'id' => '',

								'gid' => '',

                                'vn_name' => '',

                                'en_name' => '',

                                'avatar' => '',

                                'link' => '',
                                'position' => '',

                      

								'properties' => '',

								'status' => 1

                            );

        function __construct(){

            parent::__construct();

			$this->table = 'ads';

        }

        

        public function checkExist($field='title',$value=''){

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

		 # Get entry from id

		public function getByGroup($gId){

			if($gId > 0) $this->db->where('gid',$gId);

			$query = $this->db->get($this->table);

			if($query->num_rows() > 0){

				$results = $query->result();

				$query->free_result();

				return $results;

				} else return '';

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

				$this->data['gid'] = $row->gid;

                $this->data['vn_name'] = $row->vn_name;

                $this->data['en_name'] = $row->en_name;

				$this->data['avatar'] = $row->avatar;

				$this->data['link'] = $row->link;
				$this->data['position'] = $row->position;

			

				$this->data['properties'] = @unserialize($row->properties);

                $this->data['status'] = $row->status;

                

            }

            return $this->data;

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

						@unlink(ROOT_PATH.('/uploads/ads/'.$result->avatar));

						$this->db->delete($this->table,array('id' => $result->id));

						}

					}

				

				}

			}	

	# Front end

	# get all entry with status = 1 and gid =? limit 1

		public function getObject($gId){

			$this->db->where('status',1);

			$this->db->where('gid',$gId);

			$this->db->limit(1);

			

			$query = $this->db->get($this->table);

			if($query){

				$result = $query->row();

				$query->free_result();

				return $result;

				} return '';

			}

		# get all entry with status = 1 and gid =?

		public function getObjects($gId){

			$this->db->where('status',1);

			$this->db->where('gid',$gId);

			$this->db->order_by('position');

			$query = $this->db->get($this->table);

			if($query){

				$results = $query->result();

				$query->free_result();

				return $results;

				} return '';

			}

		

    }

?>