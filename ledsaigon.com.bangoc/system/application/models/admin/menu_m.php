<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */
    class Menu_m extends CI_Model
    {
		private $table='';
        public $data = array(
                                'id' => 0,
                                'vn_name' => '',
                                'en_name' => '',
								'solan_title' => '',
                                'url' => '',
                                'position' => 0,
								'status' => 1
                            );
        function __construct()



        {



            parent::__construct();



			$this->table = 'menu';



        }



        



        public function checkExist($field='title',$value='')



        {



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



		public function getTitle(){



			$this->db->select('title');



			$this->db->where('id',$this->data['id']);



			$query = $this->db->get($this->table);



			if($query){



				$result = $query->row();



				return $result->title;



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
                $this->data['vn_name'] = $row->vn_name;
                $this->data['en_name'] = $row->en_name;
				$this->data['solan_title'] = $row->solan_title;
                $this->data['url'] = $row->url;
				$this->data['position'] = $row->position;
                $this->data['status'] = $row->status;
            }
            return $this->data;
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



		public function getObjects($condition){



			if($condition) $this->db->where($condition);

			$this->db->order_by('position','ASC');



			$query = $this->db->get($this->table);



			if($query->num_rows()>0){



				$results = $query->result_array();



				$query->free_result();



				return $results;



				} else return '';



			}

	public function sort_entry()

        {

            $sql = "UPDATE  `menu` 

                    SET  `position` =  ?

                    WHERE `id` = ? ;";

            $query = $this->db->query($sql, array(

                                                  $this->data["position"]

                                                  ,$this->data["id"]));

            return $this->db->affected_rows();

        }



    }



?>