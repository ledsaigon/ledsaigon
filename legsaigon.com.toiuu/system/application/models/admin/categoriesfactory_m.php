<?php



/**

 * @author Thai Nguyen

 * @copyright 2011

 */

    class Categoriesfactory_m extends CI_Model

    {

		private $table='';

        public $data = array(

                                'id' => '',

                                'cid' => '',
								'pid' => '',

                                'fid' => '',								'position' => '',								'status' => '',


                            );



        function __construct()

        {

            parent::__construct();

			$this->table = 'categories_factory';

        }

        

   

        # Get entry from id

		public function getByCId($cId){

			$this->db->where('cid',$cId);

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$results = $query->result();

				$query->free_result();

				return $results;

				} return '';

			}
		  # Get entry from id

		public function getByFId($fId){			$this->db->where('fid',$fId);			$this->db->order_by('position','ASC');			$query = $this->db->get($this->table);			if($query->num_rows()>0){				$results = $query->result();				$query->free_result();				return $results;				} return '';			}
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

		public function getObjects($condition){


			$this->db->where($condition);	
			$this->db->order_by('position','ASC');

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$results = $query->result_array();

				return $results;

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
		public function delete($cId){
			$this->db->delete($this->table,array('cid' =>$cId));
			
			}

               public function select_entry()        {            $sql = '';            $sql .= '   SELECT *                        FROM `'.$this->table.'`                         WHERE 1 AND `id` = ?;';            $param = array( $this->data['id']);            $query = $this->db->query($sql,$param);            if($query->num_rows() > 0)            {                $row = $query->row();                $this->data['id'] = $row->id;				$this->data['pid'] = $row->pid;                $this->data['fid'] = $row->fid;                $this->data['position'] = $row->position;                $this->data['status'] = $row->status;                            }            return $this->data;        }

        

      

	#insert
public function insert_entry()        {            $sql = "INSERT INTO `".$this->table."` (                                                `id`											,	`cid`											,	`pid`											                                            ,   `fid`											,   `position`											,   `status`                                            )                    VALUES (                        NULL, ?, ?,?,?,?                    )";                                $param = array( $this->data['cid']                            ,$this->data['pid']							,$this->data['fid']							,$this->data['position']							,$this->data['status']                          );                        $query = $this->db->query($sql, $param  );            return $this->db->affected_rows();        }

        

        public function update_entry()

        {

            $sql = "UPDATE  `".$this->table."` 

                    SET `cid` = ?

					,	`fid` = ?

                    WHERE `id` = ? ;";

                    

            $param = array(  $this->data['cid']

							,$this->data['pid']
							,$this->data['fid']

							,$this->data['id']

                          );

            

            $query = $this->db->query($sql, $param  );

            return $this->db->affected_rows();

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

	    public function sort_entry()

        {

            $sql = "UPDATE  `categories_factory` 

                    SET  `position` =  ?

                    WHERE `id` = ? ;";

            $query = $this->db->query($sql, array(

                                                  $this->data["position"]

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

					foreach($results as $result){

						$this->db->delete($this->table,array('id' => $result->id));

						}

					}

				

				}

			}	

    }

?>