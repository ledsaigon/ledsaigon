<?php



/**

 * @author Thai Nguyen

 * @copyright 2011

 */

    class Adsgroups_m extends CI_Model

    {

		private $table='';

        public $data = array(

                                'id' => '',

                                'vn_name' => '',

                                'en_name' => '',

								'status' => 1,

                            );



        function __construct()

        {

            parent::__construct();

			$this->table = 'ads_groups';

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

		public function getName($id){

			$this->db->select('vn_name');

			$this->db->where('id',$id);

			$query = $this->db->get($this->table);

			if($query){

				$result = $query->row();

				return $result->vn_name;

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
		        $this->data['vn_name'] = $row->vn_name;
                $this->data['en_name'] = $row->en_name;
                $this->data['status'] = $row->status;                

            }

            return $this->data;

        }
	
	# creat combobox
		public function creatCombobox($root = 0,$value = 0){
			$str = '';
			if($root == 1)
			$str .="<option value='0'>Tất cả</a>";
			$this->db->where('status',1);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$results = $query->result();
				$query->free_result();
				foreach($results as $item){
					$str.="<option value=\"$item->id\" ".($item->id==$value?'selected':'').">|- ".$item->vn_name."</option>";
					}
					return $str;
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
    }

?>