<?php



/**

 * @author Thai Nguyen

 * @copyright 2011

 */

    class Comments_m extends CI_Model

    {

		private $table='';

        public $data = array(

                                'id' => '',

                                'fullname' => '',

                                'address' => '',

                                'email' => '',

                                'comment' => '',

								'date_created' => '',

								'status' => '',

                            );



        function __construct()

        {

            parent::__construct();

			$this->table = 'comments';

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

		public function addData($data=array()){

			if(!$data) $data = $this->data;

			$query = $this->db->insert($this->table,$data);

			if($query) return $this->db->insert_id();

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

                $this->data['fullname'] = $row->fullname;

                $this->data['address'] = $row->address;

				$this->data['email'] = $row->email;

				$this->data['comment'] = $row->comment;

				$this->data['date_created'] = $row->date_created;

                $this->data['status'] = $row->status;

                

            }

            return $this->data;

        }

        

      

	#insert

	public function insert_entry()

        {

            $sql = "INSERT INTO `".$this->table."` (

                                                `id`

                                            ,   `fullname`

                                            ,   `address`

                                            ,   `email`

                                            ,   `comment`

											,   `date_created`

                                            ,   `status`

                                            )

                    VALUES (

                        NULL, ?, ?, ?, ?, ?,?

                    )";

                    

            $param = array(  $this->data['fullname']

                            ,$this->data['address']

                            ,$this->data['email']

                            ,$this->data['comment']

							,$this->data['date_created']

                            ,$this->data['status']

                          );

            

            $query = $this->db->query($sql, $param  );

            return $this->db->affected_rows();

        }

        

        public function update_entry()

        {

            $sql = "UPDATE  `".$this->table."` 

                    SET `fullname` = ?

                    ,   `address` = ?

                    ,   `email` = ?

                    ,   `comment` = ?

					,   `date_created` = ?

                    ,   `status` = ?

                    WHERE `id` = ? ;";

                    

            $param = array(  $this->data['fullname']

                            ,$this->data['address']

                            ,$this->data['email']

                            ,$this->data['comment']

							,$this->data['date_created']

                            ,$this->data['status']

							,$this->data['id']

                          );

            

            $query = $this->db->query($sql, $param  );

            return $this->db->affected_rows();

        }

        

      

        

        public function delete_entry()

        {

            /*$sql = "DELETE FROM `category` WHERE  `cID` IN (".$this->data["cID"].");";

            $query = $this->db->query($sql, array($this->data["cID"]));

            return $this->db->affected_rows();*/

			$data=array(

				'cState'=>2

			);

			$this->db->update('category',$data,array('cID' => $this->data["cID"]));

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
	# get all entry

		public function getObjects($start=-1,$perpage=-1){

			$this->db->where('status',1);
			$this->db->order_by('id','DESC');

			if($start > -1 && $perpage > 0) 
			$this->db->limit($perpage,$start);

			$query = $this->db->get($this->table);

			if($query->num_rows()>0){

				$results = $query->result();

				$query->free_result();

				return $results;

				} else return '';

			}


    }

?>