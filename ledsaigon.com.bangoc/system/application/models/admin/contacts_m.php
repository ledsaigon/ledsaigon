<?php



/**

 * @author Thai Nguyen

 * @copyright 2011

 */

    class Contacts_m extends CI_Model

    {

		private $table='';

        public $data = array(

                                'id' => 0,

								'fullname' => '',

                                'mobile' => '',

                                'email' => '',

                                'subject' => '',
								'address' => '',

                                'content' => '',
								

								'date_created' => '',
								'status' => 0

                            );



        function __construct(){
            parent::__construct();
			$this->table = 'contacts';

        }


		# get all entry

		public function getAlls(){
			$this->db->order_by('status','ASC');
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
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

		public function changeStatus($value,$id){

			$data = array('status' => $value);

			$this->db->update($this->table,$data, array('id' => $id));

			return $this->db->affected_rows();


			}

     
        

        public function delete($id){
			

			$this->db->delete($this->table,array('id' => $id));

        }


	# get all entry with status = 1 and fullname =? limit 1

		public function getObject($id){
			$this->db->where('id',$id);
			$this->db->limit(1);
			
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				$result = $query->row();
				$query->free_result();
				return $result;
				
				} return '';

			}

		# get all news entry 

		public function newsMessages(){
			$this->db->select('id');
			$this->db->where('status',0);
			$query = $this->db->get($this->table);
			if($query->num_rows()>0){
				return count($query->result());
				$query->free_result();
				} return 0;

			}
		
    }

?>