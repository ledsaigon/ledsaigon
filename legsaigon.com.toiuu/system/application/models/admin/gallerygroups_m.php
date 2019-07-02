<?php



/**

 * @author Thai Nguyen

 * @copyright 2011

 */

    class Gallerygroups_m extends CI_Model

    {

		private $table='';

        public $data = array(

                                'id' => 0,

                                'pid' => 0,

                                'vn_name' => '',
								'en_name' => '',
								'slug' => '',
								'avatar' => '',
								'vn_detail' => '',

								'status' => 1,
								'home' => 0,
								'is_delete' => 0

                            );



        function __construct(){
            parent::__construct();
			$this->table = 'gallery_groups';

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
        # Get entry from id

		public function getById($id){

			$this->db->where('id',$id);
			$this->db->where('status',1);

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$result = $query->row();

				$query->free_result();

				return $result;

				} return '';

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

		public function getName($id,$lang='vn'){

			$this->db->select($lang.'_name');

			$this->db->where('id',$id);

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$result = $query->row();
				$key = $lang.'_name';
				return $result->$key;

				$query->free_result();

				} return '';

			}

		# insert

		public function addData($datas){
			$query = $this->db->insert($this->table,$datas);
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
				$this->data['avatar'] = $row->avatar;
				$this->data['vn_detail'] = $row->vn_detail;
                $this->data['status'] = $row->status;
				$this->data['home'] = $row->home;
				$this->data['is_delete'] = $row->is_delete;              

            }

            return $this->data;

        }
	
	# creat combobox
		function creatCombobox($value='') {
		$combo = '';
		$this->db->select('id,vn_name');
		$this->db->order_by('id','ASC');

		$this->db->where('pid',0);
		$query = $this->db->get($this->table);
		if($query) {
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
						$this->db->delete('galleries',array('ab_id' => $result->id));

						}

					}

				

				}

			}
	public function getObject($field ='id',$value='0'){

			$this->db->where('status',1);

			$this->db->where($field,$value);

			$this->db->limit(1);			

			$query = $this->db->get($this->table);

			if($query){

				$result = $query->row_array();

				$query->free_result();

				return $result;

				} return '';

			}	
	public function getObjects($condition){
		$this->db->where($condition);
		$this->db->order_by('id','DESC');
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$result = $query->result_array();
			$query->free_result();
			return $result;
			}return '';
		}
    }

?>