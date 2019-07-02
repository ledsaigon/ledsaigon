<?php



/**

 * @author Thai Nguyen

 * @copyright 2011

 */

    class Galleries_m extends CI_Model

    {

		private $table='';

        public $data = array(
                                'id' => 0,
								'ab_id' => 0,
                                'vn_name' => '',
								'en_name' => '',
                                'avatar' => '',
								'link_video' => '',
								'date_created' => '',
								//'detail' => '',
								'status' => 1,
                            );



        function __construct(){
            parent::__construct();

			$this->table = 'galleries';

        }        

        public function checkExist($field='title',$value=''){

			$this->db->select($field);

			$this->db->where($field,$value);

			$query = $this->db->get($this->table);

            if($query->num_rows() > 0)

                return true;

            return false;

        }

		# get all entry

		public function getAlls(){

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();

				return $results;

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
				$this->data['ab_id'] = $row->ab_id;

                $this->data['vn_name'] = $row->vn_name;
				$this->data['en_name'] = $row->en_name;

				$this->data['avatar'] = $row->avatar;
				$this->data['link_video'] = $row->link_video;
				$this->data['date_created'] = $row->date_created;
				//$this->data['detail'] = $row->detail;
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
						@unlink(ROOT_PATH.('/uploads/galleries/'.$result->avatar));
						@unlink(ROOT_PATH.('/uploads/galleries/a_'.$result->avatar));
						@unlink(ROOT_PATH.('/uploads/galleries/m_'.$result->avatar));
						$this->db->delete($this->table,array('id' => $result->id));

						}

					}

				

				}

			}	

	# Front end

	# get all entry with status = 1 and gid =? limit 1

		public function getObject($field ='id',$value='0'){

			$this->db->where('status',1);

			$this->db->where($field,$value);

			$this->db->limit(1);			

			$query = $this->db->get($this->table);

			if($query){

				$result = $query->row();

				$query->free_result();

				return $result;

				} return '';

			}
		
		# get all entry with status = 1 and gid =?

		public function getObjects($condition,$page=1,$per_page = ''){

			$this->db->where($condition);
			$this->db->order_by('id','DESC');
			$start = ($page-1)*$per_page;
			if($start<0)
			$start = 0;
			if($per_page)

			$this->db->limit($per_page,$start);

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$results = $query->result_array();

				$query->free_result();

				return $results;

				} else return '';

			}
	public function getByAlbum($abId){

			if($abId > 0) $this->db->where('ab_id',$abId);

			$query = $this->db->get($this->table);

			if($query->num_rows() > 0){

				$results = $query->result();

				$query->free_result();

				return $results;

				} else return '';

			}
    }

?>