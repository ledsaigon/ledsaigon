<?php
class Mod_home extends CI_Model
{
	public $data = array(
					'langID' => 1
				);
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	function Get_thongtinMail()
	{
		$data=array();
		$re=$this->db->get('config');
		if($re->num_rows()>0)
		{
			foreach($re->result_array() as $row)
			{
				if($row['cfKey']=='mail_setting_email') $data['mail_setting_email']=$row['cfDesc'];
				if($row['cfKey']=='mail_setting_subject_email') $data['mail_setting_subject_email']=$row['cfDesc'];
				if($row['cfKey']=='mail_setting_smtp_host') $data['mail_setting_smtp_host']=$row['cfDesc'];
				if($row['cfKey']=='mail_setting_smtp_port') $data['mail_setting_smtp_port']=$row['cfDesc'];
				if($row['cfKey']=='mail_setting_smtp_username') $data['mail_setting_smtp_username']=$row['cfDesc'];
				if($row['cfKey']=='mail_setting_smtp_password') $data['mail_setting_smtp_password']=$row['cfDesc'];
				if($row['cfKey']=='cms_contact_feedback') $data['cms_contact_feedback']=$row['cfDesc'];
				if($row['cfKey']=='cms_contact_contact') $data['cms_contact_contact']=$row['cfDesc'];
				if($row['cfKey']=='config_sitename' && $row['langID']==$this->data['langID']) $data['config_sitename']=$row['cfDesc'];
			}
		}
		$re->free_result();
		return $data;
	}
		
	function Get_thongtin_contact()
	{
		$data=array();
		$this->db->where('cfKey','cms_contact_info');
		$this->db->where('langID',$this->data['langID']);
		$this->db->limit(1);
		$re=$this->db->get('config');
		if($re->num_rows()>0)
		{
			$data=$re->row_array();
		}
		$re->free_result();
		return $data;
	}
	
	function Get_truycap()
	{
		$data=array();
		$this->db->where('cfKey','config_couter_virtual');
		$this->db->where('langID',$this->data['langID']);
		$this->db->limit(1);
		$re=$this->db->get('config');
		if($re->num_rows()>0)
		{
			$data['truy_cap_ao']=$re->row_array();
		}
		$re->free_result();
		$this->db->where('cfKey','config_online_virtual');
		$this->db->where('langID',$this->data['langID']);
		$this->db->limit(1);
		$re=$this->db->get('config');
		if($re->num_rows()>0)
		{
			$data['online_ao']=$re->row_array();
		}
		$re->free_result();
		return $data;
	}
	
	
	
	/************************** PRODUCT ****************************/
	# Get  category products from id
	public function getProCateFromId($id = 0){
		if(!$id) return '';
		$this->db->where('id',$id);
		$this->db->where('status',1);
		$query = $this->db->get('product_categories');
		if($query){
			$result = $query->row();
			$query->free_result();
			return $result;
		} return '';
	}
	# Get  category products from pid
	public function getProCateFromPid(){
		//if($pId !='') $this->db->where('pid',$pId);
		$this->db->where('status',1);
		$query = $this->db->get('product_categories');
		$results = $query->result();
		
		$query->free_result();
		return $results;
		}
	
	# Get  category products from slug
	public function getProCateFromSlug($slug){
		if(!$slug) return '';
		$this->db->where('slug',$slug);
		$this->db->where('status',1);
		$this->db->limit(1);
		$query = $this->db->get('product_categories');
		if($query){
			$result = $query->row();
			$query->free_result();
			return $result;
			} return '';
		}
		
		# Get all category products
	public function getAllSubCate($pId){
		$data = array();
		$this->db->where('pid',$pId);
		$this->db->where('status',1);
		$query = $this->db->get('product_categories');
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
		}
		$query->free_result();
		return $data;
		}
		# Get Category name from id
		public function getCateNameFromId($id){
			$this->db->select('name');
			$this->db->where('id',$id);
			$query = $this->db->get('product_categories');
			if($query->num_rows >0){
				$result = $query->row();
				return $result->name;
				}
			return '';
			}
	# Get   products from pid
	public function getProductFromCid($cId = 0, $start_row= '-1',$per_page = '-1'){
		$this->db->where('cid',$cId);
		$this->db->where('status',1);
		if($start_row!=-1)
		$this->db->limit($per_page,$start_row);
		$query = $this->db->get('products');
		if($query){
			$results = $query->result();
			$query->free_result();
			return $results;
			} return '';
		}
	# Get   products from pid
	public function getOrtherProduct($cId = '0',$id='0'){
		$this->db->where('cid',$cId);
		$this->db->where('status',1);
		$this->db->where('id <>',$id);
		$this->db->limit(6);
		$query = $this->db->get('products');
		if($query){
			$results = $query->result();
			$query->free_result();
			return $results;
			} return '';
		}
	# Get   products from pid
	public function getProductFromSlug($slug = ''){
		$this->db->where('slug',$slug);
		$this->db->where('status',1);
		$this->db->limit(1);
		$query = $this->db->get('products');
		if($query){
			$result = $query->row();
			$query->free_result();
			return $result;
			} return '';
		}
	# Get   products from pid
	public function getProducts($start_row=-1,$per_page=-1){
		$this->db->where('status',1);
		if($start_row!=-1)
		$this->db->limit($per_page,$start_row);
		$this->db->order_by('date_created','DESC');
		$query = $this->db->get('products');
		if($query){
			$results = $query->result();
			$query->free_result();
			return $results;
			} return '';
		}

	/********** STATIC PAGE ***********************/
	public function getStaticItem($slug){
		if(!$slug) return '';
		$this->db->where('slug',$slug);
		$query = $this->db->get('static_pages');
		$this->db->limit(1);
		if($query){
			$reslut = $query->row();
			$query->free_result();
			return $reslut;
			} return '';
		}
	# tittle site
	function getTitleSite()
	{
		$this->db->where('cfKey','config_sitename');
		$this->db->limit(1);
		$query=$this->db->get('config');
		if($query->num_rows()>0)
		{
			$result=$query->row();
			return $result->cfDesc;
			$query->free_result();
		}
		
		return '';
	}
	#  keywords 
	function getKeywordSite()
	{
		$this->db->where('cfKey','config_meta_keywords');
		$this->db->limit(1);
		$query=$this->db->get('config');
		if($query->num_rows()>0)
		{
			$result=$query->row();
			return $result->cfDesc;
			$query->free_result();
		}
		
		return '';
	}
	#   description
	function getDescriptionSite()
	{
		$this->db->where('cfKey','config_meta_description');
		$this->db->limit(1);
		$query=$this->db->get('config');
		if($query->num_rows()>0)
		{
			$result=$query->row();
			return $result->cfDesc;
			$query->free_result();
		}
		
		return '';
	}
	# get support
	public function getListSupport(){
		$this->db->where('status',1);
		$this->db->order_by('id','asc');
		$query = $this->db->get('supports');
		if($query){
			$results = $query->result();
			$query->free_result();
			return $results;
			} return '';
		}
	# Get product from id
		public function getProductFromId($id){
			$this->db->where('id',$id);
			$query = $this->db->get('products');
			if($query){
				$result = $query->row();
				$query->free_result();
				return $result;
				} return '';
			}
	#get banner
	  # Get entry where home =1
		public function getProductInHome(){
			//$this->db->where('cid',$cId);
			//$this->db->limit(8);
			$this->db->order_by('position','ASC');
			$query = $this->db->get('products');
			if($query){
				$results = $query->result();
				$query->free_result();
				return $results;
				} return '';
			}	
}