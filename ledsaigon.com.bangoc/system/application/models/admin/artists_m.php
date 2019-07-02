<?php







/**



 * @author Thai Nguyen



 * @copyright 2011



 */



    class Artists_m extends CI_Model



    {



		private $table='';



        public $data = array(



                                'id' => 0,



                                'name' => '',




								'slug' => '',

								'avatar' => '',

								'position' => 0,
								'home' => 0,
								'detail' => '',



								'status' => 1,



                            );







        function __construct()



        {



            parent::__construct();



			$this->table = 'artists';



        }



        



   



        # Get entry 



		public function getObject($field,$value){



			$this->db->where($field,$value);



			$query = $this->db->get($this->table);



			if($query->num_rows()>0){



				$result = $query->row();



				$query->free_result();



				return $result;



				} return '';



			}

			

		# Get entry from id



		public function getObjects($condition){



			$this->db->where($condition);
			$this->db->order_by('position','ASC');


			$query = $this->db->get($this->table);



			if($query->num_rows()>0){



				$results = $query->result_array();



				$query->free_result();



				return $results;



				} return '';



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



			if($query){



				$result = $query->row();



				return $result->name;



				$query->free_result();



				} return '';



			}

			

			# get title



		public function getBySlug($slug){





			$this->db->where('slug',$slug);

			$this->db->limit(1);



			$query = $this->db->get($this->table);



			if($query->num_rows()>0){



				$results = $query->row_array();



				return $results;



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

                $this->data['name'] = $row->name;




				$this->data['slug'] = $row->slug;



				$this->data['avatar'] = $row->avatar;



				$this->data['position'] = $row->position;
				$this->data['home'] = $row->home;
				$this->data['detail'] = $row->detail;



                $this->data['status'] = $row->status;



                



            }



            return $this->data;



        }



        



      



	#insert



	public function insert_entry()



        {



            $sql = "INSERT INTO `".$this->table."` (



                                                `id`



                                            ,   `name`



                                            ,   `en_name`

											,   `slug`



                                            ,   `avatar`



                                            ,   `position`
											,   `detail`



                                            ,   `status`



                                            )



                    VALUES (



                        NULL, ?, ?, ?, ?, ?,?,?



                    )";



                    



            $param = array($this->data['name']



                            ,$this->data['en_name']

							,$this->data['slug']



                            ,$this->data['avatar']



                            ,$this->data['position']
							,$this->data['detail']



                            ,$this->data['status']







                          );



            



            $query = $this->db->query($sql, $param  );



            return $this->db->affected_rows();





        }



        



        public function update_entry()



        {



            $sql = "UPDATE  `".$this->table."` 



                    SET `name` = ?



                    ,   `en_name` = ?

					,   `slug` = ?



                    ,   `avatar` = ?



                    ,   `position` = ?
					,   `detail` = ?



                    ,   `status` = ?



                    WHERE `id` = ? ;";



                    



            $param = array(	$this->data['name']



                            ,$this->data['en_name']

							 ,$this->data['slug']



                            ,$this->data['avatar']



                            ,$this->data['position']
							,$this->data['detail']



                            ,$this->data['status']



							,$this->data['id']



                          );



            



            $query = $this->db->query($sql, $param  );



            return $this->db->affected_rows();



        }

	 public function sort_entry()



        {



            $sql = "UPDATE  `artists` 



                    SET  `position` =  ?



                    WHERE `id` = ? ;";



            $query = $this->db->query($sql, array(



                                                  $this->data["position"]



                                                  ,$this->data["id"]));



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

					$str.="<option value=\"$item->id\" ".($item->id==$value?'selected':'').">|- ".$item->name."</option>";

					}

					return $str;

				}else return '';

			}

	# listbox 

	public function creatListbox($value=array(), $noroot = 1) {

		$combo = '';

		if(!$noroot) $combo = '<option value="0"'.($value=='0'?" selected":"").'>Tất cả</option>';

		$this->db->select('id,name');
		$this->db->order_by('position','ASC');

		$query = $this->db->get($this->table);

		if($query->num_rows()>0){

			$results = $query->result_array();

			$query->free_result();

			$i=0;

			foreach($results as $key => $result) {

				$combo .= "<option value='".$result['id']."'".(in_array($result['id'],$value)?" selected":"").">&nbsp;&nbsp;&nbsp;l--".$result['name']."</option>";	

				

			}

			

			}

		

		return $combo;

	}

	

	# change home
		public function changeEnableHome($value){
			$data = array('home' => $value);
			$query = $this->db->update($this->table,$data, array('id' => $this->data['id']));
			if($query) return $this->db->affected_rows();
			return 0;			
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