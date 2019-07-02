<?php







/**



 * @author Thai Nguyen



 * @copyright 2011



 */



    class Factories_m extends CI_Model



    {



		private $table='';



        public $data = array(



                                'id' => '',



                                'vn_name' => '',



                                'en_name' => '',

								'slug' => '',

								'avatar' => '',
								'title_site' => '',
								'keyword' => '',
								'description' => '',

								'position' => '',
								'properties' => '',
								'home' => '',



								'status' => '',



                            );







        function __construct()



        {



            parent::__construct();



			$this->table = 'factories';



        }



        



   



        # Get entry 



		public function getObject($field,$value){



			$this->db->where($field,$value);



			$query = $this->db->get($this->table);



			if($query->num_rows()>0){



				$result = $query->row_array();



				$query->free_result();



				return $result;



				} return '';



			}

			

		# Get entry from id

		# change home
		public function changeEnableHome($value){
			$data = array('home' => $value);
			$this->db->update($this->table,$data, array('id' => $this->data['id']));
			return $this->db->affected_rows();

			}

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



			$this->db->select('vn_name');



			$this->db->where('id',$id);



			$query = $this->db->get($this->table);



			if($query){



				$result = $query->row();



				return $result->vn_name;



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

                $this->data['vn_name'] = $row->vn_name;



                $this->data['en_name'] = $row->en_name;

				$this->data['slug'] = $row->slug;



				$this->data['avatar'] = $row->avatar;
				$this->data['title_site'] = $row->title_site;
				$this->data['keyword'] = $row->keyword;
				$this->data['description'] = $row->description;



				$this->data['position'] = $row->position;
				$this->data['properties'] = unserialize($row->properties);
				$this->data['home'] = $row->home;


                $this->data['status'] = $row->status;



                



            }



            return $this->data;



        }



        



      



	#insert



	public function insert_entry()



        {



            $sql = "INSERT INTO `".$this->table."` (



                                                `id`



                                            ,   `vn_name`



                                            ,   `en_name`

											,   `slug`



                                            ,   `avatar`
											,   `title_site`
											,   `keyword`
											,   `description`



                                            ,   `position`
											,   `properties`



                                            ,   `home`
											,   `status`



                                            )



                    VALUES (



                        NULL, ?, ?, ?, ?, ?,?,?,?,?,?,?



                    )";



                    



            $param = array($this->data['vn_name']



                            ,$this->data['en_name']

							,$this->data['slug']



                            ,$this->data['avatar']
							,$this->data['title_site']
							,$this->data['keyword']
							,$this->data['description']



                            ,$this->data['position']
							,$this->data['properties']



                            ,$this->data['home']
							,$this->data['status']







                          );



            



            $query = $this->db->query($sql, $param  );



            return $this->db->affected_rows();





        }



        



        public function update_entry()



        {



            $sql = "UPDATE  `".$this->table."` 



                    SET `vn_name` = ?



                    ,   `en_name` = ?

					,   `slug` = ?



                    ,   `avatar` = ?
					,   `title_site` = ?
					,   `keyword` = ?
					,   `description` = ?



                    ,   `position` = ?
					,   `properties` = ?



                    ,   `home` = ?
					,   `status` = ?



                    WHERE `id` = ? ;";



                    



            $param = array(	$this->data['vn_name']



                            ,$this->data['en_name']

							 ,$this->data['slug']



                            ,$this->data['avatar']
							,$this->data['title_site']
							,$this->data['keyword']
							,$this->data['description']



                            ,$this->data['position']
							,$this->data['properties']



                            ,$this->data['home']
							,$this->data['status']



							,$this->data['id']



                          );



            



            $query = $this->db->query($sql, $param  );



            return $this->db->affected_rows();



        }

	 public function sort_entry()



        {



            $sql = "UPDATE  `factories` 



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

					$str.="<option value=\"$item->id\" ".($item->id==$value?'selected':'').">|- ".$item->vn_name."</option>";

					}

					return $str;

				}else return '';

			}

	# listbox 

	public function creatListbox($value=array(), $noroot = 1) {

		$combo = '';

		if(!$noroot) $combo = '<option value="0"'.($value=='0'?" selected":"").'>Tất cả</option>';

		$this->db->select('id,vn_name');
		$this->db->order_by('position','ASC');

		$query = $this->db->get($this->table);

		if($query->num_rows()>0){

			$results = $query->result_array();

			$query->free_result();

			$i=0;

			foreach($results as $key => $result) {

				$combo .= "<option value='".$result['id']."'".(in_array($result['id'],$value)?" selected":"").">&nbsp;&nbsp;&nbsp;l--".$result['vn_name']."</option>";	

				

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



    }



?>