<?php
/**

 * @author Thai Nguyen

 * @copyright 2011

 */

    class Pricelist_m extends CI_Model

    {

		private $table='';

        public $data = array(

                                'id' => '',

                                'pid' => '',

                                'name' => '',
								'link' => '',
								'file_name' => '',
								'status' => '',
								'position' => ''
                            );



        function __construct()

        {

            parent::__construct();

			$this->table = 'price_list';

        }

        

   		# check is delete
		public function isParent($id){
			$this->db->select('id');
			$this->db->where('pid',$id);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0)				
				return 1;
				else 
				return 0;
				
			}
		# check file_name exit
		public function checkDuplicateSlug($id,$value='')
        {
			$this->db->select('id','file_name');
			$this->db->where('id <>',$id);
			$this->db->where('file_name',$value);
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

		public function getName($id){

			$this->db->select('name');

			$this->db->where('id',$id);

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$result = $query->row();
				return $result->name;

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

		        $this->data['pid'] = $row->pid;

                $this->data['name'] = $row->name;
				$this->data['link'] = $row->link;
				$this->data['file_name'] = $row->file_name;

                $this->data['status'] = $row->status;
				$this->data['position'] = $row->position;

            }

            return $this->data;

        }

        

      

	#insert

	public function insert_entry()

        {

            $sql = "INSERT INTO `".$this->table."` (

                                                `id`
                                            ,   `pid`
                                            ,   `name`
											,   `link`
											,   `file_name`
                                            ,   `status`
											,   `position`

                                            )

                    VALUES (NULL, ?, ?, ?,?,?,?
                    )";

                    

            $param = array( 

							$this->data['pid']

                            ,$this->data['name']
							,$this->data['link']
							,$this->data['file_name']
                            ,$this->data['status']
							,$this->data['position']
                          );

            

            $query = $this->db->query($sql, $param  );

            return $this->db->affected_rows();

        }

        

        public function update_entry()

        {

            $sql = "UPDATE  `".$this->table."` 

                    SET 

						`pid` = ?
                    ,   `name` = ?
					,   `link` = ?
					,   `file_name` = ?
                    ,   `status` = ?
					,   `position` = ?

                    WHERE `id` = ? ;";

                    

            $param = array(

							$this->data['pid']

                            ,$this->data['name']
							,$this->data['link']
							,$this->data['file_name']
                            ,$this->data['status']
							,$this->data['position']
							,$this->data['id']

                          );

            

            $query = $this->db->query($sql, $param  );

            return $this->db->affected_rows();

        }
  
	# creat combobox
		function creatCombobox($value='') {

		$combo = '';

		$this->db->select('id,name');

		$this->db->order_by('id','ASC');

		$this->db->where('pid',0);

		$query = $this->db->get($this->table);

		if($query) {

			$results = $query->result_array();

			foreach($results as $key => $result) {

				$combo .= "<option value='".$result['id']."'".($value==$result['id']?" selected":"").">&nbsp;&nbsp;&nbsp;l--".$result['name']."</option>";	

				$sql = "SELECT `id`, `name` FROM `".$this->table."` WHERE `pid` = ".$result['id'];

				$query2 = $this->db->query($sql);

				if($query2) {

					$s1results =$query2->result_array();

					foreach($s1results as $key1 => $result1) {

						$combo .= "<option value='".$result1['id']."'".($value==$result1['id']?" selected":"").">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;l--".$result1['name']."</option>";

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
		$this->db->order_by('position','ASC');
		$query = $this->db->get($this->table);
		if($query->num_rows()>0){
			$result = $query->result_array();
			$query->free_result();
			return $result;
			}return '';
		}
   public function sort_entry()
        {
            $sql = "UPDATE  `price_list` 
                    SET  `position` =  ?
                    WHERE `id` = ? ;";
            $query = $this->db->query($sql, array(
                                                  $this->data["position"]
                                                  ,$this->data["id"]));
            return $this->db->affected_rows();
        }
    }

?>