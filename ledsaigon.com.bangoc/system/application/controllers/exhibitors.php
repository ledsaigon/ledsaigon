<?php 
require_once'indexcontroller.php';
class Exhibitors extends IndexController{
	public function __construct(){
		parent::__construct();
		$this->data['active_menu'] = 3;
		}
	public function listItem(){
		# Bread crumb
			$breadCrumbs = array(array(	'name'=>'Exhibition', 'url' =>base_url())
	);
			$this->data['breadCrumbs'] = $breadCrumbs;
		$this->load->model('admin/exhibitors_m');
		$p=$this->uri->segment('3');
		$per_page=12;
		if($p == 0)
		$page = 1;
		else
		$page = $p;
		
		$condition = "status = 1";
		$total_rows=count($this->exhibitors_m->getObjects($condition));
		$total_page = ceil($total_rows/$per_page);
		if($p>$total_page)
		$page = $total_page;
		$config['base_url']=base_url().'exhibition/page';
		$config['first_url']=base_url().'exhibition.html';
		$config['total_rows'] =$total_rows;
		$config['per_page'] = $per_page; 

		$config['uri_segment'] = 3;

		$this->load->library('pagination');
		$this->pagination->initialize($config); 
		$this->data['listPages']=$this->pagination->create_links();
		$this->data['listItem'] = $this->exhibitors_m->getObjects($condition,$page,$per_page);
		$this->index('exhibitors');
		}
	public function search($name){
		$this->load->model('admin/exhibitors_m');
		$condition = "status = 1 AND (name LIKE '$name%' OR slug LIKE '$name%') ";
		$this->data['listItem'] = $this->exhibitors_m->getObjects($condition);
		$this->index('exhibitors');
		}
	public function detail($slug){
		$this->load->model('admin/exhibitors_m');
		$object = $this->exhibitors_m->getObject('slug',$slug);
		$this->data['object'] = $object;
		if($object){
			# Bread crumb
			$breadCrumbs = array(array(	'name'=>'Exhibition', 'url' =>base_url().'exhibition.html'),
								array(	'name'=>$object->name, 'url' =>'')
	);
			$this->data['breadCrumbs'] = $breadCrumbs;
			}
		$this->index('detail_exhibitors');
		}
	}
?>